<?php
   require('config.php');
   session_start();
   if(isset($_SESSION['user'])){
    
if (isset($_GET['sair'])) {
  session_destroy();
  unlink($_SESSION['user']);
  header('location:login.php');
}
 $sql = "SELECT * FROM admin WHERE usuario ='".$_SESSION['user']."'";
 $query = mysqli_query($conexao, $sql);

 while ($dadosUser = mysqli_fetch_assoc($query)) {
   $nome = $dadosUser['nome'];
   $email = $dadosUser['email'];
   $imgUser = $dadosUser['image'];
 }
} else {
  header('location:login.php');
}
        

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- MATERIALIZE -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" ><b>Admin</b>LTE</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu" style="width:30%;">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">
                <?php

                $sql = "SELECT * FROM notificacao WHERE status = '0'";
                $query = mysqli_query($conexao, $sql);
                $numero = mysqli_num_rows($query);

                echo $numero;

                ?>
              </span>
            </a>
            <ul class="dropdown-menu" style="width: 350px;">
              <li style="width: 350px;">
                <!-- inner menu: contains the actual data -->
                <ul class="menu" style="width: 350px;">


                                  <?php

                    $SQL = "SELECT * FROM contato, notificacao WHERE contato.idcontato = notificacao.idcontato AND notificacao.status = '0'";
                    $QUERY = mysqli_query($conexao, $SQL);

                    while ($info = mysqli_fetch_assoc($QUERY)) {
                      echo "<li style='width: 350px;'>
                              <a href='#' style='width: 350px;'>
                                <h4 style='width: 350px;'><p style='font-weight: bold;'>".$info['nome']."</p><p>".$info['mensagem']."</p></h4>
                              </a>
                            </li>
                            ";
                    }

                  ?>
                </ul>
              </li>
              <li class="footer"><a href="?page=msg">LER MAIS</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Create a nice theme
                        <small class="pull-right">40%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">40% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Some task I need to do
                        <small class="pull-right">60%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Make beautiful transitions
                        <small class="pull-right">60%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">80% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               <img src="dist/img/avatar2.png" class="user-image">
              <span class="hidden-xs"><?php echo $nome;?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
              <img src="dist/img/avatar2.png" class="img-circle" alt="User Image">
              </li>
              <center>
              <p style="color:black;">
                  <?php echo $nome;?>
                  <br>
                  <small> <?php echo $email;?></small>
                  <br>
                   <a href="?sair" class="btn btn-default btn-flat">Sair</a>
              </p>
            </center>
              </li>
            </ul>
          </li>


        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/avatar2.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $nome;?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      
        <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <br>
        <li class="active treeview menu-open">
          <a href="#">
            <i style="text-decoration: none;" class="fa fa-circle-o"></i> <span> Produtos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=cadastrar"><i class="fa fa-plus"></i> Cadastrar</a></li>
            <li><a href="?page=consulta"><i class="fa fa-search"></i> Consulta</a></li>
          </ul>
        </li>
        <br>
        <li class="active treeview menu-open">
          <a href="#">
            <i style="text-decoration: none;" class="fa fa-circle-o"></i> <span> Tamanho</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=cadastra_tamanho"><i class="fa fa-plus"></i> Cadastrar</a></li>
          </ul>
        </li>
        <br>
        <li class="active treeview menu-open">
          <a href="#">
            <i style="text-decoration: none;" class="fa fa-circle-o"></i> <span> Mensagem</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=msg"><i class="fa fa-plus"></i> Ver todas</a></li>
          </ul>
        </li>
        <br>
        <li class="active treeview menu-open">
          <a href="#">
            <i style="text-decoration: none;" class="fa fa-circle-o"></i> <span> Cor</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=cadastra_cor"><i class="fa fa-plus"></i> Cadastrar</a></li>
          </ul>
        </li>
        <br>
         <li class="active treeview menu-open">
          <a href="#">
            <i style="text-decoration: none;" class="fa fa-circle-o"></i> <span> Categorias</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=cadastrar_categoria"><i class="fa fa-plus"></i> Cadastrar</a></li>
            <li><a href="?page=consulta_cat"><i class="fa fa-search"></i> Consulta</a></li>
          </ul>
        </li>
        </ul>
    </section>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        INÍCIO
        <small><?php echo $nome ?></small>
      </h1>
    </section>
 <?php 
        if (isset($_GET['page'])){
          include $_GET['page'].'.php';

        } else {

        }
      ?>


<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="bower_components/chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
