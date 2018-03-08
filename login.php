<?php
	header('Content-Type: application/json');
	if(empty($_POST['js'])){
		header('location:index.php');
	}
	session_start();
	if(!empty($_SESSION['user_profile'])){
		exit('{"error":"Usuario já está logado!"}');
	}
	if(empty($_POST['email']) || empty($_POST['password'])){
		exit('{"error":"Campo em Branco!"}');
	}
	require('config.php');
	require('inc/captcha.lib.php');
	$email = $_POST['email'];
	$password = $_POST['password'];
	$mysqli = new MySQLi($mysql['host'], $mysql['user'], $mysql['password'], $mysql['database']);
	if (mysqli_connect_errno()){
    	exit('{"error":"Campo em Branco!"}');
	}

	$stmt = $mysqli->prepare("SELECT * FROM dpft_users WHERE email=?");
	$stmt->bind_param("s", $email);
	$stmt->execute();
	$result = $stmt->get_result();
	$profile = array();
	if($result->num_rows < 1){
		$profile = 0;
	}else {
		$result = $result->fetch_array();
		$profile['id'] = $result['id'];
		$profile['nome'] = $result['nome'];
		$profile['nome'] = explode(" ",$profile['nome']);
		$profile['nome'] = $profile['nome'][0] . " " . $profile['nome'][count($profile['nome'])-1];
		$profile['email'] = $result['email'];
		$profile['senha'] = $result['senha'];
		$profile['salt'] = $result['salt'];
		$profile['data_registro'] = $result['data_registro'];
		$profile['ultimo_login'] = $result['ultimo_login'];
		$profile['tentativas_login'] = $result['tentativas_login'];
	}
	$stmt->close();
	if($profile <= 0){
		exit('{"error":"Email não encontrado!"}');
	}
	function aumentarTentativas($mysqli, $email, $tentativas){
		$stmt = $mysqli->prepare("UPDATE dpft_users SET tentativas_login = ? WHERE email = ?");
		$tentativas++;
		$stmt->bind_param('is', $tentativas, $email);
		$stmt->execute(); 
		$stmt->close();
	}
	if($profile['tentativas_login'] >= 15){
		aumentarTentativas($mysqli, $profile['email'], $profile['tentativas_login']);
		exit('{"error":"Conta bloqueada", "message":"Conta bloqueada favor enviar email para '.$admin_mail.' informando o erro!"}');
	}else if($profile['tentativas_login'] >= 3){
		if(empty($_POST['recode'])){
			aumentarTentativas($mysqli, $profile['email'], $profile['tentativas_login']);
			exit('{"error":"Muitas tentativas!"}');
		}else if(checkRecaptcha($_POST['recode'])){
			aumentarTentativas($mysqli, $profile['email'], $profile['tentativas_login']);
			exit('{"error":"Captcha invalido!"}');
		}
	}
	if(hash('sha256', $password.$profile['salt']) != $profile['senha']){
		aumentarTentativas($mysqli, $profile['email'], $profile['tentativas_login']);
		exit('{"error":"Senha invalida!"}');
	}else{
		$tentativas = 0;
		$stmt = $mysqli->prepare("UPDATE dpft_users SET tentativas_login = ? WHERE email = ?");
		$stmt->bind_param('ss', $tentativas, $profile['email']);
		$stmt->execute(); 
		$stmt->close();
	}
	$stmt = $mysqli->prepare("SELECT * FROM dpft_perfis WHERE user_id=?");
	$stmt->bind_param("s", $profile['id']);
	$stmt->execute();
	$result = $stmt->get_result();
	if($result->num_rows < 1){
		$profile = 0;
	}else {
		$result = $result->fetch_array();
		$profile['avatar_url'] = $result['avatar_url'];
		$profile['title'] = $result['title'];
		$profile['level'] = $result['level'];
		$profile['perfil_id'] = $result['id'];
	}
	$stmt->close();
	if($profile['ultimo_login'] != "0000-00-00 00:00:00"){
   		$stmt = $mysqli->prepare("UPDATE dpft_users SET ultimo_login = ? WHERE email = ?");
		$stmt->bind_param('ss', date("Y-m-d H:i:s"), $profile['email']);
		$stmt->execute(); 
		$stmt->close();
  	}
	$_SESSION['user_profile'] = json_encode($profile);
	exit(json_encode("logado"));
?>