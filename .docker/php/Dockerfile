FROM php:7.4-apache

# PHP extensions
RUN apt update
RUN apt install libicu-dev zip unzip libzip-dev -y
RUN docker-php-ext-install -j$(nproc) intl pdo pdo_mysql zip

# Composer
RUN apt install git -y
ENV COMPOSER_ALLOW_SUPERUSER=1
COPY --from=composer:2.5.5 /usr/bin/composer /usr/local/bin/composer
COPY . .
RUN composer install

# Apache
ENV APACHE_DOCUMENT_ROOT /var/www/html/webroot
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
RUN chown -R www-data .
RUN a2enmod rewrite
