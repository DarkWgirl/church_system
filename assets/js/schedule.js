var churchApp = angular.module('churchApp', []);

churchApp.controller('churchAppCtrl', ['$scope', '$http', function ($scope, $http) {

var schedule_form = {};


$scope.getActiveMember = function(){
	$http({
		method: 'get',
		url: 'php_script/getActiveMember.php'

	}).then(function(data){
		$scope.activeMember = data.data;

	});
}


$scope.scheduleModal =  function(){
	$("#addSchedule").modal("show");
}

$scope.closeAddSched = function(){
	$("#addSchedule").modal("hide");
}

$scope.closeEditSched = function(){
	$("#editSchedule").modal("hide");
}


$scope.addSchedule = function(schedule_form){

	var add_warning = confirm("Are you sure you want to add this Schedule?");

	if(add_warning){

	$http({
		method: 'post',
		url: 'php_script/schedule/addSchedule.php',
		data: schedule_form

	}).then(function(){
		location.reload();

	});


	}else{
		alert("Cancelled!");
	}
}

$scope.pendingSchedule = function(){
	$http({
	method: 'get',
	url: 'php_script/schedule/pendingSchedule.php'
	}).then(function(data){
	$scope.schedule_data = data.data;
	});
}

$scope.pendingAssignment = function(){
	$http({
	method: 'get',
	url: 'php_script/schedule/getActiveAssigned.php'
	}).then(function(data){
	$scope.schedule_assign = data.data;
	});
}


$scope.editSchedule = function(schedule){
var temp_sched = {};
  angular.copy(schedule, temp_sched);
  $scope.edit_sched_form = temp_sched;
$("#editSchedule").modal("show");

}


$scope.updateSchedule = function(edit_sched_form){
	var update_warning = confirm("Are you sure you want to update this Schedule?");

	if(update_warning){
		$http({
		method: 'post',
		url: 'php_script/schedule/editSchedule.php',
		data: edit_sched_form
		}).then(function(){
		location.reload();
		});

	}else{
	alert("Cancelled!");
	$("#editSchedule").modal("hide");
	}
}


$scope.archiveSchedule = function(schedule){
var archive_warning = confirm("Are you sure you want to archive this Schedule?");

if(archive_warning){
	$http({
		method: 'post',
		url: 'php_script/schedule/archiveSchedule.php',
		data: schedule

	}).then(function(){
		location.reload();

	});

}else{
	alert("Cancelled!");

}

}



$scope.assignSchedule = function(schedule){

	var temp_assign = {};
  angular.copy(schedule, temp_assign);
  $scope.assign_form = temp_assign;

$("#assignMember").modal("show");

	$http({
		method: 'get',
		url: 'php_script/getActiveMember.php'

	}).then(function(data){
		$scope.activeMember = data.data;
	});

}



$scope.assignMember = function(assign_form){
	var assign_warning = confirm("Are you sure you want to assign this Member?");

	if(assign_warning){
		$http({
			method: 'post',
			url: 'php_script/schedule/assignMember.php',
			data: assign_form

		}).then(function(data){
			$scope.trial = data.data;
			var assign_output = data.data;
			if(assign_output == "Invalid"){

				alert("Member Already Assigned In an Activity, Please coordinate with the member and re-monitor the upcoming activity");
				$("#assignMember").modal("hide");

			}else if(assign_output == "Success"){
				alert("Successfully Assigned!");


					$http({
			method: 'post',
			url: 'php_script/schedule/assignSchedule.php',
			data: assign_form

		});
			location.reload();			
			}
		});

	}else{
		alert("Cancelled!");
		$("#assignMember").modal("hide");

	}
}


$scope.closeAssign = function(){
	$("#assignMember").modal("hide");

}


$scope.searchViaStatusSched = function(schedule_form){
	$http({
		method: 'post',
		url: 'php_script/schedule/viaStatusSched.php',
		data: schedule_form

	}).then(function(data){

	$scope.schedule_data = data.data;			
	});
}



$scope.removeFromSched = function(schedule){
var remove_member = confirm("Are you sure you want to remove this member from schedule?");
if(remove_member){

	$http({
method: 'post',
url: 'php_script/schedule/removeSchedNotif.php',
data: schedule
});
	$http({
method: 'post',
url: 'php_script/schedule/removeAssigned.php',
data: schedule

}).then(function(){
	location.reload();
});



}else{
alert("Cancelled!");
}
}


}]);