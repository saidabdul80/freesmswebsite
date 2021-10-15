<?php
$servername = "localhost";
$username = "freedgdm_web";
$password = "freedgdm_web";
$dbname = "freedgdm_web";


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


?>