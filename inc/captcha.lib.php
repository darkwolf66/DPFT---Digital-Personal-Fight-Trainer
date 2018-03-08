<?php
	function checkRecaptcha($reCode){
		$content = http_build_query(
			array('secret' => '6LeP8QoUAAAAAPSzfUzXoW1A21aCDOmoE837gROQ',
				'response' => $reCode,
			));
		$context = stream_context_create(
			array('http' => array( 'method' => 'POST',
						'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
	                    "Content-Length: ".strlen($content)."\r\n".
	                    "User-Agent:MyAgent/1.0\r\n",
								'content' => $content,)
			));  
		$contents = file_get_contents('https://www.google.com/recaptcha/api/siteverify', null, $context);
		$recapcha_obj = json_decode($contents);
		$reStatus = $recapcha_obj->success;

		if(!$reStatus){
			return true;
		}else{
			return false;
		}
	}
?>