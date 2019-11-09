<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from new.uouapps.com/takeaway/menu(view-2).html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Mar 2019 04:37:13 GMT -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Manage Incomes and Expenses</title>
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
						<ul class="nav nav-tabs" role="tablist">
							<li class="active"><a href="#tab-1" role="tab" data-toggle="tab">All</a>
							</li>
							
							<li><a href="#tab-3" role="tab" data-toggle="tab">Expense</a>
							</li>
							<li><a href="#tab-4" role="tab" data-toggle="tab">Add Expense</a>
							</li>
							<li><a href="#tab-5" role="tab" data-toggle="tab">Update Khata</a>
							</li>
						</ul>

						<!-- end view-style -->
						<br>	
						<div class="tab-content" >
							<div class="tab-pane fade in active" id="tab-1">
								<div>
									<div class="leave-reply">
										<div style=" margin:auto;"> 
										<?php  
										$today = date("Y-m-d"); 
										$month=date("m");
										//echo"<script>alert($month);</script>";
										$sql="select amount,date from order_table where owner_id='$_SESSION[cid]' and date='$today' and status_id=3";
										$rs=mysqli_query($con,$sql);
										$incomeAmount=0;
										$dateMonth=0;
										while($row=mysqli_fetch_array($rs))
										{
											$dateMonth=$row['date'];
											$amount=$row['amount'];
											$incomeAmount=$incomeAmount+$amount;
										}
										
										$sql1="select amount from order_table where owner_id='$_SESSION[cid]' and status_id=3 and month(date)=$month";
										$rs1=mysqli_query($con,$sql1);
										$monthIncome=0;
										//$dateMonth=0;
										while($row1=mysqli_fetch_array($rs1))
										{
											//$dateMonth=$row['date'];
											$amount=$row1['amount'];
											$monthIncome=$monthIncome+$amount;
										}
										
										?>
											<h5 align="center">Income And Expenses</h5>
											<table width="100%">
												<tr>
													<th>      </th>
													<th><center>Today's</center></th>
													<th><center>Monthly</center></th>
												</tr>
												
												<tr>
													<td><b>Income<b></td>
													<td><?php echo $incomeAmount ?> Rs. </td>
					
													<td><?php echo $monthIncome ?> Rs.</td>
												</tr>
												<tr>
												<?php  
										$today = date("Y-m-d"); 
										$month=date("m");
										//echo"<script>alert($month);</script>";
										$sql="select amount from cexpense where owner_id='$_SESSION[cid]' and date='$today'";
										$rs=mysqli_query($con,$sql);
										$expenseAmount=0;
										//$dateMonth=0;
										while($row=mysqli_fetch_array($rs))
										{
											//$dateMonth=$row['date'];
											//echo"<script>alert($dateMonth);</script>";
										
											$amount=$row['amount'];
											$expenseAmount=$expenseAmount+$amount;
										}
										$sql1="select amount from cexpense where owner_id='$_SESSION[cid]' and month(date)=$month";
										$rs1=mysqli_query($con,$sql1);
										$monthExpense=0;
										//$dateMonth=0;
										while($row1=mysqli_fetch_array($rs1))
										{
											//$dateMonth=$row['date'];
											$amount=$row1['amount'];
											$monthExpense=$monthExpense+$amount;
										}
										?>
													<td><b>Expenses<b></td>
													<td><?php echo $expenseAmount ?> Rs.</td>
													
													<td><?php echo $monthExpense ?> Rs.</td>
												</tr>
											</table>
											
										</div>
							        </div>
                				</div>
							</div>
								<!--end all-menu-details-->
						
								
								 
						

						<!-- tab 2 content -->
						
							<!-- tab 2 end  -->
						 	<!-- tab 3 start -->
							<div class="tab-pane fade" id="tab-3">
							
								<div>
									<div class="leave-reply">
										<div style=" margin:auto;"> 
											<h5 align="center">Expenses</h5>
											<table width="100%">
											
												<tr>
													<th><center>Category</center></th>
													<th><center>Amount</center></th>
													<th><center>Date</center></th>
												</tr>
												<?php
													$sql="select * from cexpense where owner_id='$_SESSION[cid]'";
													
													$rs=mysqli_query($con,$sql);			
						
						
													while($row=mysqli_fetch_array($rs))
													{
														//$itemId=$row[0];
														//$itemName=$row[1];
														$ecategory=$row[3];
														$expenseAmount=$row[2];
														$date=$row[4];
													

													
													$sql1="select * from expense_category where ecategory_id='$ecategory'";
													
													$rsCategory=mysqli_query($con,$sql1);			
						
						
													while($row1=mysqli_fetch_array($rsCategory))
													{
														//$itemId=$row[0];
														//$itemName=$row[1];
														$ecategoryName=$row1[1];	
													}
													
													?>
												<tr>
													<td><?php echo $ecategoryName ?></td>
													<td><?php echo $expenseAmount ?></td>
													<td><?php echo $date ?></td>
													
												</tr>
													<?php  } ?>
											</table>
										</div>
							        </div>
                				</div>
							
							</div>
							<!--tab 3 end -->
							<!-- tab 4 start -->
							<div class="tab-pane fade" id="tab-4">
							
								<div class="leave-reply">
        							<div style="width:40%; margin:auto;"> 
          								<h5 align="center">Add Expense</h5>
          								<form action="" method="post">
            								<div class="row">
												<br>
              									<div class="col-md-12 col-sm-4">
												<?php
													$sql="select * from expense_category";
													$rs=mysqli_query($con,$sql);
													?>
													<select name="expense_category" id="expense_category" style="width:100%; height: 40px;">
													<option value="-1">Select Expense Category</option>
													<?php
													
													while($row=mysqli_fetch_array($rs))
													{
														echo"<option value=$row[ecategory_id]>$row[name]</option>";
										   
													}
													echo"</select>";
												?>
												 <?php
													
														//$sdate=strtotime("tomorrow");
														//$sdate=date('Y-m-d',$sdate);
														$today = date("Y-m-d"); 

												 if(isset($_POST['expenseAmount']))
												{	
													$sql="INSERT INTO `cexpense`(`owner_id`, amount, `ecategory_id`, `date`) VALUES ('$_SESSION[cid]','$_POST[expenseAmount]','$_POST[expense_category]','$today')";
													
													if(!$qsql=mysqli_query($con,$sql))
													{
														echo mysqli_error($con);
													}
													else
													{
														//alert('Item added to your menu...');
														header("Location: IncomeAndExpense.php");		
													}
												}
												
											?>
              									</div>
              
              									<div class="col-md-12 col-sm-4">
													<br>
													<input type="text" style="width:100%; height: 40px;" placeholder="Amount" name="expenseAmount">
												</div>

             
            								</div>
			<!-- end nasted .row -->
											<br>
								            <div style="text-align: center;">
												<button name="addExpense"> Add</button>
											</div>
										</form>
									</div>
      
	  							</div>
							</div>
							<div class="tab-pane fade" id="tab-5">
							
								<div class="leave-reply">
        							<div style="width:40%; margin:auto;"> 
										<h5 align="center">Update Khata</h5>
										<form action="" method="post">
											<div class="row">
											
												<div class="col-md-12 col-sm-4">
													<br>
													<input type="text" style="width:100%; height: 40px;" placeholder="Student Id" name="studentId" >
												</div>
											
												<div class="col-md-12 col-sm-4">
													<br>
													<input type="text" style="width:100%; height: 40px;" placeholder="Amount" name="amount">
												</div>
											</div>
											<!-- end nasted .row -->
											<br>
											<div style="text-align: center;">
												<button name="updateKhata">Update</button>
											</div>
										</form>
								
										<?php
											if(isset($_POST['updateKhata'])){
													
													$khataAmount=$_POST['amount'];
													$sql="select amount from khata where student_id='$_POST[studentId]' and owner_id='$_SESSION[cid]'";
													$rs=mysqli_query($con,$sql);
													
													while($row=mysqli_fetch_array($rs))
													{
														$amountK=$row['amount']-$khataAmount;
														//$amountK=$amountK-$khataAmount;
													$sql1="UPDATE khata set amount='$amountK' where student_id='$_POST[studentId]' and owner_id='$_SESSION[cid]'";
													if(!$qsql=mysqli_query($con,$sql1))
													{
														echo mysqli_error($con);
													}
													else
													{
														echo "<script>alert('Khata Updated...$amountK')</script>";
														//header("Location: IncomeAndExpense.php");		
													}
													}
												
											}
											?>						
											
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--end main-grid layout-->
					<!-- Side-panel begin -->
					<!--end .col-md-3 -->
					
				</div>
				<!-- end .row -->
			</div>
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


<!-- Mirrored from new.uouapps.com/takeaway/menu(view-2).html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Mar 2019 04:37:13 GMT -->
</html>
