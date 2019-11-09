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
	 if(isset($_POST['saveItem']))
	{	
		$sql="UPDATE `menu` set `item_name`='$_POST[itemName]', `price`=$_POST[itemPrice], `prep_time`='00:$_POST[prepTime]:00', `food_category_id`='$_POST[category]' where owner_id=$_SESSION[cid] and menu_id=$_GET[itemId]";
		
		if(!$qsql=mysqli_query($con,$sql))
		{
			echo mysqli_error($con);
		}
		else
		{
			echo '<script>window.location.href="manageMenu.php"</script>';
			//header("Location: manageMenu.php");		
		}
		
	}
	
	
?>
      <!-- end .heading -->
      <div class="leave-reply">
        <div style="width:40%; margin:auto;">
            <h5 align="center">Edit Item </h5>
            <form action="" method="post">
			
			<?php 
			$sql="select * from menu where menu_id=$_GET[itemId]";
			$rs=mysqli_query($con,$sql);
			$rowMenu=mysqli_fetch_array($rs);
			?>
            <div class="row">
                <div class="col-md-12 col-sm-4">
                <input type="text" placeholder="Item Name" name="itemName" required value="<?php echo $rowMenu['item_name']; ?>">
                </div>
                <div class="col-md-12 col-sm-4">
                <input type="text" placeholder="Item Price" name="itemPrice" required onkeypress="javascript:return isNumber(event)" value="<?php echo $rowMenu['price']; ?>">
                </div>
                <div class="col-md-12 col-sm-4">
				<?php$min=$rowMenu['prep_time'];
					//date("i")?>
                <input type="number" name="prepTime" placeholder="Preparation Time(in minutes)" required value="<?php //echo date("i") ?>">
                </div>
                <div class="col-md-12 col-sm-4">
				<?php
						$sql="select * from food_category";
						$rsFood=mysqli_query($con,$sql);
						?>
						<select name="category" style="width:100%; height: 40px;" required>
						<option value="">Select Food Category</option>
						<?php
						
						while($row=mysqli_fetch_array($rsFood))
						{
							if($rowMenu['food_category_id']==$row['food_category_id'])
								echo "<option value=$row[food_category_id] selected='selected'>$row[name]</option>";
							else
								echo "<option value=$row[food_category_id]>$row[name]</option>";
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
                    <button name="saveItem"> Save Changes </button>
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
