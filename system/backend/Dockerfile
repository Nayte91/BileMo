ARG PHP_VERSION

FROM php:${PHP_VERSION}-fpm-alpine

RUN apk add --no-cache --update --virtual buildDeps build-base autoconf \
    && pecl install xdebug > /dev/null \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-configure pdo_mysql \
    && apk del                            buildDeps build-base autoconf

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app