<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login | Loan Management System</title>
 	

<?php include('./header.php'); ?>
<?php include('./db_connect.php'); ?>
<?php 
session_start();
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");

?>

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
		background:#49b6ec61;
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
    
    border-radius: 40% 40%;
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
    background: #28a744;
}

</style>

<body>


<main id="main" class="btn bg-success">
  	<large style="margin-left:-500px" class="large">Adehyeman Savings and Loans Loan Management System</large>
  		<div id="login-left">
  		</div>

  		<div id="login-right">
  			<div class="card col-md-8 bg-success" style="margin-top:-75px">
			  	<div class="logo2">
			  		<span><img src="./assets/img/adehyeman-logo.jfif" alt=""></span>
				</div><br>
			<span><?php
						if(isset($_SESSION['msg']))		{
							echo '<span class="message"> <font size="4" color="white"> <center><i>';
							//echo $_SESSION['msg'];
							echo "</i></center></font></span>";
							//unset($_SESSION['msg']);
						}
						if(isset($_SESSION['reg_error']))		{
							echo '<span class="message"> <font size="4" color="MediumMagenta"> <center><i>';
							echo $_SESSION['reg_error'];
							echo "</i></center></font></span>";
							unset($_SESSION['reg_error']);
						}
						if(isset($_SESSION['error']))		{
							echo '<span class="message"> <font size="3" color="MediumMagenta"> <center><p>';
							echo $_SESSION['error'];
							echo "</p></center></font></span>";
							unset($_SESSION['error']);
						}
						if(isset($_SESSION['change']))		{
							echo '<span class="message"> <font size="4" color="white"> <center><i>';
							echo $_SESSION['change'];
							echo "</i></center></font></span>";
							unset($_SESSION['change']);
						}
				?></span>
  				<form action="signup.php"  method ="POST" class="reg_errorister-form text-center" >
                        <div class="form-group">
  							<input type="text" name="name" class="form-control" placeholder="Name">
  						</div>
  						<div class="form-group">
  							<input type="text" name="username" class="form-control" placeholder="Username">
  						</div>
						  <div class="form-group">
  							<input type="email" name="email" class="form-control" placeholder="Email">
  						</div>
						  <div class="form-group">
  							<input type="number" name="voters_id" class="form-control" placeholder="VotersID">
  						</div>
						  <div class="form-group">
  							<input type="number" name="contact" class="form-control" placeholder="Contact">
  						</div>
  						<div class="form-group">
						  <div class="form-group">
  							<input type="text" name="address" class="form-control" placeholder="Address">
  						</div>
  							<input type="password" name="password" required class="form-control" placeholder="Password">
  						</div>
                        <div class="form-group">
  							<input type="password" name="con_password" required class="form-control" placeholder="Confirm Password">
  						</div>
  						<button type="submit" class="btn-sm btn-block btn-wave col-md-4 btn-primary" name="register">Sign Up</button>
				</form>
				<div class="row">
					<div class="col-lg-12" style="margin-top: 10px;">
					<p class="mt-6 font-weight-normal">Already have an Account <a  href="client_login.php"><button class="btn btn-primary float-right btn-sm new_user" >Login Now</button></a></p>
					</div>
				</div>
  			</div>
  		</div>
   

  </main>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>	
</html>