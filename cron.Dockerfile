FROM php:fpm-alpine
RUN apk add --no-cache bash
RUN docker-php-ext-install pdo_mysql

COPY crontab /etc/crontabs/root
CMD ["crond", "-f"]

WORKDIR /var/www