<?php
ini_set('error_reporting', E_ALL);

//simple counter to test sessions. should increment on each page reload.
session_start();
$count = isset($_SESSION['count']) ? $_SESSION['count'] : 1;

echo $count . PHP_EOL . $_SERVER["SERVER_ADDR"];

$_SESSION['count'] = ++$count;
