# Encoremed Laravel

This project is built using Laravel Passport for the API. 

### Installation

After successfully pulling the project;

```
composer install
cp .env.example .env
php artisan key:generate
```

Configure .env file, then;

```
php artisan migrate --seed
php artisan passport:install
php artisan serve
```


### TODO

- [x] create an access token using jwt
- [x] list all appointment
- [x] create appointment
- [x] reschedule an appointment
- [x] mark appointment status as arrived at the hospital
