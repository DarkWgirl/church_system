<?php
include("../../db/db.php");
include("../../assets/mail.php");

$form_data = json_decode(file_get_contents("php://input"));
$uid = $form_data->user_id;



$get_member_details = mysqli_query($web_db, "SELECT * from user_tbl where user_id = '$uid'");
$fetch_user_data = mysqli_fetch_array($get_member_details);

$email = $fetch_user_data['user_email'];
$lname = $fetch_user_data['user_lname'];


 $mail->addAddress($email, $lname);
$mail->Subject = "Member Assigned Schedule";
$mail->msgHTML("This is an automated email from CCMCI.<br>You are assigned to the following schedule.<br>Kindly coordinate with the admin and coordinator regarding to your schedule and activity.<br><b>Schedule Code: ".$code.", kindly use the code for your attendance. <br>Date: ".$fromDate." - ".$toDate.", Time: ".$timeFrom." - ".$timeTo.", Agenda: ".$schedule.", ".$description."</b>");
$mail->send();



?>		