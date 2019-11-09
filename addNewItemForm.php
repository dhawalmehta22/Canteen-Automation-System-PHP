<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from new.uouapps.com/takeaway/chef.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Mar 2019 04:37:20 GMT -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Add Menu Item</title>
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

  <!--[if IE 9]>
		<script src="js/media.match.min.js"></script>
	<![endif]-->
</head>

<body>

  <div id="main-wrapper">
      <?php
	  include 'dbconnect.php';
      include 'header.php';
	  ?>

    <!-- end #header -->

    <div class="page-content">
     <?php
	 if(isset($_POST['addItem']))
	{	
		$sql="INSERT INTO `menu`(`item_name`, `price`, `prep_time`, `food_category_id`, `owner_id`) VALUES ('$_POST[itemName]',$_POST[itemPrice],'00:$_POST[prepTime]:00','$_POST[food_category]','$_SESSION[cid]')";
		
		if(!$qsql=mysqli_query($con,$sql))
		{
			echo mysqli_error($con);
		}
		else
		{
			//alert('Item added to your menu...');
			//header("Location: manageMenu.php");		
		}
	}
	
	
?>
      <!-- end .heading -->
      <div class="leave-reply">
        <div style="width:40%; margin:auto;">
            <h5 align="center">Add New Item </h5>
            <form action="" method="post">
            <div class="row">
                <div class="col-md-12 col-sm-4">
                <input type="text" placeholder="Item Name" name="itemName" required>
                </div>
                <div class="col-md-12 col-sm-4">
                <input type="text" placeholder="Item Price" name="itemPrice" required onkeypress="javascript:return isNumber(event)">
                </div>
                <div class="col-md-12 col-sm-4">
                <input type="number" name="prepTime" placeholder="Preparation Time(in minutes)" required>
                </div>
                <div class="col-md-12 col-sm-4">
				<?php
						$sql="select * from food_category";
						$rs=mysqli_query($con,$sql);
						?>
						<select name="food_category" id="food_category" style="width:100%; height: 40px;" required>
						<option value="">Select Food Category</option>
						<?php
						
						while($row=mysqli_fetch_array($rs))
						{
							echo"<option value=$row[food_category_id]>$row[name]</option>";
               
						}
						echo"</select>";
						
					?>
					<br><br>
                </div>
				
               <!-- <div class="col-md-12 col-sm-4"><br><br><br>
                Availiability:<br>
                From<input type="time" placeholder="">
                </div>

                <div class="col-md-12 col-sm-4">
                To <input type="time" placeholder="">
                </div>
            </div>
            <!-- end nasted .row -->
                <div style="text-align: center;">
                    <button name="addItem"> Add </button>
                </div><br>
            </form>
        
        </div>
		</div>
      <!-- end .chef-details -->
    </div>
    <!-- end page-content -->

    <!--footer start-->
   <?php  include 'footer.php'; ?>
    <!-- end #footer -->
  </div>
  <!-- end #main-wrapper -->
  <!-- Scripts -->
  <!-- CDN jQuery -->
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
  function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }  
 	
  </script>

</body>


<!-- Mirrored from new.uouapps.com/takeaway/chef.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Mar 2019 04:37:20 GMT -->
</html>
