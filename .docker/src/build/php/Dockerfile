ARG PHP_VERSION

FROM php:${PHP_VERSION}-fpm

#REPOS
RUN apt-get update && apt-get install -y gnupg && \
    curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - && \
    curl -sS https://deb.nodesource.com/gpgkey/nodesource.gpg.key | apt-key add - && \
    echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list && \
    echo 'deb https://deb.nodesource.com/node_12.x buster main' > /etc/apt/sources.list.d/nodesource.list && \
    apt remove -y gnupg



RUN apt-key adv --refresh-keys --keyserver keyserver.ubuntu.com

# PHP Curl layer
RUN apt-get update && \
    apt-get -y install git zip wget vim net-tools iproute2 libcurl4-openssl-dev libcurl4 libicu-dev libzip-dev libxslt-dev libpng-dev libjpeg-dev libfreetype6-dev mariadb-client && \
    docker-php-ext-configure gd --with-jpeg=/usr/include/ --with-freetype=/usr/include/ && \
    docker-php-ext-install bcmath intl curl zip pdo_mysql mysqli xsl gd exif soap sockets && \
    apt-get install -y nodejs yarn

COPY scripts/install-composer.sh /docker/install-composer.sh
RUN sh /docker/install-composer.sh && \
    curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar && \
    chmod +x wp-cli.phar && \
    mv wp-cli.phar /usr/local/bin/wp

RUN version=$(php -r "echo PHP_MAJOR_VERSION.PHP_MINOR_VERSION;") \
    && architecture=$(case $(uname -m) in i386 | i686 | x86) echo "i386" ;; x86_64 | amd64) echo "amd64" ;; aarch64 | arm64 | armv8) echo "arm64" ;; *) echo "amd64" ;; esac) \
    && curl -A "Docker" -o /tmp/blackfire-probe.tar.gz -D - -L -s https://blackfire.io/api/v1/releases/probe/php/linux/$architecture/$version \
    && mkdir -p /tmp/blackfire \
    && tar zxpf /tmp/blackfire-probe.tar.gz -C /tmp/blackfire \
    && mv /tmp/blackfire/blackfire-*.so $(php -r "echo ini_get ('extension_dir');")/blackfire.so \
    && printf "extension=blackfire.so\nblackfire.agent_socket=tcp://blackfire:8307\n" > $PHP_INI_DIR/conf.d/blackfire.ini \
    && rm -rf /tmp/blackfire /tmp/blackfire-probe.tar.gz
    
# Install xdebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

#Setup uid & gid layer
ARG DOCKER_WWW_DATA_UID
ARG DOCKER_WWW_DATA_GID

RUN echo "Docker user uid and gid is ${DOCKER_WWW_DATA_UID}:${DOCKER_WWW_DATA_GID}"
RUN usermod -u ${DOCKER_WWW_DATA_UID} www-data && \
    groupmod -g ${DOCKER_WWW_DATA_GID} www-data

# Composer layer
USER www-data
