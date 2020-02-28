<?php
	require_once('../config.php');
	$t_id=$_POST['t_id'];
	$status=$_POST['status'];
	if($status=="Completed")
	{
		date_default_timezone_set('Asia/Kolkata');
		//$date=Date('Y-m-d h:i:s A');
		$date=Date('Y-m-d');
		$update="UPDATE epeac_task set t_status='$status',t_submit='$date' where t_id='$t_id'";
		mysqli_query($conn,$update);
		header('Location:e_view_task.php');
	}else
	{
		$update="UPDATE epeac_task set t_status='$status',t_submit='' where t_id='$t_id'";
		mysqli_query($conn,$update);
		header('Location:e_view_task.php');
	}
	
?>