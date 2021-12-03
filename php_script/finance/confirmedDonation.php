<?php
include("../../db/db.php");

$form_data = json_decode(file_get_contents("php://input"));
$did = $form_data->did;



$update = mysqli_query($web_db, "UPDATE donation_tbl set donation_status = 'CONFIRMED' where donation_id = '$did'");


?>