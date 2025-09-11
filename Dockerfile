FROM php:8.2-cli

# Install system dependencies, PHP extensions dependencies, and MongoDB extension
RUN apt-get update && apt-get install -y \
    unzip git curl libpq-dev libzip-dev zip nodejs npm libssl-dev pkg-config \
    && docker-php-ext-install pdo pdo_pgsql zip \

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN npm install && npm run build

RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

ENV PORT=8000
EXPOSE 8000

CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
