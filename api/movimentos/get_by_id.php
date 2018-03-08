<?php
	if(empty($inside)){
		exit('{"erro":"Proibido acesso direto"}');
	}
	if(empty($_GET['movimento_id'])){
		exit('{"erro":"invalid id"}');
	}
	$movimento_id = $_GET['movimento_id'];
	$mysqli = new MySQLi($mysql['host'], $mysql['user'], $mysql['password'], $mysql['database']);
	if (mysqli_connect_errno()){
    	exit('{"erro":"Contate o administrador pelo email: '.$admin_mail.' informando erro 12442", "num":12442}');
	}
	$mysqli->set_charset("utf8");

	$stmt = $mysqli->prepare("SELECT * FROM dpft_movimentos WHERE id=?;");
	$stmt->bind_param("s", $movimento_id);
	$stmt->execute();
	$result = $stmt->get_result();

	if($result->num_rows < 1){
		exit('{"erro":"Nenhum movimento encontrado!", "num":12447}');
	}else {
		$estilo = array();
		$row = $result->fetch_array();
		$estilo['id'] = $row['id'];
		$estilo['nome'] = $row['nome'];
		$estilo['categoria'] = $row['categoria'];
		$estilo['descricao'] = $row['descricao'];
	}
	$stmt->close();
	exit(json_encode($estilo));
?>