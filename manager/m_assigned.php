<?php
	require_once('../config.php');
	//$task_string=implode(',',$_POST['task']);
	//echo $task_string;
	$employee=$_POST['employee'];
	$task=$_POST['task'];
	//for($i=0;$i<count($task);$i++)
	//{
		$update="UPDATE epeac_task set t_employee='$employee' where t_id='$task'";
		mysqli_query($conn,$update);
	//}
	header('Location:m_assign_task.php');
?>