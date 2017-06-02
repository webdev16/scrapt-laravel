## Documentation

## Install

on root directory, run
```sh
composer install
cp .env.example .env
```

Set database, username, password on .env file.

```sh
php artisan migrate
```

## Function

After deployment, open http://localhost/maintenance/fetch_dates on your browser.
