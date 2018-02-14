<?php

//debug
//ini_set('display_errors', 1);
//ini_set('log_errors', 1);

$dbusername = 'root'; //Database Username
$dbpassword = ''; //Database Password
$dbname = 'event management'; //Database Name
$servername = '127.0.0.1';
$dbport = 3306;
$dsn = 'mysql:dbname=' . $dbname . ';host=' . $servername . ';port=' . $dbport;
$pdo = new PDO($dsn, $dbusername, $dbpassword);
$userName = 'admin';
$password = 'admin';
?>