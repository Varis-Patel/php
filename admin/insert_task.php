<?php
	require_once('../config.php');
	$task=$_POST['task'];
	$duedate=$_POST['ddot'];
	// $status=$_POST['status'];
	$bonus=$_POST['bonus'];
	$stages=$_POST['stages'];
	$insert="INSERT INTO epeac_task(t_name,t_stages,t_duedate,t_status,t_bonus) values('$task','$stages','$duedate','Pending','$bonus')";
	mysqli_query($conn,$insert);
	header('Location:add_task.php');
?>