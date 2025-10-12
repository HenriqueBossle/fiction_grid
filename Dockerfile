# Etapa 1: Build das dependências PHP
FROM php:8.3-fpm AS php-builder

# Instalar dependências do sistema e extensões necessárias
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpq-dev libpng-dev libxml2-dev libzip-dev libonig-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql bcmath gd zip

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copiar código do projeto
COPY . .

# Instalar dependências do Laravel
RUN composer install --no-dev --optimize-autoloader

# Cachear configs e rotas
RUN php artisan config:cache && php artisan route:cache


# Etapa 2: Build do front-end com Node e Vite
FROM node:20 AS node-builder

WORKDIR /app

COPY package*.json vite.config.* ./
RUN npm install

COPY resources ./resources
COPY public ./public

RUN npm run build


# Etapa 3: Imagem final
FROM php:8.3-fpm

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    libpq-dev libpng-dev libzip-dev libonig-dev unzip \
    && docker-php-ext-install pdo_pgsql pgsql bcmath gd zip

COPY --from=php-builder /var/www/html /var/www/html
COPY --from=node-builder /app/public/build ./public/build

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 9000

CMD ["php-fpm"]
