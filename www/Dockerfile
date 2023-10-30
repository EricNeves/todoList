FROM php:8.2-apache

RUN apt-get update && apt-get install -y git unzip libpq-dev libpng-dev libjpeg-dev \
    && docker-php-ext-install pdo pdo_pgsql \
    && RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && a2enmod rewrite 

COPY ./ /var/www/html/

RUN chown -R www-data:www-data /var/www/html/

EXPOSE 80