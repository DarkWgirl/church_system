var churchApp = angular.module('churchApp', []);

churchApp.controller('churchAppCtrl', ['$scope', '$http', function ($scope, $http) {

var finance_form = {};



$scope.addFinance = function(finance_form){
	var add_warning = confirm("Are you sure you want to add this detail?");
	if(add_warning){
		$http({
			method: 'post',
			url: 'php_script/finance/addFinance.php',
			data: finance_form

		}).then(function(){
		location.reload();
		});

	}else{
		alert("Cancelled!");
		$("#addFinance").modal("hide");
	}
}



$scope.checktype = function(finance_form){
	var type = finance_form.finance_mode;
	if(type =="Bank"){
	document.getElementById("finance_bank_name").disabled = false;
	}else{
		document.getElementById("finance_bank_name").disabled = true;

	}


}


$scope.checktypeTwo = function(edit_finance_form){
	var type = edit_finance_form.finance_mode;
	if(type =="Bank"){
	document.getElementById("finance_bank_name_tw").disabled = false;
	}else{
		document.getElementById("finance_bank_name_tw").value = "";
		document.getElementById("finance_bank_name_tw").disabled = true;

	}


}







$scope.archiveFinance = function(finance){
	var archive_warning = confirm("Are you sure you want to archive this detail?");
	if(archive_warning){


		$http({
			method: 'post',
			url: 'php_script/finance/archiveFinance.php',
			data: finance

		}).then(function(){
		location.reload();
		});
	}else{
		alert("Cancelled!");
	}
}


$scope.updateFinance = function(edit_finance_form){
	var add_warning = confirm("Are you sure you want to update this detail?");
	if(add_warning){
		$http({
			method: 'post',
			url: 'php_script/finance/updateFinance.php',
			data: edit_finance_form

		}).then(function(){
		location.reload();
		});

	}else{
		alert("Cancelled!");
		$("#editFinance").modal("hide");
	}
}



$scope.addFinanceForm = function(){
	$("#addFinance").modal("show");

}


$scope.editF = function(finance){
	temp_fin = {};
	angular.copy(finance, temp_fin);
	$scope.edit_finance_form = temp_fin;
	if(finance.finance_mode == "Bank"){
			document.getElementById("finance_bank_name_tw").disabled = false;

	}else{
			document.getElementById("finance_bank_name_tw").disabled = true;

	}

$("#editFinance").modal("show");

}



$scope.getActiveFinance = function(){
	$http({
		method: 'get',
		url: 'php_script/finance/getFinance.php'

	}).then(function(data){
		$scope.finance_data = data.data;

	});
}



}]);