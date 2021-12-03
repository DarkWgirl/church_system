<?php
include("../../db/db.php");



$get_finance = mysqli_query($web_db, "SELECT * from donation_tbl INNER JOIN finance_tbl on finance_tbl.finance_id = donation_tbl.finance_id where donation_status = 'PENDING'");

while($row = mysqli_fetch_array($get_finance)){
	$data[] =  array("finance_type"=>$row['finance_type'], "finance_account"=>$row['finance_account'], "finance_mode"=>$row['finance_mode'], "finance_id"=>$row['finance_id'], "finance_bank_name"=>$row['finance_bank_name'], "amount"=>$row['donation_amount'], "date"=>$row['donation_date'], "name"=>$row['donation_name'], "transaction_code"=>$row['donation_transaction_code'], "did"=>$row['donation_id']);
}


echo json_encode($data);







?>