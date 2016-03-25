export COMPOSER_CACHE_DIR=/tmp/composer/
php /usr/bin/composer.phar clear-cache
php /usr/bin/composer.phar self-update
php /usr/bin/composer.phar install