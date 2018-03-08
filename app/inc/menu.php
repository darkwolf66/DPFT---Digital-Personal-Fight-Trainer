<?php
	if(empty($inside)){
		header('location:/');
		exit();
	}
	$title = "DPFT - Digital Personal Fight Trainer";
	$sigla = "DPFT";
	
	if($user_profile->avatar_url == "default"){
		$user_profile->avatar_url = "http://dpft.ml/images/avatar.jpeg";
	}


	if(!empty($user_profile->title)){
		$user_nameititle = $user_profile->nome." - ".$user_profile->title;
	}else{
		$user_nameititle = $user_profile->nome;
	}
	if(empty($user_profile->level)){
		$user_profile->level = 0;
	}

	$since = strtotime($user_profile->data_registro);
	$since = date('Y-m-d', $since);

  $perfil_estilos = json_decode(file_get_contents($dpft_url->api."/perfil.php?token=".$token."&action=get_estilos&profile_id=".$user_profile->perfil_id));

  $estilos_menu_html = "";
  foreach ($perfil_estilos as $estilo) {
    $estilos_menu_html = "<li><a href=\"estilo.php?e=".$estilo->id."\">".$estilo->nome."</a></li>";
  }



	$main_header = "<header class=\"main-header\">
    <!-- Logo -->
    <a href=\"/\" class=\"logo\">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class=\"logo-mini\"><b>".$sigla[0]."</b>".$sigla[1].$sigla[2].$sigla[3]."</span>
      <!-- logo for regular state and mobile devices -->
      <span class=\"logo-lg\">".$sigla[0]."<b>".$sigla[1].$sigla[2].$sigla[3]."</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class=\"navbar navbar-static-top\" role=\"navigation\">
      <!-- Sidebar toggle button-->
      <a href=\"#\" class=\"sidebar-toggle\" data-toggle=\"offcanvas\" role=\"button\">
        <span class=\"sr-only\">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class=\"navbar-custom-menu\">
        <ul class=\"nav navbar-nav\">
          <!-- Messages: style can be found in dropdown.less-->
          <li class=\"dropdown messages-menu\">
            <!-- Menu toggle button -->
            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
              <i class=\"fa fa-envelope-o\"></i>
              <span class=\"label label-success\">1</span>
            </a>
            <ul class=\"dropdown-menu\">
              <li class=\"header\">Você tem 1 mensagem</li>
              <li>
                <!-- inner menu: contains the messages -->
                <ul class=\"menu\">
                  <li><!-- start message -->
                    <a href=\"#\">
                      <div class=\"pull-left\">
                        <!-- User Image -->
                        <img src=\"".$user_profile->avatar_url."\" width=\"160px\" height=\"160px\" class=\"img-circle\" alt=\"User Image\">
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        Suporte
                        <small><i class=\"fa fa-clock-o\"></i> 4 dias</small>
                      </h4>
                      <!-- The message -->
                      <p>Você sabia que pode praticar mais...</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
                <!-- /.menu -->
              </li>
              <li class=\"footer\"><a href=\"#\">Ver todas as mensagens</a></li>
            </ul>
          </li>
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          <li class=\"dropdown notifications-menu\">
            <!-- Menu toggle button -->
            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
              <i class=\"fa fa-bell-o\"></i>
              <span class=\"label label-warning\">1</span>
            </a>
            <ul class=\"dropdown-menu\">
              <li class=\"header\">Você tem 1 notificação</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class=\"menu\">
                  <li><!-- start notification -->
                    <a href=\"#\">
                      <i class=\"fa fa-users text-aqua\"></i> Parabens você subiu para o nivel 2
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class=\"footer\"><a href=\"#\">Ver todas</a></li>
            </ul>
          </li>
          <!-- Tasks Menu -->
          <li class=\"dropdown tasks-menu\">
            <!-- Menu Toggle Button -->
            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
              <i class=\"fa fa-flag-o\"></i>
              <span class=\"label label-danger\">1</span>
            </a>
            <ul class=\"dropdown-menu\">
              <li class=\"header\">Em progresso</li>
              <li>
                <!-- Inner menu: contains the tasks -->
                <ul class=\"menu\">
                  <li><!-- Task item -->
                    <a href=\"treino_dia.php\">
                      <!-- Task title and progress text -->
                      <h3>
                        Treino do dia!
                        <small class=\"pull-right\">20%</small>
                      </h3>
                      <!-- The progress bar -->
                      <div class=\"progress xs\">
                        <!-- Change the css width attribute to simulate progress -->
                        <div class=\"progress-bar progress-bar-aqua\" style=\"width: 20%\" role=\"progressbar\" aria-valuenow=\"20\" aria-valuemin=\"0\" aria-valuemax=\"100\">
                          <span class=\"sr-only\">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class=\"footer\">
                <a href=\"#\">Ver todas as tarefas</a>
              </li>
            </ul>
          </li>
          <!-- User Account Menu -->
          <li class=\"dropdown user user-menu\">
            <!-- Menu Toggle Button -->
            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
              <!-- The user image in the navbar-->
              <img src=\"".$user_profile->avatar_url."\" width=\"160px\" height=\"160px\" class=\"user-image\" alt=\"User Image\">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class=\"hidden-xs\">".$user_profile->nome."</span>
            </a>
            <ul class=\"dropdown-menu\">
              <!-- The user image in the menu -->
              <li class=\"user-header\">
                <img src=\"".$user_profile->avatar_url."\" width=\"160px\" height=\"160px\" class=\"img-circle\" alt=\"User Image\">

                <p>
                  ".$user_nameititle."
                  <small>Level: ".$user_profile->level."</small>
                  <small>Member desde ".$since."</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class=\"user-body\">
                <div class=\"row\">
                  <div class=\"col-xs-4 text-center\">
                    <a href=\"#\">Seguidores</a>
                  </div>
                  <div class=\"col-xs-4 text-center\">
                    <a href=\"#\">Estilos</a>
                  </div>
                  <div class=\"col-xs-4 text-center\">
                    <a href=\"#\">Amigos</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class=\"user-footer\">
                <div class=\"pull-left\">
                  <a href=\"#\" class=\"btn btn-default btn-flat\">Perfil</a>
                </div>
                <div class=\"pull-right\">
                  <a href=\"/logout.php\" class=\"btn btn-default btn-flat\">Logout</a>
                </div>
              </li>
            </ul>
          </li>
          <li id=\"fullscreen-button\" style=\"display: none;\">
            <a href=\"#\" data-toggle=\"fullscreen-ask\"><i class=\"fa fa-gears\"></i></a>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href=\"#\" data-toggle=\"control-sidebar\"><i class=\"fa fa-gears\"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>";

 	$main_sidebar = "<aside class=\"main-sidebar\">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class=\"sidebar\">

      <!-- Sidebar user panel (optional) -->
      <div class=\"user-panel\">
        <div class=\"pull-left image\">
          <img src=\"".$user_profile->avatar_url."\" width=\"160px\" height=\"160px\" class=\"img-circle\" alt=\"User Image\">
        </div>
        <div class=\"pull-left info\">
          <p>".$user_profile->nome."</p>
          <!-- Status -->
          <a href=\"#\">Level ".$user_profile->level."</a>
        </div>
      </div>

      <!-- search form (Optional) 
      <form action=\"#\" method=\"get\" class=\"sidebar-form\">
        <div class=\"input-group\">
          <input type=\"text\" name=\"q\" class=\"form-control\" placeholder=\"Search...\">
              <span class=\"input-group-btn\">
                <button type=\"submit\" name=\"search\" id=\"search-btn\" class=\"btn btn-flat\"><i class=\"fa fa-search\"></i>
                </button>
              </span>
        </div>
      </form>
      /.search form -->

      <!-- Sidebar Menu -->
      <ul class=\"sidebar-menu\">
        <li class=\"header\">Menu</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href=\"./treino_dia.php\"><i class=\"fa fa-link\"></i> <span>Treino do dia<span class=\"label label-success pull-right\">Disponivel</span></span></a></li>
        <!--<li><a href=\"#\"><i class=\"fa fa-link\"></i> <span>Novidades</span></a></li>-->
        <li class=\"treeview\">
          <a href=\"#\"><i class=\"fa fa-link\"></i> <span>Meus Estilos</span>
            <span class=\"pull-right-container\">
              <i class=\"fa fa-angle-left pull-right\"></i>
            </span>
          </a>
          <ul class=\"treeview-menu\">
            ".$estilos_menu_html."
          </ul>
        </li>
        <li><a href=\"#\"><i class=\"fa fa-link\"></i> <span>Regras</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>";
  $footer = "<footer class=\"main-footer\">
    <!-- To the right -->
    <div class=\"pull-right hidden-xs\">
      Seu treino na palma da mão!
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href=\"#\">DPFT</a>.</strong> All rights reserved.
  </footer>";
?>