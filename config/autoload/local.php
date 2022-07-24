<?php
return array(
		'db' => array( // global database setup
			#'driver'    => 'PdoMysql',
			'driver'    => 'PDO_Mysql',
			#'driver'    => 'pdo_mysql',
			'hostname'  => $_ENV['MYSQL_HOST'],
			'database'  => $_ENV['MYSQL_DATABASE'],
			'username'  => $_ENV['MYSQL_USER'],
			'password'  => ($_ENV['MYSQL_PASS']),
		),
		'service_manager' => array(
				'factories' => array(
						'Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory',
				),
		),
);
