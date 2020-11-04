FROM php:7.3-apache-buster

RUN apt-get update && apt-get install -y --fix-missing \
  apt-utils \
  gnupg

RUN apt-get update && apt-get install -y --no-install-recommends \
  zlib1g-dev \
  libzip-dev \
  libpng-dev

RUN a2enmod rewrite

RUN docker-php-ext-install \
  gd \ 
  opcache \ 
  pdo_mysql \
  zip