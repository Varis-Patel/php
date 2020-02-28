<?php
	session_start();
	if(isset($_SESSION['id']) && $_SESSION['id']!="")
	{
		require_once('admin_header.php');
		require_once('../config.php');
		$select="SELECT epeac_review.*,epeac_addemployee.e_name from epeac_review JOIN epeac_addemployee ON epeac_review.r_employee=epeac_addemployee.e_id";
		$query=mysqli_query($conn,$select);
		
?>
	<div class="page-wrapper">
		<div class="page-container">
			<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
					<h2 class="title-1 m-b-25">Reviews & Rating</h2>
					<div class="table-responsive">
					<table class="table table-borderless table-data3 example">
								<thead>
								   <tr>
										<th>Sr no.</th>
										<th>Employee Name</th>
										<th>Review</th>
										<th>Rating</th>
										<th class="text-center">From</th>
							
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
									<td><?php echo $res['r_review'];?></td>
									<td><?php echo $res['r_rating'];?></td>
									<td class="text-center"><?php echo $res['r_from']; ?></td>
								
							
									</tr>
									<?php
									//echo '<pre>';
									//print_r($query);
									} ?>
								</tbody>
							</table>
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