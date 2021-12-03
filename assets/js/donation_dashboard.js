var churchApp = angular.module('churchApp', []);

churchApp.controller('churchAppCtrl', ['$scope', '$http', function ($scope, $http) {

var finance_form = {};



$scope.reportsForm = function(){
	$("#extractReports").modal("show");
}





$scope.getPendingDonation = function(){
	$http({
		method: 'post',
		url: 'php_script/finance/submitted.php'

	}).then(function(data){
		$scope.submitted = data.data;

	});
}



$scope.getViaType = function(finance_form){
	if(finance_form.type =="ALL"){
		location.reload();

	}else{
			$http({
		method: 'post',
		url: 'php_script/finance/submittedViaType.php',
		data: finance_form

	}).then(function(data){
			$scope.submitted = data.data;


	});

	}
}


$scope.confirmedDonation = function(finance){
	var donation_confirmtaion = confirm("Are you sure you want to confirmed this donation?");
	if(donation_confirmtaion){
		$http({
			method: 'post',
			url: 'php_script/finance/confirmedDonation.php',
			data: finance
		}).then(function(){
		location.reload();
		});
	}else{
		alert("Cancelled!");
	}
}



$scope.declinedDonation = function(finance){
	var donation_declined = confirm("Are you sure you want to declined this donation?");
	if(donation_declined){
		$http({
			method: 'post',
			url: 'php_script/finance/declinedDonation.php',
			data: finance
		}).then(function(){
		location.reload();
		});
	}else{
		alert("Cancelled!");
	}
}




}]);