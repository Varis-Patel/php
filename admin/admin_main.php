<?php
	session_start();
	if(isset($_SESSION['id']) && $_SESSION['id']!="")
	{
		require_once('admin_header.php');
		require_once('../config.php');
		
		
?>
	<div class="page-wrapper">
		<!-- MAIN CONTENT-->
		 <div class="page-container">
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
						<div class="row m-t-25">
                            <div class="col-sm-6 col-lg-6">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <div class="text">
												<?php
												$select="SELECT * FROM epeac_addmanager";
												$query=mysqli_query($conn,$select);
												$i=0;
												while($res=mysqli_fetch_assoc($query))
												{
                                                 $i++; 
												}?>
												<h2><?php echo $i; ?></h2>
                                                <a href="view_manager.php" style="color:white;">View Managers</a>
                                            </div>
                                        </div>
                                      
                                    </div>
                                </div>
							</div>
							
							
							<div class="col-sm-6 col-lg-6">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-tasks"></i>
                                            </div>
                                            <div class="text">
												<?php
												$select="SELECT * FROM epeac_task where t_status='Pending'";
												$query=mysqli_query($conn,$select);
												$i=0;
												while($res=mysqli_fetch_assoc($query))
												{
                                                 $i++; 
												}?>
												<h2><?php echo $i; ?></h2>
                                                <a href="view_task.php" style="color:white;">Pending tasks</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
							
							
						</div>
						<div class="row m-t-25">
							<div class="col-sm-6 col-lg-6">
								<div class="overview-item overview-item--c2">
									<div class="overview__inner">
										<div class="overview-box clearfix">
											<div class="icon">
												<i class="fa fa-users"></i>
											</div>
											<div class="text">
												<?php
												$select="SELECT * FROM epeac_addemployee";
												$query=mysqli_query($conn,$select);
												$i=0;
												while($res=mysqli_fetch_assoc($query))
												{
                                                 $i++; 
												}?>
												<h2><?php echo $i; ?></h2>
												<a href="view_employee.php" style="color:white;">View Employees</a>
											</div>
										</div>
									
									</div>
								</div>
							</div>
							
							
							<div class="col-sm-6 col-lg-6">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-tasks"></i>
                                            </div>
                                            <div class="text">
												<?php
												$select="SELECT * FROM epeac_task where t_status='Completed'";
												$query=mysqli_query($conn,$select);
												$i=0;
												while($res=mysqli_fetch_assoc($query))
												{
                                                 $i++; 
												}?>
												<h2><?php echo $i; ?></h2>
                                                <a href="completed_task.php" style="color:white;">Completed tasks</a>
                                            </div>
                                        </div>
                                    </div>
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
		echo "Please <a href='admin_login.php'>Login</a> To Access This Page!";
	}
?>