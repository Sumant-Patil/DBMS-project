<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div id="navbar">
        <h1>Sign Up</h1>
    </div>
    <div>
        <form action = "signup.php"method="POST">
            <br>
            <br>
            <input id="user"type="text" name="email" placeholder=" Email or Phone ">
            <br>
            <br>
            <input id="user"type="Name" name="Name"placeholder=" Name">
            <br>
            <br>
            
            <br>
            <br>
            <input type="submit" id="login"value="Signin">
            
        </form>
    </div>
</body>
</html>

<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$otp = 0;
for($i=0;$i<3;$i++){
    $otp += rand(0,9);
    if($i<3)$otp *= 10;
}

$mail = new PHPMailer(true);
$useremail = $_POST['email'];

if(isset($_POST['signin'])){   
    try {
        
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com'; 
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'sumantpatil21@gmail.com';  
        $mail->Password   = 'yohjljitmslumnxc'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
        $mail->Port       = 465;                                    

      
        $mail->setFrom('sumantpatil21@gmail.com', 'Mailer');
        $mail->addAddress('sumantpatil21@gmail.com', 'User');    

     
        $mail->isHTML(true);                                 
        $mail->Subject = 'Here is the subject';
        $mail->Body    = "hello user your details are <br> email -> $useremail <br> otp -> $otp";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        header("Location: verify.php?message= enter otp to verify");
        exit();
    } catch (Exception $e) {
        
        error_log("Mailer Error: {$mail->ErrorInfo}");
        echo "Message could not be sent. Please try again later.";
    }
}
?>