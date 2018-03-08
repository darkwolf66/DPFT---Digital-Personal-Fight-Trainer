<?php
  session_start();
  if(empty($_SESSION['user_profile'])){
    header('location:/');
  }
  $user_profile = json_decode($_SESSION['user_profile']);
  if($user_profile->ultimo_login != "0000-00-00 00:00:00"){
    header('location:/app');
  }
  $inside = true;
  require '../config.php';
  require('inc/menu.php');
  require('inc/control_sidebar.php');
  $page_name = "Bem Vindo!";
  $page_description = "Como é sua primeira vez por aqui precisamos de alguns dados!";
  $estilos = file_get_contents("http://dpft.ml/api/estilos.php?token=".$token."&action=get_by_level&level=0");
  $estilos = json_decode($estilos); 

//SELETOR DE ESTILOS
  $estilos_html = "";
  foreach ($estilos as $estilo) {
    $estilos_html = $estilos_html."<option value=\"".$estilo->id."\">".$estilo->nome."</option>";
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
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php echo $main_header; ?>
  <?php echo $main_sidebar; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content col-md-10">
      <div class="col-md-6">
        <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Passo 1</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
                <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Avatar Atual:</label>
                    <img src="http://dpft.ml/images/avatar.jpeg" width="160px" height="160px" class="img-circle" id="image_preview">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Seu avatar:</label>
                    <input type="file" name="file" id="file" required />
                    <p class="help-block">Maximo imagens de 2mb :D</p>
                  </div>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Upload</button>
                  </div>
                  <div id="resultado"></div>
                </div>
              </form>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          
      <div class="col-md-6">
        <form id="primeira_vez">
          <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Passo 2</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="col-md-12">
                  <label class="col-md-6 col-md-offset-3 h4 text-center">Escolha seu primeiro estilo:</label>
                </div>
                
                  <div class="box-body">
                    <div class="form-group">
                      <select class="form-control" name="estilo_form" id="estilo_form">
                        <?php echo $estilos_html; ?>   
                      </select>
                    </div>
                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Começar</button>
                  </div>
              </div>
              <!-- /.box -->
            </form>
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
     <script type="text/javascript">
              $(document).ready(function(e) {
                $("#uploadimage").on('submit', (function(e) {
                    e.preventDefault();
                    $("#message").empty();
                    $('#loading').show();
                    $.ajax({
                        url: "system/upload_avatar.php", // Url to which the request is send
                        type: "POST", // Type of request to be send, called as method
                        data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                        contentType: false, // The content type used when sending data to the server.
                        cache: false, // To unable request pages to be cached
                        processData: false, // To send DOMDocument or non processed data file it is set to false
                        success: function(data){
                                $("#image_preview").attr("src", data+"?data="+Date());
                                $('#image_preview').attr('width', '160px');
                                $('#image_preview').attr('height', '160px');
                            }
                    });
                }));
                $( "#primeira_vez" ).submit(function(e) {
                   e.preventDefault();
                   $.get("/app/system/primera_vez_execute.php?estilo="+$("#estilo_form :selected").val(),function(data){
                    if(data = "ok"){
                      window.location = "/app";
                    }
                  });
                });
            });

          </script>
</body>
</html>
