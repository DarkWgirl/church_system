<?php
include("../../db/db.php");

$form_data = json_decode(file_get_contents("php://input"));
$finance_type = $form_data->finance_type;
$finance_account = $form_data->finance_account;
$finance_mode = $form_data->finance_mode;
$fid = $form_data->finance_id;
$finance_bank_name = $form_data->finance_bank_name;



$update_finance = mysqli_query($web_db, "UPDATE finance_tbl set finance_type = '$finance_type', finance_account = '$finance_account', finance_mode = '$finance_mode', finance_bank_name = '$finance_bank_name' where finance_id = '$fid'");





?>