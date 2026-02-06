FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    git \
    unzip \
    libicu-dev \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    gnupg \
    && curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd mysqli pdo pdo_mysql intl zip bcmath mbstring xml

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN a2enmod rewrite

WORKDIR /var/www/html

COPY . .

RUN composer install --no-interaction --optimize-autoloader --no-dev --ignore-platform-reqs

RUN npm install && npm run dev

RUN cp .env.example .env && \
    php artisan key:generate --force && \
    chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/modules /var/www/html/vendor /var/www/html/public

USER www-data