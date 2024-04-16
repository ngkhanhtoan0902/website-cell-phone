FROM wyveo/nginx-php-fpm:php81

MAINTAINER andy@resonancetech.co

RUN apt-key del 95BD4743

RUN wget -q -O - https://packages.sury.org/php/apt.gpg | apt-key add -

#Install extensions
RUN apt-get update -y \
    && apt-get install -y npm \
    && apt-get install -y openssl \
    && apt-get install -y curl

RUN apt-get install -y -o Dpkg::Options::="--force-confold" php8.1-soap

#Install SSL
ARG DOMAIN

ENV DOMAIN $DOMAIN

COPY ./docker/ssl/generate.sh /etc/nginx/ssl/generate-ssl.sh

RUN chmod +x /etc/nginx/ssl/generate-ssl.sh

RUN cd /etc/nginx/ssl && ./generate-ssl.sh

#Update NodeJS
COPY ./docker/script/npm-update.sh /npm-update.sh

RUN chmod +x /npm-update.sh

RUN /npm-update.sh