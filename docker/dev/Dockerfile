# 基础编译环境镜像
FROM php:8.4.15-fpm-alpine

# 设置工作目录
WORKDIR /app

# 安装 PHP 扩展 bcmath swoole
RUN docker-php-ext-install pdo_mysql

# 复制
# COPY . .

# 安装 Composer
COPY --from=composer:2.9.2 /usr/bin/composer /usr/bin/composer

# 安装 Composer 依赖
# RUN composer install

# 启动命令
CMD [ "php", "think", "run" ]