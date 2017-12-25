# Virtual Exposition Application
Virtual exposition application allows companies to book their place in virtual expositions in different exposition events.

## Installation
Just need to execute following commands inside the project
```
composer update
npm install
```

## Seed/Fake Data
After install and setting up environment using .env file you need to run migrations and seeds
```
php artisan key:generate
php artisan migrate
```

Create storate/public folder in public directory. You can use following commands:
```
mkdir public/storage
mkdir public/storage/images
sudo chmod -R 777 public/storage  // for linux users
```

Finally execute below command
```
php artisan db:seed
```

## Technologies
Following technologies have been used.
- PHP 7
- MySQL Database
- Laravel 5.5
- AngularJS 1.6.7
- Google Maps API
- D3.js
- Twitter Bootstrap 4
- Laravel Dusk
- PHPUnit