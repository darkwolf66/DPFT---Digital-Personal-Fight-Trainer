$(document).ready(function() {
	$("#create-account").click(function(){
		$("#login_form").hide();
		$("#register_form").show();
	});
	$("#login-account").click(function(){
		$("#register_form").hide();
		$("#login_form").show();
	});
	$("#login_form").submit(function(e){
		e.preventDefault();
		var ok = true;
		if(this.email.value.length <= 0){
			$(this.email).addClass('input-error');
			ok = false;
		}
		if(this.password.value.length <= 0){
			$(this.password).addClass('input-error');
			ok = false;
		}
		if(ok){
			if(lg_recap_enabled){
				$.post('login.php', {
					js: 1,
					email: this.email.value,
					password: this.password.value,
					recode: grecaptcha.getResponse(login_recaptcha),
				},  function(data){
					console.log("asdsad");
					if(data.error != null){
						switch(data.error){
							case 'Usuario já está logado!':
								window.location = 'app';
								break;
							case 'Email não encontrado!':
								$("#login-error").html("Esse email não está registrado!");
								$("#login-error").show();
								if(lg_recap_enabled){
									grecaptcha.reset(login_recaptcha);
								}
								break;
							case 'Senha invalida!':
								$("#login-error").html("Senha invalida!");
								$("#login-error").show();
								$("#password").val("");
								if(lg_recap_enabled){
									grecaptcha.reset(login_recaptcha);
								}
								break;
							case 'Muitas tentativas!':
								$("#login-error").html("Muitas tentativas!");
								$("#login-error").show();
								login_recaptcha = grecaptcha.render('login_captcha', {
							          'sitekey' : '6LeP8QoUAAAAACDTgejlC-Oi1Oyg0yIF6l1ZFD2T'
							        });
								lg_recap_enabled = true;
								break;
							case 'Captcha invalido!':
								if(lg_recap_enabled){
									grecaptcha.reset(login_recaptcha);
								}else{
									login_recaptcha = grecaptcha.render('login_captcha', {
							          'sitekey' : '6LeP8QoUAAAAACDTgejlC-Oi1Oyg0yIF6l1ZFD2T'
							        });
									lg_recap_enabled = true;
								}
								break;
							case 'Conta bloqueada':
								$("#login-error").html(data.message);
								$("#login-error").show();
								if(lg_recap_enabled){
									grecaptcha.reset(login_recaptcha);
								}
								break;

						}
					}else if(data == "logado"){
						window.location = '/app';
					}

				});
			}else{
				$.post('login.php', {
					js: 1,
					email: this.email.value,
					password: this.password.value,
				}, function(data){
					console.log(data);
					if(data.error != null){
						switch(data.error){
							case 'Usuario já está logado!':
								window.location = 'app';
								break;
							case 'Email não encontrado!':
								$("#login-error").html("Esse email não está registrado!");
								$("#login-error").show();
								if(lg_recap_enabled){
									grecaptcha.reset(login_recaptcha);
								}
								break;
							case 'Senha invalida!':
								$("#login-error").html("Senha invalida!");
								$("#login-error").show();
								$("#password").val("");
								if(lg_recap_enabled){
									grecaptcha.reset(login_recaptcha);
								}
								break;
							case 'Muitas tentativas!':
								$("#login-error").html("Muitas tentativas!");
								$("#login-error").show();
								login_recaptcha = grecaptcha.render('login_captcha', {
							          'sitekey' : '6LeP8QoUAAAAACDTgejlC-Oi1Oyg0yIF6l1ZFD2T'
							        });
								lg_recap_enabled = true;
								break;
							case 'Captcha invalido!':
								if(lg_recap_enabled){
									grecaptcha.reset(login_recaptcha);
								}else{
									login_recaptcha = grecaptcha.render('login_captcha', {
							          'sitekey' : '6LeP8QoUAAAAACDTgejlC-Oi1Oyg0yIF6l1ZFD2T'
							        });
									lg_recap_enabled = true;
								}
								break;
							case 'Conta bloqueada':
								$("#login-error").html(data.message);
								$("#login-error").show();
								if(lg_recap_enabled){
									grecaptcha.reset(login_recaptcha);
								}
								break;

						}
					}else if(data == "logado"){
						window.location = '/app';
					}

				});
			}
			
		}
	});
	$('input').change(function(){
		$(this).removeClass('input-error');
	});
	$("#register_form").submit(function(e){
		e.preventDefault();
		if(!(/^(([A-Za-z]+[\-\']?)*([A-Za-z]+)?\s)+([A-Za-z]+[\-\']?)*([A-Za-z]+)?$/.test(this.name.value)) || this.name.value.length >= 90 || this.name.value.length <= 0){
			$(this.name).addClass('input-error');
			$(this.name).change(function(){$('#erro_regs').hide();});
			$('#erro_regs').show();
			$('#erro_regs').html('<strong>Erro! Nome inválido!</strong>');
			return 0;
		}else if(this.email.value.length <= 0 ){
			$(this.email).addClass('input-error');
			$(this.email).change(function(){$('#erro_regs').hide();});
			$('#erro_regs').show();
			$('#erro_regs').html('<strong>Erro! Você esqueceu do email!</strong>');
			return 0;
		}else if(this.email.value.length >= 120){
			$(this.email).addClass('input-error');
			$(this.email).change(function(){$('#erro_regs').hide();});
			$('#erro_regs').show();
			$('#erro_regs').html('<strong>Erro! Seu email está muito grande!</strong>');
			return 0;
		}else if(this.reemail.value.length <= 0 ){
			$(this.reemail).addClass('input-error');
			$(this.reemail).change(function(){$('#erro_regs').hide();});
			$('#erro_regs').show();
			$('#erro_regs').html('<strong>Erro! Você esqueceu do email!</strong>');
			return 0;
		}else if(this.reemail.value != this.email.value ){
			$(this.reemail).addClass('input-error');
			$(this.reemail).change(function(){$('#erro_regs').hide();});
			$('#erro_regs').show();
			$('#erro_regs').html('<strong>Erro! Os emails não conferem!</strong>');
			return 0;
		}else if(this.password.value.length >= 16 || !(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/.test(this.password.value))){
			$(this.password).addClass('input-error');
			$(this.password).change(function(){$('#erro_regs').hide();});
			$('#erro_regs').show();
			$('#erro_regs').html('<strong>Erro! Senha inválida! <small>(Ela precisa ter 1 numero, ao menos uma letra minuscula e uma maiuscula e no minimo 8 digitos)</small></strong> ');
			return 0;
		}else if(!grecaptcha.getResponse(register_recaptcha)){
			$('#erro_regs').show();
			$('#erro_regs').html('<strong>Erro! Você esqueceu do captcha!</strong> ');
			return 0;
		}else{
			$.post('register.php', {
				js: 1,
				nome: this.name.value,
				email: this.email.value,
				password: this.password.value,
				recode: grecaptcha.getResponse(register_recaptcha),
			}, function(data){checkRegisterReturn(data, grecaptcha)});
		}
	});
	function checkRegisterReturn(data){
		if(data.error != null){
			switch(data.error){
				case 1241:
					$("#email").addClass('input-error');
					$("#reemail").addClass('input-error');
					$("#email").change(function(){$('#erro_regs').hide();});
					$('#erro_regs').show();
					$('#erro_regs').html('<strong>Erro! Este email já está em uso!</strong>');
					grecaptcha.reset(register_recaptcha);
					break;
			}
		}else if(data == "sucesso"){
			$("#register_form").hide();
			$('#pwd-container').html("<div id=\"success-form\" class=\"success-form col-sm-12\">\
	     	<div class=\"h4 col-sm-12\"><spam class=\"text-success\">Sua conta foi registrada com sucesso!</spam></div>\
	     	<div class=\"form-group\">\
					<label for=\"email\" class=\"cols-sm-2 control-label\">Você será redirecionado em:</label>\
					<div class=\"cols-sm-10\">\
						<div class=\"input-group\">\
							<span id=\"count-success-redirect\" class=\"input-group-addon\">5</span>\
						</div>\
					</div>\
				</div>\
	     </div>"+$('#pwd-container').html());
			setInterval(function(){
				if($("#count-success-redirect").html() > 0){
					$("#count-success-redirect").html($("#count-success-redirect").html()-1);
				}else{
					$("#success-form").hide();
					$("#login_form").show();
				}
			}, 1000);
		}
	}
});
