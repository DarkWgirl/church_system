<?php
include("../db/db.php");


$form_data = json_decode(file_get_contents("php://input"));
$status = $form_data->status;

$activate_btn = "";
$archive_btn = "";

$getAllMember = mysqli_query($web_db, "SELECT * from user_tbl where user_status = '$status'");
$get_count = mysqli_num_rows($getAllMember);

if($get_count > 0){


	while($row = mysqli_fetch_array($getAllMember)){

	if($row['user_status'] == "ACTIVE"){
		$activate_btn = "none";
		$archive_btn = "block";

	}else{

		$activate_btn = "block";
		$archive_btn = "none";

	}	


	$fullname = $row['user_fname']." ".$row['user_lname'];
	$data[] = array("user_id"=>$row['user_id'], "user_fname"=>$row['user_fname'], "user_lname"=>$row['user_lname'], "fullname"=>$fullname, "user_mobile"=>$row['user_mobile'], "user_email"=>$row['user_email'], "activate_btn"=>$activate_btn, "archive_btn"=>$archive_btn, "user_role"=>$row['user_role'], "user_level"=>$row['user_level'], "user_status"=>$row['user_status']);
}

}else{
		$data[] = array("user_id"=>"No Data", "user_fname"=>"No Data", "user_lname"=>"No Data", "fullname"=>"No Data", "user_mobile"=>"No Data", "user_email"=>"No Data", "activate_btn"=>"none", "archive_btn"=>"none", "user_role"=>"No Data", "user_level"=>"No Data", "user_status"=>"No Data");

}





echo json_encode($data);






?>