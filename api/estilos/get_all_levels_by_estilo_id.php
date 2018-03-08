<?php
	if(empty($inside)){
		exit('{"erro":"Proibido acesso direto"}');
	}
	if(empty($_GET['estilo_id'])){
		exit('{"erro":"invalid id"}');
	}
	$estilo_id = $_GET['estilo_id'];
	$mysqli = new MySQLi($mysql['host'], $mysql['user'], $mysql['password'], $mysql['database']);
	if (mysqli_connect_errno()){
    	exit('{"erro":"Contate o administrador pelo email: '.$admin_mail.' informando erro 12442", "num":12442}');
	}
	$mysqli->set_charset("utf8");

	$stmt = $mysqli->prepare("SELECT * FROM dpft_estilos_levels WHERE id_estilo=?;");
	$stmt->bind_param("s", $estilo_id);
	$stmt->execute();
	$result = $stmt->get_result();

	if($result->num_rows < 1){
		exit('{"erro":"Nenhum level encontrado!", "num":12452}');
	}else {
		$levels = array();
		while ($row = $result->fetch_array()) {
			$level = array();
			$level['level'] = $row['level'];
			$level['id_estilo'] = $row['id_estilo'];
			$level['treinos_requeridos'] = $row['treinos_requeridos'];
			$level['outros_requerimentos'] = $row['outros_requerimentos'];
			array_push($levels, $level);
		}
	}
	$stmt->close();
	exit(json_encode($levels));
?>