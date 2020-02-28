<?php
	require_once('../config.php');
	$name=$_POST['managername'];
	$email=$_POST['email'];
	$contact=$_POST['contact'];
	$dob=$_POST['dob'];
	$address=$_POST['address'];
	$insert="INSERT INTO epeac_addmanager(m_name,m_address,m_contact,m_email,m_dob) values('$name','$address','$contact','$email','$dob')";
	mysqli_query($conn,$insert);
	header('Location:add_manager.php');
?>