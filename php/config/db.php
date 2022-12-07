<?php
$servername = "127.0.0.1";
$username = "frontlis_omlusr";
$password = "Fr0ntOml@g!c#8922";
$dbname="frontlis_laravel_mj";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}