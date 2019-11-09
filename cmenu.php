<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from new.uouapps.com/takeaway/menu-with-right-checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Mar 2019 04:37:14 GMT -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Menu </title>
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="css/thumb-slide.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="icon" href="img/DALOGO.gif" type="image/gif" sizes="16x16">

	<!--[if IE 9]>
	<script src="js/media.match.min.js"></script>
	<![endif]-->


<style>

</style>

</head>

<body>
  <?php
	include("dbconnect.php");	
?>
	
	<div id="main-wrapper">
	<?php 
	//ob_start();

//session_start();
include('header.php');
	/*if(isset($_SESSION["id"]))
{
$sql = "select * from student_info where student_id='$_SESSION[id]'";
$qsqlstaff = mysqli_query($con,$sql);
$rsstaff = mysqli_fetch_array($qsqlstaff);
}*/
?>	
	<!-- end #header -->
	

			<!-- start #main-wrapper -->
			<div class="container">
				<div class="row mt30">
					<div class="col-md-7 col-md-push-3">
						<ul class="nav nav-tabs" role="tablist">
							<li class="active"><a href="#tab-1" role="tab" data-toggle="tab">All</a>
							</li>
							<li><a href="#tab-2" role="tab" data-toggle="tab">Breakfast</a>
							</li>
							<li><a href="#tab-3" role="tab" data-toggle="tab">Lunch</a>
							</li>
							<li><a href="#tab-3" role="tab" data-toggle="tab">Snacks</a>
							</li>
							<li><a href="#tab-3" role="tab" data-toggle="tab">Dinner</a>
							</li>
						</ul>

						<div class="view-style dsn">
							<div class="list-grid-view">
								
								<button class="without-thumb" ><i class="fa fa-align-justify"></i></button>
								
							</div>
							<!-- end .list-grid-view -->

							
							<!-- end .page-list -->
						</div>
						<!-- end view-style -->
						
						<div class="tab-content">
							<div class="tab-pane fade in active" id="tab-1">
								<div class="all-menu-details">
									<center><h5>Daily Menu</h5></center>
									

									<form method="post">
									<?php
										$canteen=$_GET['owner'];
										$sql="select * from menu WHERE owner_id=$canteen";
										$rs=mysqli_query($con,$sql);			
						
										//$getQty=$_GET['getQty'];
										$cnt=0;
										while($row=mysqli_fetch_array($rs))
										{
											$menuId=$row[0];
											$itemName=$row[1];
											$itemPrice=$row[2];	
											
											$cnt+=1;
									?>
								
									<input name="menuId<?php echo $cnt; ?>" type="hidden" value="<?php echo $menuId?>">
										<div class="item-list right-checkout">
											<div class="all-details">
												<div class="visible-option"> 
													<div class="details">
												
														<h6>
															<a href="#" id="getItemName"><?php echo $itemName; ?></a>
															
														</h6>
													</div>
													<div class="price-option fl">
														<h4 id="getItemPrice"><?php echo $itemPrice; ?> Rs.</h4>
														
													</div>
													<!-- end .price-option-->
													 <!-- end .qty-cart -->
												</div> <!-- end .visible-option -->	
											</div>
										</div>
										<?php 	} ?>
								</form>
													
												

												
									<!-- end .item-list -->
																
									
									<!-- end .item-list -->
								</div>
								<!--end all-menu-details-->
							</div> <!-- end .tab-pane  -->
						</div> <!-- end .tab-content -->

						<!-- end .pagination -->
					</div>
					<!--end main-grid layout-->
					
					<!-- Side-panel begin -->
					
							<!-- end form -->
						<!-- end side-panel -->
					</div>
					<!--end .col-md-3 -->
						<!-- end .chekout class -->
				</div>
				<!-- end .row -->
			</div>
			<!--end .container -->
			</div><!-- footer begin -->
		


	<?php include("footer.php"); ?>
	</div>
</div>
		<!-- end #main-wrapper -->

		

</body>


<!-- Mirrored from new.uouapps.com/takeaway/menu-with-right-checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Mar 2019 04:37:14 GMT -->
</html>
