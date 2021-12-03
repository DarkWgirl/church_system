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
    <script src="assets/js/church_system.js"></script>

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
          <div class="col-9">
             <div style="margin-top: 20%; margin-bottom: 10%; margin-left: 10%;">
        <!--Table-->
<h3 class="my-header-white">Member List</h3>
                  <table class="table table-bordered">
    <thead class="table-dark">
        <th>Member Name</th>

         <th>Role</th>
          <th>Level</th>
         <th>Email</th>
           <th>Mobile</th>
           <th>
            <select ng-model="member_form.status" ng-change="searchViaStatusMember(member_form)">
              <option value="" disabled>Status</option>
              <option value="ACTIVE">ACTIVE</option>
              <option value="ARCHIVE">ARCHIVE</option>
            </select>
           </th>
              <th>Action</th>
    </thead>
    <tbody data-ng-init="getActiveMember()">

      <tr ng-repeat="active in activeMember">
        <td>{{active.fullname}}</td>
        <td>{{active.user_role}}</td>
        <td>{{active.user_level}}</td>
        <td>{{active.user_email}}</td>
        <td>{{active.user_mobile}}</td>
        <td>{{active.user_status}}</td>
          <td><a href="#" class="btn btn-success" style="width: 100px;" ng-click="editMember(active)">Edit</a>
            <a href="#" class="btn btn-warning" style="width: 100px; display: {{active.archive_btn}}" ng-click="archiveMember(active)">Archive</a>
            <a href="#" class="btn btn-primary" style="width: 100px; display: {{active.activate_btn}}" ng-click="activateMem(active)">Activate</a></td>
      </tr>
    </tbody>
  </table>
  <a href="" class="btn btn-warning" ng-click="addMemberForm()">Add Member</a>
</div>
</div>




<div class="modal fade" id="editMember" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Member Details</h5>
      </div>
      <div class="modal-body">

        <form method="POST" ng-submit="updateMember(edit_member_form)"> 

            <div class="row">
              <div class="col-6">
          <div class="form-group">
            <label class="my-schedule-label">Member First Name</label>
         <input type="text" ng-model="edit_member_form.user_fname" class="form-control" placeholder="Member First Name" required>
       </div>
     </div>  

     <div class="col-6">
        <div class="form-group">
                <label class="my-schedule-label">Member Last Name</label>
              <input type="text" ng-model="edit_member_form.user_lname" class="form-control" placeholder="Member Last Name" required>
            </div>
          </div>
        </div><br>


              <div class="form-group">
                <label class="my-schedule-label">Member Email</label>
               <input type="email" ng-model="edit_member_form.user_email" class="form-control" placeholder="Member Email" required>
             </div><br>



                <div class="form-group">
                  <label class="my-schedule-label">Member Mobile</label>
               <input type="text" ng-model="edit_member_form.user_mobile" class="form-control" placeholder="Member Mobile" required>
             </div><br>


            <div class="row">
              <div class="col-6">


                  <div class="form-group">
                  <label class="my-schedule-label">Member Role</label>

                  <select class="form-control" ng-model="edit_member_form.user_role" required>
                 <option selected disabled value="">Role</option>
                 <option value="Head Pastor">Head Pastor</option>
                 <option value="Pastor">Pastor</option>
                 <option value="Church Secretary">Church Secretary</option>
                 <option value="Treasurer">Treasurer</option>
                 <option value="Church Auditor">Church Auditor</option>
                 <option value="Financial Secretary">Financial Secretary</option>
                 <option value="Deaconess">Deaconess</option>
                 <option value="Deacon">Deaconess</option>
                  <option value="Choir Conductress">Choir Conductress</option>
                  <option value="Other Role">Other Role</option>
                 </select>
               </div>
             </div>


              <div class="col-6">

                 <div class="form-group">
                  <label class="my-schedule-label">Acoount Level</label>
               <select class="form-control" ng-model="edit_member_form.user_level" required>
                 <option selected disabled value="">User Level</option>
                 <option value="Admin">Admin</option>
                 <option value="Member">Member</option>
               </select>
             </div>
           </div>
         </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" ng-click="closeEditMem()">Close</button>
        <button type="submit" class="btn btn-success my-btn">Update Member</button>
      </div>
    </form>

  </div>
</div>
</div>
</div>








<div class="modal fade" id="addMemberForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Member Details</h5>
      </div>
      <div class="modal-body">

        <form method="POST" ng-submit="addMember(member_form)"> 

            <div class="row">
              <div class="col-6">
          <div class="form-group">
            <label class="my-schedule-label">Member First Name</label>
         <input type="text" ng-model="member_form.fname" class="form-control" placeholder="Member First Name" required>
       </div>
     </div>  

     <div class="col-6">
        <div class="form-group">
                <label class="my-schedule-label">Member Last Name</label>
              <input type="text" ng-model="member_form.lname" class="form-control" placeholder="Member Last Name" required>
            </div>
          </div>
        </div><br>


              <div class="form-group">
                <label class="my-schedule-label">Member Email</label>
               <input type="email" ng-model="member_form.email" class="form-control" placeholder="Member Email" required>
             </div><br>



                <div class="form-group">
                  <label class="my-schedule-label">Member Mobile</label>
               <input type="text" ng-model="member_form.mobile" class="form-control" placeholder="Member Mobile" required>
             </div><br>


            <div class="row">

               <div class="col-6">

                  <div class="form-group">
                  <label class="my-schedule-label">Member Role</label>

                  <select class="form-control" ng-model="member_form.role" required>
                 <option selected disabled value="">Role</option>
                 <option value="Head Pastor">Head Pastor</option>
                 <option value="Church Secretary">Church Secretary</option>
                 <option value="Treasurer">Treasurer</option>
                 <option value="Church Auditor">Church Auditor</option>
                 <option value="Financial Secretary">Financial Secretary</option>
                 <option value="Deaconess">Deaconess</option>
                 <option value="Deacon">Deaconess</option>
                  <option value="Choir Conductress">Choir Conductress</option>
                  <option value="Other Role">Other Role</option>
                 </select>
               </div>
             </div>


              <div class="col-6">

                 <div class="form-group">
                  <label class="my-schedule-label">Acoount Level</label>
               <select class="form-control" ng-model="member_form.level" required>
                 <option selected disabled value="">User Level</option>
                 <option value="Admin">Admin</option>
                 <option value="Member">Member</option>
               </select>
             </div>
           </div>
         </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" ng-click="closeAddEm()">Close</button>
        <button type="submit" class="btn btn-success my-btn">Add Member</button>
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
