<?php

include("db/db.php");


if(isset($_GET['status'])){

    $status = $_GET['status'];

}else{
  $status = "ON-GOING";
}

$get_service = mysqli_query($web_db, "SELECT * from service_tbl INNER JOIN user_tbl on user_tbl.user_id = service_tbl.user_id where service_status = '$status'");



$get_tithes = mysqli_query($web_db, "SELECT * from finance_tbl where finance_type = 'Tithes' AND finance_status = 'ACTIVE'");



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
    <script src="assets/js/customer.js"></script>
      <link href="assets/css/carousel.css" rel="stylesheet">
          <script src="assets/js/bootstrap.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/jquery-slim.min.js"><\/script>')</script>
        <script type="text/javascript">
      function setTwoNumberDecimal(event) {

    this.value = parseFloat(this.value).toFixed(2);
}
    </script>
      <style type="text/css">
        .my-image{
          height: 200px;
          width: 100%;
        }
.card-img-top {
    width: 100%;
    height: 15vw;
    object-fit: cover;
}
.my-services{
  height: 50%;
  width: 100%;
}
.my-legend{
border: 2px solid white;
}
      </style>

  </head>
  <body>
    <div ng-app="churchApp" ng-controller="churchAppCtrl">

    
    
<div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
           <img src="assets/logo.png" width="150">
      </div>
        <div class="col-8 text-center">
 <h1 class="my-header text-white" >Canlalay Christian Mission Center Inc.</h1>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
     </div>
    </div>
  </header>


<main class="container">

  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        
      <img src="assets/cover.jpg">

        <div class="container">
          <div class="carousel-caption text-start">
            <h1>To be guided by him</h1>
            <p>Trust in the LORD with all your heart and lean not on your own understanding.</p>
           
          </div>
        </div>
      </div>
      <div class="carousel-item">
           <img src="assets/cover2.jpg">

        <div class="container">
          <div class="carousel-caption text-start">
            <h1>your ears will hear a voice behind you</h1>
            <p>Whether you turn to the right or to the left, your ears will hear a voice behind you, saying, “This is the way; walk in it</p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
         <img src="assets/cover3.jpg">

        <div class="container">
          <div class="carousel-caption text-start">
            <h1>Path of Peace</h1>
            <p>to shine on those living in darkness and in the shadow of death, to guide our feet into the path of peace</p>
            
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>




  <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-4 fst-italic">Ask and it will be given to you</h1>
      <p class="lead my-3">seek and you will find; knock and the door will be opened to you.</p>
    </div>
  </div>

    <div data-ng-init="getAnnouncement()">
          <h3 class="pb-4 mb-4 fst-italic text-white border-bottom">
       Announcement Corner
      </h3>


  <div class="row">

    <div class="col-md-4" ng-repeat="a in ann">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative my-image">
        <div class="col-4 p-4 d-flex flex-column position-static">

          <h3 class="mb-0 text-white">{{a.title}}</h3>
          <p class="text-start text-white">{{a.type}}</p>
                    <a href="view_announcement.php?aid={{a.aid}}" class="stretched-link text-white fst-italic">Continue reading</a>
             </div>

           <div class="col-8 d-none d-lg-block">
          <img src="assets/aImage/{{a.picture}}" class="card-img-top">
        </div>

       
      </div>
    </div>
  </div>
</div>


           <center><div data-ng-init="announcement_page()">
      <ul class="pagination">
    <li class="page-item" ng-repeat="pages in announcement_count"><a href="#" class="page-link" ng-click="getAnnouncementPage(pages.page)">{{pages.page}}</a></li>
  </ul>
</div>
</center>




  <div class="row g-5">
    <div class="col-md-8">
      <h3 class="pb-4 mb-4 fst-italic text-white border-bottom">
      </h3>

      <article class="blog-post">
        <h2 class="blog-post-title text-white">Services</h2>

        <div class="row">
          <?php
            while($row = mysqli_fetch_array($get_service)){
                $fromDate = date('F d, Y g:i A', strtotime($row['service_start']));
$toDate = date('F d, Y g:i A', strtotime($row['service_end']));
          ?>
              <div class="row">
            <div class="col-12">
                     <div class="mb-4">
                          <h3 class="text-white"><?php echo $row['service_title']; ?></h3>
            <p class="fst-italic text-white"><?php echo $row['service_description']; ?></p>
              <p class="fst-italic text-white">Date: <?php echo $fromDate; ?> - <?php echo $toDate; ?></p>

            <a href="services_watch.php?sid=<?php echo $row['service_id']; ?>" class="text-white">Watch Here</a>

              </div>
              
          <?php echo $row['service_link']; ?>
            </div>
          </div>
          <legend class="mb-4 mt-4 my-legend"></legend>
      
            <?php
          }
          ?>

          </div>


       
      </article>

      <nav class="blog-pagination" aria-label="Pagination">
        <a class="btn btn-outline-primary" href="customer.php?status=ON-GOING">On-going</a>
        <a class="btn btn-outline-secondary" href="customer.php?status=PENDING">Pending Services</a>
         <a class="btn btn-outline-secondary" href="customer.php?status=DONE">Old</a>


      </nav>

    </div>

    <div class="col-md-4">
      <div class="position-sticky" style="top: 2rem;">
        <div class="p-4 mb-3 bg-light rounded">
          <h4 class="fst-italic">About</h4>
          <p class="mb-0">Canlalay Christian Mission Center Inc.</p>
        </div>

        <div class="p-4" data-ng-init="pendingSchedule()">
          <h2 class="fst-italic customer-link">Schedule</h2>
          <ul class="customer-link">
            <li ng-repeat="schedule in schedule_data"><a href="#" class="customer-link fst-italic" style="text-decoration: none;"><h5 claass="my-header">{{schedule.schedule_title}}</h5>From: {{schedule.fromDate}}<br>To: {{schedule.toDate}}</a></li>
          </ul>
        </div>

                <div class="p-4">
          <h5 class="fst-italic customer-link">For parishioners who are going to submit their monthlhy Tithes or Prayer Request, kindly refer to the links below</h5>
          <ol>
            <ul>
           <li> <a class="fst-italic text-white" href="" ng-click="TForm()">Tithes Form</a></li>
              <li><a class="fst-italic text-white" href="" ng-click="prayerRequestForm()">Prayer Request Form</a></li>
            </ul>

            </ol>
                


        </div>


     
      </div>
    </div>

  </div>



<div class="modal fade" id="addTithes" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tithes Form</h5>
      </div>
      <div class="modal-body">

        <form method="POST" ng-submit="addTithes(donation_form)">

             <div class="form-group">
                <label class="my-schedule-label">Amount</label>
              <input type="number" onchange="setTwoNumberDecimal(this.value)" min="10"  step="0.01" ng-model="donation_form.amount" ng-model="donation_form.amount" class="form-control" placeholder="Amount" required>
            </div>
            <br>
                  <div class="form-group">
                <label class="my-schedule-label">Transaction Code</label>
              <input type="text" ng-model="donation_form.transaction_code" class="form-control" placeholder="Transaction Code" required>
            </div>
            <br>

            <div class="form-group">
                <label class="my-schedule-label">Account</label>
              <select class="form-control" ng-model="donation_form.mode">
                <option value="" selected disabled>Account</option>
                <?php
                while($l = mysqli_fetch_array($get_tithes)){
                  ?>
                  <option value="<?php echo $l['finance_id']; ?>"><?php echo $l['finance_mode']; ?> - <?php echo $l['finance_account']; ?> - <?php echo $l['finance_bank_name']; ?></option>
                  <?php
                }
                ?>
              </select>
            </div>
            <br>
                <div class="form-group">
                <label class="my-schedule-label">Name</label>
              <input type="text" ng-model="donation_form.donor" class="form-control" placeholder="Name (Please fill out your full name)" required>
            </div>
            <br>

               <div class="modal-footer">
        <button type="button" class="btn btn-secondary" ng-click="closeAddTithes()">Close</button>
        <button type="submit" class="btn btn-success my-btn">Submit Tithes</button>
      </div>
    </form>


      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="prayer_request_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Prayer request Fom</h5>
      </div>
      <div class="modal-body">

    <form method="POST" ng-submit="submitPrayerRequest(customer_form)">

        

                   <div class="form-group">
                  <label class="my-schedule-label">Requestor Name</label>
                <input type="text" ng-model="customer_form.requestor" placeholder="Requestor Name" class="form-control">  
                </div>
                                   <div class="form-group">
                  <label class="my-schedule-label">Prayer Request Details</label>
                <textarea ng-model="customer_form.details" placeholder="Prayer Request Details" class="form-control">  
                  ></textarea>
                </div>

                   <div class="modal-footer">
        <button type="button" class="btn btn-secondary" ng-click="closePrayerRequestForm()">Close</button>
        <button type="submit" class="btn btn-success my-btn">Submit Request</button>
      </div>
      

    </form>

  </div>
</div>
</div>
</div>







</main>
</div>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
</div>
</body>
</html>


