<?php
	session_start();
	if(isset($_SESSION['id']) && $_SESSION['id']!="")
	{
		require_once('admin_header.php');
		require_once('../config.php');
		$select="SELECT epeac_addemployee.*,epeac_addmanager.m_name FROM epeac_addemployee JOIN epeac_addmanager ON epeac_addemployee.e_manager_assign=epeac_addmanager.m_id";
		$query=mysqli_query($conn,$select);
?>

	<div class="page-wrapper">
		<div class="page-container">
			<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
					
						<h2 class="title-1 m-b-25">Employees List</h2>
						<div class="table-responsive">
							<table class="table table-borderless table-data3 example">
								<thead>
								   <tr>
										<th>Sr no.</th>
										<th>Name</th>
										
										<th>Contact no.</th>
										<th>Email Id</th>
										<th>Date of Birth</th>
										<th>Manager Assigned</th>
										<th class="text-left">Action</th>
									</tr> 
								</thead>
								<tbody>
									<?php
									$i=1;
										//echo '<pre>';
										//print_r($query);
									while($res=mysqli_fetch_assoc($query))
									{
										 
										//print_r($query);
									?>
									<tr>
									<td><?php echo $i++;?></td>
									<td><?php echo $res['e_name'];?></td>
									
									<td><?php echo $res['e_contact'];?></td>
									<td><?php echo $res['e_email']; ?></td>
									<td><?php echo $res['e_dob'];?></td>
									<td><?php echo $res['m_name'];?></td>
									<td >
										<div class="table-data-feature justify-content-around">
			
											<a href="#" class="item" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="edit_employee(<?php echo $res['e_id'];?>)" data-placement="top" title="Edit">
												<i class="zmdi zmdi-edit"></i>
											</a>
											<a href="javascript:;" onclick="delete_employee(<?php echo $res['e_id'];?>)" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
												<i class="zmdi zmdi-delete"></i>
											</a>

										</div>
									</td>
									</tr>
									<?php
									//echo '<pre>';
									//print_r($query);
									} ?>
								</tbody>
							</table>
							<?php 
							// echo '<pre>';
							// print_r($query);?>
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
	  <form action="update_employee.php" method="post" class="form-horizontal">
		<div class="modal-body">
			<div class="row">
				<div class="form-group col-8">
					<label for="nf-email" class=" form-control-label">Employee's Name</label>
					<input type="text" id="nf-email" name="employeename" placeholder="Employee's name" class="form-control" required>
					
				</div>
				<div class="form-group col-4">
					<label for="nf-password" >Date of Birth</label>
					<input type="date" id="nf-password" name="dob" placeholder="DD/MM/YYYY" class="form-control" required>
			  
				</div>
			</div>
			<div class="row">
				<div class="form-group col-9">
					<label for="nf-email" class=" form-control-label">Email Address</label>
					<input type="text" id="nf-email" name="email" placeholder="Email Address" class="form-control" required>
					
				</div>
				<div class="form-group col-3">
					<label for="nf-password" class=" form-control-label">Contact no.</label>
					<input type="text" id="nf-password" name="contact" placeholder="Contact no." class="form-control" required>
			  
				</div>
			</div>
			
			<div class="row form-group">
				<div class="col col-md-3">
					<label for="select" class=" form-control-label">Manager Assigned</label>
				</div>
				<div class="col-12 col-md-9">
					<select name="manager" id="select" class="form-control" required>
						<option value="">Select Manager</option>
						<?php
						$select="SELECT * FROM epeac_addmanager";
						$query=mysqli_query($conn,$select);
						while($res=mysqli_fetch_assoc($query))
						{
						?>
							<option value="<?php echo $res['m_id'];?>"><?php echo $res['m_name']; ?></option>
						<?php } ?>
						
					</select>
				</div>
				
			</div>
		  
			<div class="row form-group">
				<div class="col col-md-3">
					<label for="textarea-input" class=" form-control-label">Address</label>
				</div>
				<div class="col-12 col-md-9">
					<textarea name="address" id="textarea-input" rows="5" placeholder="Content..." class="form-control" required></textarea>
				</div>
			</div>
			
			<input type="hidden" name="e_id" class="form-control">
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
			window.location.href="delete_employee.php?e_id="+id;
		}else
		{
			window.location.href="view_employee.php";
		}
	}
	function edit_employee(id)
	{
		$.ajax({
			'url':'edit_employee.php',
			'data':'e_id='+id,
			'method':'get',
			'datatype':'json',
			'success':function(employee_data)
			{
				var data=JSON.parse(employee_data);
				//console.log(data);
				$('input[name="employeename"]').val(data.e_name);
				$('input[name="dob"]').val(data.e_dob);
				$('textarea[name="address"]').val(data.e_address);
				$('input[name="email"]').val(data.e_email);
				$('input[name="contact"]').val(data.e_contact);
				$('select[name="manager"]').val(data.e_manager_assign);
				$('input[name="e_id"]').val(data.e_id);
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