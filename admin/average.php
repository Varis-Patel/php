<?php
	session_start();
	if(isset($_SESSION['id']) && $_SESSION['id']!="")
	{
		require_once('admin_header.php');
		require_once('../config.php');
		$select="SELECT e_id,e_name FROM epeac_addemployee";
		$query=mysqli_query($conn,$select);
		
?>
	<div class="page-wrapper">
		<div class="page-container">
			<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
					<h2 class="title-1 m-b-25">Average Rating</h2>
					<div class="table-responsive">
					<table class="table table-borderless table-data3 example">
								<thead>
								   <tr>
										<th>Sr no.</th>
										<th>Employee Name</th>
										
										<th class="text-center">Average Rating</th>
										
							
									</tr> 
								</thead>
								<tbody>
									<?php
									$i=1;
										//echo '<pre>';
										//print_r($query);
									while($res=mysqli_fetch_assoc($query))
									{
										$e_id=$res['e_id'];
										$select1="SELECT r_rating FROM epeac_review where r_employee='$e_id'";
										$query1=mysqli_query($conn,$select1);
										//print_r($query);
									?>
									<tr>
									<td><?php echo $i++;?></td>
									<td><?php echo $res['e_name'];?></td>
									<td class="text-center">
										<?php
										$sum=0;
										$n=1;
										while($res1=mysqli_fetch_assoc($query1))
										{
											$sum=$sum+$res1['r_rating'];
											$n++;
											
										}
										if($sum!=0)
										{
											echo $sum/($n-1);
										}
										?>
										
									
									</td>
									
								
							
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