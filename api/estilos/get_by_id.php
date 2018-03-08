<?php
	if(empty($inside)){
		exit('{"erro":"Proibido acesso direto"}');
	}
	if(isset($_POST['id'])){
		$id = $_POST['id'];
	}else if (isset($_GET['id'])){
		$id = $_GET['id'];
	}else{
		exit('{"erro":"Id invalido!", "num":13338}');
	}

	$mysqli = new MySQLi($mysql['host'], $mysql['user'], $mysql['password'], $mysql['database']);
	if (mysqli_connect_errno()){
    	exit('{"erro":"Contate o administrador pelo email: '.$admin_mail.' informando erro 12442", "num":12442}');
	}
	$mysqli->set_charset("utf8");

	$stmt = $mysqli->prepare("SELECT * FROM dpft_estilos WHERE id=?;");
	$stmt->bind_param("s", $id);
	$stmt->execute();
	$result = $stmt->get_result();

	if($result->num_rows < 1){
		exit('{"erro":"Nenhum estilo encontrado!", "num":12447}');
	}else {
		$estilo = array();
		$row = $result->fetch_array();
		$estilo['id'] = $row['id'];
		$estilo['nome'] = $row['nome'];
		$estilo['descricao'] = $row['descricao'];
		$estilo['avatar_url'] = $row['avatar_url'];
		$estilo['cor_box'] = $row['cor_box'];
	}
	$stmt->close();
	exit(json_encode($estilo));
?>