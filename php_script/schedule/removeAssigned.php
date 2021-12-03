<?php
include("../../db/db.php");
include("../../assets/mail.php");

$form_data = json_decode(file_get_contents("php://input"));
$aid = $form_data->assignment_id;



$delet = mysqli_query($web_db, "DELETE FROM assignment_tbl where assignment_id = '$aid'");



?>