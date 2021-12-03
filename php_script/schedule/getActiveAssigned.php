<?php
include("../../db/db.php");



$delete_btn = "";


$getPending = mysqli_query($web_db, "SELECT * from assignment_tbl INNER JOIN schedule_tbl on schedule_tbl.schedule_id = assignment_tbl.schedule_id INNER JOIN user_tbl on user_tbl.user_id = assignment_tbl.user_id where schedule_status = 'PENDING'");

while($row = mysqli_fetch_array($getPending)){
	$fullname = $row['user_fname']." ".$row['user_lname'];
	$fromDate = date('F d, Y', strtotime($row['schedule_startDate']));
	$toDate = date('F d, Y', strtotime($row['schedule_endDate']));
	$timeFrom = date('g:i A', strtotime($row['schedule_timeStart']));
	$timeTo = date('g:i A', strtotime($row['schedule_timeEnd']));


$data[] = array("schedule_title"=>$row['schedule_title'], "schedule_description"=>$row['schedule_description'], "schedule_id"=>$row['schedule_id'], "schedule_startDate"=>$row['schedule_startDate'], "schedule_endDate"=>$row['schedule_endDate'], "schedule_timeStart"=>$row['schedule_timeStart'], "schedule_timeEnd"=>$row['schedule_timeEnd'], "schedule_status"=>$row['schedule_status'], "fromDate"=>$fromDate, "toDate"=>$toDate, "timeFrom"=>$timeFrom, "timeTo"=>$timeTo, "schedule_code"=>$row['schedule_code'], "fullname"=>$fullname, "assignment_id"=>$row['assignment_id'], "user_email"=>$row['user_email'], "user_id"=>$row['user_id']);







}

echo json_encode($data);





?>
