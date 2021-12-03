var churchApp = angular.module('churchApp', []);

churchApp.controller('churchAppCtrl', ['$scope', '$http', function ($scope, $http) {


$scope.announcementModal = function(){

$("#addAnnouncement").modal("show");

}


$scope.closeAnnounce = function(){
	$("#addAnnouncement").modal("hide");
}


$scope.doneAnn = function(x){
	var done_warning = confirm("are you sure you want to mark this as done?");

if(done_warning){

	$http({
		method: 'post',
		url: 'php_script/announcement/doneAnn.php',
		data: x

	}).then(function(){
		location.reload();

	});

}else{

}

}


}]);