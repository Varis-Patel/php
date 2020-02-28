<?php
	session_start();
	if(isset($_SESSION['id']) && $_SESSION['id']!="")
	{
		require_once('employee_header.php');
		require_once('../config.php');
?>

	<div class="page-wrapper">
		<div class="page-container">
			<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
					
						<div class="card mb-0">
							<div class="card-header">
								<strong>Profile</strong>
							</div>
							<div class="card-body card-block">
								<form action="insert_employee.php" method="post" class="form-horizontal">
								
										<div class="form-group">
											<label for="nf-email" class=" form-control-label">Name</label>
											<input type="text" id="nf-email" value="<?php echo $_SESSION['e_name'];?>" class="form-control" readonly>
											
											<label for="nf-email" class=" form-control-label">Date of Birth</label>
											<input type="text" id="nf-email" value="<?php echo $_SESSION['e_dob'];?>" class="form-control" readonly>
											
											<label for="nf-email" class=" form-control-label">Contact no.</label>
											<input type="text" id="nf-email" value="<?php echo $_SESSION['e_contact'];?>" class="form-control" readonly>
											
											<label for="nf-email" class=" form-control-label">Email</label>
											<input type="text" id="nf-email" value="<?php echo $_SESSION['e_email'];?>" class="form-control" readonly>
											
											<label for="nf-email" class=" form-control-label">Address</label>
											<input type="text" id="nf-email" value="<?php echo $_SESSION['e_address'];?>" class="form-control" readonly>
											
										</div>
									</div>
								</form>
							</div>
						 
						</div>
					
					
					
					
					</div>
					
					
					
					
					</div>
				</div>
			</div>
		</div>
	</div>

<?php
	require_once('../footer.php');
	}else{
		echo "Please <a href='employee_login.php'>Login</a> To Access This Page!";
	}
?>