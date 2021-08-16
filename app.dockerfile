FROM php:7.4-fpm


RUN apt-get update && apt-get install -y libzip-dev libcurl4-openssl-dev

RUN apt-get install -y \
        zip

RUN apt-get update \
  && DEBIAN_FRONTEND=noninteractive apt-get install -y --no-install-recommends \
  # needed for gd
  libfreetype6-dev \
  libjpeg62-turbo-dev \
  libpng-dev \
  && rm -rf /var/lib/apt/lists/*

# GD
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
  && docker-php-ext-install -j "$(nproc)" gd zip

# Extension mysql driver for mysql
RUN docker-php-ext-install pdo_mysql mysqli
