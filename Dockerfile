# Gunakan image PHP 7.4 dengan FPM
FROM php:7.4-fpm

# Install ekstensi yang dibutuhkan CI3 + PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    unzip \
    && docker-php-ext-install pdo pdo_pgsql

# Salin source code CI3
WORKDIR /var/www/simjos
COPY . .

# Ubah permission (opsional, jika ada masalah permission)
RUN chown -R www-data:www-data /var/www/simjos

# Ekspos port default FPM
EXPOSE 9000

# Jalankan PHP-FPM
CMD ["php-fpm"]