ARG PHP_VERSION
ARG COMPOSER_VERSION

FROM composer:${COMPOSER_VERSION} AS composer_stage

FROM php:${PHP_VERSION}-fpm-alpine

COPY --from=composer_stage /usr/bin/composer /usr/bin/composer

RUN echo 'Build extensions'   \
    && apk add --no-cache --update --virtual buildDeps build-base autoconf \
    && pecl install xdebug > /dev/null \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-configure pdo_mysql \
    && apk del                               buildDeps build-base autoconf \
 && echo 'Build OK'

WORKDIR /app