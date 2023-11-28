FROM php:8.1-apache

COPY ./src /var/www/html/src
COPY index.php /var/www/html/index.php
COPY composer.json /var/www/html/composer.json
COPY .env /var/www/html/.env
COPY database.db /var/www/html/database.db
COPY .htaccess /var/www/html/.htaccess

RUN apt-get update && apt-get install -y libzip-dev zip unzip libsqlite3-dev && docker-php-ext-install pdo pdo_sqlite && a2enmod rewrite

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN cd /var/www/html && composer install --no-interaction --no-progress --no-suggest

EXPOSE 80

