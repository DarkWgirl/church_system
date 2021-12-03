<?php
include("../../db/db.php");

$edit_btn = "";
$archive_btn = "";


$get_pending_service = mysqli_query($web_db, "SELECT * from service_tbl INNER JOIN user_tbl on user_tbl.user_id = service_tbl.user_id where service_status = 'PENDING'");


while($row = mysqli_fetch_array($get_pending_service)){

	$fromDate = date('F d, Y g:i A', strtotime($row['service_start']));
$toDate = date('F d, Y g:i A', strtotime($row['service_end']));

if($row['service_status'] == "PENDING"){

$edit_btn = "block";
$archive_btn = "block";

}else{

	$edit_btn = "none";
$archive_btn = "none";

}



$fullname = $row['user_fname']." ".$row['user_lname'];


$data[] = array("service_id"=>$row['service_id'], "service_title"=>$row['service_title'], "service_description"=>$row['service_description'], "service_start"=>$row['service_start'], "service_end"=>$row['service_end'], "user_id"=>$row['user_id'], "fullname"=>$fullname, "service_link"=>$row['service_link'], "fromDate"=>$fromDate, "toDate"=>$toDate, "service_status"=>$row['service_status']);


}

echo json_encode($data);


?>