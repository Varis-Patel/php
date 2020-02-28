<?php
	require_once('../config.php');
	$t_id=$_POST['t_id'];
	$task=$_POST['task'];
	$duedate=$_POST['ddot'];
	// $status=$_POST['status'];
	$bonus=$_POST['bonus'];
	$stages=$_POST['stages'];
	$update="UPDATE epeac_task set t_name='$task',t_stages='$stages',t_duedate='$duedate',t_bonus='$bonus' where t_id='$t_id'";
	mysqli_query($conn,$update);
	header('Location:view_task.php');
?>