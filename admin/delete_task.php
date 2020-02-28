<?php
	require_once('../config.php');
	$id=$_GET['t_id'];
	$delete="DELETE FROM epeac_task where t_id='$id'";
	mysqli_query($conn,$delete);
	header('Location:view_task.php');
?>