<?php
include("../../db/db.php");


$form_data = json_decode(file_get_contents("php://input"));


$amount = $form_data->amount;
$mode = $form_data->mode;
$donor = $form_data->donor;
$transaction_code = $form_data->transaction_code;
$donation_type = "Tithes";

$date_today = date("Y-m-d");





$dontaion = mysqli_query($web_db, "INSERT INTO donation_tbl (donation_amount, donation_name, donation_date, finance_id, donation_transaction_code, donation_type) VALUES ('$amount', '$donor', '$date_today', '$mode', '$transaction_code', '$donation_type')");


?>