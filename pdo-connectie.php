<?php

$host = 'localhost';
$user = 'bit_academy';
$passw = 'bit_academy';
$dbnaam = 'netland';

$dsn = 'mysql:host=' . $host . ';dbname=' . $dbnaam;

$pdo = new PDO($dsn , $user, $passw);


?>