<?php
include("../db/db.php");
session_start();


if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
$_SESSION['login'];

echo $check = mysqli_num_rows(mysqli_query($web_db, "SELECT * from superadmin_tbl where username = '$username' AND password = '$password'"));
if($check > 0){
header("location: ../dashboard.php");
$_SESSION['login'] = "true"; 

}else{
	header("loction: ../login.php?message='Invalied Username/Password'");
}


}



?>		