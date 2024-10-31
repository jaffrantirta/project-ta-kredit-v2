Hello..

install with `composer install` but first install `sudo apt install php-intl` for intl support.

to create the first user, please run `sudo php artisan app:create-user --name=SuperAdmin --email=super@admin.com --password=password --role=super-admin`
it will be create user with name `SuperAdmin` and email `super@admin.com` with password `password` and role `super-admin`.

if you using sqlite for database make sure you set permission for database `sudo chmod 777 database/database.sqlite` or `sudo chown www-data:www-data database/database.sqlite` and you need to change the session name in `config/session.php` to be `'driver' => env('SESSION_DRIVER', 'file'),`.

don't forget tp run `sudo a2enmod rewrite` and `sudo service apache2 restart` after installing `composer install` for rewrite support filament routes.
