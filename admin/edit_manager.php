<?php
	require_once('../config.php');
	$id=$_GET['m_id'];
	$select="SELECT * FROM epeac_addmanager where m_id='$id'";
	$query=mysqli_query($conn,$select);
	$res=mysqli_fetch_assoc($query);
	echo json_encode($res);
?>