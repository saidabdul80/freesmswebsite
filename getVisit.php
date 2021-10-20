<br><br>
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
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"http://ipinfo.io/$user_ip/geo");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    $json = curl_exec($ch);
    curl_close ($ch);
//$json     = file_get_contents("http://ipinfo.io/$user_ip/geo");
//$json  = json_decode( file_get_contents("http://ip-get-geolocation.com/api/json/".$user_ip), true);
 $json     = json_decode($json, true);
 $country = $city = $region = "";
 if(isset($json['country'])){
    $country  = $json['country'];
 }
 if(isset($json['region'])){
    $region  = $json['region'];
 }
 if(isset($json['city'])){
    $city  = $json['city'];
 }

$date = date('Y-m-d');

$check_ip = $conn->query("SELECT * FROM pageview WHERE userip='$user_ip' AND date_visit = '$date'");
if($check_ip->num_rows >0)
{ 
    $ch = $check_ip->fetch_assoc();    
    $num = intval($ch['totalview']) + 1;
    
  $updateview = $conn->query("UPDATE `pageview` SET `totalview`='$num' WHERE userip='$user_ip' AND date_visit = '$date' ");
}else{    
  $insertview = $conn->query("INSERT INTO `pageview`(`id`, `page`, `totalview`, `userip`, `date_visit`,country, region, city)
                     VALUES (NULL,'-',1,'$user_ip','$date', '$country', '$region','$city')");  
}

