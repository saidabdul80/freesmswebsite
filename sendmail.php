<?php  
//Composer's autoload file loads all necessary files
require 'forms\Mailer\phpmailer\class.phpmailer.php';
class sendMail
{    
    public $mail;
    function __construct(){
        $this->mail = new PHPMailer;
        $this->mail->isSMTP();  // Set mailer to use SMTP
        $this->mail->Host = 'smtp.mailgun.org';  // Specify mailgun SMTP servers
        $this->mail->SMTPAuth = true; // Enable SMTP authentication
        $this->mail->Username = 'saidabdulsalam5@gmail.com'; // SMTP username from https://mailgun.com/cp/domains
        $this->mail->Password = 'said8080'; // SMTP password from https://mailgun.com/cp/domains
        $this->mail->SMTPSecure = 'tls';   // Enable encryption, 'ssl'
    }

    function sendToVerifyUser($email,$token_r){
        $this->mail->From = 'cares@schoolcomputings.com'; // The FROM field, the address sending the email 
        $this->mail->FromName = "School Computings Nigeria"; // The NAME field which will be displayed on arrival by the email client
        $this->mail->addAddress($email);     // Recipient's email address and optionally a name to identify him
        $this->mail->isHTML(true);   // Set email to be sent as HTML, if you are planning on sending plain text email just set it to false
        // The following is self explanatory
        $this->mail->Subject = "School computings";
        $this->mail->Body    = "<div style='max-width:700px;min-width:320px;background:#f5f5f5;width:100%; padding:0px 20px;'>
            <div style='padding:0 20px;text-align:center;height:100px'>
                <center>
                <img src='./assets/img/schoolcomputing_logo.png' style='width:60px;vertical-align:middle'>
                </center>
            </div>
            <div style='background-clip:padding-box;color:#545454;font-family:'Helvetica Neue',Arial,sans-serif;font-size:14px;line-height:20px;overflow:hidden;padding:15px 20px'>
                <p style='margin:0;'>Verify this is the Email You use on <a href='https://schoolcomputings.com'>Schoolcomputings.com</a></p>
                <p style='margin:20px 0 5px 0;height:50px'>
                    <a href='https://schoolcomputings.com/activation.php?token=$token_r' style='background:#76b51b;padding:15px 50px;border-radius:5px;color:#fff;text-decoration:none;font-weight:bold;display:inline-block;text-align:center' target='_blank' >
                        Confirm email address</a>
                </p>
                <p style='margin:50px 0 0px 0;color:#8b8b8b'>
				    -<a style='color:inherit;text-decoration:none'><span class='il'>School Computings</span></a> Team
				</p>
            </div>        
            <div style='padding:20px;color:#8b8b8b;text-align:center'>
            <p style='margin:6px 0'>Follow us on :</p>
            <a href='https://web.facebook.com/profile.php?id=100073957774342' style='text-decoration:none;width:34px;height:28px;display:inline-block' target='_blank' >
			    <img src='https://ci3.googleusercontent.com/proxy/zCdn5CH7dWKa2gZX6WN8ubAE6RhtBLnpvyE-BkxJmZUz8IeI2Ly_-1T1tV9IjtlUklbcY6-AkzOS-TajhhFTM602ShuODXFX6M4=s0-d-e1-ft#https://storage.googleapis.com/tawk-images/facebook.png' alt='Facebook' title='Facebook' style='width:28px;margin:0px auto' class='CToWUd'>
			</a>
            </div>
        </div>";
        //$this->mail->AltBody = "customer Contact: '$phone' ";
        if(!$this->mail->send()) {  
            echo "Message hasn't been sent.";
            echo 'Mailer Error: ' . $this->mail->ErrorInfo . "n";
        } else {
            echo "Message has been sent  n";
        }
    }
    
    function sendRecievedUser($email, $name){
        $this->mail->From = 'cares@schoolcomputings.com'; // The FROM field, the address sending the email 
        $this->mail->FromName = "School Computings Nigeria"; // The NAME field which will be displayed on arrival by the email client
        $this->mail->addAddress($email);     // Recipient's email address and optionally a name to identify him
        $this->mail->isHTML(true);   // Set email to be sent as HTML, if you are planning on sending plain text email just set it to false
        // The following is self explanatory
        $this->mail->Subject = "School computings";
        $this->mail->Body    = "<div style='max-width:700px;min-width:320px;background:#f5f5f5;width:100%; padding:0px 20px;'>
            <div style='padding:0 20px;text-align:center;height:100px'>
                <center>
                <img src='./assets/img/schoolcomputing_logo.png' style='width:60px;vertical-align:middle'>
                </center>
            </div>
            <div style='background-clip:padding-box;color:#545454;font-family:'Helvetica Neue',Arial,sans-serif;font-size:14px;line-height:20px;overflow:hidden;padding:15px 20px'>
                <p style='margin:0;'>Thank You $name,</p>
                <p style='margin:20px 0 5px 0;height:50px'>
                    We have recieved your message!
                </p>
                <p style='margin:50px 0 0px 0;color:#8b8b8b'>
				    -<a style='color:inherit;text-decoration:none'><span class='il'>School Computings</span></a> Team
				</p>
            </div>        
            <div style='padding:20px;color:#8b8b8b;text-align:center'>
            <p style='margin:6px 0'>Follow us on :</p>
            <a href='https://web.facebook.com/profile.php?id=100073957774342' style='text-decoration:none;width:34px;height:28px;display:inline-block' target='_blank' >
			    <img src='https://ci3.googleusercontent.com/proxy/zCdn5CH7dWKa2gZX6WN8ubAE6RhtBLnpvyE-BkxJmZUz8IeI2Ly_-1T1tV9IjtlUklbcY6-AkzOS-TajhhFTM602ShuODXFX6M4=s0-d-e1-ft#https://storage.googleapis.com/tawk-images/facebook.png' alt='Facebook' title='Facebook' style='width:28px;margin:0px auto' class='CToWUd'>
			</a>
            </div>
        </div>";
        //$this->mail->AltBody = "customer Contact: '$phone' ";
        if(!$this->mail->send()) {  
            echo "Message hasn't been sent.";
            echo 'Mailer Error: ' . $this->mail->ErrorInfo . "n";
        } else {
            echo "Message has been sent  n";
        }
    }

    function sendToTeam($email,$phone,$school,$message){
        $this->mail->From = 'cares@schoolcomputings.com'; // The FROM field, the address sending the email 
        $this->mail->FromName = "School Computings Nigeria"; // The NAME field which will be displayed on arrival by the email client
        $this->mail->addAddress('saidabdulsalam5@gmail.com,jamiuyusuf1983@gmail.com');     // Recipient's email address and optionally a name to identify him
        $this->mail->isHTML(true);   // Set email to be sent as HTML, if you are planning on sending plain text email just set it to false
        // The following is self explanatory
        $this->mail->Subject = "School computings";
        $this->mail->Body    = "<div style='max-width:700px;min-width:320px;background:#f5f5f5;width:100%; padding:0px 20px;'>
            <div style='padding:0 20px;text-align:center;height:100px'>
                <center>
                <img src='./assets/img/schoolcomputing_logo.png' style='width:60px;vertical-align:middle'>
                </center>
            </div>
            <div style='background-clip:padding-box;color:#545454;font-family:'Helvetica Neue',Arial,sans-serif;font-size:14px;line-height:20px;overflow:hidden;padding:15px 20px'>
                <p style='margin:0;'>Hi Team,</p>
                <p style='margin:20px 0 5px 0;height:50px'>
                    We have a message from $school<br>
                    phone contact: $phone
                    <br> Email: $email<br>
                    <b>Message</b>
                    <p style='background:#ccc; padding:10px;margin:0;'>$message</p>
                </p>
                <p style='margin:50px 0 0px 0;color:#8b8b8b'>
				    -<a style='color:inherit;text-decoration:none'><span class='il'>School Computings</span></a>Goodbye Team
				</p>
            </div>        
            <div style='padding:20px;color:#8b8b8b;text-align:center'>
            <p style='margin:6px 0'>Follow us on :</p>
            <a href='https://web.facebook.com/profile.php?id=100073957774342' style='text-decoration:none;width:34px;height:28px;display:inline-block' target='_blank' >
			    <img src='https://ci3.googleusercontent.com/proxy/zCdn5CH7dWKa2gZX6WN8ubAE6RhtBLnpvyE-BkxJmZUz8IeI2Ly_-1T1tV9IjtlUklbcY6-AkzOS-TajhhFTM602ShuODXFX6M4=s0-d-e1-ft#https://storage.googleapis.com/tawk-images/facebook.png' alt='Facebook' title='Facebook' style='width:28px;margin:0px auto' class='CToWUd'>
			</a>
            </div>
        </div>";
        //$this->mail->AltBody = "customer Contact: '$phone' ";
        if(!$this->mail->send()) {  
            echo "Message hasn't been sent.";
            echo 'Mailer Error: ' . $this->mail->ErrorInfo . "n";
        } else {
            echo "Message has been sent  n";
        }
    }
}






?>