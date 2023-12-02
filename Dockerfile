FROM php:8.2-apache

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions \
    && install-php-extensions pdo_mysql intl zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get update && apt-get install -yqq nodejs npm \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www

COPY ./composer.json ./composer.lock ./package.json ./package-lock.json ./

COPY . .

RUN cp ./docker/apache.conf /etc/apache2/sites-available/000-default.conf

RUN composer install && \
    npm install --force && \
    npm run build

ENTRYPOINT [ "bash", "./docker/docker.sh" ]

EXPOSE 80
