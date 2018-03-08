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
	$stmt = $mysqli->prepare("SELECT * FROM dpft_perfis_estilos WHERE id_perfil=?;");
	$stmt->bind_param("s", $profile_id);
	$stmt->execute();
	$result = $stmt->get_result();
	if($result->num_rows < 1){
		exit('{"erro":"Nenhum estilo encontrado!", "num":12447}');
	}else {
		$estilos = array();
		while ($row = $result->fetch_array()) {
			$estilo = array();
			$estilo['id'] = $row['id_estilo'];
			$estilo['treinos'] = $row['treinos'];
			$estilo['level'] = $row['level'];
			$estilo_aux = file_get_contents($dpft_url->api."/estilos.php?token=".$token."&action=get_by_id&id=".$row['id_estilo']);
			$estilo_aux = json_decode($estilo_aux);
			$estilo['nome'] = $estilo_aux->nome;
			$estilo['descricao'] = $estilo_aux->descricao;
			$estilo['avatar_url'] = $estilo_aux->avatar_url;
			$estilo['cor_box'] = $estilo_aux->cor_box;
			$estilo['movimentos'] = json_decode(file_get_contents($dpft_url->api."/movimentos.php?token=".$token."&action=get_by_profile_id&profile_id=".$profile_id));
			$estilo['levels'] = json_decode(file_get_contents($dpft_url->api."/estilos.php?token=".$token."&action=get_all_levels_by_estilo_id&estilo_id=".$estilo['id']));
			//Pega proximo level
			foreach ($estilo['levels'] as $level) {
				if($level->level-1 == $estilo['level']){
					$estilo['treinos_faltando'] = $level->treinos_requeridos - $estilo['treinos'];
					$estilo['treinos_proximo_nivel'] = $level->treinos_requeridos;
					break;
				}
			}
			array_push($estilos, $estilo);
		}
	}
	$stmt->close();
	exit(json_encode($estilos));
?>