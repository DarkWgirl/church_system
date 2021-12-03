<?php
session_start();
if(isset($_SESSION['login'])){

}else{
  header("location: login.php");
}


?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Church Management</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/sticky-footer-navbar.css" rel="stylesheet">
        <link href="assets/css/church.css" rel="stylesheet">
    <script src="assets/js/angular.js"></script>
    <script src="assets/js/service.js"></script>

  </head>
  <body>
    <div ng-app="churchApp" ng-controller="churchAppCtrl">

    <header>
      <!-- Fixed navbar -->
      
      <nav class="navbar navbar-expand-md my-navbar fixed-top">
        <div class="container">
          <img src="assets/logo.png" width="100">
        <a class="navbar-brand my-navbar-item" href="#">Church management</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
           <li class="nav-item">
              <a class="nav-link my-navbar-item" href="dashboard.php">Member</a>
            </li>
                    <li class="nav-item my-navbar-item">
              <a class="nav-link my-navbar-item" href="schedule.php">Schedule</a>
            </li>
                            <li class="nav-item my-navbar-item">
              <a class="nav-link my-navbar-item" href="service.php">Service</a>
            </li>
                       <li class="nav-item my-navbar-item">
              <a class="nav-link my-navbar-item" href="announcement.php">Announcement</a>
            </li>
                               <li class="nav-item my-navbar-item">
              <a class="nav-link my-navbar-item" href="finance.php">Finance</a>
            </li>
                   
                   <li class="nav-item my-navbar-item">
              <a class="nav-link my-navbar-item" href="donation_dashboard.php">Donation</a>
            </li>
                     <li class="nav-item my-navbar-item">
              <a class="nav-link my-navbar-item" href="prayer_request_dashboard.php">Prayer Request</a>
            </li>
  
          </ul>
        </div> <ul class="navbar-nav mr-auto">
           <li class="nav-item my-navbar-item">
        <a href="logout.php" class="float-right nav-link my-navbar-item">logout</a>
      </li>
    </ul>
      </div>
      </nav>
   
    </header>

    <!-- Begin page content -->
     <main role="main" class="container">

 

          <div class="col-10">
             <div style="margin-top: 10%; margin-bottom: 10%; margin-left: 10%;">
        <!--Table-->
<h3 class="my-header-white">Service List</h3>
                  <table class="table table-bordered">
    <thead class="table-dark">
        <th>Shedule</th>
         <th>Date</th>
         <th>Details</th>
           <th>
            <select ng-model="service_form.status" ng-change="searchViaStatusServ(service_form)">
              <option value="" disabled>Status</option>
              <option value="PENDING">PENDING</option>
              <option value="ON-GOING">ON-GOING</option>
              <option value="DONE">DONE</option>
              <option value="ARCHIVE">ARCHIVE</option>
            </select>
           </th>
           <th>Link</th>
           <th>Fascilitator</th>
              <th>Action</th>

    </thead>
    <tbody data-ng-init="pendingService()">

      <tr ng-repeat="service in service_data">
    <td>{{service.service_title}}</td>
        <td>From: <br>{{service.fromDate}}<br>To: <br>{{service.toDate}}</td>
                 <td>{{service.service_description}}</td>
                 <td>{{service.service_status}}</td>
                 <td style="word-wrap: break-word;min-width: 160px;max-width: 160px;"><a href="{{service.service_link}}" target="_blank">{{service.service_link}}</a></td>
                 <td>{{service.fullname}}</td>
                    <td><a href="#" class="btn btn-success" style="width: 100px; display: {{service.edit_btn}}"ng-click="editService(service)">Edit</a>
            <a href="#" class="btn btn-warning" style="width: 100px; display: {{service.archive_btn}}" ng-click="archiveService(service)">Archive</a>

          </td>
      </tr>
    </tbody>
  </table>
  <a href="" class="btn btn-warning" ng-click="serviceModal()">Add Service</a>
</div>
</div>




<div class="modal fade" id="addService" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Service</h5>
      </div>
      <div class="modal-body">

        <form method="POST" ng-submit="addService(service_form)"> 


              <div class="form-group">
          <label class="my-service-label">Service Title:</label>
         <input type="text" ng-model="service_form.service_title" class="form-control" placeholder="Service Title" required>
       </div><br>

           <div class="form-group">
         <label class="my-service-label">Service Description:</label>
         <input type="text" ng-model="service_form.service_description" class="form-control" placeholder="Service Description" required>
       </div><br>

               <div class="form-group">
                  <label class="my-schedule-label">Member/Fascilitator</label>
                  <select class="form-control" ng-model="service_form.user_id" required>
                    <option value="" selected disabled>Member/Fascilitator</option>
                    <option ng-repeat="member in activeMember" value="{{member.user_id}}">{{member.fullname}}</option>
                 </select>
               </div><br>


           <div class="form-group">
         <label class="my-service-label">Service Link:</label>
         <input type="text" ng-model="service_form.service_link" class="form-control" placeholder="Service Description" required>
       </div><br>

             <div class="form-group">
              <div class="row">
                <div class="col-5">
                             <label class="my-service-label">Service Start Date:</label>
          <input type="text" ng-model="service_form.service_start" class="form-control" placeholder="Service Start Date" required onfocus="(this.type='datetime-local')">
                </div>
                  <div class="col-5">
                             <label class="my-service-label">Service End Date:</label>
          <input type="text" ng-model="service_form.service_end" class="form-control" placeholder="Service End Date" required onfocus="(this.type='datetime-local')">
                </div>
                  </div>
        </div><br>


      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" ng-click="closeAddServ()">Close</button>
        <button type="submit" class="btn btn-success my-btn">Add Service</button>
      </div>
    </form>

  </div>
</div>
</div>
</div>



<div class="modal fade" id="editService" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Service</h5>
      </div>
      <div class="modal-body">

        <form method="POST" ng-submit="updateService(edit_serv_form)"> 


              <div class="form-group">
          <label class="my-service-label">Service Title:</label>
         <input type="text" ng-model="edit_serv_form.service_title" class="form-control" placeholder="Service Title" required>
       </div><br>

           <div class="form-group">
         <label class="my-service-label">Service Description:</label>
         <input type="text" ng-model="edit_serv_form.service_description" class="form-control" placeholder="Service Description" required>
       </div><br>

               <div class="form-group">
                  <label class="my-schedule-label">Member/Fascilitator</label>
                  <select class="form-control" ng-model="edit_serv_form.user_id" required>
                    <option value="" selected disabled>Member/Fascilitator</option>
                    <option ng-repeat="member in activeMember" value="{{member.user_id}}">{{member.fullname}}</option>
                 </select>
               </div><br>


           <div class="form-group">
         <label class="my-service-label">Service Link:</label>
         <input type="text" ng-model="edit_serv_form.service_link" class="form-control" placeholder="Service Description" required>
       </div><br>

             <div class="form-group">
              <div class="row">
                <div class="col-5">
                             <label class="my-service-label">Service Start Date:</label>
          <input type="text" ng-model="edit_serv_form.service_start" class="form-control" placeholder="Service Start Date" required onfocus="(this.type='datetime-local')">
                </div>
                  <div class="col-5">
                             <label class="my-service-label">Service End Date:</label>
          <input type="text" ng-model="edit_serv_form.service_end" class="form-control" placeholder="Service End Date" required onfocus="(this.type='datetime-local')">
                </div>
                  </div>
        </div><br>


      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" ng-click="closeEditServ()">Close</button>
        <button type="submit" class="btn btn-success my-btn">Update Service</button>
      </div>
    </form>

  </div>
</div>
</div>
</div>


    </main>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </div>
        <footer class="footer mt-auto my-footer">
      <div class="container">
        <span class="text-muted">Copyright @2021</span>
      </div>
    </footer>
  </body>

</html>
