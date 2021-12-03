<?php
$web_server = "localhost";
$web_username = "root";
$web_passsword = "";
$web_db = "church_db";

$web_db = mysqli_connect($web_server, $web_username, $web_passsword, $web_db);

date_default_timezone_set('Asia/Manila');

$dateToday = date('Y-m-d');
$dateTodayT = date('Y-m-d H:i:s');
$timeToday = date('G:i:s', strtotime($dateTodayT));

$get_pending_service = mysqli_query($web_db, "SELECT * from service_tbl");


while($rowr = mysqli_fetch_array($get_pending_service)){
	$sssid = $rowr['service_id'];

$fromDater = date('Y-m-d', strtotime($rowr['service_start']));
$toDater = date('Y-m-d', strtotime($rowr['service_end']));

$timeStartr = date('G:i:s', strtotime($rowr['service_start']));
$timeEndr = date('G:i:s', strtotime($rowr['service_end']));


if($rowr['service_status'] == "DONE" || $rowr['service_status'] == "ARCHIVE"){

}else{

	if($fromDater == $dateToday){


	if($timeToday == $timeStartr){



		$update_service = mysqli_query($web_db, "UPDATE service_tbl set service_status = 'ON-GOING' where service_id = '$sssid'");


	}else if($timeToday > $timeStartr && $timeToday < $timeEndr){

				$update_service = mysqli_query($web_db, "UPDATE service_tbl set service_status = 'ON-GOING' where service_id = '$sssid'");

	}
	else if($timeToday > $timeEndr){

				$update_service = mysqli_query($web_db, "UPDATE service_tbl set service_status = 'DONE' where service_id = '$sssid'");

	}

}elseif ($dateToday > $fromDater && $dateToday > $toDater) {

				$update_service = mysqli_query($web_db, "UPDATE service_tbl set service_status = 'DONE' where service_id = '$sssid'");

}

}
}







$currentPending = mysqli_query($web_db, "SELECT * from schedule_tbl");


while($r = mysqli_fetch_array($currentPending)){

	$fromDate = date('Y-m-d', strtotime($r['schedule_startDate']));
	$toDate = date('Y-m-d', strtotime($r['schedule_endDate']));

		$timeFrom = date('G:i:s', strtotime($r['schedule_timeStart']));
	$timeTo = date('G:i:s', strtotime($r['schedule_timeEnd']));

if($r['schedule_status'] == "DONE" || $r['schedule_status'] == "ARCHIVE"){

}else{




	$ssid = $r['schedule_id'];

if($fromDate == $dateToday){

	if($timeToday == $timeFrom){



		$update_schedule = mysqli_query($web_db, "UPDATE schedule_tbl set schedule_status = 'ON-GOING' where schedule_id = '$ssid'");


	}else if($timeToday > $timeFrom && $timeToday < $timeTo){

				$update_schedule = mysqli_query($web_db, "UPDATE schedule_tbl set schedule_status = 'ON-GOING' where schedule_id = '$ssid'");

	}
	else if($timeToday > $timeTo){

				$update_schedule = mysqli_query($web_db, "UPDATE schedule_tbl set schedule_status = 'DONE' where schedule_id = '$ssid'");

	}

}elseif ($dateToday > $fromDate && $dateToday > $toDate) {

				$update_schedule = mysqli_query($web_db, "UPDATE schedule_tbl set schedule_status = 'DONE' where schedule_id = '$ssid'");

}






}


}











?>