<?php

	include("dbconnect.php");
	
	$student_id=$_POST['id'];
	$student_name=$_POST['name'];
	$phone_number=$_POST['phone'];
	$branch_id=$_POST['branch'];
	$alternate_email=$_POST['eid'];
	$password=$_POST['password'];
	

		
		$sql="INSERT INTO `student_info`(`student_id`, `student_name`, `phone_number`, ` branch_id`, `alternate_email`, `password`) VALUES ('$student_id','$student_name','$phone_number','$branch_id','$alternate_email','$password')";
		
		$rs=mysqli_query($con,$sql);
		
		if($rs)
			echo"insert";
		else
			echo"not insert";
	
	
	
?>