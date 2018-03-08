<?php
  require('basic.php');
  require('../config.php');
  require('inc/menu.php');
  require('inc/control_sidebar.php');
  $page_name = "Dashboard";
  $page_description = "Relação de treinos";


  $perfil_estilos = json_decode(file_get_contents($dpft_url->api."/perfil.php?token=".$token."&action=get_estilos&profile_id=".$user_profile->perfil_id));
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
    <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
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
    <section id="main_content" class="content">
      <div class="row" id="estilos">
        <?php 
          foreach ($perfil_estilos as $estilo) {
            echo "<div class=\"col-md-3 col-sm-6 col-xs-12\">
                    <div class=\"info-box bg-".$estilo->cor_box."\">
                      <span class=\"info-box-icon\"><img width=\"45px;\" height =\"45px;\" src=\"".$estilo->avatar_url."\"></i></span>

                      <div class=\"info-box-content\">
                        <span class=\"info-box-text\">".$estilo->nome."</span>
                        <span class=\"info-box-number\">Level ".$estilo->level."</span>

                        <div class=\"progress\">
                          <div class=\"progress-bar\" style=\"width: ".($estilo->treinos*100)/$estilo->treinos_proximo_nivel."%\"></div>
                        </div>
                            <span class=\"progress-description\">
                             ".$estilo->treinos." de ".$estilo->treinos_proximo_nivel." treinos
                            </span>
                      </div>
                    </div>
                  </div>";
          }
        ?>
      </div>
      <div class="row" style="display: none">
        <div class="col-md-12 col-sm-6 col-xs-12">
          <div class="col-md-3">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Treinos</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-md-8">
                    <div class="chart-responsive">
                      <canvas id="pieChart" height="150"></canvas>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <ul class="chart-legend clearfix">
                      <li><i class="fa fa-circle-o text-red"></i> Jiu-jitsu</li>
                      <li><i class="fa fa-circle-o text-green"></i> Muay Thai</li>
                      <li><i class="fa fa-circle-o text-yellow"></i> Karate</li>
                      <li><i class="fa fa-circle-o text-aqua"></i> Taekwondo</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="box-footer no-padding">
                <ul class="nav nav-pills nav-stacked">
                  <li><a href="#">Jiu-jitsu <span class="pull-right text-green">250</span></a>
                  </li>
                  <li><a href="#">Muay Thai <span class="pull-right text-green">250</span></a>
                  </li>
                  <li><a href="#">Karate <span class="pull-right text-green">250</span></a>
                  </li>
                  <li><a href="#">Taekwondo <span class="pull-right text-green">250</span></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Estilos de luta</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <ul class="products-list product-list-in-box">
                  <li class="item">
                    <div class="product-img">
                      <img src="dist/img/default-50x50.gif" alt="Product Image">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">Capoeira
                        <span class="label label-danger pull-right">Necessario level 2</span></a>
                          <span class="product-description">
                            
                          </span>
                    </div>
                  </li>
                  <li class="item">
                    <div class="product-img">
                      <img src="dist/img/default-50x50.gif" alt="Product Image">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">Boxe
                        <span class="label label-danger pull-right">Necessario level 6</span></a>
                          <span class="product-description">
                            
                          </span>
                    </div>
                  </li>
                  <li class="item">
                    <div class="product-img">
                      <img src="dist/img/default-50x50.gif" alt="Product Image">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">Silat
                       <span class="label label-danger pull-right">Necessario level 34</span></a>
                          <span class="product-description">
                            
                          </span>
                    </div>
                  </li>
                  <li class="item">
                    <div class="product-img">
                      <img src="dist/img/default-50x50.gif" alt="Product Image">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">Krav Maga
                        <span class="label label-success pull-right">Necessario level 0</span></a>
                          <span class="product-description">
                            
                          </span>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="box-footer text-center">
                <a href="javascript:void(0)" class="uppercase">Ver todos estilos de luta</a>
              </div>
            </div>
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
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="plugins/chartjs/Chart.min.js"></script>
<script type="text/javascript">
  //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
    var PieData = [
      {
        value: 250,
        color: "#f56954",
        highlight: "#f56954",
        label: "Jiu-jitsu"
      },
      {
        value: 250,
        color: "#00a65a",
        highlight: "#00a65a",
        label: "Muay Thai"
      },
      {
        value: 250,
        color: "#f39c12",
        highlight: "#f39c12",
        label: "Karate"
      },
      {
        value: 250,
        color: "#00c0ef",
        highlight: "#00c0ef",
        label: "Taekwondo"
      }
    ];
    var pieOptions = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke: true,
      //String - The colour of each segment stroke
      segmentStrokeColor: "#fff",
      //Number - The width of each segment stroke
      segmentStrokeWidth: 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps: 100,
      //String - Animation easing effect
      animationEasing: "easeOutBounce",
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate: true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale: false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
    };
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions);
</script>
</body>
</html>
