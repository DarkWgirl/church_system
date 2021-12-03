<?php
include("../../db/db.php");


$form_data = json_decode(file_get_contents("php://input"));
$requestor = $form_data->requestor;
$details = $form_data->details;
$date_today = date("Y-m-d");




$prayer = mysqli_query($web_db, "INSERT INTO prayer_request_tbl (prayer_requestor, prayer_request_details, prayer_date) VALUES ('$requestor', '$details', '$date_today')");



?>