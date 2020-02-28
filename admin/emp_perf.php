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
					<div class="accordion" id="accordionExample">
					<?php
					$select="SELECT * FROM epeac_addemployee";
					$query=mysqli_query($conn,$select);
					
					$i=0;
					while($res=mysqli_fetch_assoc($query))
					{
					?>	
						
					
					  <div class="card mb-0">
						<div class="card-header" id="headingTwo">
						  <h2 class="mb-0">
							<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse<?php echo ++$i?>" aria-expanded="false" aria-controls="collapseTwo">
							  <?php echo $res['e_name']?>
							</button>
						  </h2>
						</div>
						<div id="collapse<?php echo $i?>" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
						  <div class="card-body">
							
							<canvas class="barchart"></canvas>
						  </div>
						</div>
					  </div>
					
					
					<?php } ?>
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

<script>
$.ajax({
	'url':'perf_data.php',
	'type':'get',
	'datatype':'json',
	'success':function(graph)
	{
		//console.log(graph);
		var graphdata=JSON.parse(graph);
		//console.log(res);
		var chart = document.getElementsByClassName('barchart');
		for(var i=0;i<chart.length;i++)
		{
			var barchart = new Chart(chart[i], {
				type: 'bar',
				data: {
					labels: ['Completed Task', 'Pending Task', 'Task Completed On time', 'Task Completed Off time'],
					datasets: [{
						
						data: graphdata[i],
						backgroundColor: [
						'rgba(255, 99, 132, 0.2)',
						'rgba(54, 162, 235, 0.2)',
						'rgba(255, 206, 86, 0.2)',
						'rgba(75, 192, 192, 0.2)'],
						borderColor: [
						'rgba(255, 99, 132, 1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)'],
						borderWidth: 1
					}]
				},
				options: {
					legend: {
						display: false	
					},
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true
							},
							scaleLabel: {
								display: true,
								labelString: 'Percentage',
							 },
						}]
					}
				}
			});
		}
	}
});
</script>