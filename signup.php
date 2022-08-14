<?php
include('db_connect.php');
session_start();
if(isset($_POST['register'])){
	$name = $_POST['name'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$con_pass = $_POST['con_password'];
	$voters_id = $_POST['voters_id'];
	$email = $_POST['email'];
	$contact = $_POST['contact'];
	$address = $_POST['address'];

	if ($password!=$con_pass) {
		$_SESSION['reg_error'] = 'Password mismatch!!.. Try again';
		header('Location: register.php');
	}else{
		$sel="SELECT * FROM `client` where voters_id='$voters'";
		$res=mysqli_query($conn, $sel) or die(mysqli_error($conn));
		if(mysqli_num_rows($res) == 0){
			$voter=$_POST["voters_id"];
			if(empty($voter)==false){

			$sql = "INSERT INTO client (name, username,voters_id,contact, email, address, password)VALUES ('$name', '$username', '$voters_id','$contact', '$email', '$address', '$password')";
			mysqli_query($conn, $sql) or die(mysqli_error($conn));

				$_SESSION['reg'] = 'Registered succesfully...Login now!!';
				header('location: client_login.php');
			}
		}else{
			$_SESSION['reg_error'] = 'ID has already taken!!..try again';
			header('location: register.php');
		}
	}
	
}
mysqli_close($conn);
?>