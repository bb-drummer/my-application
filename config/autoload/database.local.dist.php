<?php
return array(
        'db' => array( // global database setup
                'driver'    => 'PdoMysql',
                'hostname'  => '_MYSQL_HOST_',
                'database'  => '_MYSQL_DATABASE_',
                'username'  => '_MYSQL_USER_',
                'password'  => '_MYSQL_PASSWORD_',
        ),
        'service_manager' => array(
                'factories' => array(
                        'Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory',
                ),
        ),
);