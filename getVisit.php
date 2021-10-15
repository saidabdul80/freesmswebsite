<?php
include('./connectxzy.php');
// gets the user IP Address
//$getpage = 

function get_client_ip()
{
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    } else if (isset($_SERVER['REMOTE_ADDR'])) {
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    } else {
        $ipaddress = 'UNKNOWN';
    }

    return $ipaddress;
}
$user_ip = get_client_ip();
$json     = file_get_contents("http://ipinfo.io/$user_ip/geo");
$json     = json_decode($json, true);
$country  = $json['country'];
$region   = $json['region'];
$city     = $json['city'];
$user_ip=$_SERVER['REMOTE_ADDR'];

$date = date('Y-m-d');

$check_ip = $conn->query("SELECT * FROM pageview WHERE userip='$user_ip' AND visit_date = '$date'");
if($check_ip->num_rows >0)
{
  $updateview = $conn->query("UPDATE `pageview` AS p SET `p.totalview`=p.totalview+1 WHERE p.userip='$user_ip' AND p.date_visit = '$date' ");
}else{    
  $insertview = $conn->query("INSERT INTO `pageview`(`id`, `page`, `totalview`, `userip`, `date_visit`,country, region, city)
                     VALUES (NULL,'-',1,'$user_ip','$date', '$country', '$region','$city')");  
}