<?php
include("db/db.php");


$get_announcement = mysqli_query($web_db, "SELECT * from announcement_tbl");

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
    <script src="assets/js/finance.js"></script>

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
<h3 class="my-header-white">Finance</h3>
                  <table class="table table-bordered">
    <thead class="table-dark">
        <th>Type</th>
         <th>Account</th>
                <th>Mode</th>
                     <th>Bank Name</th>
              <th>Action</th>            

    </thead>
    <tbody data-ng-init="getActiveFinance()">
    <tr ng-repeat="finance in finance_data">
      <td>{{finance.finance_type}}</td>
       <td>{{finance.finance_account}}</td>
         <td>{{finance.finance_mode}}</td>
                 <td>{{finance.finance_bank_name}}</td>
         <td><a href="" class="btn btn-success" style="width: 100px;" ng-click="editF(finance)">Edit</a><a href="" class="btn btn-warning" style="width: 100px;" ng-click="archiveFinance(finance)">Archive</a></td>
      
    </tr>
   
   
     
    </tbody>
  </table>
  <a href="" class="btn btn-warning" ng-click="addFinanceForm()">Add Finance</a>
</div>
</div>








<div class="modal fade" id="addFinance" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Finance</h5>
      </div>
      <div class="modal-body">

        <form method="POST" ng-submit="addFinance(finance_form)"> 


           <div class="form-group">
                  <label class="my-schedule-label">Finance Type</label>
                  <select class="form-control" ng-model="finance_form.finance_type" required>
                    <option selected disabled value="">Finance Type</option>
                    <option value="Donation">Donation</option>
                    <option value="Tithes">Tithes</option>
                      <option value="Offering">Offering</option>
                 </select>
               </div>
               <br>
                       <div class="form-group">
                  <label class="my-schedule-label">Finance Account</label>
                  <input type="text" class="form-control" ng-model="finance_form.finance_account" placeholder="Finance Account">
                </div><br>
                         <div class="form-group">
                  <label class="my-schedule-label">Bank Name</label>
                  <input type="text" class="form-control" id="finance_bank_name" ng-model="finance_form.finance_bank_name" disabled value="" placeholder="Finance Bank Name">
                </div><br>
                        <div class="form-group">
                  <label class="my-schedule-label">Finance Mode</label>
                  <select class="form-control" ng-model="finance_form.finance_mode" required ng-change="checktype(finance_form)">
                    <option selected disabled value="">Finance Mode</option>
                    <option value="Gcash">Gcash</option>
                          <option value="Bank">Bank</option>
                          <option value="Other">Other</option>
    
    
                 </select>
               </div>
               <br>



      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success my-btn" name="submit">Add Finance</button>
      </div>
    </form>

  </div>
</div>
</div>
</div>



<div class="modal fade" id="editFinance" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Finance</h5>
      </div>
      <div class="modal-body">

        <form method="POST" ng-submit="updateFinance(edit_finance_form)"> 


           <div class="form-group">
                  <label class="my-schedule-label">Finance Type</label>
                  <select class="form-control" ng-model="edit_finance_form.finance_type" required>
                    <option selected disabled value="">Finance Type</option>
                    <option value="Donation">Donation</option>
                    <option value="Tithes">Tithes</option>
                      <option value="Offering">Offering</option>
                 </select>
               </div>
               <br>
                       <div class="form-group">
                  <label class="my-schedule-label">Finance Account</label>
                  <input type="text" class="form-control" ng-model="edit_finance_form.finance_account" placeholder="Finance Account">
                </div><br>
                        <div class="form-group">
                  <label class="my-schedule-label">Bank Name</label>
                  <input type="text" class="form-control" id="finance_bank_name_tw" ng-model="edit_finance_form.finance_bank_name" placeholder="Finance Bank Name">
                </div><br>
                        <div class="form-group">
                  <label class="my-schedule-label">Finance Mode</label>
                  <select class="form-control" ng-model="edit_finance_form.finance_mode" required ng-change="checktypeTwo(edit_finance_form)">
                    <option selected disabled value="">Finance Mode</option>
                    <option value="Gcash">Gcash</option>
                          <option value="Bank">Bank</option>
                          <option value="Other">Other</option>
    
    
                 </select>
               </div>
               <br>



      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success my-btn" name="submit">Update Finance</button>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <footer class="footer mt-auto my-footer">
      <div class="container">
        <span class="text-muted">Copyright @2021</span>
      </div>
    </footer>
  </body>

</html>
  