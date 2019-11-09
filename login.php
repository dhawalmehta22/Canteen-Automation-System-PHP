<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from new.uouapps.com/takeaway/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Mar 2019 04:37:32 GMT -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login/Signup</title>
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
  <link href="../../maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  	<link rel="icon" href="img/DALOGO.gif" type="image/gif" sizes="16x16">

  <!--[if IE 9]>
	<script src="js/media.match.min.js"></script>
  <![endif]-->
</head>
<?php
include("dbconnect.php");
/*
if ( ! empty( $_POST ) ) {
    if ( isset( $_POST['id'] ) && isset( $_POST['password'] ) ) {
        // Getting submitted user data from database
       // $con = new mysqli($db_host, $db_user, $db_pass, $db_name);
        $stmt = $con->prepare("SELECT * FROM student_info WHERE student_id = ?");
        $stmt->bind_param('s', $_POST['id']);
        $stmt->execute();
        $result = $stmt->get_result();
    	$user = $result->fetch_object();
    		
    	// Verify user password and set $_SESSION
    	if ( password_verify( $_POST['password'], $user->password ) ) {
    		$_SESSION['user_id'] = $user->ID;
    	}
    }
}
if ( isset( $_SESSION['user_id'] ) ) {
        header("Location:index.php");

} else {
    // Redirect them to the login page
    header("Location:login.php");
}
session_destroy();
*/


//session_start();	
/*if(isset($_SESSION["id"]))
{
	header('Location: index.php');
}*/
//1. Database connection
if(isset($_POST["submit"]))
{
	//echo strlen($_POST["id"]);
	//die();
	if(strlen($_POST["id"]>=6))
	{
	$sql = "SELECT * FROM student_info WHERE student_id='$_POST[id]' AND password='$_POST[password]'";

	/*else
	$sql = "SELECT * FROM `canteen_owner` WHERE `canteen_owner_id`='$_POST[id]' AND `password`='$_POST[password]'";
	*/
	if(!$qsql = mysqli_query($con,$sql))
	{
		echo mysqli_error($con);
	}
	else
	{
		if(mysqli_num_rows($qsql)==1)
		{
			session_start();
			$rs = mysqli_fetch_array($qsql);
			$_SESSION["id"] = $rs['student_id'];			
			$_SESSION["password"] = $rs['password'];			
			//$_SESSION["user_type"] = $rs[type];
			echo $_SESSION["id"];
			echo "<script>alert('login successful student') </script>";
			//echo strlen($_POST["id"]);
			header('Location: index.php');
		}
		else
		{
			echo "<script>alert('Invalid Login ID and password entered...')</script>";	
		}
	}
	}
	else if(strlen($_POST["id"]<=6))
	{
	
	$sql = "SELECT * FROM `canteen_owner` WHERE `owner_id`='$_POST[id]' AND `password`='$_POST[password]'";
	
	if(!$qsql = mysqli_query($con,$sql))
	{
		echo mysqli_error($con);
	}
	else
	{
		if(mysqli_num_rows($qsql)==1)
		{
			session_start();
			$rs = mysqli_fetch_array($qsql);
			$_SESSION["cid"] = $rs['owner_id'];			
			$_SESSION["password"] = $rs['password'];			
			//$_SESSION["user_type"] = $rs[type];
			echo $_SESSION["cid"];
			//echo "<script>alert('login successful student')</script>";
			header('Location: index.php');
		}
		else
		{
			echo "<script>alert('Invalid Login ID and password entered...')</script>";	
		}
	}
	}
}
?>

<body>
  <div id="main-wrapper" >
 			<?php include("header.php");?>

		<!-- end #header -->

    <div class="page-content" >
      
      <div class="contact-us" >
        <div class="container">

          <div class="row">
            <!--<div class="col-md-6">
      
               end .contact-details 
            </div>-->
            <!-- end .main-grid-layout -->
			

            <div class="col-md-6">
		
              <div class="send-message">
			  
                <h4>Login</h4>
                <form action="" method="post">
				
		
                  <div class="row">
                    <div class="col-md-6">
                      <input type="text" placeholder="ID*" name="id" required onkeypress="javascript:return isNumber(event)">
                    </div>
					
                    <div class="col-md-6">
                      <input type="password" placeholder="Password*" name="password" required>
                    </div>
                 </div><br>
                  <!-- end nasted .row -->
                  <button name="submit"><i class="fa fa-paper-plane-o"></i>Login</button><br><br>
				<span> Don't have an account? <a href="StudentSignUpForm.php" style="color:red;">SignUp</a></span><br><br>

				</form>
              </div>
              <!-- end .send-message -->
            </div>
            <!-- end .main-grid-layout -->
          </div>
          <!-- end .row -->
        </div>
        <!-- end .container -->
      </div>
      <!-- end .contact-us -->
    </div>
    <!-- end page-content -->

  		<!--footer start-->
			<?php include("footer.php");?>

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

<!-- Mirrored from new.uouapps.com/takeaway/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Mar 2019 04:37:32 GMT -->
</html>