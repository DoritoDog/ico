FROM php:7.4-fpm

RUN apt update
RUN apt install libicu-dev -y
RUN docker-php-ext-install -j$(nproc) intl pdo pdo_mysql
