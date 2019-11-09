<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="js/masterslider/style/masterslider.css">
	<link rel="stylesheet" href="js/masterslider/skins/black-2/style.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="css/owl.theme.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="icon" href="img/DALOGO.gif" type="image/gif" sizes="16x16">

	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<?php
//ob_start();

session_start();

include("dbconnect.php");
if(isset($_SESSION["id"]))
{
$sql = "select * from student_info where student_id='$_SESSION[id]'";
$qsqlstaff = mysqli_query($con,$sql);
$rsstaff = mysqli_fetch_array($qsqlstaff);
}
else if(isset($_SESSION["cid"]))
{
$sql = "select * from canteen_owner where owner_id='$_SESSION[cid]'";
$qsqlstaff = mysqli_query($con,$sql);
$rsstaff = mysqli_fetch_array($qsqlstaff);
}
?>

<header id="header">

			<div class="header-nav-bar">
				<nav class="navbar navbar-default" role="navigation">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="index.php">
								<img src="img/header	-logo.png" alt="DA-Canteens">
							</a>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right">
								<li class="dropdown">
									<a href="index.php">Home </a>
				<?php
	  if(isset($_SESSION["id"]))
	  {
		?>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu Card <span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="menu.php?owner=1">Honey Foods(Canteen 1)</a></li>
										<li><a href="menu.php?owner=2">Padma Kamal(Canteen 2)</a></li>
										<li><a href="menu.php?owner=3">Amul outlet(Canteen 3)</a></li>
										<li><a href="menu.php?owner=4">Kuldevi caterers(Canteen 4)</a></li>
								
									</ul>
								</li>
								
		<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $rsstaff['name']; ?> <span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
									<li><a href="mycart.php">My Cart</a></li>
										<li><a href="myOrders.php">My Orders</a></li>
										<li><a href="studentKhataView.php">My Khata</a></li>
										<li><a href="editProfile.php">Edit Profile</a></li>
										<li><a href="logout.php">Logout</a></li>
										
									</ul>
		</li>
		
		<?php
	  }
		else if(isset($_SESSION["cid"]))
	  {
		?>
									<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu Card <span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="cmenu.php?owner=1">Honey Foods(Canteen 1)</a></li>
										<li><a href="cmenu.php?owner=2">Padma Kamal(Canteen 2)</a></li>
										<li><a href="cmenu.php?owner=3">Amul outlet(Canteen 3)</a></li>
										<li><a href="cmenu.php?owner=4">Kuldevi caterers(Canteen 4)</a></li>
								
									</ul>
								</li>
									<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Activities <span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="viewKhata.php">View Khata</a></li>
										<li><a href="IncomeAndExpense.php">Income and Expense</a></li>
										<li><a href="manageOrders.php">Manage Orders</a></li>
										<li><a href="manageMenu.php">Manage Menu</a></li>
										<!--<li><a href="AddNewItem.php">Enetr New Item</a></li>-->
								
									</ul>
									</li>
									<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $rsstaff['owner_name']; ?> <span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="editProfileCanteen.php">Edit Profile</a></li>
										<li><a href="logout.php">Logout</a></li>

									</ul>
									</li>
      <?php
	  }
	  else
	  {
	  ?>

						<li class="dropdown">
								<a href="login.php" class="dropdown-toggle" >Login/SignUp</span></a>
								
						</li>
      <?php
	  }						
			if(isset($_SESSION["id"]))
	  {
		?>					
								<li><a href="contact.php">Contact us</a>
								</li>
	  <?php } ?>
							</li>
							</ul>
						</div>
						<!-- /.navbar-collapse -->
					</div>
					<!-- /.container-fluid -->
				</nav>
			</div>
			<!-- end .header-nav-bar -->
			
		</header>