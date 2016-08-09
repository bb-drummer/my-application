#!/bin/bash
#whoami
apt-get update -y;
apt-get upgrade -y;
apt-get install git -y;

ifconfig
wget http://ipinfo.io/ip -qO -
curl http://ipinfo.io/ip



# php info
php -v
#which php
#php -m

# Install composer
curl -sS https://getcomposer.org/installer | php
php composer.phar --version

# Install phpunit, the tool that we will use for testing
curl -o phpunit https://phar.phpunit.de/phpunit-5.2.3.phar
chmod +x phpunit

ls -la
./phpunit --version

