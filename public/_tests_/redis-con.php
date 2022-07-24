<?php
ini_set('error_reporting', E_ALL);
ini_set('session.save_handler', "redis");
ini_set('session.save_path', $_SERVER['REDIS_DSN']);


//simple counter to test sessions. should increment on each page reload.
session_start();
$count = isset($_SESSION['count']) ? $_SESSION['count'] : 1;

echo $count . PHP_EOL . $_SERVER["SERVER_ADDR"];

$_SESSION['count'] = ++$count;
