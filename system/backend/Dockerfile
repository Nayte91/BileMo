ARG PHP_VERSION

FROM php:${PHP_VERSION}-fpm-alpine

RUN apk add --no-cache --update --virtual buildDeps build-base autoconf \
     && pecl install xdebug > /dev/null \
     && apk del buildDeps build-base autoconf

WORKDIR /app