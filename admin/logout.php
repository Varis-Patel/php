<?php 
	session_start();
	unset($_SESSION['id']);
	unset($_SESSION['fullname']);
	unset($_SESSION['email']);
	header('Location:admin_login.php');
?>