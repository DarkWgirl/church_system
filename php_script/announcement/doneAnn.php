<?php
include("../../db/db.php");

$id = json_decode(file_get_contents("php://input"));


$done = mysqli_query($web_db, "UPDATE announcement_tbl set announcement_status = 'DONE' where announcement_id = '$id'");


?>