<?php
include("../../db/db.php");



$get_finance = mysqli_query($web_db, "SELECT * from finance_tbl where finance_status = 'ACTIVE'");

while($row = mysqli_fetch_array($get_finance)){
	$data[] =  array("finance_type"=>$row['finance_type'], "finance_account"=>$row['finance_account'], "finance_mode"=>$row['finance_mode'], "finance_id"=>$row['finance_id'], "finance_bank_name"=>$row['finance_bank_name']);
}


echo json_encode($data);







?>