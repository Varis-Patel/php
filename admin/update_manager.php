<?php
	require_once('../config.php');
	$id=$_POST['m_id'];
	$name=$_POST['managername'];
	$dob=$_POST['dob'];
	$address=$_POST['address'];
	$email=$_POST['email'];
	$contact=$_POST['contact'];
	$update="UPDATE epeac_addmanager set m_name='$name',m_address='$address',m_contact='$contact',m_email='$email',m_dob='$dob' where m_id='$id'";
	mysqli_query($conn,$update);
	header('Location:view_manager.php');
?>