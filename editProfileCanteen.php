<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Student Signup From</title>
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
  <script>
  function initialize()
  {
	  document.getElementById("pError").hide(); 
	  document.getElementById("phoneError").hide(); 
	  
  }
 </script>        
        

  <!--[if IE 9]>
		<script src="js/media.match.min.js"></script>
	<![endif]-->
</head>

<body onload="initialize()">
  <div id="main-wrapper">
    <?php include("header.php")?>  
  <?php
	include("dbconnect.php");
	$err='';
	$phoneError='';
	$sidError='';
	$nameError='';
	$branchError='';
	$emailError='';
	$pwdError='';
	/*function validate(){
			var z=false;
            var a = document.getElementById("password").value;
            var b = document.getElementById("confirm_password").value;
            if (a!=b) {
				               alert("Passwords do no match");
			}
			else
				   z=true;*/
			   
	function validation ($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
};
	if(isset($_POST['submit']))
	{	
				
		if (validation($_POST['confirm_password']))
        {   
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            if ($confirm_password != $password) {
           $err='Your passwords does not match!';
			//header("Location: StudentSignUpForm.php");
           // echo $err;
        }
		else{
		$sql="UPDATE `canteen_owner` set `owner_name`='$_POST[ownerName]',`canteen_name`='$_POST[canteenName]', `phone_nu`=$_POST[phone],`password`='$_POST[password]' where owner_id=$_SESSION[cid]";
		
		if(!$qsql=mysqli_query($con,$sql))
		{
			echo mysqli_error($con);
		}
		else
		{
			//echo "<script>alert('Profile Updated...')</script>";
			header("Location: index.php");		
		}
		}

	}
	}



?>


    <!-- end #header -->
    <!-- end #header -->
    <!-- end #header -->

    <div class="page-content">
     
      <!-- end .heading -->
      <div class="leave-reply">
        <div style="width:40%; margin:auto;"> 
          <h5 align="center">Your Profile </h5>
		  <form action="" method="post" >
			
            <div class="row">
              <?php
						$sql="select * from canteen_owner where owner_id='$_SESSION[cid]'";
						$rs=mysqli_query($con,$sql);
						
						while($rsdata=mysqli_fetch_array($rs))
						{
						
						?>
			  
			  
              <div class="col-md-12 col-sm-4">
               <input type="text" placeholder="Owner Name"  name="ownerName" required value="<?php echo $rsdata['owner_name']; ?>">
				
              </div>
			  <div class="col-md-12 col-sm-4">
               <input type="text" placeholder="Canteen Name" required name="canteenName" id="name" value="<?php echo $rsdata['canteen_name']; ?>">
				
              </div>
				<div class="col-md-12 col-sm-4">
					<input type="text" placeholder="Phone No." required name="phone" id="phone" maxlength="10" pattern="[1-9]{1}[0-9]{9}" placeholder="10 digit phone number" value="<?php echo $rsdata['phone_nu']; ?>">
					<span style="color:red" id="phoneError" name="phoneError"><?php echo $phoneError; ?></span>
				</div>
				
              <div class="col-md-12 col-sm-4">
                <input type="password" placeholder="Password" id="password" name="password" value="<?php echo $rsdata['password']; ?>">
				<span style="color:red" id="pwdError" name="pwdError"><?php echo $pwdError; ?></span>
              </div>
              <div class="col-md-12 col-sm-4">
                <input type="password" placeholder="Confirm Password" id="confirm_password" name="confirm_password" value="<?php echo $rsdata['password']; ?>">
				 <span style="color:red" id="pError" name="pError"><?php echo $err; ?></span>
              </div>
            </div>
			
						<?php }?>
            <!-- end nasted .row -->
            <div style="text-align: center;">
              <button name="submit" onclick="validation();" id="submit"> Update Profile </button>
            </div>
          </form>
        </div>
      
      </div>
      <!-- end .chef-details -->
    </div>
    <!-- end page-content -->

    <!--footer start-->
    <?php include("footer.php")?>
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
  </script>

</body>


<!-- Mirrored from new.uouapps.com/takeaway/chef.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Mar 2019 04:37:20 GMT -->
</html>
