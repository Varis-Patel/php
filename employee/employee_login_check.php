<?php
	require_once('../config.php');
	$email=$_POST['email'];
	$password=$_POST['password'];
	$select="SELECT * FROM epeac_employee JOIN epeac_addemployee ON epeac_employee.email=epeac_addemployee.e_email where email='$email' && password='$password'";
	$query=mysqli_query($conn,$select);
	//print_r($query);
	//die;
	if(mysqli_num_rows($query)>0)
	{
		session_start();
		$res=mysqli_fetch_assoc($query);
		$_SESSION['id']=$res['id'];
		$_SESSION['e_id']=$res['e_id'];
		$_SESSION['e_name']=$res['e_name'];
		$_SESSION['e_address']=$res['e_address'];
		$_SESSION['e_contact']=$res['e_contact'];
		$_SESSION['e_dob']=$res['e_dob'];
		$_SESSION['e_email']=$res['e_email'];
		$_SESSION['e_manager_assign']=$res['e_manager_assign'];
		header('Location:employee_main.php');
	}else
	{
		header('Location:employee_login.php?login_error=1');
	}
?>