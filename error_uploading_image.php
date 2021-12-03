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
    <script src="assets/js/announcement.js"></script>

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
             <div style="margin-top: 25%; margin-bottom: 10%; margin-left: 10%;">
        <!--Table-->
<center><h2 class="my-header-white">Invalid Image File Type, Please try again!</h2></center>  
  
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
  