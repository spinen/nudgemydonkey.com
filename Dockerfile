FROM php:5.6-apache

COPY ./docker/000-default.conf /etc/apache2/sites-enabled/000-default.conf
COPY ./ /var/www/html/
