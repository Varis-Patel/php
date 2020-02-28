<?php
	require_once('../config.php');
	$id=$_GET['m_id'];
	$delete="DELETE FROM epeac_addmanager where m_id='$id'";
	mysqli_query($conn,$delete);
	header('Location:view_manager.php');
?>