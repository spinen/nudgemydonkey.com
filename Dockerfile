FROM php:5.6-apache

COPY ./docker/000-default.conf /etc/apache2/sites-enabled/000-default.conf
COPY ./ /var/www/html/
COPY ./docker/000-default.conf /etc/apache2/sites-enabled/000-default.conf

EXPOSE 80
CMD ["apache2-foreground"]