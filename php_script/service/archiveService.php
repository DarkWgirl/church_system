<?php
include("../../db/db.php");

$form_data = json_decode(file_get_contents("php://input"));
$sid = $form_data->service_id;


$update_service = mysqli_query($web_db, "UPDATE service_tbl set service_status = 'ARCHIVE' where service_id = '$sid'");




?>