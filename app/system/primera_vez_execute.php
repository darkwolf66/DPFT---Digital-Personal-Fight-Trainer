<?php

  require '../../config.php';
  session_start();
  if (empty($_SESSION['user_profile']) ){
    header("/");
  }else if (empty($_GET['estilo'])) {
    exit("Estilo vazio");
  } else if (!is_numeric($_GET['estilo'])) {
    exit("Estilo inválido");
  }else if(empty($_COOKIE['avatar_change'])){
    $change_avatar = false;
  }else{
    $change_avatar = true;
  }
  $user_profile = json_decode($_SESSION['user_profile']);
  if($user_profile->ultimo_login != "0000-00-00 00:00:00"){
    exit("Erro não é a primeira vez a logar");
  }
  $inside = true;
  //Mysql Declaração
	$mysqli = new MySQLi($mysql['host'], $mysql['user'], $mysql['password'], $mysql['database']);
	if (mysqli_connect_errno()){
    	exit('{"error":"Ocorreu algum problema contate o administrador e passe o codigo 1252!"}');
	}
  //Adiciona o novo estilo
  $stmt = $mysqli->prepare("INSERT INTO dpft_perfis_estilos(id_perfil, id_estilo) VALUES (?, ?)");
  $stmt->bind_param("ss", $user_profile->perfil_id, $_GET['estilo']);
  if(!$stmt->execute()){
    exit('{"error":"Ocorreu algum problema contate o administrador e passe o codigo 1254!"}');
  }
  $stmt->close();
  if($change_avatar){
    //Atualiza o avatar no mysql
    $avatar = $dpft_url->main.$_COOKIE['avatar_change'];
    $stmt = $mysqli->prepare("UPDATE dpft_perfis SET avatar_url = ? WHERE user_id = ?");
    $stmt->bind_param('ss', $avatar, $user_profile->id);
    $stmt->execute(); 
    $stmt->close();
  }
  //Atualiza data
  $data = date("Y-m-d H:i:s");
  $stmt = $mysqli->prepare("UPDATE dpft_users SET ultimo_login = ? WHERE email = ?");
  $stmt->bind_param('ss', $data, $user_profile->email);
  $stmt->execute(); 
  $stmt->close();

  $user_profile->ultimo_login = $data;
  $_SESSION['user_profile'] = json_encode($user_profile);
  echo "ok";
?>