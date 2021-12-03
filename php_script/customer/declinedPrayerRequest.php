<?php
include("../../db/db.php");


$form_data = json_decode(file_get_contents("php://input"));
$rid = $form_data->rid;



$aacceptRequest = mysqli_query($web_db, "UPDATE prayer_request_tbl set prayer_request_status = 'DECLINED' where prayer_request_id = '$rid'");



?>