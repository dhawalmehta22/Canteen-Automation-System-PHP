<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from new.uouapps.com/takeaway/menu-with-right-checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Mar 2019 04:37:14 GMT -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Manage Menu</title>
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="css/thumb-slide.css">
	<link rel="stylesheet" href="css/owl.carousel.css">

	<!--[if IE 9]>
	<script src="js/media.match.min.js"></script>
	<![endif]-->

</head>

<body>
	
	<div id="main-wrapper">
	<?php 
	include("dbconnect.php");
	include("header.php");
	//$itemId="";
	?>
	
		<?php
		if(isset($_GET['delete']))
		{			

			$sql="delete from menu where menu_id = $_GET[itemId]";
			echo $sql;
			die();
		
		$qsql = mysqli_query($con,$sql);	
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Album record deleted successfully...');</script>";
			header("Location: manageMenu.php");		
		}
		
		}
		?>
		

		<!-- end #header -->
		<!-- thumbnail slide section -->
		<div id="page-content">
			
			<!-- end .thumbnail-slide -->

			<!-- start #main-wrapper -->
			<div class="container">
				<div class="row mt30">
					<div class="col-md-7 col-md-push-3">
						<ul class="nav nav-tabs" role="tablist">
							<li class="active"><a href="#tab-1" role="tab" data-toggle="tab">All</a>
							</li>
							<li><a href="#tab-2" role="tab" data-toggle="tab">Daily Menu</a>
							</li>
							<li><a href="#tab-3" role="tab" data-toggle="tab">Starters</a>
							</li>
							<li><a href="#tab-3" role="tab" data-toggle="tab">Main Course</a>
							</li>
							<li><a href="#tab-3" role="tab" data-toggle="tab">Dessert</a>
							</li>
						</ul>

						<!-- end view-style -->
						<br>
											
						<div class="tab-content" >
							<div class="tab-pane fade in active" id="tab-1">
								<div class="all-menu-details" >
									<div>
										<h5><center>Daily Menu <a href="addNewItemForm.php"><i class="fa fa-plus price" style="float:right;"></i>
										</a></center></h5>
										
									</div>
									<form action="" method="get">
									<?php
													$sql="select * from menu where owner_id='$_SESSION[cid]'";
													
													$rs=mysqli_query($con,$sql);			
						
						
													while($row=mysqli_fetch_array($rs))
													{
														$itemId=$row[0];
														$itemName=$row[1];
														$itemPrice=$row[2];
														$prepTime=$row[3];
													
													?>
									<div class="item-list right-checkout" >
										
										
										<div class="all-details">
											<div class="visible-option" style="position: relative;left:-120px;width:63rem">
												<div class="details">
													<h6><a href="#"><?php echo $itemName; ?></a>
													
													</h6>
													<p>Preparation Time:<?php echo $prepTime ?></p>
												</div>

												<div class="price-option fl">
													<h4><?php echo $itemPrice; ?> Rs.</h4>
													
												</div>
												<!-- end .price-option-->
												<div class="qty-cart text-center clearfix">
													<br>
													
														<a href="editMenu.php?itemId=<?php echo $row["menu_id"] ?>">
														<input type="button" style="width:4em" value="EDIT"></a>
														<br>
														
														<input type="button" style="width:5em;margin-top:1em" value="DELETE" name="delete" id="delete">
														</a>
														
													
												</div> <!-- end .qty-cart -->
											</div> <!-- end .visible-option -->	
										
											</form>
											<!--end .dropdown-option-->
										</div>
										<!-- end .all-details -->
									</div>
									<!-- end .item-list -->
							<?php } ?>
							


							</div> <!-- end .tab-pane -->



							</div> <!-- end .tab-pane  -->
						</div> <!-- end .tab-content -->

						
					</div>
					<!--end main-grid layout-->
					<!-- Side-panel begin -->
					<!--end .col-md-3 -->
					
				</div>
				<!-- end .row -->
			</div>
			<!--end .container -->
			<!-- footer begin -->
			<?php include("footer.php");?>
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

</body>


<!-- Mirrored from new.uouapps.com/takeaway/menu-with-right-checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Mar 2019 04:37:14 GMT -->
</html>