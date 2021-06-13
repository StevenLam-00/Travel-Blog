<?php

$host = 'localhost';
$user = 'root';
$pass = 'duy';
$db_name = 'blog2';

$conn = new MySQLi($host, $user, $pass, $db_name);

if ($conn->connect_error) {
    die('Database connection error: ' . $conn->connect_error);
}