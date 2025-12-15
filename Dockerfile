# Gunakan image PHP 7.4 dengan FPM
FROM php:7.4-fpm

# Install ekstensi yang dibutuhkan CI3 + PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    unzip \
    && docker-php-ext-install pdo pgsql pdo_pgsql

# Set PHP upload limit
RUN echo "upload_max_filesize=2048M" > /usr/local/etc/php/conf.d/uploads.ini \
 && echo "post_max_size=2048M" >> /usr/local/etc/php/conf.d/uploads.ini \
 && echo "max_execution_time=300" >> /usr/local/etc/php/conf.d/uploads.ini \
 && echo "max_input_time=300" >> /usr/local/etc/php/conf.d/uploads.ini

# Salin source code CI3
WORKDIR /var/www/html
COPY . .

# Ubah permission (opsional, jika ada masalah permission)
RUN chown -R www-data:www-data /var/www/html

# Ekspos port default FPM
EXPOSE 9000