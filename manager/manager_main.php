<?php
	session_start();
	if(isset($_SESSION['m_id']) && $_SESSION['m_id']!="")
	{
		require_once('manager_header.php');
		require_once('../config.php');
		$m_id=$_SESSION['m_id'];
		//$select2="SELECT * FROM epeac_addemployee";
		//$query2=mysqli_query($conn,$select2); */
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
												$select="SELECT * FROM epeac_task where t_manager='$m_id' && t_status='Completed'";
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
                                                <a href="m_completed_task.php" style="color:white;">Completed Tasks</a>
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
												$select="SELECT * FROM epeac_task where t_manager='$m_id' && t_status='Pending'";
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
												<a href="m_view_task.php" style="color:white;">Pending Tasks</a>
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
		echo "Please <a href='manager_login.php'>Login</a> To Access This Page!";
	}
?>