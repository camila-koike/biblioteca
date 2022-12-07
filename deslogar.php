<?php
	session_start(); 
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
	unset($_SESSION['nome']);
	$sid = session_id();
	session_destroy();
	session_unset();     
	$_SESSION = array();
	header("location:index.html");
	
?>