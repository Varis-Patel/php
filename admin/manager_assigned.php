<?php
	session_start();
	if(isset($_SESSION['id']) && $_SESSION['id']!="")
	{
		require_once('admin_header.php');
		require_once('../config.php');
		//$select="SELECT epeac_task.*,epeac_addmanager.m_name,epeac_addemployee.e_name FROM epeac_task JOIN epeac_addmanager ON epeac_task.t_manager=epeac_addmanager.m_id JOIN epeac_addemployee ON epeac_task.t_employee=epeac_addemployee.e_id";
		
?>

	<div class="page-wrapper">
		<div class="page-container">
			<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
						
						<h2 class="title-1 m-b-25">Manager Assigned to Tasks</h2>
						<div class="table-responsive">
							<table class="table table-borderless table-data3 example">
								<thead>
									<tr>
										<th>Sr no.</th>
										<th>Task</th>
										<th class="text-center">Manager Assigned</th>
									</tr> 
								</thead>
								<tbody>
									<?php
									$select="SELECT epeac_task.t_name,epeac_addmanager.m_name FROM epeac_task JOIN epeac_addmanager ON epeac_task.t_manager=epeac_addmanager.m_id";
									$query=mysqli_query($conn,$select);
									$i=1;
										//echo '<pre>';
										//print_r($query);
									while($res=mysqli_fetch_assoc($query))
									{
										 
										//print_r($query);
									?>
									<tr>
									<td><?php echo $i++;?></td>
									<td><?php echo $res['t_name'];?></td>
									<td class="text-center"><?php echo $res['m_name'];?></td>
									</tr>
									<?php } ?>
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
		echo "Please <a href='admin_login.php'>Login</a> To Access This Page!";
	}
?>