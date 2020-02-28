<?php
	session_start();
	if(isset($_SESSION['id']) && $_SESSION['id']!="")
	{
		require_once('admin_header.php');
		require_once('../config.php');
		$select="SELECT * FROM epeac_addmanager";
		$query=mysqli_query($conn,$select);
?>

	<div class="page-wrapper">
		<div class="page-container">
			<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
					
						<h2 class="title-1 m-b-25">Managers List</h2>
						<div class="table-responsive">
							<table class="table table-borderless table-data3 example">
								<thead>
								   <tr>
										<th>Sr no.</th>
										<th>Name</th>
										<th>Address</th>
										<th>Contact no.</th>
										<th>Email Id</th>
										<th>Date of Birth</th>
										<th class="text-center">Action</th>
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
									<td><?php echo $res['m_name'];?></td>
									<td><?php echo $res['m_address'];?></td>
									<td><?php echo $res['m_contact'];?></td>
									<td><?php echo $res['m_email']; ?></td>
									<td><?php echo $res['m_dob'];?></td>
									<td >
										<div class="table-data-feature justify-content-center">
			
											<a href="#" class="item" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="edit_manager(<?php echo $res['m_id'];?>)" data-placement="top" title="Edit">
												<i class="zmdi zmdi-edit"></i>
											</a>
											<a href="javascript:;" onclick="delete_manager(<?php echo $res['m_id'];?>)" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
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
	  <form action="update_manager.php" method="post" class="form-horizontal">
		<div class="modal-body">
			<div class="row">
				<div class="form-group col-8">
					<label for="nf-email" class=" form-control-label">Manager's Name</label>
					<input type="text" id="nf-email" name="managername" placeholder="Manager's name" class="form-control" required>
					
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
					<label for="textarea-input" class=" form-control-label">Address</label>
				</div>
				<div class="col-12 col-md-9">
					<textarea name="address" id="textarea-input" rows="5" placeholder="Content..." class="form-control" required></textarea>
				</div>
			</div>
			
			<input type="hidden" name="m_id" class="form-control">

			
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Save changes</button>
		  </div>
		</div> 
	  </form>
    </div>
  </div>
</div>
<script>
	function delete_manager(id)
	{
		var msg=confirm("Do you sure want to delete?");
		if(msg==true)
		{
			window.location.href="delete_manager.php?m_id="+id;
		}else
		{
			window.location.href="view_manager.php";
		}
	}
	function edit_manager(id)
	{
		$.ajax({
			'url':'edit_manager.php',
			'data':'m_id='+id,
			'method':'get',
			'datatype':'json',
			'success':function(manager_data)
			{
				var data=JSON.parse(manager_data);
				//console.log(data);
				$('input[name="managername"]').val(data.m_name);
				$('input[name="dob"]').val(data.m_dob);
				$('textarea[name="address"]').val(data.m_address);
				$('input[name="email"]').val(data.m_email);
				$('input[name="contact"]').val(data.m_contact);
				$('input[name="m_id"]').val(data.m_id);
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