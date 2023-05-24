FROM php:7.4-fpm

RUN apt update
RUN apt install libicu-dev -y
RUN docker-php-ext-install -j$(nproc) intl pdo pdo_mysql

ENV COMPOSER_ALLOW_SUPERUSER=1
COPY --from=composer:2.5.5 /usr/bin/composer /usr/local/bin/composer
COPY . /var/www/html/ico
WORKDIR /var/www/html/ico
RUN composer install
