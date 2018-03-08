<?php
  require('basic.php');
  require('../config.php');
  require('inc/menu.php');
  require('inc/control_sidebar.php');

  $user_profile = json_decode($_SESSION['user_profile']);
  $inside = true;
  $page_name = "Movimento";
  $page_description = "";
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
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
            <!-- Box Comment -->
            <div class="box box-widget">
              <div class="box-header with-border">
                <div class="user-block">
                  <!-- <img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Image"> -->
                  <span class="username"><a href="#">Arm Lock</a></span>
                  <span class="description">Finalizacao de braco - Level 1</span>
                </div>
                <!-- /.user-block -->
                <div class="box-tools">
                  <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Treinar">
                    <i class="fa fa-circle-o"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
                <!-- /.box-tools -->
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <!-- <img class="img-responsive pad" src="../dist/img/photo2.png" alt="Photo"> -->
                <iframe class="col-sm-12" height="480" src="https://www.youtube-nocookie.com/embed/_jcGRVFxM-4?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                <p>Arm lock é uma finalização onde o lutador pega o braço do seu adversário e o coloca entre suas pernas, ficando com o punho dele, segurado pelas próprias mãos no centro de seu peito, fazendo assim uma torção no cotovelo do adversário. Pode acontecer de inúmeras posições.</p>
                <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Treinado</button>
                <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
                <span class="pull-right text-muted">127 likes</span>
              </div>
              <!-- /.box-body -->
              <!-- /.box-footer -->
              <!-- /.box-footer -->
            </div>
            <!-- /.box -->
          </div>
          <div class="col-md-6">
            <!-- Box Comment -->
            <div class="box box-widget">
              <div class="box-header with-border">
                <div class="user-block">
                  <!-- <img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Image"> -->
                  <span class="username"><a href="#">Americana</a></span>
                  <span class="description">Chave de ombro/ cotovelo - Level 1</span>
                </div>
                <!-- /.user-block -->
                <div class="box-tools">
                  <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Treinar">
                    <i class="fa fa-circle-o"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
                <!-- /.box-tools -->
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <!-- <img class="img-responsive pad" src="../dist/img/photo2.png" alt="Photo"> -->
                <iframe class="col-sm-12" height="480" src="https://www.youtube-nocookie.com/embed/qhGF-v7hqcc?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                <p><br><br>Americana é uma finalização de ombro, onde o lutador pega o punho do adversário com a mão oposta do adversário e então passa a mão paralela por baixo do cotovelo do adversário para pegar o próprio pulso, trazendo para próximo do próprio corpo e então aumentando o angulo de inclinação. Pode acontecer de inúmeras posições.</p>
                <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Treinado</button>
                <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
                <span class="pull-right text-muted">127 likes</span>
              </div>
              <!-- /.box-body -->
              <!-- /.box-footer -->
              <!-- /.box-footer -->
            </div>
            <!-- /.box -->
          </div>
      </div>
      <!-- Your Page Content Here -->

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
