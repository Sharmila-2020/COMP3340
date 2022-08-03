<?php
//using information from: https://www.php.net/manual/en/mysqli.quickstart.connections.php
$host = "localhost";
$username = "root";
$password = "usbw";
$db_in_use = "test";

// main connection statement
$mysqli = new mysqli($host, $username, $password, $db_in_use);
// Checking the connection
if ($mysqli->connect_error) {
  die("Connection has failed: " . $mysqli->connect_error);
} 