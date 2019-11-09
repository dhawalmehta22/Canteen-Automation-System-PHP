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
	<link rel="icon" href="img/DALOGO.gif" type="image/gif" sizes="16x16">

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
		if (validation($_POST['name']) == '')
        {
            $nameError = "Please enter your name!<br />";
        }
        if (validation($_POST['id']) == '')
        {
                        $sidError = "Please enter student id<br />";
        }
        
        if (validation($_POST['phone'] == ''))
        {
            $phoneError = 'Please enter your mobile number!<br />';
        }
		 /*else if(!ereg("^[0-9]{3}-[0-9]{3}-[0-9]{4}$", $_POST['phone'])) 
            { 
                   $phoneError = 'Please enter your valid phone number';
            }  */ 
    
        if(validation($_POST['password']) == '')
        { 
                         $pwdError = "Please enter your password!";
        }  
        else if (validation($_POST['confirm_password']) == '')
        { 
                         $err = "Please confirm your password!";
        }  
		if(validation($_POST['branch']) == '-1')
		{
			$branchError="Please select your branch!";
		}
		
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
		$sql="INSERT INTO `student_info`(`student_id`, `name`, `phone_nu`, `branch_id`, `alternate_email`, `password`) VALUES ('$_POST[id]','$_POST[name]',$_POST[phone],'$_POST[branch]','$_POST[eid]','$_POST[password]')";
		
		if(!$qsql=mysqli_query($con,$sql))
		{
			echo mysqli_error($con);
		}
		else
		{
			header("Location: login.php");		
		}
		}

	}
	}



?>

  <div id="main-wrapper">
    <?php include("header.php")?>
    <!-- end #header -->
    <!-- end #header -->
    <!-- end #header -->

    <div class="page-content">
     
      <!-- end .heading -->
      <div class="leave-reply">
        <div style="width:40%; margin:auto;"> 
          <h5 align="center">Student Sign Up</h5>
		  <form action="" method="post" >
			
            <div class="row">
              <div class="col-md-12 col-sm-4">
                <input type="text" placeholder="9 digit student ID" name="id" id="id" maxlength="9" onkeypress="javascript:return isNumber(event)">
				<span style="color:red" id="sidError" name="sidError"><?php echo $sidError; ?></span>
              </div>
              <div class="col-md-12 col-sm-4">
                <input type="text" placeholder="Name" name="name" id="name">
				<span style="color:red" id="nameError" name="nameError"><?php echo $nameError; ?></span>
              </div>
              <div class="col-md-12 col-sm-4">
                <input type="text" placeholder="Phone Number" name="phone" id="phone" maxlength="10" pattern="[1-9]{1}[0-9]{9}" placeholder="10 digit phone number" onkeypress="javascript:return isNumber(event)">
				 <span style="color:red" id="phoneError" name="phoneError"><?php echo $phoneError; ?></span>
				</div>
              <div class="col-md-12 col-sm-4">
			  		<?php
						$sql="select * from branch";
						$rs=mysqli_query($con,$sql);
						?>
						<select name="branch" id="branch" style="width:100%; height: 40px;">
						<option value="-1">Select Your Branch</option>
						<?php
						
						while($row=mysqli_fetch_array($rs))
						{
							echo"<option value=$row[branch_id]>$row[branch_name]</option>";
               
						}
						echo"</select>";
					?>
					<span style="color:red" id="branchError" name="branchError"><?php echo $branchError; ?></span>
              </div>
              
              <div class="col-md-12 col-sm-4">
                <br>
                <input type="email" placeholder="Alternate email-youremail@mail.com" name="eid" id="eid">
				<span style="color:red" id="emailError" name="emailError"><?php echo $emailError; ?></span>
              </div>

              <div class="col-md-12 col-sm-4">
                <input type="password" placeholder="Password" id="password" name="password">
				<span style="color:red" id="pwdError" name="pwdError"><?php echo $pwdError; ?></span>
              </div>
              <div class="col-md-12 col-sm-4">
                <input type="password" placeholder="Confirm Password" id="confirm_password" name="confirm_password">
				 <span style="color:red" id="pError" name="pError"><?php echo $err; ?></span>
              </div>
            </div>
            <!-- end nasted .row -->
            <div style="text-align: center;">
              <button name="submit" onclick="validation();" id="submit"> Sign Up </button>
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
