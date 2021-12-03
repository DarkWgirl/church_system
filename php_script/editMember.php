<?php
include("../db/db.php");
include("../assets/mail.php");

$form_data = json_decode(file_get_contents("php://input"));
$fname = $form_data->user_fname;
$lname = $form_data->user_lname;
$mobile = $form_data->user_mobile;
$email = $form_data->user_email;
$role = $form_data->user_role;
$level = $form_data->user_level;
$uid = $form_data->user_id;



$update = mysqli_query($web_db, "UPDATE user_tbl set user_fname = '$fname', user_lname = '$lname', user_mobile = '$mobile', user_email = '$email', user_role = '$role', user_level = '$level' where user_id = '$uid'");

$password = $lname."".$id;
$password = $password."".date("Yd");

$update_account = mysqli_query($web_db, "UPDATE user_tbl set user_password  = '$password' where user_id = '$uid'");



 $mail->addAddress($email, $fname);
$mail->Subject = "Account Update Information";
$mail->msgHTML("This is an automated email from CCMCI.<br>Please sign-in to your account using this receiver email ".$email." and the following password<br>
		<b>".$password."</b> for your attendance on your schedule service. <br>You will receive another email regarding your schedule<br><br>Thank you");
$mail->send();



?>		