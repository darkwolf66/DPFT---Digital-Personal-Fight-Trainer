<?php
	header('Content-Type: application/json');
	if(empty($_POST['js'])){
		header('location:index.php');
	}
	session_start();
	if(!empty($_SESSION['user_profile'])){
		exit('{"error":"Usuario ja esta logado!"}');
	}
	if(empty($_POST['email']) || empty($_POST['password']) || empty($_POST['nome']) || empty($_POST['recode'])){
		exit('{"error":"Campo em Branco!"}');
	}
	require('config.php');
	require('inc/captcha.lib.php');

	if(checkRecaptcha($_POST['recode'])){
		exit('{"error":"Captcha invalido!"}');
	}

	$email = $_POST['email'];
	$password = $_POST['password'];
	$nome = $_POST['nome'];
	
	//Regexes
	require('inc/validation.lib.php');
	if(!validEmail($email)){
		exit('{"error":"Email invalido!"}');
	}else if(!validName($nome)){
		exit('{"error":"Nome invalido!"}');
	}else if (!validPassword($password)){
		exit('{"error":"Senha invalida!"}');
	}

	$salt = md5(date('hisjmyitiswDay').mt_rand(1999999999999, 9999999999999));
	$password = hash('sha256', $password.$salt);
	$data = date("Y-m-d H:i:s");


	//Mysql Declaração
	$mysqli = new MySQLi($mysql['host'], $mysql['user'], $mysql['password'], $mysql['database']);
	if (mysqli_connect_errno()){
    	exit('{"error":"Ocorreu algum problema contate o administrador e passe o codigo 1252!"}');
	}
	//Checagem de uso do email
	$stmt = $mysqli->prepare("SELECT email FROM dpft_users WHERE email=?");
	$stmt->bind_param("s", $email);
	$stmt->execute();
	$result = $stmt->get_result();
	if($result->num_rows >= 1){
		exit('{"error":1241}');
	}
	$stmt->close();

	//Insere no banco	
	$stmt = $mysqli->prepare("INSERT INTO dpft_users(nome, email, senha, salt, data_registro) VALUES (?, ?, ?, ?, ?)");
	$stmt->bind_param("sssss", $nome, $email, $password, $salt, $data);
	if(!$stmt->execute()){
		exit('{"error":"Ocorreu algum problema contate o administrador e passe o codigo 1254!"}');
	}
	$stmt->close();
	//Gerar perfil
	$stmt = $mysqli->prepare("SELECT id FROM dpft_users WHERE email=?");
	$stmt->bind_param("s", $email);
	$stmt->execute();
	$result = $stmt->get_result();
	if($result->num_rows >= 1){
		$row = $result->fetch_array();
		$user_id = $row['id'];
	}else{
		exit('{"error":"Ocorreu algum problema contate o administrador e passe o codigo 1257!"}');
	}
	$stmt->close();

	$stmt = $mysqli->prepare("INSERT INTO dpft_perfis(user_id) VALUES (?)");
	$stmt->bind_param("s", $user_id);
	if($stmt->execute()){
		exit('"sucesso"');
	}else{
		exit('{"error":"Ocorreu algum problema contate o administrador e passe o codigo 1254!"}');
	}

	$stmt->close();
	$mysqli->close();


?>