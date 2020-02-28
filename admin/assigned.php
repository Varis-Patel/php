<?php
	require_once('../config.php');
	//$task_string=implode(',',$_POST['task']);
	//echo $task_string;
	$manager=$_POST['manager'];
	$task=$_POST['task'];
	//print_r($task);
	for($i=0;$i<count($task);$i++)
	{
		$update="UPDATE epeac_task set t_manager='$manager' where t_id='$task[$i]'";
		mysqli_query($conn,$update);
		//echo $i;
	}
	header('Location:assign_task.php');
?>