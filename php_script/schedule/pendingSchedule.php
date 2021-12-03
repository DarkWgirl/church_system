<?php
include("../../db/db.php");



$edit_btn = "";
$archive_btn = "";


$getPending = mysqli_query($web_db, "SELECT * from schedule_tbl where schedule_status = 'PENDING'");

while($row = mysqli_fetch_array($getPending)){

	$fromDate = date('F d, Y', strtotime($row['schedule_startDate']));
	$toDate = date('F d, Y', strtotime($row['schedule_endDate']));
	$timeFrom = date('g:i A', strtotime($row['schedule_timeStart']));
	$timeTo = date('g:i A', strtotime($row['schedule_timeEnd']));


	if($row['schedule_status'] == "PENDING"){

	$edit_btn = "block";
	$archive_btn = "block";

	}else{
$edit_btn = "none";
$archive_btn = "none";
	}

$data[] = array("schedule_title"=>$row['schedule_title'], "schedule_description"=>$row['schedule_description'], "schedule_id"=>$row['schedule_id'], "schedule_startDate"=>$row['schedule_startDate'], "schedule_endDate"=>$row['schedule_endDate'], "schedule_timeStart"=>$row['schedule_timeStart'], "schedule_timeEnd"=>$row['schedule_timeEnd'], "edit_btn"=>$edit_btn, "archive_btn"=>$archive_btn, "schedule_status"=>$row['schedule_status'], "fromDate"=>$fromDate, "toDate"=>$toDate, "timeFrom"=>$timeFrom, "timeTo"=>$timeTo, "schedule_code"=>$row['schedule_code']);




}

echo json_encode($data);





?>
