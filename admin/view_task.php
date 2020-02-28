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
					
						<h2 class="title-1 m-b-25">Tasks List</h2>
						<div class="table-responsive">
							<table class="table table-borderless table-data3 example">
								<thead>
								   <tr>
										<th>Sr no.</th>
										<th>Task</th>
										<th>Stages</th>
										<th>Due date</th>
										<th>Status</th>
										<th>Bonus</th>
										<!--<th>Manager Assigned</th>
										<th>Employee Assigned</th>
										<th class="text-center">Completed On</th>-->
										<th class="text-center">Action</th>
									</tr> 
								</thead>
								<tbody>
									<?php
									$select="SELECT * FROM epeac_task where t_status='Pending'";
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
									<td><?php echo $res['t_stages'];?></td>
									<td><?php echo $res['t_duedate'];?></td>
									<td><?php echo $res['t_status']; ?></td>
									<td><?php echo $res['t_bonus'];?></td>
									<!--<td><?php //echo $res['m_name'];?></td>
									<td><?php //echo $res['e_name'];?></td>
									<td class="text-center"><?php echo $res['t_submit'];?></td>-->
									<td >
										<div class="table-data-feature justify-content-center">
			
											<a href="#" class="item" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="edit_task(<?php echo $res['t_id'];?>)" data-placement="top" title="Edit">
												<i class="zmdi zmdi-edit"></i>
											</a>
											<a href="javascript:;" onclick="delete_employee(<?php echo $res['t_id'];?>)" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
												<i class="zmdi zmdi-delete"></i>
											</a>

										</div>
									</td>
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
	
	
	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form action="update_task.php" method="post" class="form-horizontal">
		<div class="modal-body">
			<div class="row">
				<div class="form-group col-8">
					<label for="nf-email" class=" form-control-label">Task</label>
					<input type="text" id="nf-email" name="task" placeholder="Task" class="form-control" required>
					
				</div>
				<div class="form-group col-4">
					<label for="nf-password">Due Date</label>
					<input type="date" id="nf-password" name="ddot" placeholder="DD/MM/YYYY" class="form-control" required>
			  
				</div>
			</div>
			<div class="row">
				
				<div class="form-group col-6">
					<label for="nf-password" class=" form-control-label">Bonus</label>
					<input type="text" id="nf-password" name="bonus" placeholder="Enter Bonus" class="form-control" required>
			  
				</div>
				<div class="form-group col-6">
					<label for="select" class=" form-control-label">Stages</label>
					<textarea name="stages" id="textarea-input" rows="4" placeholder="Content..." class="form-control" required></textarea>
					
				</div>
				
			</div>
			
			<input type="hidden" name="t_id" class="form-control">
		</div>
			
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Save changes</button>
		  </div>
		 
	  </form>
    </div>
  </div>
</div>

<script>
	function delete_employee(id)
	{
		var msg=confirm("Do you sure want to delete?");
		if(msg==true)
		{
			window.location.href="delete_task.php?t_id="+id;
		}else
		{
			window.location.href="view_task.php";
		}
	}
	function edit_task(id)
	{
		$.ajax({
			'url':'edit_task.php',
			'data':'t_id='+id,
			'method':'get',
			'datatype':'json',
			'success':function(task_data)
			{
				var data=JSON.parse(task_data);
				//console.log(data);
				var data=JSON.parse(task_data);
				$('input[name="task"]').val(data.t_name);
				$('input[name="ddot"]').val(data.t_duedate);
				// $('select[name="status"]').val(data.t_status);
				$('input[name="bonus"]').val(data.t_bonus);
				$('textarea[name="stages"]').val(data.t_stages);
				$('input[name="t_id"]').val(data.t_id);
			}
		});
	}

</script>



<?php
	require_once('../footer.php');
	}else{
		echo "Please <a href='admin_login.php'>Login</a> To Access This Page!";
	}
?>