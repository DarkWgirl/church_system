var churchApp = angular.module('churchApp', []);

churchApp.controller('churchAppCtrl', ['$scope', '$http', function ($scope, $http) {

var service_form = {};
var donation_form = {};
var customer_form = {};



$scope.getPendingPrayerRequest = function(){
	$http({
		method: 'get',
		url: 'php_script/customer/pendingPrayerRequest.php'

	}).then(function(data){
		$scope.requests = data.data;

	});
}


$scope.acceptRequest = function(request){
	$http({
		method: 'post',
		url: 'php_script/customer/acceptPrayerRequest.php',
		data: request

	}).then(function(){

		location.reload();

	});
}


$scope.declinedRequest = function(request){
	$http({
		method: 'post',
		url: 'php_script/customer/declinedPrayerRequest.php',
		data: request

	}).then(function(){

		location.reload();

	});
}







$scope.pendingSchedule = function(){
	$http({
	method: 'get',
	url: 'php_script/schedule/pendingSchedule.php'
	}).then(function(data){
	$scope.schedule_data = data.data;
	});
}


$scope.closePrayerRequestForm = function(){
		$("#prayer_request_form").modal("hide");
}



$scope.prayerRequestForm = function(){
	$("#prayer_request_form").modal("show");
}



$scope.submitPrayerRequest = function(customer_form){
const request_prayer = confirm("Are you sure you want to submit a prayer request?");
if(request_prayer){

$http({
method: 'post',
url: 'php_script/customer/addPrayerrequest.php',
data: customer_form

}).then(function(){
location.reload();
});


}else{
	alert("Cancelled!");
}
}



$scope.getAnnouncement = function(){
	$http({
		method: 'get',
		url: 'php_script/customer/announcement.php'

	}).then(function(data){
	$scope.ann = data.data;
	});
}


$scope.announcement_page = function(){
	$http({
		method: 'get',
		url: 'php_script/customer/announcement_count.php'

	}).then(function(data){
		$scope.announcement_count = data.data;
	});
}


$scope.getAnnouncementPage = function(page){

$http({
	method: 'post',
	url: 'php_script/customer/announcement_select_page.php',
	data: page

}).then(function(data){
	$scope.ann = data.data;

});

}

$scope.dForm = function(){
	$("#addDonation").modal("show");
}
$scope.OForm = function(){
	$("#addOfferring").modal("show");
}

$scope.TForm = function(){
	$("#addTithes").modal("show");
}

$scope.closeAddDonation = function(){
		$("#addDonation").modal("hide");

}

$scope.closeAddOffering = function(){
		$("#addOfferring").modal("hide");

}

$scope.closeAddTithes = function(){
		$("#addTithes").modal("hide");

}


$scope.addDonation = function(donation_form){
	var donation_warning = confirm("Are you want to donate this amount?");

	if(donation_warning){
	$http({
		method: 'post',
		url: 'php_script/customer/addDonation.php',
		data: donation_form

	}).then(function(){
	location.reload();
	});
	}else{
		alert("Cancelled!");
	}
}


$scope.addOffering = function(donation_form){
	var donation_warning = confirm("Are you want to donate this amount?");

	if(donation_warning){
	$http({
		method: 'post',
		url: 'php_script/customer/addOffering.php',
		data: donation_form

	}).then(function(){
	location.reload();
	});
	}else{
		alert("Cancelled!");
	}
}

$scope.addTithes = function(donation_form){
	var donation_warning = confirm("Are you want to donate this amount?");

	if(donation_warning){
	$http({
		method: 'post',
		url: 'php_script/customer/addTithes.php',
		data: donation_form

	}).then(function(){
		var message = alert("Tithes submitted successfully!");
	
		$scope.closeAddTithes();
		
	});
	}else{
		alert("Cancelled!");
	}
}


}]);