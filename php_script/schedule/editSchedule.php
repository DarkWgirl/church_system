<?php
include("../../db/db.php");

$form_data = json_decode(file_get_contents("php://input"));
$title = $form_data->schedule_title;
$description = $form_data->schedule_description;
$startDate = $form_data->schedule_startDate;
$endDate = $form_data->schedule_endDate;
$endTime = $form_data->schedule_timeEnd;
$startTime = $form_data->schedule_timeStart;
$sid = $form_data->schedule_id;

$update_schedule = mysqli_query($web_db, "UPDATE schedule_tbl set schedule_title = '$title', schedule_description = '$description', schedule_startDate = '$startDate', schedule_endDate = '$endDate', schedule_timeStart = '$startTime', schedule_timeEnd = '$endTime' where schedule_id = '$sid'");





?>