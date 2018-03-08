<?php
  require('basic.php');
  require('../config.php');
  require('inc/menu.php');
  require('inc/control_sidebar.php');

  if(empty($_GET['e'])){
	header('/app');  	
  }
//echo $user_profile->perfil_id;
  $perfil_estilos = json_decode(file_get_contents($dpft_url->api."/perfil.php?token=".$token."&action=get_estilos&profile_id=".$user_profile->perfil_id));
  foreach ($perfil_estilos as $estilo_aux) {
    if($estilo_aux->id == $_GET['e']){
    	$estilo = $estilo_aux;
    	break;
    }
  }
  if(isset($estilo)){
	header('/app');  	
  }
  $page_name = $estilo->nome;
  $page_description = $estilo->descricao;
  $movimentos = json_decode(file_get_contents($dpft_url->api."/movimentos.php?token=".$token."&action=get_movimentos&profile_id=".$user_profile->perfil_id));
  foreach ($estilo->movimentos as $movimento) {
  	//var_dump($movimento);
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-capable" content="yes">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php echo $main_header; ?>
  <?php echo $main_sidebar; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $page_name; ?>
        <small><?php echo $page_description; ?></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="row">
	        <div class="col-md-12">
	        	<div class="col-md-4">
		          <div class="box box-success">
		            <div class="box-header with-border">
		              <h3 class="box-title">Arm Lock</h3>
		              <div class="box-tools pull-right">
		                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
		                </button>
		              </div>
		              <!-- /.box-tools -->
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body">
		              Completo 5 de 5 treinos
		              <div class="progress progress-sm active">
		                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
		                  <span class="sr-only"></span>
		                </div>
		              </div>
		              <button  onclick="window.location = './armlock.php'" type="button" class="btn btn-block btn-success btn-lg">Treinar</button>
		            </div>
		            <!-- /.box-body -->
		          </div>
		          <!-- /.box -->
		      	</div>
	          	<div class="col-md-4">
		          <div class="box box-primary">
		            <div class="box-header with-border">
		              <h3 class="box-title">Americana</h3>
		              <div class="box-tools pull-right">
		                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
		                </button>
		              </div>
		              <!-- /.box-tools -->
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body">
		              Completo 4 de 5 treinos
		              <div class="progress progress-sm active">
		                <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
		                  <span class="sr-only"></span>
		                </div>
		              </div>
		              <button onclick="window.location = './americana.php'" type="button" class="btn btn-block btn-primary btn-lg">Treinar</button>
		            </div>
		            <!-- /.box-body -->
		          </div>
		          <!-- /.box -->
		        </div>
		        <div class="col-md-4">
		          <div class="box box-danger collapsed-box">
		            <div class="box-header with-border">
		              <h3 class="box-title">Ricky Nelson</h3>
		              <div class="box-tools pull-right">
		                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
		                </button>
		              </div>
		              <!-- /.box-tools -->
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body">
		              Completo 0 de 5 treinos
		              <div class="progress progress-sm active">
		                <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
		                  <span class="sr-only"></span>
		                </div>
		              </div>
		              <button onclick="window.location = './americana.php'" type="button" class="btn btn-block btn-danger btn-lg" disabled>Treinar</button>
		            </div>
		            <!-- /.box-body -->
		          </div>
		          <!-- /.box -->
		        </div>
	        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <?php echo $footer ?>;

  <!-- Control Sidebar -->
  <?php echo $control_sidebar ?>;
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<script type="text/javascript" src="/js/master.js"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
