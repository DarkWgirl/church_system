<?php
use PHPMailer\PHPMailer\Exception;
 
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';
 
$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->isSMTP(); 
$mail->SMTPDebug = 0; 
$mail->Host = "smtp.gmail.com"; 
$mail->Port = "587"; // typically 587 
$mail->SMTPSecure = 'tls'; // ssl is depracated
$mail->SMTPAuth = true;
$mail->Username = "ccmci2021@gmail.com";
$mail->Password = "123ccmci@";
$mail->setFrom("ccmci2021@gmail.com", "CCMCC");

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);



?>