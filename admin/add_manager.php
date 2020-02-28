<?php
	session_start();
	if(isset($_SESSION['id']) && $_SESSION['id']!="")
	{
		require_once('admin_header.php');
		require_once('../config.php');
?>
	<div class="page-wrapper">
		<div class="page-container">
			<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
					
					<div class="card mb-0">
                                    <div class="card-header">
                                        <strong>Add</strong> Manager's Details
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="insert_manager.php" method="post" class="form-horizontal">
                                            <div class="row">
												<div class="form-group col-9">
													<label for="nf-email" class=" form-control-label">Manager's Name</label>
													<input type="text" id="nf-email" name="managername" placeholder="Manager's name" class="form-control" required>
													
												</div>
												<div class="form-group col-3">
													<label for="nf-password" >Date of Birth</label>
													<input type="date" id="nf-password" name="dob" placeholder="DD/MM/YYYY" class="form-control" required>
											  
												</div>
                                            </div>
											<div class="row">
												<div class="form-group col-9">
													<label for="nf-email" class=" form-control-label">Email Address</label>
													<input type="email" id="nf-email" name="email" placeholder="Email Address" class="form-control" required>
													
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
                                   
                                           
                                            <!--<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="file-input" class=" form-control-label">Upload Image</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="file-input" name="image" class="form-control-file" required>
                                                </div>
                                            </div>-->
                                            <button type="submit" class="btn btn-primary btn-sm">
												<i class="fa fa-dot-circle-o"></i> Submit
											</button>
											<button type="reset" class="btn btn-danger btn-sm">
												<i class="fa fa-ban"></i> Reset
											</button>
                                        </form>
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
		echo "Please <a href='login.php'>Login</a> To Access This Page!";
	}
?>