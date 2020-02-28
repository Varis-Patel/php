<?php
	require_once('../config.php');
	$employee=$_POST['employee'];
	$review=$_POST['review'];
	$range=$_POST['range_val'];
	$given_by=$_POST['given_by'];
	//print_r($_POST);
	$insert="INSERT INTO epeac_review(r_employee,r_review,r_rating,r_from) values('$employee','$review','$range','$given_by')";
	mysqli_query($conn,$insert);
	header('Location:e_review.php');
?>