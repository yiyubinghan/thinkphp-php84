# 基础编译环境镜像
FROM php:8.4.15-fpm-alpine

# 设置工作目录
WORKDIR /app

# 复制 OPcache配置文件
COPY docker/test/php/opcache.ini /usr/local/etc/php/conf.d/opcache.ini

# 复制 php-fpm配置文件
COPY docker/test/php-fpm/php-fpm.conf /usr/local/etc/php-fpm.conf
COPY docker/test/php-fpm/php-fpm.d/www.conf /usr/local/etc/php-fpm.d/www.conf

# 安装系统依赖
RUN apk add --no-cache nginx supervisor linux-headers $PHPIZE_DEPS

# 复制 nginx配置文件
COPY docker/test/nginx/nginx.conf /etc/nginx/nginx.conf
COPY docker/test/nginx/http.d /etc/nginx/http.d

# 安装和配置 Supervisor
RUN mkdir -p /var/log/supervisor
COPY docker/test/supervisord/supervisord.conf /etc/supervisord.conf
COPY docker/test/supervisord/supervisor.d /etc/supervisor.d

# 安装 PHP 扩展 bcmath swoole
RUN docker-php-ext-install pdo_mysql

# 安装 Redis 扩展
RUN pecl install redis && docker-php-ext-enable redis

# 复制
COPY . .

# 安装 Composer
COPY --from=composer:2.9.2 /usr/bin/composer /usr/bin/composer

# 安装 Composer 依赖
RUN composer install

# 设置文件权限
RUN chown -R www-data:www-data /app && chmod -R 777 /app/runtime

# 运行脚本
COPY docker/test/shell/docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh
ENTRYPOINT ["docker-entrypoint.sh"]

# 启动命令
CMD ["supervisord", "-c", "/etc/supervisord.conf"]