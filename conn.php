<?php
$databaseHost = 'localhost';
$databaseName = 'management';
$databaseUsername = 'root';
$databasePassword = '';
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
session_start();
?>