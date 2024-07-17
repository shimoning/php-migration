FROM php:5.4-apache

RUN a2enmod rewrite

RUN apt-key adv --keyserver keyserver.ubuntu.com --recv-keys 04EE7237B7D453EC \
  && apt-key adv --keyserver keyserver.ubuntu.com --recv-keys 648ACFD622F3D138 \
  && apt-key adv --keyserver keyserver.ubuntu.com --recv-keys 0E98404D386FA1D9 \
  && apt-key adv --keyserver keyserver.ubuntu.com --recv-keys EF0F382A1A7B6500 \
  && apt-key adv --keyserver keyserver.ubuntu.com --recv-keys AA8E81B4331F7F50 \
  && apt-key adv --keyserver keyserver.ubuntu.com --recv-keys 112695A0E562B32A
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
