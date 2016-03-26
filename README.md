# ZendFramework2 application base

## Introduction

This should serve as a fully functional basic ZendFramework2 application construct. 
Just do a checkout from our GitLab and modify and/or extend it to your needs.
This Construct is based upon ZF2s skeleton application and ZF-Commons' ZFC-User module.
This very basic application includes modules to manage users and ACL settings, login, logout and user registration, a name/type based and maintainable options list.

Please, take a look into the application's User Help section to get some guidance around this application.

If you need further assistance, please do not hesitate to contact the applications support channel.

## Features

* public user registration with optional email verification and activation
* user management
* role, resources and acl management
* basic settings record editing
* prepared help, support and about section
* basic theming


### TODO

* finish support module
* finish backup module
* finish setup routine for installation and/or application update.
* clean up the language mix :D



## Installation

### Using Composer (recommended)

The recommended way to get a working copy of this project is to clone the repository
and use `composer` to install dependencies:

    curl -s https://getcomposer.org/installer | php --
    
    cd my/project/dir
    git clone https://gitlab.bjoernbartels.earth/zf2/application-base.git
    cd application-base
    php composer.phar self-update
    php composer.phar install

(The `self-update` directive is to ensure you have an up-to-date `composer.phar`
available.)

Another alternative for downloading the project is to grab it via `curl`, and
then pass it to `tar`:

    cd my/project/dir
    curl -#L https://gitlab.bjoernbartels.earth/zf2/application-base/repository/archive.tar.gz?ref=master | tar xz --strip-components=1

You would then invoke `composer` to install dependencies per the previous
example.


### Application Setup

Adjust settings in 'config/app.local.dist.php', and rename the file to 'config/app.local.php'.

Create a database and adjust database settings in your 'config/app.local.php' file.
Execute the 'sql/install.sql' into that database you previously created.

    mysql --user=yourdbuser --password="yourdbpassword" yourdbname < /path/to/myapp/sql/install.sql

#### TODO
Open the setup inside your browser (http://myappliction.tld/setup) and follow the steps... 
or
maybe we handle this via `composer install/update` script...


### Web Server Setup

#### PHP CLI Server

The simplest way to get started if you are using PHP 5.4 or above is to start the internal PHP cli-server in the root directory:

    php -S 0.0.0.0:8080 -t public/ public/index.php

This will start the cli-server on port 8080, and bind it to all network
interfaces.

**Note: ** The built-in CLI server is *for development only*.

#### Apache Setup

To setup apache, setup a virtual host to point to the public/ directory of the
project and you should be ready to go! It should look something like below:

    <VirtualHost *:80>
        ServerName myappliation.localhost
        DocumentRoot /path/to/myapplication/public
        SetEnv APPLICATION_ENV "development"
        <Directory /path/to/myapplication/public>
            DirectoryIndex index.php
            AllowOverride All
            Order allow,deny
            Allow from all
        </Directory>
    </VirtualHost>



## Status

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/gp/my-application/badges/quality-score.png?b=master&s=c01d3a7a0c48d0408ac89a340e2dc93dc477b915)](https://scrutinizer-ci.com/gp/my-application/?branch=master)

[![Code Coverage](https://scrutinizer-ci.com/gp/my-application/badges/coverage.png?b=master&s=26dff175674bc97d350f18578bd44a63e9e6c5e9)](https://scrutinizer-ci.com/gp/my-application/?branch=master)

[![Build Status](https://scrutinizer-ci.com/gp/my-application/badges/build.png?b=master&s=b2bedfe685020a0158c5dcbc9a300b081e3faa32)](https://scrutinizer-ci.com/gp/my-application/build-status/master)



## LICENSE

please see LICENSE file in project's root directory


## COPYRIGHT

&copy; 2015 [Björn Bartels], coding@bjoernbartels.earth, all rights reserved.


