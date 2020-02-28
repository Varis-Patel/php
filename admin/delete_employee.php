<?php
	require_once('../config.php');
	$id=$_GET['e_id'];
	$delete="DELETE FROM epeac_addemployee where e_id='$id'";
	mysqli_query($conn,$delete);
	header('Location:view_employee.php');
?>