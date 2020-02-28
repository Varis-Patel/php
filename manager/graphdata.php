<?php
	
		
		require_once('../config.php');
		$m_id=$_GET['m_id'];
					$select="SELECT * FROM epeac_addemployee where e_manager_assign='$m_id'";
					$query=mysqli_query($conn,$select);
					
					$response=[];
					while($res=mysqli_fetch_assoc($query))
					{
							$e_id=$res['e_id'];
							$select1="SELECT * FROM epeac_task where t_employee='$e_id'";
							$query1=mysqli_query($conn,$select1);
							$t=mysqli_num_rows($query1);
							$c=$p=$on=$off=$ot=$ft=$ct=$pt=0;
							
							/* $p=0;
							$on=0;
							$off=0;
							$ot=0;
							$ft=0;
							$ct */
								while($res1=mysqli_fetch_assoc($query1))
								{
								
								//print_r($res1);
									if($res1['t_status']=="Completed")
									{
										++$c;
									}else{
										++$p;
									}
									if($res1['t_submit']!="")
									{
										if($res1['t_submit']<=$res1['t_duedate'])
										{
											++$on;
										}else{
											++$off;
										}
									}
								}
								/* echo $t."<br>";
								echo $on."<br>";
								
								echo $off."<br>";
								echo $c."<br>";
								
								echo $p."<br>"; */
							if($t!=0)
							{
									$ct=($c/$t)*100;
									$pt=($p/$t)*100;
									if($c!=0)
									{
										$ot=($on/$c)*100;
										$ft=($off/$c)*100;
									}/* else{
										$ot=0;
										$ft=0;
									} */
									$data=[$ct,$pt,$ot,$ft];
									//print_r($data); 
							}else{
								$data=[0,0,0,0];
							}
							
							//print_r($data);
							array_push($response,$data);	
							//echo json_encode($data);
					} 
					//print_r($response);
					echo json_encode($response);

?>	