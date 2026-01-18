#!/bin/sh

# 复制 .env 并修改特定配置
if [ ! -f .env ]; then
    cp .example.env .env

    sed -i 's/APP_DEBUG =.*/APP_DEBUG = '${APP_DEBUG}'/' .env && \
    sed -i 's/DEFAULT_LANG =.*/DEFAULT_LANG = '${DEFAULT_LANG}'/' .env && \
    sed -i 's/DB_TYPE =.*/DB_TYPE = '${DB_TYPE}'/' .env && \
    sed -i 's/DB_HOST =.*/DB_HOST = '${DB_HOST}'/' .env && \
    sed -i 's/DB_NAME =.*/DB_NAME = '${DB_NAME}'/' .env && \
    sed -i 's/DB_USER =.*/DB_USER = '${DB_USER}'/' .env && \
    sed -i 's/DB_PASS =.*/DB_PASS = '${DB_PASS}'/' .env && \
    sed -i 's/DB_PORT =.*/DB_PORT = '${DB_PORT}'/' .env && \
    sed -i 's/DB_CHARSET =.*/DB_CHARSET = '${DB_CHARSET}'/' .env && \
    sed -i 's/REDIS_CLIENT =.*/REDIS_CLIENT = '${REDIS_CLIENT}'/' .env && \
    sed -i 's/REDIS_HOST =.*/REDIS_HOST = '${REDIS_HOST}'/' .env
fi

# 执行数据库迁移（生产环境建议手动执行）
php think migrate:run

# # 设置存储目录权限
# chown -R www-data:www-data storage bootstrap/cache
# chmod -R 775 storage bootstrap/cache

exec "$@"