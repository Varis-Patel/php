<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Register</title>

    <!-- Fontfaces CSS-->
    <link href="../css/font-face.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="../vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5"><!--class="page-content--bge5"-->
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="../images/icon/logo.png" alt="CoolAdmin">
                            </a>
                        </div>
						
						<?php 
							if(isset($_GET['login_error']) && $_GET['login_error']==0){
								echo "<span style='color:red;'>Username Registered Successfully!!!!</span>";
							}else if(isset($_GET['login_error']) && $_GET['login_error']==1){
								echo "<span style='color:red;'>Email already exists!!!!</span>";
							}
						?>
						<span id="msg"></span>
                        <div class="login-form">
                            <form onsubmit="return register()" action="register_manager.php" method="post">
                                <!--<div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="username" placeholder="Username" required>
                                </div>-->
								<div class="form-group">
                                    <label>Fullname</label>
                                    <input class="au-input au-input--full" type="text" name="fullname" placeholder="Fullname" required>
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" id="pass_box1" type="password" name="password" placeholder="Password" required>
                                </div>
								<div class="form-group">
                                    <label>Confirm Password</label>
                                    <input class="au-input au-input--full" id="pass_box2" type="password" name="createpassword" placeholder="Re-enter Password" required>
                                </div>
                                
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" onclick="register">register</button>
                                
                            </form>
								
                            <div class="register-link">
                                <p>
                                    Already have account?
                                    <a href="manager_login.php">Sign In</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
	<script>
		function register(){
			
			a=document.getElementById("pass_box1").value;
			b=document.getElementById("pass_box2").value;
			var flag=true;
			if(a!=b)
			{
				document.getElementById("msg").innerHTML="Password doesn't match";
				document.getElementById("msg").style.display="block";
				document.getElementById("msg").style.color="red";
				flag=false;
			}else{
				document.getElementById("msg").style.display="none";
			}
			return flag;
		}
	</script>
    <!-- Jquery JS-->
    <script src="../vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="../vendor/slick/slick.min.js">
    </script>
    <script src="../vendor/wow/wow.min.js"></script>
    <script src="../vendor/animsition/animsition.min.js"></script>
    <script src="../vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="../vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="../vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="../js/main.js"></script>

</body>

</html>
<!-- end document-->