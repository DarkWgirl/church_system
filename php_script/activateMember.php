<?php
include("../db/db.php");
include("../assets/mail.php");

$form_data = json_decode(file_get_contents("php://input"));
$uid = $form_data->user_id;


$update_account = mysqli_query($web_db, "UPDATE user_tbl set user_status  = 'ACTIVE' where user_id = '$uid'");




?>		