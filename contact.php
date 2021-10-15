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


$name =$_POST["name"];
$email =$_POST["email"];
$school =$_POST["school"];
$address =$_POST["address"];
$phone =$_POST["phone"];
$type =$_POST["type"];
$message =$_POST["message"];

function getId($email, $conn){
    $run = $conn->query("SELECT * FROM `users` WHERE email='$email'");
    if($run->num_rows >0){
        $row = $run->fetch_assoc();
        return $row["id"];
    }
}

$run = $conn->query("SELECT * FROM `users` WHERE email='$email'");
if($run->num_rows> 0){
    $id = getId($email, $conn);
    $run = $conn->query("INSERT INTO `messages`(`id`, `user_id`, `message`, `type`) VALUES (null, $id, '$message', '$type')");
}else{
    $run = $conn->query("INSERT INTO `users`(`id`, `email`, `name`, `status`, `school`, `address`, phone) VALUES (NULL, '$email', '$name', '1','$school', '$address', '$phone' )");
    $id = getId($email, $conn);
    $run = $conn->query("INSERT INTO `messages`(`id`, `user_id`, `message`, `type`) VALUES (null, $id, '$message', '$type')");
}
echo 200;
//include('sendmail.php');
?>