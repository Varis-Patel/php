<?php
	session_start();
	if(isset($_SESSION['m_id']) && $_SESSION['m_id']!="")
	{
		require_once('manager_header.php');
		require_once('../config.php');
		$m_id=$_SESSION['m_id'];
		
?>
	<div class="page-wrapper">
		<div class="page-container">
			<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
					
					<div class="card mb-0">
                                    <div class="card-header">
                                        <strong>Review</strong> & Rating
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="m_insert_review.php" method="post" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Employee Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="employee" id="select" class="form-control" required>
                                                        <option value="">Select Employee</option>
														<?php
														$select="SELECT * from epeac_addemployee where e_manager_assign='$m_id'";
														$query=mysqli_query($conn,$select);
														while($res=mysqli_fetch_assoc($query))
														{
														?>
															<option value="<?php echo $res['e_id'];?>"><?php echo $res['e_name']; ?></option>
                                                        <?php } ?>
														
                                                    </select>
                                                </div>
												
                                            </div>
											
										
											<div class="row form-group">
												<div class="col col-md-3">
													<label for="textarea-input" class=" form-control-label">Review</label>
												</div>
												<div class="col-12 col-md-9">
													<textarea name="review" id="textarea-input" rows="4" placeholder="Content..." class="form-control"></textarea>
												</div>
											</div>
												
											<div class="row form-group">
												<div class="col col-md-3">
                                                    <label for="select" class="form-control-label">Rating</label>
                                                </div>
												
												<div class="col-12 col-md-8">
                                                    <input type="range" name="range_val" class="form-control-range" oninput="range_value(this)" min="0" max="5" value="2.5" step="0.1" id="range_slider">
                                                </div>
												<div class="col-2 col-md-1">
                                                    <input type="text" class="form-control" id="range" readonly>
                                                </div>
												
											</div>
                                           
											<input class="form-control" name="given_by" type="hidden" value="<?php echo "m-".$_SESSION['m_name']?>">
											
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
	<script>
		var a=document.getElementById('range_slider').value;
		document.getElementById('range').value=a;
		function range_value(b)
		{
			document.getElementById('range').value=b.value;
			
		}
		
	</script>
<?php
	require_once('../footer.php');
	}else{
		echo "Please <a href='manager_login.php'>Login</a> To Access This Page!";
	}
?>