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

<?php 
													
	if(isset($_POST['addCart1']))
	{	
		//$sqlList="select * from cart where student_id=$_SESSION[id] and menu_id=$_POST[menuId1]";
		//if(!$rsList=mysqli_query($con,$sqlList))
			$sql="INSERT INTO `cart`(`student_id`, `menu_id`, `qty`,`order_id`) VALUES ($_SESSION[id],'$_POST[menuId1]',$_POST[getQty1],null)";
		//else
		//	$sql="Update cart set qty=$_POST[getQty1] where student_id=$_SESSION[id] and menu_id=$_POST[menuId1]";
		
		if(!$qsql=mysqli_query($con,$sql))
		{
			echo"<script>alert('Please login before ordering..!!')</script>";
			echo '<script>window.location.href = "login.php";</script>';
		}
		else
		{	//$_POST[getQty1]=0;
			echo "<script>alert('Item added to your cart ...')</script>";
			//header ("Location: menu.php?owner=$_GET[owner]");
		}
	}
	else if(isset($_POST['addCart2']))
	{	
		//$sqlList="select * from cart where student_id=$_SESSION[id] and menu_id=$_POST[menuId2]";
		//if(!$rsList=mysqli_query($con,$sqlList))
			$sql="INSERT INTO `cart`(`student_id`, `menu_id`, `qty`,`order_id`) VALUES ($_SESSION[id],'$_POST[menuId2]',$_POST[getQty2],null)";
		//else
		//	$sql="Update cart set qty=$_POST[getQty2] where student_id=$_SESSION[id] and menu_id=$_POST[menuId2]";
		
		
		if(!$qsql=mysqli_query($con,$sql))
		{
			echo"<script>alert('Please login before ordering..!!')</script>";
						echo '<script>window.location.href = "login.php";</script>';

		}
		else
		{
			echo"<script>alert('Item added to your cart..')</script>";
			//header ("Location: menu.php?owner=$_GET[owner]");
		}
														
	}
	else if(isset($_POST['addCart3']))
	{	
		//$sqlList="select * from cart where student_id=$_SESSION[id] and menu_id=$_POST[menuId3]";
		//if(!$rsList=mysqli_query($con,$sqlList))
			$sql="INSERT INTO `cart`(`student_id`, `menu_id`, `qty`,`order_id`) VALUES ($_SESSION[id],'$_POST[menuId3]',$_POST[getQty3],null)";
		//else
		//	$sql="Update cart set qty=$_POST[getQty3] where student_id=$_SESSION[id] and menu_id=$_POST[menuId3]";
		
		if(!$qsql=mysqli_query($con,$sql))
		{
			echo"<script>alert('Please login before ordering..!!')</script>";
						echo '<script>window.location.href = "login.php";</script>';

		}
		else
		{
			echo"<script>alert('Item added to your cart..')</script>";
			//header ("Location: menu.php?owner=$_GET[owner]");
		}
														
	}
	
	else if(isset($_POST['addCart4']))
	{	
		//$sqlList="select * from cart where student_id=$_SESSION[id] and menu_id=$_POST[menuId4]";
		//if(!$rsList=mysqli_query($con,$sqlList))
			$sql="INSERT INTO `cart`(`student_id`, `menu_id`, `qty`,`order_id`) VALUES ($_SESSION[id],'$_POST[menuId4]',$_POST[getQty4],null)";
	//	else
		//	$sql="Update cart set qty=$_POST[getQty4] where student_id=$_SESSION[id] and menu_id=$_POST[menuId4]";
		
		if(!$qsql=mysqli_query($con,$sql))
		{
			echo"<script>alert('Please login before ordering..!!')</script>";
						echo '<script>window.location.href = "login.php";</script>';

		}
		else
		{
			echo"<script>alert('Item added to your cart..')</script>";
			//header ("Location: menu.php?owner=$_GET[owner]");
		}
														
	}
	
	else if(isset($_POST['addCart5']))
	{	
		//$sqlList="select * from cart where student_id=$_SESSION[id] and menu_id=$_POST[menuId5]";
		//if(!$rsList=mysqli_query($con,$sqlList))
			$sql="INSERT INTO `cart`(`student_id`, `menu_id`, `qty`,`order_id`) VALUES ($_SESSION[id],'$_POST[menuId5]',$_POST[getQty5],null)";
		//else
		//	$sql="Update cart set qty=$_POST[getQty5] where student_id=$_SESSION[id] and menu_id=$_POST[menuId5]";
		
		if(!$qsql=mysqli_query($con,$sql))
		{
			echo"<script>alert('Please login before ordering..!!')</script>";
						echo '<script>window.location.href = "login.php";</script>';

		}
		else
		{
			echo"<script>alert('Item added to your cart..')</script>";
			//header ("Location: menu.php?owner=$_GET[owner]");
		}
														
	}
	else if(isset($_POST['addCart6']))
	{	
		//$sqlList="select * from cart where student_id=$_SESSION[id] and menu_id=$_POST[menuId5]";
		//if(!$rsList=mysqli_query($con,$sqlList))
			$sql="INSERT INTO `cart`(`student_id`, `menu_id`, `qty`,`order_id`) VALUES ($_SESSION[id],'$_POST[menuId6]',$_POST[getQty6],null)";
		//else
		//	$sql="Update cart set qty=$_POST[getQty5] where student_id=$_SESSION[id] and menu_id=$_POST[menuId5]";
		
		if(!$qsql=mysqli_query($con,$sql))
		{
			echo mysqli_error($con);
		}
		else
		{
			echo"<script>alert('Item added to your cart...')</script>";
			header ("Location: menu.php?owner=$_GET[owner]");
		}
														
	}
	
	else if(isset($_POST['addCart7']))
	{	
		//$sqlList="select * from cart where student_id=$_SESSION[id] and menu_id=$_POST[menuId5]";
		//if(!$rsList=mysqli_query($con,$sqlList))
			$sql="INSERT INTO `cart`(`student_id`, `menu_id`, `qty`,`order_id`) VALUES ($_SESSION[id],'$_POST[menuId7]',$_POST[getQty7],null)";
		//else
		//	$sql="Update cart set qty=$_POST[getQty5] where student_id=$_SESSION[id] and menu_id=$_POST[menuId5]";
		
		if(!$qsql=mysqli_query($con,$sql))
		{
			echo mysqli_error($con);
		}
		else
		{
			echo"<script>alert('Item added to your cart...')</script>";
			header ("Location: menu.php?owner=$_GET[owner]");
		}
														
	}
	
	else if(isset($_POST['addCart8']))
	{	
		//$sqlList="select * from cart where student_id=$_SESSION[id] and menu_id=$_POST[menuId5]";
		//if(!$rsList=mysqli_query($con,$sqlList))
			$sql="INSERT INTO `cart`(`student_id`, `menu_id`, `qty`,`order_id`) VALUES ($_SESSION[id],'$_POST[menuId8]',$_POST[getQty8],null)";
		//else
		//	$sql="Update cart set qty=$_POST[getQty5] where student_id=$_SESSION[id] and menu_id=$_POST[menuId5]";
		
		if(!$qsql=mysqli_query($con,$sql))
		{
			echo mysqli_error($con);
		}
		else
		{
			echo"<script>alert('Item added to your cart...')</script>";
			header ("Location: menu.php?owner=$_GET[owner]");
		}
														
	}
	
	else if(isset($_POST['addCart9']))
	{	
		//$sqlList="select * from cart where student_id=$_SESSION[id] and menu_id=$_POST[menuId5]";
		//if(!$rsList=mysqli_query($con,$sqlList))
			$sql="INSERT INTO `cart`(`student_id`, `menu_id`, `qty`,`order_id`) VALUES ($_SESSION[id],'$_POST[menuId9]',$_POST[getQty9],null)";
		//else
		//	$sql="Update cart set qty=$_POST[getQty5] where student_id=$_SESSION[id] and menu_id=$_POST[menuId5]";
		
		if(!$qsql=mysqli_query($con,$sql))
		{
			echo mysqli_error($con);
		}
		else
		{
			echo"<script>alert('Item added to your cart...')</script>";
			header ("Location: menu.php?owner=$_GET[owner]");
		}
														
	}
	
	else if(isset($_POST['addCart10']))
	{	
		//$sqlList="select * from cart where student_id=$_SESSION[id] and menu_id=$_POST[menuId5]";
		//if(!$rsList=mysqli_query($con,$sqlList))
			$sql="INSERT INTO `cart`(`student_id`, `menu_id`, `qty`,`order_id`) VALUES ($_SESSION[id],'$_POST[menuId10]',$_POST[getQty10],null)";
		//else
		//	$sql="Update cart set qty=$_POST[getQty5] where student_id=$_SESSION[id] and menu_id=$_POST[menuId5]";
		
		if(!$qsql=mysqli_query($con,$sql))
		{
			echo mysqli_error($con);
		}
		else
		{
			echo"<script>alert('Item added to your cart...')</script>";
			header ("Location: menu.php?owner=$_GET[owner]");
		}
														
	}
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
													<div class="qty-cart text-center clearfix">
														<h6>Quantity</h6>
														<input type="number" min="0" name="getQty<?php echo $cnt;?>" style="width:55px;">
														<br>
														<button name="addCart<?php echo $cnt; ?>"><i class="fa fa-shopping-cart"></i></button>
													</div> <!-- end .qty-cart -->
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
