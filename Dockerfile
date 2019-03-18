FROM php:7.2-apache
COPY . /var/www/html/
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"