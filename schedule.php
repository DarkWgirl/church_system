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
    <script src="assets/js/schedule.js"></script>

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
             <div style="margin-top: 15%; margin-bottom: 10%; margin-left: 10%;">
        <!--Table-->
<h3 class="my-header-white">Schedule List</h3>
                  <table class="table table-bordered">
    <thead class="table-dark">
        <th>Shedule</th>
         <th>Date</th>
          <th>Time</th>
         <th>Details</th>
           <th>
            <select ng-model="schedule_form.status" ng-change="searchViaStatusSched(schedule_form)">
              <option value="" disabled>Status</option>
              <option value="PENDING">PENDING</option>
              <option value="ON-GOING">ON-GOING</option>
              <option value="DONE">DONE</option>
            </select>
           </th>
           <th>Schedule Code</th>
              <th>Action</th>
    </thead>
    <tbody data-ng-init="pendingSchedule()">

      <tr ng-repeat="schedule in schedule_data">
    <td>{{schedule.schedule_title}}</td>
        <td>From: <br>{{schedule.fromDate}}<br>To: <br>{{schedule.toDate}}</td>
           <td>From: <br>{{schedule.timeFrom}}<br>To: <br>{{schedule.timeTo}}</td>
                 <td>{{schedule.schedule_description}}</td>
                 <td>{{schedule.schedule_status}}</td>
                  <td>{{schedule.schedule_code}}</td>
                    <td><a href="#" class="btn btn-success" style="width: 100px; display: {{schedule.edit_btn}}"ng-click="editSchedule(schedule)">Edit</a>
            <a href="#" class="btn btn-warning" style="width: 100px; display: {{schedule.archive_btn}}" ng-click="archiveSchedule(schedule)">Archive</a>
            <a href="#" class="btn btn-success" style="width: 100px; display: {{schedule.archive_btn}}" ng-click="assignSchedule(schedule)">Assign</a>

          </td>
      </tr>
    </tbody>
  </table>
  <a href="" class="btn btn-warning" ng-click="scheduleModal()">Add Schedule</a> <a href="assigned.php" class="btn btn-warning">See Assigned Members</a>
</div>
</div>




<div class="modal fade" id="addSchedule" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Schedule</h5>
      </div>
      <div class="modal-body">

        <form method="POST" ng-submit="addSchedule(schedule_form)"> 


              <div class="form-group">
          <label class="my-schedule-label">Schedule Title:</label>
         <input type="text" ng-model="schedule_form.schedule_title" class="form-control" placeholder="Schedule Title" required>
       </div><br>

           <div class="form-group">
         <label class="my-schedule-label">Schedule Description:</label>
         <input type="text" ng-model="schedule_form.schedule_description" class="form-control" placeholder="Schedule Description" required>
       </div><br>

             <div class="form-group">
              <div class="row">
                <div class="col-5">
                             <label class="my-schedule-label">Schedule Start Date:</label>
          <input type="text" ng-model="schedule_form.schedule_startDate" class="form-control" placeholder="Schedule Start Date" required onfocus="(this.type='date')">
                </div>
                  <div class="col-5">
                             <label class="my-schedule-label">Schedule End Date:</label>
          <input type="text" ng-model="schedule_form.schedule_endDate" class="form-control" placeholder="Schedule End Date" required onfocus="(this.type='date')">
                </div>
                  </div>
        </div><br>

                     <div class="form-group">
              <div class="row">
                <div class="col-5">
                             <label class="my-schedule-label">Schedule Start Time:</label>
          <input type="text" ng-model="schedule_form.schedule_startTime" class="form-control" placeholder="Schedule Start Time" required onfocus="(this.type='time')">
                </div>
                  <div class="col-5">
                             <label class="my-schedule-label">Schedule End Time:</label>
          <input type="text" ng-model="schedule_form.schedule_endTime" class="form-control" placeholder="Schedule End Time" required onfocus="(this.type='time')">
                </div>
                  </div>
        </div><br>


      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" ng-click="closeAddSched()">Close</button>
        <button type="submit" class="btn btn-success my-btn">Add Schedule</button>
      </div>
    </form>

  </div>
</div>
</div>
</div>


<div class="modal fade" id="editSchedule" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Schedule</h5>
      </div>
      <div class="modal-body">

        <form method="POST" ng-submit="updateSchedule(edit_sched_form)"> 


              <div class="form-group">
          <label class="my-schedule-label">Schedule Title:</label>
         <input type="text" ng-model="edit_sched_form.schedule_title" class="form-control" placeholder="Schedule Title" required>
       </div><br>

           <div class="form-group">
         <label class="my-schedule-label">Schedule Description:</label>
         <input type="text" ng-model="edit_sched_form.schedule_description" class="form-control" placeholder="Schedule Description" required>
       </div><br>

             <div class="form-group">
              <div class="row">
                <div class="col-5">
                             <label class="my-schedule-label">Schedule Start Date:</label>
          <input type="text" ng-model="edit_sched_form.schedule_startDate" class="form-control" placeholder="Schedule Start Date" required onfocus="(this.type='date')">
                </div>
                  <div class="col-5">
                             <label class="my-schedule-label">Schedule End Date:</label>
          <input type="text" ng-model="edit_sched_form.schedule_endDate" class="form-control" placeholder="Schedule End Date" required onfocus="(this.type='date')">
                </div>
                  </div>
        </div><br>

                     <div class="form-group">
              <div class="row">
                <div class="col-5">
                             <label class="my-schedule-label">Schedule Start Time:</label>
          <input type="text" ng-model="edit_sched_form.schedule_timeStart" class="form-control" placeholder="Schedule Start Time" required onfocus="(this.type='time')">
                </div>
                  <div class="col-5">
                             <label class="my-schedule-label">Schedule End Time:</label>
          <input type="text" ng-model="edit_sched_form.schedule_timeEnd" class="form-control" placeholder="Schedule End Time" required onfocus="(this.type='time')">
                </div>
                  </div>
        </div><br>


      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" ng-click="closeEditSched()">Close</button>
        <button type="submit" class="btn btn-success my-btn">Update Schedule</button>
      </div>
    </form>

  </div>
</div>
</div>
</div>



<div class="modal fade" id="assignMember" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Assign Member: {{assign_form.schedule_code}}</h5>
      </div>
      <div class="modal-body">

    <form method="POST" ng-submit="assignMember(assign_form)">

            <div class="form-group">
                  <label class="my-schedule-label">Member</label>
                  <select class="form-control" ng-model="assign_form.user_id" required>
                    <option value="" selected disabled>Member</option>
                    <option ng-repeat="member in activeMember" value="{{member.user_id}}">{{member.fullname}}</option>
                 </select>
               </div>

                   <div class="form-group">
                  <label class="my-schedule-label">Other Role</label>
                  <input type="text" class="form-control" ng-model="assign_form.other_role" placeholder="Other Role">
                </div>

                   <div class="modal-footer">
        <button type="button" class="btn btn-secondary" ng-click="closeAssign()">Close</button>
        <button type="submit" class="btn btn-success my-btn">Assign Member</button>
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
