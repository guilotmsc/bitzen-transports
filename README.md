# BTZ-Transports

## Build Setup

```bash
# create .env configuration file
$ cp .env.example .env

# install dependices
$ composer install

# generate laravel app key
$ php artisan key:generate

# run migration and seeders
$ php artisan migrate:fresh --seed

# start server
$ php artisan serve
```