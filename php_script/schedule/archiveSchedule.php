<?php
include("../../db/db.php");

$form_data = json_decode(file_get_contents("php://input"));
$sid = $form_data->schedule_id;

$update_schedule = mysqli_query($web_db, "UPDATE schedule_tbl set schedule_status = 'ARCHIVE' where schedule_id = '$sid'");





?>