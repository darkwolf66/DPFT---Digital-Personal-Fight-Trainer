<?php
	session_start();
	if(!empty($_SESSION['user_profile'])){
		header('location: /app');
	}
	$login_first = true;
	$register_first = false;
	if(!empty($_GET['register'])){
		$login_first = false;
		$register_first = true;
	}
	function randomString(){
		$len = 8;
	    $result = "";
	    $chars = "abcdefghijklmnopqrstuvwxyz";
	    $charArray = str_split($chars);
	    for($i = 0; $i < $len; $i++){
		    $randItem = array_rand($charArray);
		    $result .= "".$charArray[$randItem];
	    }
	    return ucwords($result);
	}
	$mail = 'value="'.randomString().'@'.randomString().'.com"';
?>
<!DOCTYPE html>
<html>
<head>
	<title>DPFT - Digital Personal Fight Trainer</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="description" content="">
    <meta name="author" content="">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/master.js"></script>
	<script src="js/login.js"></script>

	<link rel="icon" href="../../favicon.ico">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
    <script type="text/javascript">
	  var register_recaptcha;
	  var login_recaptcha;
	  var lg_recap_enabled = false;
      var onloadCallback = function() {
        var register_recaptcha = grecaptcha.render('register_captcha', {
          'sitekey' : '6LeP8QoUAAAAACDTgejlC-Oi1Oyg0yIF6l1ZFD2T'
        });
      };
    </script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
    </script>
</head>
<body>

	<div class="container">
  	<div class="row" id="pwd-container">
	    <div class="col-md-4"></div>
	    
	    <div class="col-md-4">
	     
	      <section class="login-form">
	        <form method="post" id="login_form" <?php if(!$login_first){echo "style=\"display: none;\"";}; ?> role="login">
	          <!--<img src="http://i.imgur.com/RcmcLv4.png" class="img-responsive" alt="" />--><div class="h4 col-sm-12">Login</div>
	          <div id="login-error" style="display: none;" class="alert alert-danger"></div>
	          <div class="form-group">
					<label for="email" class="cols-sm-2 control-label">Seu Email</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="email" id="email"  placeholder="Digite seu Email"/>
						</div>
					</div>
				</div>
	          <div class="form-group">
					<label for="password" class="cols-sm-2 control-label">Senha</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
							<input type="password" class="form-control" name="password" id="password"  placeholder="Digite sua Senha"/>
						</div>
					</div>
				</div>
				<div id="login_captcha"></div>
	          <div class="pwstrength_viewport_progress"></div>
	          <button type="submit" name="go" class="btn btn-lg btn-primary btn-block">Entrar</button>
	          <div>
	            <a id="create-account">Registrar</a> ou <a href="#">esqueci a senha</a>
	          </div>
	          
	        </form>
	        <form method="post" id="register_form" <?php if(!$register_first){echo "style=\"display: none;\"";}; ?> role="register">
	          <!--<img src="http://i.imgur.com/RcmcLv4.png" class="img-responsive" alt="" />--><div class="h4 col-sm-12">Registro</div>
	          <div class="alert alert-danger" id="erro_regs" style="display: none;">
				  <strong>Erro!</strong>
			  </div>
	          <div class="form-group">
					<label for="name" class="cols-sm-2 control-label">Seu Nome</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="name" id="name" placeholder="Digite seu Nome"/>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="email" class="cols-sm-2 control-label">Seu Email</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="email" id="email"  placeholder="Digite seu Email"/>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="cols-sm-2 control-label">Repita seu Email</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="reemail" id="reemail"  placeholder="Digite seu Email"/>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="cols-sm-2 control-label">Senha</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
							<input type="password" class="form-control" name="password" id="password" placeholder="Digite sua Senha"/>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="confirm" class="cols-sm-2 control-label">Repita a Senha</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
							<input type="password" class="form-control" name="confirm" id="confirm" placeholder="Repita sua Senha"/>
						</div>
					</div>
				</div>
				<div id="register_captcha"></div>
	          <button type="submit" name="go" class="btn btn-lg btn-primary btn-block">Registrar</button>
	          <div>
	            <a id="login-account">Já tenho conta!</a></a>
	          </div>
	          
	        </form>
	        
	        <div class="form-links">
	          <a href="#">Digital Personal Fight Trainer</a>
	        </div>
	      </section>  
	      </div>
	      
	      <div class="col-md-4"></div>
	      

	  </div>
	  
	</div>
</body>
</html>