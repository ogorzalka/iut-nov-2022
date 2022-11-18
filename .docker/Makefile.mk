DC=docker-compose
args = `arg="$(filter-out $@,$(MAKECMDGOALS))" && echo $${arg:-${1}}`

.DEFAULT_GOAL := help
.PHONY: help

include $(SELF_DIR)/.env

ifndef APP_PUBLIC_DIR
	export APP_PUBLIC_DIR=/app/htdocs
endif

ifndef PHP_VERSION
	export PHP_VERSION=8.0
endif

IP := $(shell ip -4 addr show scope global dev docker0 | grep inet | awk '{print $$2}' | cut -d / -f 1)
export HOST_IP=$(IP)

help:  ##Display this help
	@awk 'BEGIN {FS = ":.*##"; printf "\nUsage:\n  make \033[36m<target>\033[0m\n\nTargets:\n"} /^[a-zA-Z_-]+:.*?##/ { printf "  \033[36m%-10s\033[0m %s\n", $$1, $$2 }' $(MAKEFILE_LIST)

composer: ## Make composer install
	$(DC) run composer $(call args,install)

init-theme:
	$(DC) exec --user=www-data php ls

db-import: ## Import database. Usage : make db-import source-url=https://monprojet.amphi.beer
	$(DC) exec --user=www-data php wp db import $(filter-out $@,$(MAKECMDGOALS)) --allow-root
	$(DC) exec --user=www-data php wp search-replace '$(source-url)' '$(APP_URL)' --precise --all-tables --allow-root

db-export: ## Export database. Usage : make db-export target-url=https://monprojet.amphi.beer
	$(DC) exec --user=www-data php wp search-replace '$(APP_URL)' '$(target-url)' --precise --all-tables --allow-root
	$(DC) exec --user=www-data php wp db export --allow-root
	$(DC) exec --user=www-data php wp search-replace '$(target-url)' '$(APP_URL)' --precise --all-tables --allow-root

wp: ##Start WP Cli command
	$(DC) exec --user=www-data php wp $(call args,--info) --allow-root

build:
	$(DC) up -d --build --remove-orphans

up: ##Start Docker
	$(DC) up -d --remove-orphans
	@echo "$(APP_TD) is running";
	@echo "-------------------+-----------------------------------------------------------";
	@echo " Application URL  | https://$(APP_TD).docker.localhost";
	@echo " PhpMyAdmin       | https://pma-$(APP_TD).docker.localhost";
	@echo " Redis Commander  | http://redis-$(APP_TD).docker.localhost:8081";
	@echo " Mailhog          | http://mail-$(APP_TD).docker.localhost:8025";
	@echo "-------------------------------------------------------------------------------";
	$(DC) exec --user=root php /bin/bash /docker/setup-xdebug.sh

do: ##Stop Docker
	$(DC) down
	echo "$(APP_TD) application is stopped"

ex: ##Connect to WP
	$(DC) exec --user=www-data php /bin/bash

exa: ##Connect to PHP Admin
	$(DC) exec --user=root php /bin/bash

logs: ##Logs
	$(DC) logs -f

ccv: ##Restart varnish
	$(DC) restart varnish
	
yarn: ##Yarn - install dependencies
	$(DC) exec php yarn --cwd web/app/themes/$(APP_TD)

pint-test: ## Pint analysis
	$(DC) exec --user=www-data php vendor/bin/pint --test

pint: ## Exec Pint analysis & autocorrect
	$(DC) exec --user=www-data php vendor/bin/pint