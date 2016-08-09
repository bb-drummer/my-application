#!/bin/bash
#whoami
apt-get update -y -q;
apt-get upgrade -y -q;
apt-get install git unzip libicu-dev libz-dev libbz2-dev -y;

#pecl install intl;
#pecl install zip;
docker-php-ext-install mysql;
docker-php-ext-install mysqli;
docker-php-ext-install mysqlnd;
docker-php-ext-install pdo_mysql;
docker-php-ext-install intl;
docker-php-ext-install zip;

curl http://ipinfo.io/ip

# Install composer
curl -sS https://getcomposer.org/installer | php
php composer.phar --version

# Install phpunit, the tool that we will use for testing
curl -o phpunit https://phar.phpunit.de/phpunit-5.2.3.phar
chmod +x phpunit
./phpunit --version

ls -la

