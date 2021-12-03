<?php
include("db/db.php");

session_start();

if(isset($_SESSION['login'])){


}else{
  header("location: login.php");
}


$get_announcement = mysqli_query($web_db, "SELECT * from announcement_tbl where announcement_status = 'ACTIVE'");


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
        <a class="navbar-brand my-navbar-item" href="#">Church managment</a>
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
<h3 class="my-header-white">Announcement</h3>
                  <table class="table table-bordered">
    <thead class="table-dark">
        <th>Announcement</th>
         <th>Announcement Type</th>
         <th>Announcement Date</th>
              <th>Action</th>            

    </thead>
    <tbody>
      <?php
      while($row = mysqli_fetch_array($get_announcement)){

        ?>
   <tr>
    <td><?php echo $row['announcement_title']; ?></td>
        <td><?php echo $row['announcement_type']; ?></td>
     <td><?php echo date('F d, Y', strtotime($row['announcement_date'])); ?></td>
     <td><a href="" class="btn btn-success" data-toggle="modal" data-target="#viewAnnouncement<?php echo $row['announcement_id']; ?>">View Full Details</a>
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editAnnouncement<?php echo $row['announcement_id']; ?>">Edit</button>

    <a href="" ng-click="doneAnn(<?php echo $row['announcement_id']; ?>)" class="btn btn-success">Mark as Done</a>

    </td>


<!---Loop Modal -->

<div class="modal fade" id="editAnnouncement<?php echo $row['announcement_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Announcement</h5>
      </div>
      <div class="modal-body">

        <form method="POST" enctype="multipart/form-data" action="php_script/announcement/updateAnnouncement.php"> 


              <div class="form-group">
          <label class="my-service-label">Announement Title:</label>
         <input type="text" name="announcement_title" class="form-control" placeholder="Annnouncement Title" required value="<?php echo $row['announcement_title']; ?>">
       </div><br>

           <div class="form-group">
         <label class="my-service-label">Announcement Description:</label>
         <input type="text" name="announcement_description" class="form-control" placeholder="Service Description" required value="<?php echo $row['announcment_description']; ?>">
       </div><br>
               <div class="form-group">
         <label class="my-service-label">Announcement Type</label>
        <select name="announcement_type" class="form-select">
          <option value="<?php echo $row['announcement_type']; ?>" selected><?php echo $row['announcement_type']; ?></option>
            <option value="Event">Event</option>
            <option value="Birthday">Birthday</option>
            <option value="Birthday">News</option>
        </select>
       </div><br>

           <div class="form-group">
      <label class="my-service-label">Image:</label>
    <input type="file" name="fileToUpload" class="form-control" placeholder="Image" id="fileToUpload"accept="image/*">
  </div>

<input type="hidden" name="aid" value="<?php echo $row['announcement_id']; ?>">

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success my-btn" name="submit">Update Announcement</button>
      </div>
    </form>

  </div>
</div>
</div>
</div>



<div class="modal fade" id="viewAnnouncement<?php echo $row['announcement_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
      </div>
      <div class="modal-body">

    <h2><?php echo $row['announcement_title']; ?></h2>
    <img src="assets/aImage/<?php echo $row['announcement_image']; ?>" width="250">
    <p><?php echo $row['announcment_description']; ?></p>
    <p>Announcement Date: <?php echo $row['announcement_date']; ?></p>


  </div>
</div>
</div>
</div>


<!--End of Loop Modal-->






 </tr>
        <?php
      }

      ?>
   
   
     
    </tbody>
  </table>
  <a href="" class="btn btn-warning" ng-click="announcementModal()">Add Annnouncement</a>
</div>
</div>








<div class="modal fade" id="addAnnouncement" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Announcement</h5>
      </div>
      <div class="modal-body">

        <form method="POST" enctype="multipart/form-data" action="php_script/announcement/addAnnouncement.php"> 


              <div class="form-group">
          <label class="my-service-label">Announement Title:</label>
         <input type="text" name="announcement_title" class="form-control" placeholder="Annnouncement Title" required>
       </div><br>

           <div class="form-group">
         <label class="my-service-label">Announcement Description:</label>
         <input type="text" name="announcement_description" class="form-control" placeholder="Announcement Description" required>
       </div><br>

            <div class="form-group">
         <label class="my-service-label">Announcement Type</label>
        <select name="announcement_type" class="form-select">
          <option value="" selected disabled>Announcement type</option>
            <option value="Event">Event</option>
            <option value="Birthday">Birthday</option>
            <option value="Birthday">News</option>
        </select>
       </div><br>

           <div class="form-group">
      <label class="my-service-label">Image:</label>
    <input type="text" onfocus="(this.type='file')" required name="fileToUpload" class="form-control" placeholder="Image" id="fileToUpload"accept="image/*">
  </div>



      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" ng-click="closeAnnounce()">Close</button>
        <button type="submit" class="btn btn-success my-btn" name="submit">Add Announcement</button>
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
  