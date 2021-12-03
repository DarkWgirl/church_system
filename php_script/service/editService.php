<?php
include("../../db/db.php");

$form_data = json_decode(file_get_contents("php://input"));
$title = $form_data->service_title;
$description = $form_data->service_description;
$start = $form_data->service_start;
$end = $form_data->service_end;
$link = $form_data->service_link;
$uid = $form_data->user_id;
$sid = $form_data->service_id;


$update_service = mysqli_query($web_db, "UPDATE service_tbl set service_title = '$title', service_description = '$description', service_start = '$start', service_end = '$end', service_link = '$link', user_id = '$uid' where service_id = '$sid'");




?>