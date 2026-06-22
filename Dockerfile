
FROM php:8.4-fpm-alpine
 
# 安装 PostgreSQL 扩展需要的依赖
RUN apk add --no-cache postgresql-dev \
    && docker-php-ext-install pdo pdo_pgsql
 
# 安装 Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
 
WORKDIR /var/www/html
 
# 复制项目代码
COPY . .
 
# 安装 PHP 依赖
RUN composer install --no-dev --optimize-autoloader --no-interaction
 
# storage 和 cache 目录给 www-data 写权限
RUN chown -R www-data:www-data storage bootstrap/cache
 
EXPOSE 9000
 
CMD ["php-fpm"]

