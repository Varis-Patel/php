<?php
	require_once('../config.php');
	$password=$_POST['password'];
	$email=$_POST['email'];
	$code=$_POST['code'];
	$select="SELECT * from epeac_token where token='$code'";
	$query=mysqli_query($conn,$select);
	if(mysqli_num_rows($query)>0)
	{
		$update="UPDATE epeac_manager set password='$password' where email='$email'";
		$query=mysqli_query($conn,$update);
		if($query)
		{
			$delete="DELETE from epeac_token where token='$code'";
			mysqli_query($conn,$delete);
			header('Location:manager_login.php?pass_msg=0');
		}else{
			header('Location:manager_login.php?pass_msg=1');
		}
	}
	else{
		echo "Can't find page";
	}		
?>