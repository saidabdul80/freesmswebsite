<?php
$servername = "localhost";
/* $username = "root";
$password = ""; */
$username = "schoolc4_web";
$password = "schoolc4_web";
$dbname = "schoolc4_web";


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


?>