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
function rw_hash($string, $encrypt = true)
	{
		$encrypt_method = "AES-256-CBC";
		$secret_key = "AA74CDCC2BBRQWE5136HH7B63C27"; // user define private key
		$secret_iv = "RwS3cr3t"; // user define secret key
		$key = hash("sha256", $secret_key);
		$iv = substr(hash("sha256", $secret_iv), 0, 16); // sha256 is hash_hmac_algo
		if ($encrypt) {
			$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
			$output = base64_encode($output);
		} else {
			$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
		}
		return $output;
	}



?>