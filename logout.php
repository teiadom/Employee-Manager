<?php
session_start();
	$_SESSION = array(); // Destroy the variables.
	session_destroy(); // Destroy the session itself.
	setcookie (session_name(), '', time()-300); // Destroy the cookie.
	
	$url = 'index.php'; 
	header("Location: $url");
	//unset ($_SESSION['cart'][$pid]);
?>