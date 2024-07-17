FROM php:5.6-apache

RUN a2enmod rewrite

RUN echo "deb http://archive.debian.org/debian/ stretch main" > /etc/apt/sources.list \
  && echo "deb http://archive.debian.org/debian-security stretch/updates main" >> /etc/apt/sources.list
RUN apt-get update -y
RUN apt-get install -y \
  vim wget git zip unzip \
  libpq-dev libzip-dev libpng-dev libicu-dev libonig-dev libxml2-dev
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install gd intl pdo pdo_mysql zip bcmath pcntl \
  && docker-php-ext-enable gd intl pdo pdo_mysql zip

# composer
# COPY --from=composer:2.1 /usr/bin/composer /usr/bin/composer
