FROM php:7.4.1-fpm

# php.iniをコピー
COPY php.ini /usr/local/etc/php/php.ini

# Composer install
COPY --from=composer:2.0 /usr/bin/composer /usr/bin/composer

#node.js install
COPY --from=node:12.14 /usr/local/bin /usr/local/bin
COPY --from=node:12.14 /usr/local/lib /usr/local/lib

RUN apt-get update \
    && apt-get install -y \
    git \
    zip \
    unzip \
    vim \
    zlib1g-dev \
    libzip-dev \
    libfreetype6-dev \
    && docker-php-ext-install pdo_mysql bcmath

RUN docker-php-ext-install zip
RUN docker-php-ext-configure gd --with-freetype
RUN docker-php-ext-install -j$(nproc) gd

WORKDIR /var/www/html

# FROM php:7.4-fpm

# RUN docker-php-ext-install pdo pdo_mysql
# RUN cd /usr/bin && curl -s http://getcomposer.org/installer | php && ln -s /usr/bin/composer.phar /usr/bin/composer
# RUN apt-get update \
# && apt-get install -y \
# git \
# zip \
# unzip \
# vim
# RUN apt-get update \
#     && apt-get install -y libpq-dev \
#     && docker-php-ext-install pdo_mysql pdo_pgsql
# RUN apt-get -y update
# RUN apt-get install -y \
#     curl \
#     gnupg
# RUN curl -sL https://deb.nodesource.com/setup_12.x | bash -
# RUN apt-get install -y nodejs
# RUN npm install npm@latest -g
# WORKDIR /var/www/html