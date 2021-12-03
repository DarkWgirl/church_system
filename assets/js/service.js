var churchApp = angular.module('churchApp', []);

churchApp.controller('churchAppCtrl', ['$scope', '$http', function ($scope, $http) {

var service_form = {};



$scope.serviceModal =  function(){
	$("#addService").modal("show");
		$http({
		method: 'get',
		url: 'php_script/getActiveMember.php'

	}).then(function(data){
		$scope.activeMember = data.data;
	});
}

$scope.closeAddServ = function(){
	$("#addService").modal("hide");
}

$scope.closeEditServ = function(){
	$("#editService").modal("hide");
}


$scope.addService = function(service_form){

	var add_warning = confirm("Are you sure you want to add this service?");

	if(add_warning){
	$http({
		method: 'post',
		url: 'php_script/schedule/assignNotification.php',
		data: service_form

	});

	$http({
		method: 'post',
		url: 'php_script/service/addService.php',
		data: service_form

	}).then(function(){
		location.reload();

	});


	}else{
		alert("Cancelled!");
	}
}

$scope.pendingService = function(){
	$http({
	method: 'get',
	url: 'php_script/service/pendingService.php'
	}).then(function(data){
	$scope.service_data = data.data;
	});
}


$scope.editService = function(service){
var temp_serv = {};
  angular.copy(service, temp_serv);
  $scope.edit_serv_form = temp_serv;
$("#editService").modal("show");

		$http({
		method: 'get',
		url: 'php_script/getActiveMember.php'

	}).then(function(data){
		$scope.activeMember = data.data;
	});

}


$scope.updateService = function(edit_serv_form){
	var update_warning = confirm("Are you sure you want to update this service?");

	if(update_warning){
		$http({
		method: 'post',
		url: 'php_script/service/editService.php',
		data: edit_serv_form
		}).then(function(){
		location.reload();
		});

	}else{
	alert("Cancelled!");
	$("#editService").modal("hide");
	}
}


$scope.archiveService = function(service){
var archive_warning = confirm("Are you sure you want to archive this service?");

if(archive_warning){
	$http({
		method: 'post',
		url: 'php_script/service/archiveService.php',
		data: service

	}).then(function(){
		location.reload();

	});

}else{
	alert("Cancelled!");

}

}





$scope.searchViaStatusServ = function(service_form){
	$http({
		method: 'post',
		url: 'php_script/service/viaStatusServ.php',
		data: service_form

	}).then(function(data){

	$scope.service_data = data.data;			
	});
}


}]);