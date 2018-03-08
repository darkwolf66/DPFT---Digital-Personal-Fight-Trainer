<?php
	if(empty($inside)){
		exit('{"erro":"Proibido acesso direto"}');
	}
	if(empty($_GET['profile_id'])){
		exit('{"erro":"invalid id"}');
	}
	$profile_id = $_GET['profile_id'];
	$mysqli = new MySQLi($mysql['host'], $mysql['user'], $mysql['password'], $mysql['database']);
	if (mysqli_connect_errno()){
    	exit('{"erro":"Contate o administrador pelo email: '.$admin_mail.' informando erro 12442", "num":12442}');
	}
	$mysqli->set_charset("utf8");

	$stmt = $mysqli->prepare("SELECT * FROM dpft_perfis_movimentos WHERE id_perfil=?;");
	$stmt->bind_param("s", $profile_id);
	$stmt->execute();
	$result = $stmt->get_result();

	if($result->num_rows < 1){
		exit('{"erro":"Nenhum movimento encontrado!", "num":12447}');
	}else {
		$movimentos = array();
		while ($row = $result->fetch_array()) {
			$movimento = array();
			$movimento['id_perfil'] = $row['id_perfil'];
			$movimento['id_movimento'] = $row['id_movimento'];
			$movimento['treinos'] = $row['treinos'];
			$mov_aux = file_get_contents($dpft_url->api."/movimentos.php?token=".$token."&action=get_by_id&movimento_id=".$movimento['id_movimento']);
			$mov_aux = json_decode($mov_aux);
			$movimento['nome'] = $mov_aux->nome;
			$movimento['categoria'] = $mov_aux->categoria;
			$movimento['descricao'] = $mov_aux->descricao;
			array_push($movimentos, $movimento);
		}
	}
	$stmt->close();
	exit(json_encode($movimentos));
?>