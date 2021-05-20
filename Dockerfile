FROM php:7.3-fpm
RUN apt-get update && apt-get install -y \
        # For php gd ext
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        # For php zip ext
        zlib1g-dev \
        libzip-dev \
        # For memcached
        libmemcached-dev \
        # Install required packages
        default-mysql-client \
        locales \
        # For php composer
        unzip \
        # For Terminal
        git \
        subversion \
        vim \
    && docker-php-ext-configure mysqli \
    && docker-php-ext-install -j$(nproc) mysqli \
    && docker-php-ext-configure gettext \
    && docker-php-ext-install -j$(nproc) gettext \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-configure sockets \
    && docker-php-ext-install -j$(nproc) sockets \
    && docker-php-ext-configure pdo_mysql \
    && docker-php-ext-install -j$(nproc) pdo_mysql \
    && docker-php-ext-configure zip \
    && docker-php-ext-install -j$(nproc) zip \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && pecl install memcached \
    && docker-php-ext-enable memcached
 # For composer
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer
 # For time zone
ENV TZ=Asia/Taipei
RUN ln -snf /usr/share/zoneinfo/${TZ} /etc/localtime && echo ${TZ} > /etc/timezone