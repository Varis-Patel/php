<?php
	session_start();
	if(isset($_SESSION['e_id']) && $_SESSION['e_id']!="")
	{
		require_once('employee_header.php');
		require_once('../config.php');
		$e_id=$_SESSION['e_id'];
		//$select="SELECT * FROM epeac_task where t_employee='$e_id'";
		$select="SELECT epeac_task.*,epeac_addmanager.m_name,epeac_addemployee.e_name FROM epeac_task JOIN epeac_addmanager ON epeac_task.t_manager=epeac_addmanager.m_id JOIN epeac_addemployee ON epeac_task.t_employee=epeac_addemployee.e_id where t_employee='$e_id' && t_status='Pending'";
		$query=mysqli_query($conn,$select);
?>

	<div class="page-wrapper">
		<div class="page-container">
			<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
					
						<h2 class="title-1 m-b-25">Tasks List</h2>
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
										<th >Action</th>
										
									</tr> 
								</thead>
								<tbody>
									<?php
									$i=1;
										//echo '<pre>';
										//print_r($query);
									while($res=mysqli_fetch_assoc($query))
									{
										//if($res['t_status']=="Pending")
										//{
										//print_r($query);
									?>
									<tr>
									<td><?php echo $i++;?></td>
									<td><?php echo $res['t_name'];?></td>
									<td><?php echo $res['t_stages'];?></td>
									<td><?php echo $res['t_duedate'];?></td>
									<!--<td><?php //echo $res['t_status'];?></td>-->
									<td><?php echo $res['t_bonus'];?></td>
									<td><?php echo $res['m_name'];?></td>
									<td><?php echo $res['e_name'];?></td>
									<td class="text-center"><button type="button" onclick="edit_status(<?php echo $res['t_id']?>)" class="btn btn-secondary" data-toggle="modal" data-target=".bd-example-modal-lg" >Status</button></td>
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
	
	
	<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Change Status</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <form action="update_status.php" method="post" class="form-horizontal">
		  <div class="modal-body">
			
			
			<div class="row">
				<div class="form-group col-9">
					<label for="nf-email" class=" form-control-label">Task</label>
					<input type="text" id="nf-email" name="task" placeholder="Task" class="form-control" readonly >
					
				</div>
				<div class="form-group col-3">
					<label for="nf-password">Due Date</label>
					<input type="text" id="nf-password" name="ddot" placeholder="DD/MM/YYYY" class="form-control" readonly>
			  
				</div>
			</div>
			<div class="row">
				<div class="form-group col-6">
					<label for="select" class=" form-control-label">Status</label>
					<select name="status" id="select" class="form-control" required>
						<option value="">Select Status</option>
						<option value="Pending">Pending</option>
						<option value="Completed">Completed</option>
					</select>
					
				</div>
				<div class="form-group col-6">
					<label for="nf-password" class=" form-control-label">Bonus</label>
					<input type="text" id="nf-password" name="bonus" placeholder="Enter Bonus" class="form-control" readonly>
			  
				</div>
				
			</div>
		  
			<div class="row form-group">
				<div class="col col-md-3">
					<label for="textarea-input" class=" form-control-label">Stages</label>
				</div>
				<div class="col-12 col-md-9">
					<textarea name="stages" id="textarea-input" rows="4" placeholder="Content..." class="form-control" readonly></textarea>
				</div>
			</div>
			<input type="hidden" name="t_id" class="form-control">
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="Submit" class="btn btn-primary">Save changes</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>

	<script>
		function edit_status(id)
		{
			$.ajax({
				'url':'edit_status.php',
				'data':'t_id='+id,
				'method':'post',
				'datatype':'json',
				'success':function(task_data)
				{
					console.log(task_data);
					var data=JSON.parse(task_data);
					$('input[name="task"]').val(data.t_name);
					$('input[name="ddot"]').val(data.t_duedate);
					$('select[name="status"]').val(data.t_status);
					$('input[name="bonus"]').val(data.t_bonus);
					$('textarea[name="stages"]').val(data.t_stages);
					$('input[name="t_id"]').val(data.t_id);
				}
			})
		}
	</script>

<?php
	require_once('../footer.php');
	}else{
		echo "Please <a href='employee_login.php'>Login</a> To Access This Page!";
	}
?>