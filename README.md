#### В первую очередь, необходимо настроить обязательные переменные докер окружения в .env

```
COMPOSE_NGINX_PORT=#ВНЕШНИЙ_ПОРТ_NGINX#
COMPOSE_REDIS_PORT=#ВНЕШНИЙ_ПОРТ_РЕДИС#
COMPOSE_MYSQL_PORT=#ВНЕШНИЙ_ПОРТ_МУСКУЛА#

REDIS_PASSWORD=#ПАРОЛЬ_РЕДИС#

DB_ROOT_PASSWORD=#РУТ_ПАРОЛЬ_БД#
DB_DATABASE=#НАИМЕНОВАНИЕ_БД#
DB_USERNAME=#ИМЯ_ЮЗЕРА_БД#
DB_PASSWORD=#ПАРОЛЬ_ЮЗЕРА_БД#
```

Далее, необходимо перейти к [README Backend Core](./backend-core/README.md) расположенному по
пути `./backend-core/README.md` и произвести настройку бэкенда