<?php
date_default_timezone_set('Asia/Jakarta');

$databaseHost = 'localhost';
$databaseName = 'db-web-nestbar';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
 
?>