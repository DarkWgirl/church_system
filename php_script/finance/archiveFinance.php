<?php
include("../../db/db.php");

$form_data = json_decode(file_get_contents("php://input"));
$fid = $form_data->finance_id;



$update_finance = mysqli_query($web_db, "UPDATE finance_tbl set finance_status = 'ARCHIVE' where finance_id = '$fid'");





?>