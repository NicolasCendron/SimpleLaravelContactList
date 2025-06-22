FROM php:8.2-cli

# Instala dependências do sistema
RUN apt-get update && apt-get install -y \
    unzip curl libxml2-dev zip git libonig-dev \
    && docker-php-ext-install pdo pdo_mysql xml

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . /app
COPY .env .env

# Permissões e cache do Laravel
RUN chmod -R 777 storage bootstrap/cache

CMD php artisan serve --host=0.0.0.0 --port=8000