<?php
include("../db/db.php");
include("../assets/mail.php");

$form_data = json_decode(file_get_contents("php://input"));
$fname = $form_data->fname;
$lname = $form_data->lname;
$mobile = $form_data->mobile;
$email = $form_data->email;
$role = $form_data->role;
$level = $form_data->level;




$addMmber = mysqli_query($web_db, "INSERT INTO user_tbl (user_fname, user_lname, user_mobile, user_email, user_role, user_level) VALUES ('$fname', '$lname', '$mobile', '$email', '$role', '$level')");
$id = mysqli_insert_id($web_db);

$password = $lname."".$id;
$password = $password."".date("Yd");

$update_account = mysqli_query($web_db, "UPDATE user_tbl set user_password  = '$password' where user_id = '$id'");



 $mail->addAddress($email, $fname);
$mail->Subject = "Account Information";
$mail->msgHTML("This is an automated email from CCMCI.<br>Please sign-in to your account using this receiver email and the following password<br>
		<b>".$password."</b> for your attendance on your schedule service. <br> You will receive another email regarding your schedule<br><br>Thank you");
$mail->send();



?>		