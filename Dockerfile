# Używamy oficjalnego obrazu PHP z FPM
FROM php:8.1-fpm

# Zainstaluj zależności systemowe
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    curl

# Instalacja rozszerzeń PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Zainstaluj Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Ustaw katalog roboczy
WORKDIR /var/www

# Kopiuj pliki projektu do obrazu
COPY . /var/www

# Instalacja zależności Composer
RUN composer install --no-dev --optimize-autoloader

# Prawa do zapisu na katalogach storage i bootstrap/cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Otwórz port 9000 dla PHP-FPM
EXPOSE 9000

# Domyślny proces uruchamiania
CMD ["php-fpm"]
