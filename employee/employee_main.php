<?php
	session_start();
	if(isset($_SESSION['e_id']) && $_SESSION['e_id']!="")
	{
		require_once('employee_header.php');
		require_once('../config.php');
		$e_id=$_SESSION['e_id'];
		/* $select1="SELECT * FROM epeac_addmanager";
		$select2="SELECT * FROM epeac_addemployee";
		$query1=mysqli_query($conn,$select1);
		$query2=mysqli_query($conn,$select2); */
?>
	<div class="page-wrapper">
		<!-- MAIN CONTENT-->
		 <div class="page-container">
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
						<div class="row m-t-25">
                            <div class="col-sm-9 col-lg-6">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-tasks"></i>
                                            </div>
                                            <div class="text">
												<?php
												$select="SELECT * FROM epeac_task where t_employee='$e_id' && t_status='Completed'";
												$query=mysqli_query($conn,$select);
												$i=0;
												while($res=mysqli_fetch_assoc($query))
												{
													//if($res['t_status']=="Completed")
													//{
														$i++; 
													//} 
												}?>
												<h2><?php echo $i; ?></h2>
                                                <a href="e_completed_task.php" style="color:white;">Completed Tasks</a>
                                            </div>
                                        </div>
                                      
                                    </div>
                                </div>
							</div>
						</div>
						<div class="row m-t-25">
							<div class="col-sm-9 col-lg-6">
								<div class="overview-item overview-item--c2">
									<div class="overview__inner">
										<div class="overview-box clearfix">
											<div class="icon">
												<i class="fa fa-tasks"></i>
											</div>
											<div class="text">
												<?php
												$select="SELECT * FROM epeac_task where t_employee='$e_id' && t_status='Pending'";
												$query=mysqli_query($conn,$select);
												$i=0;
												while($res=mysqli_fetch_assoc($query))
												{
													//if($res['t_status']=="Pending")
													//{
														$i++; 
													//} 
												}?>
												<h2><?php echo $i; ?></h2>
												<a href="e_view_task.php" style="color:white;">Pending Tasks</a>
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
		echo "Please <a href='employee_login.php'>Login</a> To Access This Page!";
	}
?>