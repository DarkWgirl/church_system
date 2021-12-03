<?php
include("../../db/db.php");
include("../../assets/mail.php");

$form_data = json_decode(file_get_contents("php://input"));
$uid = $form_data->user_id;
$title = $form_data->service_title;
$description = $form_data->service_description;
$link = $form_data->service_link;
$start = $form_data->service_start;
$end = $form_data->service_end;

$fromDate = date('F d, Y g:i A', strtotime($start));
$toDate = date('F d, Y g:i A', strtotime($end));


$get_member_details = mysqli_query($web_db, "SELECT * from user_tbl where user_id = '$uid'");
$fetch_user_data = mysqli_fetch_array($get_member_details);

$email = $fetch_user_data['user_email'];
$lname = $fetch_user_data['user_lname'];


 $mail->addAddress($email, $lname);
$mail->Subject = "Member Assigned Service";
$mail->msgHTML("This is an automated email from CCMCI.<br>You are assigned to the service.<br>Kindly coordinate with the admin and coordinator regarding to your schedule and activity.<br><b>Service Title: ".$title.". <br>Date: ".$fromDate." - ".$toDate.", link: ".$link.", ".$description."</b>");
$mail->send();



?>		