# 项目说明
使用 ThinkPHP框架自定义 docker环境。自定义环境配置，含opcache、php-fpm、nginx、supervisor

# 环境要求
```
Composer version 2.9.2
PHP version 8.4.15
ThinkPHP Version 8.1.4
```

# 自定义docker目录结构
```
/docker
    - /dev
        - /nginx
            - /http.d
                - default.conf
            - nginx.conf
        - /php
            - opcache.ini
        - /php-fpm
            - /php-fpm.d
                - www.conf
            - php-fpm.conf
        - /shell
            - docker-entrypoint.sh
        - /supervisord
            - /supervisor.d
                - nginx.ini
                - php-fpm.ini
            - supervisord.conf
        - Dockerfile
    - test
        ...
```

## 开发环境（dev）：

#### 描述
开发环境基于本地代码，方便开发和调试

#### 部署前准备工作
1、创建好数据库并修改数据库配置 .env

```
# docker compose 启动
docker compose -f compose.dev.yml up -d

# docker compose 关闭
docker compose -f compose.dev.yml down
```

## 测试环境（test）：

#### 描述
测试环境用于项目部署

### 部署前准备工作
1、创建好数据库并修改数据库配置 compose.dev.yml

```
# docker compose 启动
docker compose -f compose.test.yml up -d

# docker compose 关闭
docker compose -f compose.test.yml down
```

## 生产环境（prod）
```
# docker compose 启动
docker compose -f compose.prod.yml up -d

# docker compose 关闭
docker compose -f compose.prod.yml down
```
