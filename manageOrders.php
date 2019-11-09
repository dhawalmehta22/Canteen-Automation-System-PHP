<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from new.uouapps.com/takeaway/menu-without-side-panel.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Mar 2019 04:37:13 GMT -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Manage Orders</title>
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
    
      <!-- end .header-top-bar -->

      <?php 
	  include ("dbConnect.php");
        include ("header.php");
      ?>
	  
	 <?php 
		if(isset($_POST['reject1']))
		{
			$sqlReject="update Order_table set status_id=1 where order_id=$_POST[orderId1]";
			$rsReject=mysqli_query($con,$sqlReject);
			if(!$rsReject)
				echo "<script>alert('unable to update')</script>";
			//else
				//	header("Location: manageOrders.php");
		}
		else if(isset($_POST['reject2']))
		{
			$sqlReject="update Order_table set status_id=1 where order_id=$_POST[orderId2]";
			$rsReject=mysqli_query($con,$sqlReject);
			if(!$rsReject)
				echo "<script>alert('unable to update')</script>";
			//else
				//	header("Location: manageOrders.php");
		}
		
		else if(isset($_POST['reject3']))
		{
			$sqlReject="update Order_table set status_id=1 where order_id=$_POST[orderId3]";
			$rsReject=mysqli_query($con,$sqlReject);
			if(!$rsReject)
				echo "<script>alert('unable to update')</script>";
			//else
					//header("Location: manageOrders.php");
		}
		else if(isset($_POST['reject4']))
		{
			$sqlReject="update Order_table set status_id=1 where order_id=$_POST[orderId4]";
			$rsReject=mysqli_query($con,$sqlReject);
			if(!$rsReject)
				echo "<script>alert('unable to update')</script>";
			//else
					//header("Location: manageOrders.php");
		}
		else if(isset($_POST['reject5']))
		{
			$sqlReject="update Order_table set status_id=1 where order_id=$_POST[orderId25]";
			$rsReject=mysqli_query($con,$sqlReject);
			if(!$rsReject)
				echo "<script>alert('unable to update')</script>";
			//else
				//	header("Location: manageOrders.php");
		}
		if(isset($_POST['finishedPreparing1']))
		{
			$sqlReject="update Order_table set status_id=3 where order_id=$_POST[orderId1]";
			$rsReject=mysqli_query($con,$sqlReject);
			if(!$rsReject)
				echo "<script>alert('unable to update')</script>";
			//else
					//header("Location: manageOrders.php");
		}
		else if(isset($_POST['finishedPreparing2']))
		{
			$sqlReject="update Order_table set status_id=3 where order_id=$_POST[orderId2]";
			$rsReject=mysqli_query($con,$sqlReject);
			if(!$rsReject)
				echo "<script>alert('unable to update')</script>";
			//else
				//	header("Location: manageOrders.php");
		}
		
		else if(isset($_POST['finishedPreparing3']))
		{
			$sqlReject="update Order_table set status_id=3 where order_id=$_POST[orderId3]";
			$rsReject=mysqli_query($con,$sqlReject);
			if(!$rsReject)
				echo "<script>alert('unable to update')</script>";
			//else
				//	header("Location: manageOrders.php");
		}
		
		else if(isset($_POST['finishedPreparing4']))
		{
			$sqlReject="update Order_table set status_id=3 where order_id=$_POST[orderId4]";
			$rsReject=mysqli_query($con,$sqlReject);
			if(!$rsReject)
				echo "<script>alert('unable to update')</script>";
		//	else
					//header("Location: manageOrders.php");
		}
		
		else if(isset($_POST['finishedPreparing5']))
		{
			$sqlReject="update Order_table set status_id=3 where order_id=$_POST[orderId5]";
			$rsReject=mysqli_query($con,$sqlReject);
			if(!$rsReject)
				echo "<script>alert('unable to update')</script>";
			//else
				//	header("Location: manageOrders.php");
		}
		
		
	  ?>
      <!-- end .header-nav-bar -->

      <!-- end #header -->
    <!-- thumbnail slide section -->
    <div id="page-content">
    
    <div class="container">
				<div class="row mt30">
					<div class="col-md-10 col-md-push-1">
						<ul class="nav nav-tabs" role="tablist">
							<li class="active"><a href="#tab-1" role="tab" data-toggle="tab">Current Orders</a>
							</li>
							<li><a href="#tab-2" role="tab" data-toggle="tab">Completed Orders</a>
							</li>
							<li><a href="#tab-3" role="tab" data-toggle="tab">Cancelled Orders</a>
							</li>
						</ul>

						<!-- end view-style -->
						<br>	
						<div class="tab-content" >
							<div class="tab-pane fade in active" id="tab-1">
                <div>
                  <div class="leave-reply">
                    <div style=" margin:auto;"> 
                    <h5 align="center">Current Orders List</h5><br>
					<form method="post">
  					
                      <table width="100%">
                        <tr>
                          <th><center>Order Id</center></th>
                          <th><center>Student Id</center></th>
                          <th style="width:20%;"><center>Item List</center></th>
                          <th><center>Amount</center></th>
                          <th><center>Payment Mode</center></th>
						  <th colspan="2"><center> Your Order</center></th>
                          
                        </tr>
                   
 <?php
						$sql="select * from order_table where status_id=2 and owner_id='$_SESSION[cid]' order by order_id DESC";
						$rs=mysqli_query($con,$sql);
						$orderCnt=1;
						while($rowOrder=mysqli_fetch_array($rs))
						{
							
						
						?>
					<tr>
                          <td><input type="hidden" name="orderId<?php echo $orderCnt ?>" value="<?php echo $rowOrder['order_id'];?>"><?php echo $rowOrder['order_id'];?></td>
                          <td><?php echo $rowOrder['student_id'];?></td>
						  <td style="width:20%;">
						  <?php 
								$sqlCart="select * from `cart` where student_id='$rowOrder[student_id]' and order_id=$rowOrder[order_id]";
								$rsCart=mysqli_query($con,$sqlCart);
								
								while($rowCart=mysqli_fetch_array($rsCart))
								{
									$qty=$rowCart[3];
									$menuId=$rowCart[2];
									
									$sql="select item_name from menu where menu_id=$menuId and owner_id=$_SESSION[cid] limit 1";
									$rsMenu=mysqli_query($con,$sql);
									$rowMenu=mysqli_fetch_array($rsMenu)[0];
						  ?>
                          <?php echo $rowMenu ;?> X <?php echo $rowCart[3]; ?><br>
						<?php   
		
						} ?>
						  </td>
                          <td><?php echo $rowOrder['amount'];?></td>
						  
						  <?php 
							
						$sql1="select mode from payment_mode where pay_id=$rowOrder[pay_id] limit 1";
						$rspay=mysqli_query($con,$sql1);
						
						$rspayData=mysqli_fetch_array($rspay)[0];
						
						  
						  ?>
						  
                          <td><?php echo $rspayData;?></td>
                          <td><center><button name="reject<?php echo $orderCnt ?>" width="auto">Reject</button></center></td>
						  <td style="font-size:55%;font-weight:bold;"><center><button name="finishedPreparing<?php echo $orderCnt ?>" width="80%">Finished Preparing</button></center></td>
                        </tr>
						
						<?php  
						$orderCnt+=1;
						} ?>	
                        
                      </table>
					</form>
                    </div>
      
                  </div>
                </div>
		
							</div>
								<!--end all-menu-details-->
						
								
								 
						

						<!-- tab 2 content -->
							<div class="tab-pane fade" id="tab-2">
                <div>
                  <div class="leave-reply">
                    <div style=" margin:auto;"> 
                    
                      <h5 align="center">Completed Orders List</h5><br>
                      <table width="100%">
                        <tr>
                        <th><center>Order Id</center></th>
                          <th><center>Student Id</center></th>
                          <th><center>Item List</center></th>
                          <th><center>Amount</center></th>
                          <th><center>Payment Mode</center></th>
						  <th><center>Order Status</center></th>
                         
                        </tr>

 <?php
						$sql="select * from order_table where status_id=3 and owner_id='$_SESSION[cid]' order by date,order_time";
						$rs=mysqli_query($con,$sql);
						
						while($rowOrder=mysqli_fetch_array($rs))
						{
							
						
						?>
					<tr>
                          <td><input type="hidden" name="orderId" value="<?php echo $rowOrder['order_id'];?>"><?php echo $rowOrder['order_id'];?></td>
                          <td><?php echo $rowOrder['student_id'];?></td>
						  <td style="width:20%;">
						  <?php 
								$sqlCart="select * from `cart` where student_id='$rowOrder[student_id]' and order_id=$rowOrder[order_id]";
								$rsCart=mysqli_query($con,$sqlCart);
								
								while($rowCart=mysqli_fetch_array($rsCart))
								{
									$qty=$rowCart[3];
									$menuId=$rowCart[2];
									
									$sql="select item_name from menu where menu_id=$menuId and owner_id=$_SESSION[cid] limit 1";
									$rsMenu=mysqli_query($con,$sql);
									$rowMenu=mysqli_fetch_array($rsMenu)[0];
						  ?>
                          <?php echo $rowMenu ;?> X <?php echo $rowCart[3]; ?><br>
						<?php   } ?>
						  </td>
                          <td><?php echo $rowOrder['amount'];?></td>
						  
						  <?php 
							
						$sql1="select mode from payment_mode where pay_id=$rowOrder[pay_id] limit 1";
						$rspay=mysqli_query($con,$sql1);
						
						while($rspayData=mysqli_fetch_array($rspay))
						{
						  
						  ?>
						  
                          <td><?php echo $rspayData['mode'];?></td>
						<td>Completed</td>
					</tr>
					
						<?php }} ?>


                        <!--<td><center><input type="submit" value="&#10004;"></center></td>-->
                      </table>
                    </div>
                  </div>
                </div>
							</div> 
							<!-- tab 2 end  -->
						 	<!-- tab 3 start -->
							<div class="tab-pane fade" id="tab-3">

                <div>
                  <div class="leave-reply">
                    <div style=" margin:auto;"> 
					
                    <h5 align="center">Cancelled Orders List</h5><br>
                      <table width="100%">
                        <tr>
                           <th><center>Order Id</center></th>
                          <th><center>Student Id</center></th>
                          <th><center>Item List</center></th>
                          <th><center>Amount</center></th>
						  <th><center>Payment Mode</center></th>
						  <th><center>Order Status</center></th>
                        </tr>
						
						
 <?php
						$sql="select * from order_table where status_id=1 and owner_id='$_SESSION[cid]' order by date,order_time";
						$rs=mysqli_query($con,$sql);
						
						while($rowOrder=mysqli_fetch_array($rs))
						{
							
						
						?>
					<tr>
                          <td><input type="hidden" name="orderId" value="<?php echo $rowOrder['order_id'];?>"><?php echo $rowOrder['order_id'];?></td>
                          <td><?php echo $rowOrder['student_id'];?></td>
						  <td style="width:20%;">
						  <?php 
								$sqlCart="select * from `cart` where student_id='$rowOrder[student_id]' and order_id=$rowOrder[order_id]";
								$rsCart=mysqli_query($con,$sqlCart);
								
								while($rowCart=mysqli_fetch_array($rsCart))
								{
									$qty=$rowCart[3];
									$menuId=$rowCart[2];
									
									$sql="select item_name from menu where menu_id=$menuId and owner_id=$_SESSION[cid] limit 1";
									$rsMenu=mysqli_query($con,$sql);
									$rowMenu=mysqli_fetch_array($rsMenu)[0];
						  ?>
                          <?php echo $rowMenu ;?> X <?php echo $rowCart[3]; ?><br>
						<?php   } ?>
						  </td>
                          <td><?php echo $rowOrder['amount'];?></td>
						  
						  <?php 
							
						$sql1="select mode from payment_mode where pay_id=$rowOrder[pay_id] limit 1";
						$rspay=mysqli_query($con,$sql1);
						
						while($rspayData=mysqli_fetch_array($rspay))
						{
						  
						  ?>
						  
                          <td><?php echo $rspayData['mode'];?></td>
						  <td>Cancelled</td>
						</tr>
						<?php }} ?>
						
						                      </table>

                    </div>
      
                  </div>
                </div>
								
							</div>
							<!--tab 3 end -->
							<!-- tab 4 start -->
							
						</div>
					</div>
					<!--end main-grid layout-->
					<!-- Side-panel begin -->
					<!--end .col-md-3 -->
					
				</div>
				<!-- end .row -->
			</div>
			<!--end .container -->
		
			
		</div>

    
    
    
    
      <!-- start #main-wrapper -->
      
      <!--end .container -->
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


<!-- Mirrored from new.uouapps.com/takeaway/menu-without-side-panel.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Mar 2019 04:37:13 GMT -->
</html>
