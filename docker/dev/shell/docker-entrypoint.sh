#!/bin/sh

# 执行数据库迁移（生产环境建议手动执行）
php think migrate:run

exec "$@"