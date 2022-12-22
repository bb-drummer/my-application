<?php
ini_set('error_reporting', E_ALL);
ini_set('session.save_handler', "redis");
//ini_set('session.save_path', $_SERVER['MY_APPLICATION_APP_DEV_REDIS_MASTER_PORT_6379_TCP']."?auth=fRfhJm02OTkqgKx2zxo34QJtVcU3DhUI");
ini_set('session.save_path', "tcp://my-application-app-development-redis-master.my-application:6379?auth=fRfhJm02OTkqgKx2zxo34QJtVcU3DhUI");

//simple counter to test sessions. should increment on each page reload.
session_start();
$count = isset($_SESSION['count']) ? $_SESSION['count'] : 1;

echo $count . PHP_EOL . $_SERVER["SERVER_ADDR"];

$_SESSION['count'] = ++$count;
