<?php
include("./connectxzy.php");
include('printError.php');
include('sendmail.php');
$transport = new sendMail;
//$encrypted_string=openssl_encrypt($string_to_encrypt,"AES-128-ECB",$password);
if(isset($_GET['token'])){
    $token  = $_GET['token'];
    
    $details = json_decode(openssl_decrypt($token,"AES-128-ECB",$passwordx));
    openssl_error_string();
    echo openssl_decrypt("E1aBeRcQtgoGyZ/HlnhEAwzWby1xRtGVMKBVtlenEkbZhsJWg0zFi6mfhrTTPkZ0JEsYjtywPD31VAHQFaTgKyjbAOHgYhGig5mS8D77K8enF6uGP6sNZNp3tF9BbLksFfFJMWuJftNSNIh/C6K10N/TD0onE5ff0MyccFmaujN4bkcoi7k05sRKs7OEfLYR7XkJLMe3m5JN WFvlLSV5/3sUSCSCiclKrQ1GMCHB68=","AES-128-ECB",$passwordx);
    $email = $details['email'];
    $name = $details['name'];    
    $phone = $details['phone'];
    $school = $details['school'];
    $message = $details['message'];
    $run = $conn->query("SELECT * FROM `users` WHERE email='$email'");
    if($run->num_rows >0){
        $run = $conn->query("UPDATE `users` SET status='1' WHERE email='$email'");        
        if($run){
            $transport->sendToVerifyUser($email,$name);
            $transport->sendToTeam($email,$phone,$school,$message);
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
                <style>
                    body{
                        background-color: #eee;
                        padding:50px;
                    }
                </style>
            </head>
            <body>
                <center>
                    <h3>Email Verification Completed. Thank you</h3>
                    <a href="https://schoolcomputings.com">we will get back you!</a>
                </center>
            </body>
            </html>
            <?php
        }
    }
}else{
    echo "Invalid Verification Link or Link Expired!";
    exit();
}


?>