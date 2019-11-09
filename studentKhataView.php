<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from new.uouapps.com/takeaway/menu(view-2).html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Mar 2019 04:37:13 GMT -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>My Khata</title>
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
      width:50px;
      height:50px;
      padding :10px;
      margin:10px;
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
					<div class="col-md-7 col-md-push-3">
						<!-- end view-style -->
						<br>	
						<div class="tab-content" >
							<div class="tab-pane fade in active" id="tab-1">
								<div>
									<div class="leave-reply">
										<div style=" margin:auto;"> 
											<h5 align="center">My Khata</h5>
												
											<table width="100%">
												<tr>
													<th><center>Canteen</center></th>
													<th><center>Amount</center></th>
													<th><center>Status</center></th>
												</tr>
												<?php
													$sql="select * from khata where student_id='$_SESSION[id]'";
													
													$rs=mysqli_query($con,$sql);			
						
													//$getQty=$_GET['getQty'];
													while($row=mysqli_fetch_array($rs))
													{
														$ownerId=$row[2];
														$amount=$row[3];
														$paymentStatus="";
														if($amount>0)
															$paymentStatus="Payment Due";
														else{
															$amount=$amount*-1;
															$paymentStatus="Prepaid";
														}
													
													$sql1="select * from canteen_owner where owner_id='$ownerId'";
													$rsMenu=mysqli_query($con,$sql1);			
						
						
													while($row1=mysqli_fetch_array($rsMenu))
													{
														$canteenName=$row1[2];
													}
													?>
												<tr>
													<td><?php echo $canteenName ?></td>
													<td><?php echo $amount ?></td>
													<td><?php echo $paymentStatus ?></td>
												</tr>
													<?php } ?>
											</table>
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

</body>


<!-- Mirrored from new.uouapps.com/takeaway/menu(view-2).html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Mar 2019 04:37:13 GMT -->
</html>
