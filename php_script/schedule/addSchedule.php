<?php
include("../../db/db.php");

$form_data = json_decode(file_get_contents("php://input"));
$title = $form_data->schedule_title;
$description = $form_data->schedule_description;
$startDate = $form_data->schedule_startDate;
$endDate = $form_data->schedule_endDate;
$endTime = $form_data->schedule_endTime;
$startTime = $form_data->schedule_startTime;

$sched_code = "SRV";
$dateToday = date("Ymd");



$addSchedule = mysqli_query($web_db, "INSERT INTO schedule_tbl (schedule_title, schedule_description, schedule_startDate, schedule_endDate, schedule_timeStart, schedule_timeEnd) VALUES ('$title', '$description', '$startDate', '$endDate', '$startTime', '$endTime')");

$id = mysqli_insert_id($web_db);

$new_code = $sched_code."".$id."".$dateToday;
$uddate_sched_code  = mysqli_query($web_db, "UPDATE schedule_tbl set schedule_code = '$new_code' where schedule_id = '$id'");





?>