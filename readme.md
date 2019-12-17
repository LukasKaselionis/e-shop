# e-shop 

E-Shop system with products and categories.

## Requirements

- PHP **>= 7.2.0**
- BCMath PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

## Development run

- Clone repository.
- Run `composer install` command.
- Create MySQL database and login credentials to it.
- Run `cp .env.example .env` command.
- Run `php artisan key:generate` command.
- Fill `db` credentials on `.env` file.
- Run `php artisan migrate` command.
- Run `php artinan migrate --seed` command.
- Run `php artisan storage:link` command.

P.S.: if you don't use virtual machine, run `php artisan serve` command to run virtual server.

