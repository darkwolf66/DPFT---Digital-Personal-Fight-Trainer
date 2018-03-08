<?php
	if(empty($inside)){
		exit('{"erro":"Proibido acesso direto"}');
	}
	$mysqli = new MySQLi($mysql['host'], $mysql['user'], $mysql['password'], $mysql['database']);
	if (mysqli_connect_errno()){
    	exit('{"erro":"Contate o administrador pelo email: '.$admin_mail.' informando erro 12442", "num":12442}');
	}
	$mysqli->set_charset("utf8");

	$stmt = $mysqli->prepare("SELECT * FROM dpft_estilos;");
	$stmt->execute();
	$result = $stmt->get_result();
	if($result->num_rows < 1){
		exit('{"erro":"Nenhum estilo encontrado!", "num":12447}');
	}else {
		$estilos = array();
		while ($row = $result->fetch_array()) {
			$estilo = array();
			$estilo['id'] = $row['id'];
			$estilo['nome'] = $row['nome'];
			$estilo['avatar_url'] = $row['avatar_url'];
			$estilo['level'] = $row['level'];
			array_push($estilos, $estilo);
		}
	}
	$stmt->close();
	exit(json_encode($estilos));
?>