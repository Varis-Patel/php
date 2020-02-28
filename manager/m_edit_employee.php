<?php
	require_once('../config.php');
	$id=$_GET['e_id'];
	$select="SELECT * FROM epeac_addemployee where e_id='$id'";
	$query=mysqli_query($conn,$select);
	$res=mysqli_fetch_assoc($query);
	echo json_encode($res);
?>