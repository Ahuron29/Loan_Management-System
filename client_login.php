<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
	<?php include("header.php"); ?>
  <title>Login | Loan Management System</title>
 	

<?php include('header.php'); ?>

</head>
<style>
	body{
		width: 100%;
	    height: calc(100%);
	    /*background: #007bff;*/
	}
	main#main{
		width:100%;
		height: calc(100%);
		background:white;
	}
	#login-right{
		position: absolute;
		right:0;
		width:40%;
		height: calc(100%);
		background:white;
		display: flex;
		align-items: center;
	}
	#login-left{
		position: absolute;
		left:0;
		width:60%;
		height: calc(100%);
		background:#59b6ec61;
		display: flex;
		align-items: center;
		background: url(assets/img/adehyeman_bgpage1.jpg);
	    background-repeat: no-repeat;
	    background-size: cover;
	}
	#login-right .card{
		margin: auto;
		z-index: 1
	}
	.logo {
    margin: auto;
    font-size: 8rem;
    background: white;
    
    border-radius: 50% 50%;
    color: #000000b3;
    z-index: 10;
}
div#login-right::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: calc(100%);
    height: calc(100%);
    background: #17a2b8!important;
}

</style>

<body>


<main id="main" class="btn bg-success">
<large class="large ">Adehyeman Savings and Loans Loan Management System</large>
  		<div id="login-left">
  		</div>

  		<div id="login-right">
  			<div class="card col-md-8 bg-success" style="margin-top:15px;">
			  	<div class="logo2">
			  		<span><img src="./assets/img/adehyeman-logo.jfif" alt=""></span>
				</div><br>
				<span><?php
						if(isset($_SESSION['msg']))		{
							echo '<span class="message"> <font size="5" color="white"> <center><i>';
							echo $_SESSION['msg'];
							echo "</i></center></font></span>";
							unset($_SESSION['msg']);
						}
						if(isset($_SESSION['reg']))		{
							echo '<span class="message"> <font size="5" color="white"> <center><i>';
							echo $_SESSION['reg'];
							echo "</i></center></font></span>";
							unset($_SESSION['reg']);
						}
						if(isset($_SESSION['log_error']))		{
							echo '<span class="message"> <font size="3" color="MediumMagenta"> <center><p>';
							echo $_SESSION['error'];
							echo "</p></center></font></span>";
							unset($_SESSION['error']);
						}
						if(isset($_SESSION['change']))		{
							echo '<span class="message"> <font size="5" color="white"> <center><i>';
							echo $_SESSION['change'];
							echo "</i></center></font></span>";
							unset($_SESSION['change']);
						}
				?></span>
  				<form action="client_loginlink.php" method="POST">
					  
					<div><h5 class="text-white">Client Login Only</h5></div>
  						<div class="form-group">
  							<label for="username" class="control-label">Username</label>
  							<input type="text" name="username" required class="form-control" required>
  						</div>
  						<div class="form-group">
  							<label for="password" class="control-label">Password</label>
  							<input type="password" name="password" class="form-control" required>
  						</div>
						 <center> <input type="submit" value="Login" class="btn-sm btn-block btn-wave col-md-4 btn-primary" name="login" id=""></center>
  						<!--<center><button class="btn-sm btn-block btn-wave col-md-4 btn-primary">Login</button></center>-->
  					</form>
				<div class="row">
					<div class="col-lg-12" style="margin-top:40px;">
					<p class="mt-6 font-weight-normal">Don't have Account <a  href="register.php"><button class="btn btn-primary float-right btn-sm new_user" >Sign Up</button></a></p>
					</div>
				</div>
  			</div>
  		</div>
  </main>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>
	
</html>