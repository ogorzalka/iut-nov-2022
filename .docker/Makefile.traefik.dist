SELF_DIR := $(dir $(lastword $(MAKEFILE_LIST)))
include $(SELF_DIR)/.docker/Makefile.mk
include $(SELF_DIR)/.env

DC=docker-compose -pbee-$(APP_TD) -f .docker/src/docker-compose.yml -f .docker/src/docker-compose-traefik.yml --env-file .env