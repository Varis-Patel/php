<?php
	require_once('../config.php');
	$name=$_POST['employeename'];
	$email=$_POST['email'];
	$contact=$_POST['contact'];
	$dob=$_POST['dob'];
	$address=$_POST['address'];
	$manager_assign=$_POST['manager'];
	$insert="INSERT INTO epeac_addemployee(e_name,e_address,e_contact,e_email,e_dob,e_manager_assign) values('$name','$address','$contact','$email','$dob','$manager_assign')";
	mysqli_query($conn,$insert);
	header('Location:add_employee.php');
?>