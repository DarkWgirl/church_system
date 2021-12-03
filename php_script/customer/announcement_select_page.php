<?php
include("../../db/db.php");


$page = json_decode(file_get_contents("php://input"));
if($page == "1"){
	$page = 0;
}else{
	$page = (($page - 1) * 3);
}

$get_announcement = mysqli_query($web_db, "SELECT * from announcement_tbl where announcement_status = 'ACTIVE' ORDER BY announcement_id DESC limit $page,3");

while($row = mysqli_fetch_array($get_announcement)){
	$data[] = array("title"=>$row['announcement_title'], "description"=>$row['announcment_description'], "picture"=>$row['announcement_image'], "type"=>$row['announcement_type']);

}

echo json_encode($data);

?>