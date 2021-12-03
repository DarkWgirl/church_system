<?php
session_start();

include("../../db/db.php");



$get_announcement = mysqli_query($web_db, "SELECT * from announcement_tbl where announcement_status = 'ACTIVE'");


$count = mysqli_num_rows($get_announcement);


$count = ceil($count / 3);




for($i = 1; $i <= $count; $i++){
	$data[] = array("page"=>$i);
}
echo json_encode($data);





?>