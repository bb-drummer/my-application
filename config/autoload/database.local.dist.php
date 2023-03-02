<?php
return array(
		'db' => array( // global database setup
				'driver'    => 'pdo_mysql',
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
/*

            'driver'   => 'pdo_mysql',
            'host'     => $_ENV['MYSQL_HOST'],
            'user'     => $_ENV['MYSQL_USER'],
            'password' => base64_decode($_ENV['MYSQL_PASSWORD']),
            'dbname'   => $_ENV['ORM_DB_NAME'],
*/