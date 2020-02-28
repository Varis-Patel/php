<?php
	require_once('../config.php');
	$t_id=$_POST['t_id'];
	$select="SELECT * FROM epeac_task where t_id='$t_id'";
	$query=mysqli_query($conn,$select);
	$res=mysqli_fetch_assoc($query);
	echo json_encode($res);
?>