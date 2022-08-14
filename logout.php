<?php
session_start();
unset($_SESSION['user']);
	$_SESSION['msg'] = 'Logged out succesfully';
//echo '<script language="javascript">document.location.href="home.php"</script>';
header('Location: client_login.php');
?>