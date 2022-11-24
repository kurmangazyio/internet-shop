# Инфраструктура

## Документация
* Документация генерируется на основе Open APIv3.
* Swagger файл лежит по умолчанию в папке [`api-docs.json`](storage/api-docs/api-docs.json).
* Документация в json доступно по адресу /docs/api-docs.json
* Документация в UI доступно по адресу /api/documentation, см конфиг [`l5-swagger.php`](config/l5-swagger.php)
* После добавление нового маршрута в api.php, нужно запустить команду
```php
php artisan l5-swagger:generate
```

### Линтеры

Для автоматической проверки и исправления качество кода используются следующие линтеры

#### [Psalm](https://psalm.dev/)

Конфигурационный файл - [`psalm.xml`](psalm.xml)

Команда для проверки

```sh
vendor/bin/psalm
```

Команда для проверки без кэширования

```sh
vendor/bin/psalm --no-cache
```

Команда для проверки с использованием baseline

```sh
vendor/bin/psalm --no-cache --set-baseline=psalm-baseline.xml
```

Команда для исправления (фиксит не все ошибки). Подробнее [тут](https://psalm.dev/docs/manipulating_code/fixing/)

```sh
vendor/bin/psalter --issues=issue-name
```

#### [PHP-CS-Fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer)

Конфигурационный файл - [`.php_cs`](.php-cs-fixer.php)

Команда для проверки

```sh
vendor/bin/php-cs-fixer fix --dry-run
```

Команда для исправления

```sh
vendor/bin/php-cs-fixer fix
```
