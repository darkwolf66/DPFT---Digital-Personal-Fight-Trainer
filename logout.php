<?php
	session_start();
	unset($_SESSION['user_profile']);
	if(empty($_POST['js'])){
		header('location: /');
	}
?>