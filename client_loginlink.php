<?php include('db_connect.php'); 

session_start();

if(isset($_POST['login'])){
    $username_login = $_POST['username']; 
    $password_login = $_POST['password']; 

    $query = "SELECT * FROM client WHERE username='$username_login' AND password='$password_login' LIMIT 1";

	$result=mysqli_query($conn,$query) or die(mysqli_error($conn));
	if(mysqli_num_rows($result) == 0){
		$_SESSION['log_error'] = 'Invalid username or password';
		header('Location: client_login.php');
	}else{
		$_SESSION['login_name'] = $username_login;
        header('Location: client_home.php');
	}
}

?>
