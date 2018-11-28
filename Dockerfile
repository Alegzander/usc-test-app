FROM php:5.6-cli

RUN apt-get update && apt-get upgrade
RUN apt-get install -y git unzip

RUN curl -o /usr/local/bin/composer https://getcomposer.org/download/1.7.3/composer.phar
RUN chmod +x /usr/local/bin/composer

RUN cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini
RUN cat /usr/local/etc/php/php.ini | sed -e "s/;always_populate_raw_post_data/always_populate_raw_post_data/g" > /usr/local/etc/php/php.ini

WORKDIR /srv/usc

ADD . /srv/usc

EXPOSE 8000

RUN composer install

CMD cd app/www/ && php -S 0.0.0.0:8000
