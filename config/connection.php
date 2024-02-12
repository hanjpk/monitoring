<?php
// Database connection parameters
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'monitor';

// Open connection to the database
$conn = mysqli_connect($hostname, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>