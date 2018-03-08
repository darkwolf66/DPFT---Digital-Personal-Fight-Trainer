<?php
	if(empty($inside)){
		header('location:/');
		exit();
	}
	$control_sidebar = "<aside class=\"control-sidebar control-sidebar-dark\">
    <!-- Create the tabs -->
    <ul class=\"nav nav-tabs nav-justified control-sidebar-tabs\">
      <li class=\"active\"><a href=\"#control-sidebar-home-tab\" data-toggle=\"tab\"><i class=\"fa fa-home\"></i></a></li>
      <li><a href=\"#control-sidebar-settings-tab\" data-toggle=\"tab\"><i class=\"fa fa-gears\"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class=\"tab-content\">
      <!-- Home tab content -->
      <div class=\"tab-pane active\" id=\"control-sidebar-home-tab\">
        <h3 class=\"control-sidebar-heading\">Recente</h3>
        <ul class=\"control-sidebar-menu\">
          <li>
            <a href=\"javascript::;\">
              <i class=\"menu-icon fa fa-birthday-cake bg-red\"></i>

              <div class=\"menu-info\">
                <h4 class=\"control-sidebar-subheading\">Desbloqueou um movimento premium!</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class=\"control-sidebar-heading\">Tarefas em Progresso</h3>
        <ul class=\"control-sidebar-menu\">
          <li>
            <a href=\"javascript::;\">
              <h4 class=\"control-sidebar-subheading\">
                Treino do dia!
                <span class=\"pull-right-container\">
                  <span class=\"label label-danger pull-right\">20%</span>
                </span>
              </h4>

              <div class=\"progress progress-xxs\">
                <div class=\"progress-bar progress-bar-danger\" style=\"width: 70%\"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class=\"tab-pane\" id=\"control-sidebar-stats-tab\">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class=\"tab-pane\" id=\"control-sidebar-settings-tab\">
        <form method=\"post\">
          <h3 class=\"control-sidebar-heading\">Configurações gerais</h3>

          <div class=\"form-group\">
            <label class=\"control-sidebar-subheading\">
              Enviar dados sobre o uso do sistema
              <input type=\"checkbox\" class=\"pull-right\" checked>
            </label>

            <p>
              Configurações gerais
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>";




?>