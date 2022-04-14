web: vendor/bin/heroku-php-apache2 -l log/error.log -i user.ini public/
worker: php artisan queue:work --sleep=3 --tries=3 --daemon
