<?php
include("../../db/db.php");

$form_data = json_decode(file_get_contents("php://input"));
$finance_type = $form_data->finance_type;
$finance_account = $form_data->finance_account;
$finance_mode = $form_data->finance_mode;
$finance_bank_name = $form_data->finance_bank_name;

$addFinance = mysqli_query($web_db, "INSERT INTO finance_tbl (finance_type, finance_account, finance_mode, finance_bank_name) VALUES ('$finance_type', '$finance_account','$finance_mode', '$finance_bank_name')");




?>