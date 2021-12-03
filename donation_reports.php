<?php

include("db/db.php");

if(isset($_POST['submit'])){

	$type = $_POST['type'];
	$date_from = $_POST['date_from'];
	$date_to = $_POST['date_to'];

$get_donation = mysqli_query($web_db, "SELECT * from donation_tbl INNER JOIN finance_tbl on finance_tbl.finance_id = donation_tbl.finance_id where donation_status = 'CONFIRMED' AND finance_type = '$type' AND donation_date BETWEEN '$date_from' AND '$date_to'");




?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	   <link href="assets/css/bootstrap.min.css" rel="stylesheet">
	  <script type="text/javascript">
    
      window.print();
   function closePrint(){
window.close();
  };
  
  </script>
</head>
<body onafterprint="closePrint()" class="container">

<br><br>
		<div class="float-start">
			<img src="assets/logo.png" width="150">
			<br><br>
			<h3><?php echo $type; ?></h3>
			<br>
			Date: <?php echo $date_from; ?> - <?php echo $date_to; ?>
		</div>

                  <table class="table table-bordered">
    <thead class="table-dark">
         <th>Account</th>
                <th>Mode</th>
                     <th>Bank Name</th>
                      <th>Amount</th>
                          <th>Date</th>
                          <th>Name</th>
                              <th>Transaction Code</th>
                          </thead>
                          	<tbody>
                          		<?php
                          			$total = array();
                          	while($row = mysqli_fetch_array($get_donation)){
                          
                          		$total[] = $row['donation_amount'];
                          		?>
                          		<tr>
                          			<td><?php echo $row['finance_account']; ?></td>
                          			<td><?php echo $row['finance_mode']; ?></td>
                          			<td><?php echo $row['finance_bank_name']; ?></td>
                          					<td><?php echo $row['donation_amount']; ?></td>
                          					<td><?php echo $row['donation_date']; ?></td>
                          						<td><?php echo $row['donation_name']; ?></td>
                          							<td><?php echo $row['donation_transaction_code']; ?></td>
                          				</tr>
                          		<?php
                          					}
                          		?>
                          		
                          	</tbody>
                      </table>
                      <h3>Total: <?php echo number_format((array_sum($total)), 2); ?></h3>
                        





</body>
</html>


<?php


}
?>