FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    netcat-openbsd \
    && docker-php-ext-install pdo pdo_mysql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY composer.json composer.lock ./

RUN composer install --no-dev --optimize-autoloader

COPY . .

RUN composer dump-autoload --optimize

COPY docker/php/wait-for-db.sh /usr/local/bin/wait-for-db.sh
RUN chmod +x /usr/local/bin/wait-for-db.sh

CMD ["wait-for-db.sh"]
