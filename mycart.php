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
//$canteen=$_GET['owner'];

?>

<br>
		<div class="side-panel" style="width:60%; margin:0px auto">
							<form class="default-form">
								<h6 class="toggle-main-title">Checkout Details</h6>
								<div class="sd-panel-heading">
									<h5 class="toggle-title">My Check</h5>
									<div class="slideToggle">
										<ul class="list-unstyled">
<?php												$today=date('Y-m-d');
													$sql="select * from cart where student_id='$_SESSION[id]' and order_id IS NULL" ;
													
													$rs=mysqli_query($con,$sql);	
													$total=0;													
						 
													//$getQty=$_GET['getQty'];
													while($row=mysqli_fetch_array($rs))
													{
														$cartId=$row[0];
														$mitemId=$row[2];
														$qty=$row[3];
														$orderId=$row[4];
													
													$sql1="select * from menu where menu_id='$mitemId'";
													
													$rsMenu=mysqli_query($con,$sql1);			
						
						
													while($row1=mysqli_fetch_array($rsMenu))
													{
														//$itemId=$row[0];
														//$itemName=$row[1];
														$itemName=$row1[1];	
														$ownerId=$row1['owner_id'];
														$itemPrice=$row1[2];
														$prepTime=$row1[3];
													}	
?>


						
											<li>
												<p><?php echo $itemName; echo " ";?>
													<span class="icon-link"><i class="fa fa-pencil"></i><i class="fa fa-times"></i>
													</span>
												</p>
												<br>
												<br>
												<p class="price"><?php echo $itemPrice; echo " x ";?><?php echo $qty?></p>
													</li>
												<?php $total+=$itemPrice*$qty;
												} 	
												?>
											<li>
												<!-- list for total price-->
												<p  class="price"> Total &nbsp;
												&nbsp;&nbsp;&nbsp;<?php echo $total ?>
												<input type="hidden" name="total" value="<?php echo $total; ?>">
												</p>
											</li>
											
										</ul>

										
									</div>
									<!--end .slide-toggle -->
								</div>
								<!-- end .sd-side-panel class -->
								
							</form>
							<!-- end form -->
				
							
				<form action="" method="post">
							<div class="col-md-12 col-sm-4"style="position:auto;">
							<input type="text" name="special" placeholder="Special instructions" style="width:100%; height: 40px; color:black;
						background-color: black;
						border: none;
						  background-color:lightgrey ;
						  font-size: 16px;
						  margin: 0px 2px;
						  border-radius:5px;
						  height:50px;
						  width:100%;">
							<br>
							<br>
			  		<?php
						$sql="select * from payment_mode";
						$rs=mysqli_query($con,$sql);
						?>
						<select name="payId" id="payId" style="width:100%; height: 40px; color:black;
						background-color: black;
						border: none;
						  background-color:lightgrey ;
						  font-size: 16px;
						  margin: 0px 2px;
						  cursor: pointer;
						  border-radius:5px;
						  height:50px;
						  width:100%;">
						<option value="-1">Select Your payment mode</option>
						<?php
						
						while($row=mysqli_fetch_array($rs))
						{
							echo"<option value=$row[pay_id]>$row[mode]</option>";
               
						}
						echo"</select>";
						
					?><br><br>
					<div  >
						
						<input type="submit" name="checkout" style="background-color: black;
							border: none;
						  color:black;
						  background-color:lightgrey ;
						  font-size: 16px;
						  margin: 0px 2px;
						  cursor: pointer;
						  border-radius:5px;
						  height:50px;
						  width:100%;
						  ">
						<br>
						<br>
										
						</div>
						</div>
				</form>
				
<?php
			if(isset($_POST['checkout']))	
			{
				$today=date("Y-m-d");
				$time=date("h:i:s");
				$sql="INSERT INTO `order_table`(`student_id`, `date`, `order_time`, `amount`, `pay_id`,`status_id`,`owner_id`,`special_instruction`) 
				VALUES ('$_SESSION[id]','$today','$time',$total,'$_POST[payId]','2','$ownerId','$_POST[special]')";


		
		if(!$qsql=mysqli_query($con,$sql))
		{
			echo mysqli_error($con);
		}
		else
		{
			$orderId = mysqli_insert_id($con);
			echo "<script>alert('Order Inserted')</script>";			
		}
$sqlOrderId="select * from order_table where `student_id`='$_SESSION[id]' and date=$today and `order_id` is NULL" ;
$rsOrderId=mysqli_query($con,$sqlOrderId);
//echo "<script>alert('established')</script>";
$rowOrderId=mysqli_fetch_array($rsOrderId);
			//$orderId=$rowOrderId[0];	
			$payId=$rowOrderId['pay_id'];	
$sqlUpdate="UPDATE `cart` SET `order_id`=$orderId WHERE `order_id` is NULL and `student_id`='$_SESSION[id]'";

if(!$qsql1=mysqli_query($con,$sqlUpdate))
{
	echo mysqli_error($con);
}
else
{
	echo "<script>alert('Cart table Updated...')</script>";
			echo '<script>window.location.href = "myOrders.php";</script>';
}
if($_POST['payId']==2)
{
	$sqlKhataId="select * from khata where student_id='$_SESSION[id]'";
$rsKhataId=mysqli_query($con,$sqlKhataId);
$rowKhataId=mysqli_fetch_array($rsKhataId);
$studentId=$rowKhataId['student_id'];
$myAmount=$rowKhataId['amount'];
if($studentId==null){
	$sqlkhata="INSERT INTO `khata`(`student_id`, `owner_id`, `amount`) 
	VALUES ('$_SESSION[id]','$canteen','$totalAmount')";
		
		if(!$qsql2=mysqli_query($con,$sqlkhata))
		{
			echo mysqli_error($con);
		}
		else
			echo "<script>alert('khata inserted')</script>";
}
else{
	echo "<script>alert('khata already exists')</script>";
	if($myAmount<0)
	$sql3="update khata set amount=amount+$total where student_id='$_SESSION[id]'";
else
	$sql3="update khata set amount=amount-$total where student_id='$_SESSION[id]'";


	if(!$qsql1=mysqli_query($con,$sql3))
{
	echo mysqli_error($con);
}
else
{
	echo "<script>alert('khata updated..')</script>";
			echo '<script>window.location.href = "myOrders.php";</script>';
}
}

}

 //echo '<script>window.location.href = "myOrders.php";</script>';			
												
}
?>
							<!-- end form -->
					
						<!-- end side-panel -->
		</div>
	<?php include('footer.php');?>				<!--end .col-md-3 -->
						<!-- end .chekout class -->
				
	</div>
				<!-- end .row -->
		