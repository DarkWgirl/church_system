<?php
include("../db/db.php");


$activate_btn = "";
$archive_btn = "";

$getAllMember = mysqli_query($web_db, "SELECT * from user_tbl where user_status = 'ACTIVE'");


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


echo json_encode($data);






?>