# composer
ARG COMPOSER_VERSION=2
FROM composer:${COMPOSER_VERSION} AS composer-builder

# php
FROM php:8.3-apache

RUN apt-get update -y
RUN apt-get install -y \
    vim wget git \
    libpq-dev libzip-dev libpng-dev libicu-dev libonig-dev libxml2-dev
RUN docker-php-ext-install gd intl mysqli pdo pdo_mysql zip bcmath pcntl \
  && docker-php-ext-enable gd intl mysqli pdo pdo_mysql zip

RUN a2enmod rewrite && service apache2 restart

# composer
COPY --from=composer-builder /usr/bin/composer /usr/bin/composer
