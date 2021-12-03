<?php
include("../../db/db.php");



$declined_btn = "";


$get_pending_request = mysqli_query($web_db, "SELECT * from prayer_request_tbl where prayer_request_status = 'PENDING'");

while($row = mysqli_fetch_array($get_pending_request)){


if($row['prayer_request_status'] == "PENDING"){

	$declined_btn = "block";

}else{
	$declined_btn = "none";

}


	$data[] = array("name"=>$row['prayer_requestor'], "rid"=>$row['prayer_request_id'], "details"=>$row['prayer_request_details'], "date"=>$row['prayer_date'], "declined_btn"=>$declined_btn);


}


echo json_encode($data);





?>