<?php
	require_once('../config.php');
	$fullname=$_POST['fullname'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$select="SELECT * FROM epeac_employee where email='$email'";
	$query=mysqli_query($conn,$select);
	if(mysqli_num_rows($query)==0)
	{
		$insert="INSERT INTO epeac_employee(fullname,email,password) values('$fullname','$email','$password')";
		mysqli_query($conn,$insert);
		header("Location:employee_registration.php?login_error=0");
	}else
	{
		header("Location:employee_registration.php?login_error=1");
	}
?>