#!/bin/bash
#
# simple project update script
#
clear

#
# pull current state from repository
#
git pull; 

#
# composer/dependencies updates
#
php -d memory_limit=-1 composer.phar update; 

#
# database updates
#
php -d memory_limit=-1 public/index.php update-db -v; 

#
# test coverage
#
vendor/bin/phpunit --verbose --colors --debug --configuration ./module/Application/test/phpunit.xml --coverage-text;