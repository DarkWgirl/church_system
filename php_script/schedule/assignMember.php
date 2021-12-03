<?php
include("../../db/db.php");
$form_data = json_decode(file_get_contents("php://input"));
$uid = $form_data->user_id;
$other_role = $form_data->other_role;
$sid = $form_data->schedule_id;
$fromDate = $form_data->fromDate;
$toDate = $form_data->toDate;
$timeFrom = $form_data->timeFrom;
$timeTo = $form_data->timeTo;


$check_if_assigned = mysqli_num_rows(mysqli_query($web_db, "SELECT * from assignment_tbl where user_id = '$uid' AND schedule_id = '$sid'"));

$check_if_credit = mysqli_num_rows(mysqli_query($web_db, "SELECT * from assignment_tbl INNER JOIN schedule_tbl on schedule_tbl.schedule_id = assignment_tbl.schedule_id where user_id = '$uid' AND schedule_startDate between '$fromDate' AND '$toDate' AND schedule_timeStart between '$timeFrom' AND '$timeTo'"));



if($check_if_assigned > 0){
echo "Invalid";
}else if($check_if_credit > 0){
echo "Invalid";
}else{

  $assign = mysqli_query($web_db, "INSERT INTO assignment_tbl (user_id, schedule_id, other_role) VALUES ('$uid', '$sid', '$other_role')");
  echo "Success";

}






?>