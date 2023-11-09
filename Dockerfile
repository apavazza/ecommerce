FROM php:apache
RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql
COPY ./www /var/www/html/
COPY ./php_config /usr/local/etc/php/
EXPOSE 80
