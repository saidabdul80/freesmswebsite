<?php 
include('printError.php');
include('./connectxzy.php');
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
    $run = $conn->query("INSERT INTO `users`(`id`, `email`, `name`, `status`, `school`, `address`, phone) VALUES (NULL, '$email', '$name', '0','$school', '$address', '$phone' )");
    $id = getId($email, $conn);
    $run = $conn->query("INSERT INTO `messages`(`id`, `user_id`, `message`, `type`) VALUES (null, $id, '$message', '$type')");
}
include('sendmail.php');
$details = array(
    'name'=>$name,
    'email'=>$email,
    'school'=>$school,
    'address'=>$address,
    'phone'=>$phone,
    'type'=>$type,
    'message'=>$message
);
$string_to_encrypt=json_encode($details);
$encrypted_string=openssl_encrypt($string_to_encrypt,"AES-128-ECB",$passwordx);
//$decrypted_string=openssl_decrypt($encrypted_string,"AES-128-ECB",$password);
$transport = new sendMail;
$transport->sendToVerifyUser($email,$encrypted_string);
echo json_encode(array('ok'=>true,'status'=>200));
?>