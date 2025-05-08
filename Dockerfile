FROM php:8.2-apache

RUN docker-php-ext-install mysqli pdo pdo_mysql

COPY src/ /var/www/html/

RUN chown -R www-data:www-data /var/www/html

ENV PHP_DISPLAY_ERRORS=On

RUN a2enmod rewrite

RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

EXPOSE 80
