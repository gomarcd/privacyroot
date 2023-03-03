FROM php:fpm-bullseye

RUN apt-get update && apt-get install -y git zlib1g-dev libpng-dev libzip-dev libmagickwand-dev zip unzip \
    && pecl install imagick \
    && docker-php-ext-install pdo_mysql gd zip \
    && docker-php-ext-enable imagick

ENV LANG C.UTF-8
WORKDIR /
RUN apt-get update && apt-get install -y git curl lsb-release \
    && git clone https://github.com/oxen-io/session-pysogs -b stable pysogs \
    && curl -so /etc/apt/trusted.gpg.d/oxen.gpg https://deb.oxen.io/pub.gpg \
    && echo "deb https://deb.oxen.io $(lsb_release -sc) main" | tee /etc/apt/sources.list.d/oxen.list
RUN apt-get update && apt-get install -y python3-oxenmq python3-oxenc python3-pyonionreq python3-coloredlogs python3-uwsgidecorators python3-flask python3-cryptography python3-nacl python3-pil python3-protobuf python3-openssl python3-qrencode python3-better-profanity python3-sqlalchemy python3-sqlalchemy-utils uwsgi-plugin-python3
WORKDIR /pysogs
COPY ./uwsgi-sogs.ini /pysogs
COPY ./sogs.ini /pysogs
RUN chown -R 1000:1000 /pysogs

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

EXPOSE 9000

CMD /usr/local/sbin/php-fpm ; uwsgi /pysogs/uwsgi-sogs.ini