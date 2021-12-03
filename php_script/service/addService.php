<?php
include("../../db/db.php");

$form_data = json_decode(file_get_contents("php://input"));
$title = $form_data->service_title;
$description = $form_data->service_description;
$start = $form_data->service_start;
$end = $form_data->service_end;
$link = $form_data->service_link;
$uid = $form_data->user_id;


$addService = mysqli_query($web_db, "INSERT INTO service_tbl (service_title, service_description, service_start, service_end, service_link, user_id) VALUES ('$title', '$description', '$start', '$end', '$link', '$uid')");



?>