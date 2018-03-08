<?php
	require('../config.php');
	header('Content-Type: application/json');
	
	if (empty($_GET['token']) || $_GET['token'] != $token){
		exit('{"erro":"Token invalido!!", "num":13832}');
	}

	if(!empty($_POST['action'])){
		$action = $_POST['action'];
	}else if (!empty($_GET['action'])){
		$action = $_GET['action'];
	}else{
		exit('{"erro":"Você não selecionou uma ação!", "num":13332}');
	}
	$inside = true;
	switch ($action) {
		case 'get_by_level':
			require('estilos/get_by_level.php');
			break;
		case 'get_all':
			require('estilos/get_all.php');
			break;
		case 'get_by_id':
			require('estilos/get_by_id.php');
			break;
		case 'get_all_levels_by_estilo_id':
			require('estilos/get_all_levels_by_estilo_id.php');
			break;
		default:
			exit('{"erro":"Essa ação não existe!", "num":13333}');
			break;
	}

	

?>