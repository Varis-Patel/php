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
                                        <strong>Assign</strong> Task
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="assigned.php" method="post" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Assign to</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="manager" id="select" class="form-control" required>
                                                        <option value="">Select Manager</option>
														<?php
														$select="SELECT * from epeac_addmanager";
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
                                                    <label for="select" class=" form-control-label">Task</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="task[]" id="select" class="form-control" multiple required>
                                                    
														<?php
														$select="SELECT * from epeac_task";
														$query=mysqli_query($conn,$select);
														while($res=mysqli_fetch_assoc($query))
														{
														?>
															<option value="<?php echo $res['t_id'];?>"><?php echo $res['t_name']; ?></option>
                                                        <?php } ?>
														
                                                    </select>
                                                </div>
												
                                            </div>
											
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