<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from new.uouapps.com/takeaway/menu(view-2).html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Mar 2019 04:37:13 GMT -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>My Orders</title>
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="css/thumb-slide.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="icon" href="img/DALOGO.gif" type="image/gif" sizes="16x16">

	<style>
		table , th , td{
      border: 1px solid black;
      
     
    } 
    input{
      width:90px;
    }
    th , td{
      text-align:center;
      width:150px;
      height:50px;
      padding :10px;
      margin:10px;
    }
	
	body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 30px;
  border: 1px solid #888;
  width: 35%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
	</style>
	<!--[if IE 9]>
	<script src="js/media.match.min.js"></script>
	<![endif]-->

</head>

<body>
	<div id="main-wrapper">
		
			
			<!-- end .header-nav-bar -->
			<?php 
				include 'header.php';
				include 'dbconnect.php';
			
			?>

			
		<!-- end #header -->
		<!-- thumbnail slide section -->
		<br><br>
		<div id="page-content">
		<div class="container">
				<div class="row mt30">
					<div class="col-md-10 col-md-push-1">
						<!-- end view-style -->
						<br>	
						<div class="tab-content" >
							<div class="tab-pane fade in active" id="tab-1">
								<div>
									<div class="leave-reply">
										<div style=" margin:auto;"> 
											<h5 align="center">My Orders</h5>
											
												<form action="" method="post">
											<table>
												<tr>
													<th><center>Canteen Name</center></th>
													<th><center>Order ID</center></th>
													<th><center>Item List<center></th>
													<th><center>Order Status</center></th>
													<th><center>Total Amount</center></th>
													<th><center>Date</center></th>
													<th><center>Payment Status</center></th>
													<th><center>Special Instruction</center></th>
													
												</tr>
												<?php
											$sql="select * from order_table where student_id='$_SESSION[id]' order by order_id DESC";
											$rs=mysqli_query($con,$sql);
											
											while($row=mysqli_fetch_array($rs))
											{
												$orderId=$row[0];
												$studentId=$row[1];
												$date=$row[2];
												$time=$row[3];
												$amount=$row[4];
												$paymentStatusId=$row[5];
												$orderStatusId=$row[6];
												$ownerId=$row[7];
												$specialIns=$row[8];
												
												$sqlCanteenName="select canteen_name from canteen_owner where owner_id='$ownerId'";
												$rsCanteenName=mysqli_query($con,$sqlCanteenName);
												$rowCanteenName=mysqli_fetch_array($rsCanteenName);
												$canteenName=$rowCanteenName['canteen_name'];
												
												$sqlPayment="select * from payment_mode where pay_id='$paymentStatusId'";
												$rsPayment=mysqli_query($con,$sqlPayment);
												$rowPayment=mysqli_fetch_array($rsPayment);
												$paymentStatus=$rowPayment['mode'];
												
												$sqlOrderStatus="select * from order_status where status_id='$orderStatusId'";
												$rsOrderStatus=mysqli_query($con,$sqlOrderStatus);
												$rowOrderStatus=mysqli_fetch_array($rsOrderStatus);
												$orderStatus=$rowOrderStatus['status'];
						
												?>
												<td><?php echo $canteenName ?></td>
												<td><input type="hidden" name="orderId" value="<?php echo $orderId ?>"><?php echo $orderId ?></td>
													<td>	
													<?php		
														$sqlCart="select * from cart where order_id='$orderId'";
														$rsCart=mysqli_query($con,$sqlCart);			
														//$getQty=$_GET['getQty'];
														while($rowCart=mysqli_fetch_array($rsCart))
														{
															$menuId=$rowCart['menu_id'];
															$quantity=$rowCart['qty'];
														//}
														?>
												
						
													<?php
															$sqlList="select * from menu where menu_id='$menuId'";
															$rsList=mysqli_query($con,$sqlList);			
															//$getQty=$_GET['getQty'];
															while($rowList=mysqli_fetch_array($rsList))
															{
																$itemName=$rowList['item_name'];
																$price=$rowList['price'];
														?>
														<?php echo $itemName ?> X<?php echo $quantity ?><?php echo "  " ?>
														<?php echo $price ?>/-
														<br><?php
															} 
											
											/*$sqlDetails="select * from order_table where order_id='$orderId'";
															$rsDetails=mysqli_query($con,$sqlDetails);			
															//$getQty=$_GET['getQty'];
															while($rowDetails=mysqli_fetch_array($rsDetails))
															{
																$specialIns=$rowDetails['special_instruction'];
																//$orderDate=$rowDetails['date'];
																$paymentModeId=$rowDetails['pay_id'];
															}*/
																													
											} ?></td>
													<td><?php echo $orderStatus ?></td>
													<td><?php echo $amount ?></td>
													<td><?php echo $date ?></td>
													<td><?php echo $paymentStatus ?></td>
													<td><?php echo $specialIns ?></td>
												
											</tr>
											<?php } ?>
											</table>
											</form>
											
										</div>
										<!-- The Modal -->
											<div id="myModal" class="modal">
																						
													  <!-- Modal content -->
													  <div class="modal-content">
														<span class="close">&times;</span>
														<table style="width:100%;">
														<tr><th><center>Order ID</center></th>
															<th><center>Item List</center></th>
															<th><center>Price<center></th>
															<th><center>Special Instruction</center></th>
															
															<th><center>Amount</center></th>
															
															
														</tr>
														<?php
													
														$sqlCart="select * from cart where order_id='$orderId'";
														$rsCart=mysqli_query($con,$sqlCart);			
														//$getQty=$_GET['getQty'];
														while($rowCart=mysqli_fetch_array($rsCart))
														{
															$menuId=$rowCart['menu_id'];
															$quantity=$rowCart['qty'];
															
														?>
														<tr>
														<td><?php echo $orderId ?></td>
														<?php
															$sqlList="select * from menu where menu_id='$menuId'";
															$rsList=mysqli_query($con,$sqlList);			
															//$getQty=$_GET['getQty'];
															while($rowList=mysqli_fetch_array($rsList))
															{
																$itemName=$rowList['item_name'];
																$price=$rowList['price'];
														?>
														<td><?php echo $itemName ?> X<?php echo $quantity ?><?php echo " " ?></td>
														<td><?php echo $price ?></td>
														<?php
															}
															$sqlDetails="select * from order_table where order_id='$orderId'";
															$rsDetails=mysqli_query($con,$sqlDetails);			
															//$getQty=$_GET['getQty'];
															while($rowDetails=mysqli_fetch_array($rsDetails))
															{
																$specialIns=$rowDetails['special_instruction'];
																//$orderDate=$rowDetails['date'];
																$paymentModeId=$rowDetails['pay_id'];
															}	
														 ?>
														<td><?php echo $specialIns ?></td>
														<td><?php echo $quantity*$price?></td>
																								
														</tr>
														<?php
														} 
														?>
														</table>
													  </div>

													</div>
							        </div>
                				</div>
							</div>
								<!--end all-menu-details-->
							
								
								 
						

						<!-- tab 2 content -->
						
					<!--end main-grid layout-->
					<!-- Side-panel begin -->
					<!--end .col-md-3 -->
					
				</div>
				<!-- end .row -->
			</div>
			</div>
			<!--end .container -->
			</div>
			<!-- footer begin -->
			
			<?php
      			include 'Footer.php';
    		?>	
			<!-- end #footer -->
			
		</div> <!-- end .page-content -->
	</div>
		<!-- end #main-wrapper -->

		<script src="../../ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<!-- Local jQuery -->
		<script>
		window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')
		</script>
		<script src="js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>
		<script src="js/jquery.magnific-popup.min.js"></script>
		<script src="js/owl.carousel.js"></script>
		<script src="js/bootstrap.js"></script>
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
		<script type="text/javascript" src="js/jquery.ui.map.js"></script>
		<script src="js/scripts.js"></script>

		<script>

		</script>
		<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>


<!-- Mirrored from new.uouapps.com/takeaway/menu(view-2).html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Mar 2019 04:37:13 GMT -->
</html>
