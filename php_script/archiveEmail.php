<?php
include("../db/db.php");
include("../assets/mail.php");

$form_data = json_decode(file_get_contents("php://input"));
$uid = $form_data->user_id;
$email = $form_data->user_email;
$lname = $form_data->user_lname;


 $mail->addAddress($email, $lname);
$mail->Subject = "Account Cancellation";
$mail->msgHTML("This is an automated email from CCMCI.<br>Your account has been archived, contact your admin or coordinator for the details <br>of your account cancellation.");
$mail->send();



?>		