FROM php:8.1-apache

RUN curl -sSk https://getcomposer.org/installer | php -- --disable-tls && \
   mv composer.phar /usr/local/bin/composer

RUN apt update && apt install -yqq npm
ARG NODE_VERSION=18.14.0
RUN curl https://nodejs.org/dist/v$NODE_VERSION/node-v$NODE_VERSION-linux-x64.tar.gz | tar -xz -C /usr/local --strip-components 1

COPY . /var/www/

COPY ./docker/apache.conf /etc/apache2/sites-available/000-default.conf

RUN cd /var/www && \
    composer install && \
    npm install --force && \
    npm run build

WORKDIR /var/www/

ENTRYPOINT ["bash", "./docker/docker.sh"]

EXPOSE 80