<?php
	require_once('../config.php');
	$id=$_POST['e_id'];
	$name=$_POST['employeename'];
	$dob=$_POST['dob'];
	$address=$_POST['address'];
	$email=$_POST['email'];
	$contact=$_POST['contact'];
	$update="UPDATE epeac_addemployee set e_name='$name',e_address='$address',e_contact='$contact',e_email='$email',e_dob='$dob' where e_id='$id'";
	mysqli_query($conn,$update);
	header('Location:m_view_employee.php');
?>