<?php  
//Composer's autoload file loads all necessary files
require 'vendor/autoload.php';

$mail = new PHPMailer;

$mail->isSMTP();  // Set mailer to use SMTP
$mail->Host = 'smtp.mailgun.org';  // Specify mailgun SMTP servers
$mail->SMTPAuth = true; // Enable SMTP authentication
$mail->Username = 'saidabdulsalam5@gmail.com'; // SMTP username from https://mailgun.com/cp/domains
$mail->Password = 'said8080'; // SMTP password from https://mailgun.com/cp/domains
$mail->SMTPSecure = 'tls';   // Enable encryption, 'ssl'

$mail->From = 'freesmsnigeria.com'; // The FROM field, the address sending the email 
$mail->FromName = "FSMSN ISSUES"; // The NAME field which will be displayed on arrival by the email client
$mail->addAddress('saidabdulsalam5@gmail.com');     // Recipient's email address and optionally a name to identify him
$mail->isHTML(true);   // Set email to be sent as HTML, if you are planning on sending plain text email just set it to false

// The following is self explanatory
$mail->Subject = $type;
$mail->Body    = "<p>'$message'</p>";
$mail->AltBody = "customer Contact: '$phone' ";

if(!$mail->send()) {  
    echo "Message hasn't been sent.";
    echo 'Mailer Error: ' . $mail->ErrorInfo . "n";
} else {
    echo "Message has been sent  n";
}
?>