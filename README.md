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


## Demo and themes

* Foundation (basic): [https://my-application.net](https://my-application.net) ([https://foundation.my-application.net](https://foundation.my-application.net)) 
* Bootstrap (basic): [https://bootstrap.my-application.net](https://bootstrap.my-application.net)


* Admin LTE: [https://adminlte.my-application.net](https://adminlte.my-application.net)
* Remark: [https://remark.my-application.net](https://remark.my-application.net)
* Taurus: [https://taurus.my-application.net](https://taurus.my-application.net)



### TODO

* finish support module
* finish backup module
* finish setup routine for installation and/or application update.
* clean up the language mix :D



## Run development environments

### Run in GitPod

Provided you have a GitPod account, just fork/clone this repository to your GitHub account. Start the GitPod workspace with that repository, either direclty from GitHub's GitPod Button or GitPod UI.

### Run with Docker

requirements: Docker, composer/php

- install composer dependencies...
  ```
  $> composer install --ignore-platform-reqs --no-interaction
  ```
- build docker images...
  ```
  $> PROJECT=my-application PROJECT_DIR=$(pwd)/ docker-compose -f ./.gitpod.compose.yml build --pull
  ```
- start docker containers...
  ```
  $> PROJECT=my-application PROJECT_DIR=$(pwd)/ bin/start.sh
  ```
- stop docker containers...
  ```
  $> PROJECT=my-application PROJECT_DIR=$(pwd)/ bin/stop.sh
  ```
- show log of running containers...
  ```
  $> PROJECT=my-application PROJECT_DIR=$(pwd)/ docker-compose -f ./.gitpod.compose.yml logs -f
  ```

### Run frontend dev 

requirements: node-js v18

change to directory `public/application-assets/`

- use node v18.15.0...
  ```
  $> nvm use
  ```
- install node dependencies...
  ```
  $> yarn
  ```
- start javascript $ sass watcher...
  ```
  $> yarn start
  ```
- run build...
  ```
  $> yarn build
  ```
- run tests...
  ```
  $> yarn test
  ```

### Run ui tests

requirements: selenium hub or standalone

- in one terminal start selenium...
  ```
  $> docker run --rm -it \
       -p 4444:4444 \
       -p 7900:7900 \
       --shm-size 2g \
       selenium/standalone-chrome
  ```

- in another terminal run cucumber ui tests
  ```
  $> TEST_CLIENT=chrome \
     TEST_SERVER=host.docker.internal \
     docker run --rm \
       --env TEST_SERVER=${TEST_SERVER} \
       --env TEST_CLIENT=${TEST_CLIENT} \
       -v $(pwd)/test:/build/test \
       -v $(pwd)/report:/build/report \
       -v $(pwd)/hostnames.json:/build/hostnames.json \
       bbdrummer/cucumber-base \
       npm run test-docker -- -r ./report/ <extra selenium-cucumber-js options>
  ```

- create html report
  ```
  $> docker run --rm \
       -v $(pwd)/test:/build/test \
       -v $(pwd)/report:/build/report \
       bbdrummer/cucumber-base \
       node generate-report.js
  ```



## Manual installation

### Using Composer (recommended)

The recommended way to get a working copy of this project is to clone the repository
and use `composer` to install dependencies:

    curl -s https://getcomposer.org/installer | php --
    
    cd my/project/dir
    git clone https://gitlab.bjoernbartels.earth/zf2/my-application.git
    cd my-application
    php composer.phar self-update
    php composer.phar install

(The `self-update` directive is to ensure you have an up-to-date `composer.phar`
available.)

Another alternative for downloading the project is to grab it via `curl`, and
then pass it to `tar`:

    cd my/project/dir
    curl -#L https://gitlab.bjoernbartels.earth/zf2/my-application/repository/archive.tar.gz?ref=master | tar xz --strip-components=1

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

[![build status](https://gitlab.com/my-application.bjoernbartels.earth/my-application/badges/master/build.svg)](https://gitlab.com/my-application.bjoernbartels.earth/my-application/commits/master)

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bb-drummer/my-application/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bb-drummer/my-application/?branch=master)

[![Code Coverage](https://scrutinizer-ci.com/g/bb-drummer/my-application/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/bb-drummer/my-application/?branch=master)

[![Build Status](https://scrutinizer-ci.com/g/bb-drummer/my-application/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bb-drummer/my-application/build-status/master)



## LICENSE

please see LICENSE file in project's root directory



## COPYRIGHT

&copy; 2015 [Björn Bartels], coding@bjoernbartels.earth, all rights reserved.


