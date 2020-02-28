<?php
	session_start();
	if(isset($_SESSION['m_id']) && $_SESSION['m_id']!="")
	{
		require_once('manager_header.php');
		require_once('../config.php');
		$m_id=$_SESSION['m_id'];
		$select="SELECT epeac_task.*,epeac_addmanager.m_name,epeac_addemployee.e_name FROM epeac_task JOIN epeac_addmanager ON epeac_task.t_manager=epeac_addmanager.m_id JOIN epeac_addemployee ON epeac_task.t_employee=epeac_addemployee.e_id where t_manager='$m_id' && t_status='Completed'";
		$query=mysqli_query($conn,$select);
?>

	<div class="page-wrapper">
		<div class="page-container">
			<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
					
						<h2 class="title-1 m-b-25">Completed Tasks List</h2>
						<div class="table-responsive">
							<table class="table table-borderless table-data3 example">
								<thead>
								   <tr>
										<th>Sr no.</th>
										<th>Task</th>
										<th>Stages</th>
										<th>Due date</th>
										<!--<th>Status</th>-->
										<th>Bonus</th>
										<th>Manager Assigned</th>
										<th>Employee Assigned</th>
										<th class="text-left">Completed On</th>
									</tr> 
								</thead>
								<tbody>
									<?php
									$i=1;
								
									while($res=mysqli_fetch_assoc($query))
									{
										//if($res['t_status']=="Completed")
										//{
									?>
										<tr>
										<td><?php echo $i++;?></td>
										<td><?php echo $res['t_name'];?></td>
										<td><?php echo $res['t_stages'];?></td>
										<td><?php echo $res['t_duedate'];?></td>
										<!--<td><?php //echo $res['t_status']; ?></td>-->
										<td><?php echo $res['t_bonus'];?></td>
										<td><?php echo $res['m_name'];?></td>
										<td><?php echo $res['e_name'];?></td>
										<td class="text-left"><?php echo $res['t_submit'];?></td>
										</tr>
									<?php 
										//}
									} ?>
								</tbody>
							</table>
						
						</div>
					
					
					
					
					</div>
				</div>
			</div>
		</div>
	</div>

<?php
	require_once('../footer.php');
	}else{
		echo "Please <a href='manager_login.php'>Login</a> To Access This Page!";
	}
?>