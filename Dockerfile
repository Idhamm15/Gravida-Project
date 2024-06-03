# Menggunakan gambar dasar PHP 8 dengan Apache
FROM php:8.0-apache

# Instal dependencies yang diperlukan
RUN apt-get update && apt-get install -y \
    libssl-dev \
    libzip-dev \
    unzip \
    && docker-php-ext-install zip

# Instal Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Setel direktori kerja
WORKDIR /var/www/html

# Salin file aplikasi Laravel
COPY . .

# Instal dependencies aplikasi
RUN composer install --no-dev --optimize-autoloader

# Jalankan perintah artisan
RUN php artisan migrate --force

# Hapus cache view dan cache konfigurasi
RUN php artisan view:clear && php artisan cache:clear

# Setel izin untuk direktori penyimpanan dan cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Port yang digunakan oleh aplikasi
EXPOSE 80

# Perintah untuk menjalankan aplikasi
CMD ["apache2-foreground"]
