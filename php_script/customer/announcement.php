<?php
include("../../db/db.php");

$get_announcement = mysqli_query($web_db, "SELECT * from announcement_tbl where announcement_status = 'ACTIVE' ORDER BY announcement_id DESC limit 0,3");

while($row = mysqli_fetch_array($get_announcement)){
	$data[] = array("title"=>$row['announcement_title'], "description"=>$row['announcment_description'], "picture"=>$row['announcement_image'], "type"=>$row['announcement_type'], "aid"=>$row['announcement_id']);

}

echo json_encode($data);

?>