# 1. 使用官方 PHP 8.2 FPM 鏡像作為基底
FROM php:8.2-fpm

# 2. 安裝系統依賴與 PostgreSQL 必要的開發庫
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl

# 3. 安裝 PHP 擴充套件 (Laravel 必備)
RUN docker-php-ext-install pdo pdo_pgsql zip

# 4. 安裝 Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 5. 設定工作目錄
WORKDIR /var/www

# 6. 複製專案檔案
COPY . .

# 7. 執行 Composer 安裝 (不含開發測試用的套件)
RUN composer install --no-dev --optimize-autoloader

# 8. 調整權限，確保 Laravel 可以寫入 Log 和 Cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# 9. 暴露 FPM 端口
EXPOSE 9000

CMD ["php-fpm"]
