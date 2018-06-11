# laraCloud
## 安装包
```
composer install
```
## 设置配置文件 .env 
## 生成密钥 
```
php artisan key:generate
```
## 执行数据迁移
```
php artisan migrate
```
## 生成oauth文件
```php
php artisan passport:keys
```
## 获取passport app token
```
php artisan passport:client --password 
```
把获得的参数写入配置
```
Client ID: 1
Client Secret: xxxxxxT1BQnOxxxxxxmf6xxxxxx5EjUuAxxxxxxx
```