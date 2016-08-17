# Nudge My Donkey

to run this app with docker

`docker run -p 80:80 -v $PWD/docker/000-default.conf:/etc/apache2/sites-enabled/000-default.conf -v $PWD:/var/www/html/ php:5.6-apache`