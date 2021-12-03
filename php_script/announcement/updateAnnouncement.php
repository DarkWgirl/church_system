<?php
include("../../db/db.php");

if(isset($_POST['submit'])){


	
$fileToUpload = $_FILES['fileToUpload']["name"];
	$announcement_title = $_POST['announcement_title'];
	$announcement_description = $_POST['announcement_description'];
	$aid = $_POST['aid'];
	$announcement_type = $_POST['announcement_type'];



if($fileToUpload !=""){


$ext = strtolower(pathinfo($_FILES['fileToUpload']["name"], PATHINFO_EXTENSION));
if (!in_array($ext, ["jpg", "png"])){ 


	header("location: ../../error_uploading_image.php");

}else{



	$target_dir = "../../assets/aImage/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

  	move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

$insert_into = mysqli_query($web_db, "UPDATE announcement_tbl set announcement_title = '$announcement_title', announcment_description = '$announcement_description', announcement_image = '$fileToUpload', announcement_type = '$announcement_type' where announcement_id = '$aid'");
if($insert_into){
	header("location: ../../announcement.php");
}

}




}else{


	$insert_into = mysqli_query($web_db, "UPDATE announcement_tbl set announcement_title = '$announcement_title', announcment_description = '$announcement_description', announcement_type = '$announcement_type' where announcement_id = '$aid'");
	
if($insert_into){
	header("location: ../../announcement.php");
}

}






 

}

?>
