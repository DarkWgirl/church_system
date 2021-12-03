var churchApp = angular.module('churchApp', []);

churchApp.controller('churchAppCtrl', ['$scope', '$http', function ($scope, $http) {

var member_form = {};



$scope.addMember = function(member_form){
	var add_warning  = confirm("Are you sure you want to Add this member?");
	if(add_warning){

		$http({
			method: 'post',
			url: 'php_script/addMember.php',
			data: member_form

		}).then(function(){
		location.href = "http://localhost/church_system/dashboard.php";
		});

	}else{
		alert("Cancelled!");
	}



}


$scope.closeAddEm = function(){
		$("#addMemberForm").modal("hide");
}


$scope.addMemberForm = function(){
	$("#addMemberForm").modal("show");
}



$scope.getActiveMember = function(){
	$http({
		method: 'get',
		url: 'php_script/getActiveMember.php'

	}).then(function(data){
		$scope.activeMember = data.data;

	});
}



$scope.editMember = function(active){
		var temp_con = {};
  angular.copy(active, temp_con);
  $scope.edit_member_form = temp_con;
  $("#editMember").modal("show");

}


$scope.closeEditMem = function(){
	$("#editMember").modal("hide");
}


$scope.updateMember = function(edit_member_form){
	var update_mem = confirm("Are you sure you want to Update this Member details?");
	if(update_mem){
	$http({
		method: 'post',
		url:  'php_script/editMember.php',
		data: edit_member_form

	}).then(function(){
	location.reload();
	});
	}else{
			$("#editMember").modal("hide");
	}

}

$scope.archiveMember = function(active){
	var archive_mem = confirm("Are you sure you want to Archive this Member?");

	if(archive_mem){
	$http({

		method: 'post',
		url: 'php_script/archiveMember.php',
		data: active

	}).then(function(){
		location.reload();

	});
		$http({

		method: 'post',
		url: 'php_script/archiveEmail.php',
		data: active

	});
	}else{
	alert("Cancelled!");

	}
}





$scope.searchViaStatusMember = function(member_form){
	$http({
		method: 'post',
		url: 'php_script/searchViaStatusMember.php',
		data: member_form

	}).then(function(data){
$scope.activeMember = data.data;
	});
}


$scope.activateMem = function(active){
	var activate_mem = confirm("Are you sure you want to re-activate this Member?");

	if(activate_mem){
	$http({

		method: 'post',
		url: 'php_script/activateMember.php',
		data: active

	}).then(function(){
		location.reload();

	});
		$http({

		method: 'post',
		url: 'php_script/activateEmail.php',
		data: active

	});
	}else{
	alert("Cancelled!");

	}
}


$scope.scheduleModal =  function(){
	$("#addSchedule").modal("show");
}

$scope.closeAddSched = function(){
	$("#addSchedule").modal("hide");
}


}]);