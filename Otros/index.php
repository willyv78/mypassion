<?php session_start();
require_once ("../php/conexion/conexion.php");
require_once ("../php/funciones.php");

$res_menu = menuBuscar();

if(isset($_SESSION['user_perf']))
{
    $perfil = $_SESSION['user_nom']. " " .$_SESSION['user_ape'];?>
    <!DOCTYPE html>
    <html lang="es">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>Edificio Eco Empresarial</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="Cache-Control" content="max-age=0, no-cache, no-store, private"> 
            <meta http-equiv="Pragma" content="nocache">
            <meta name="description" content="Intranet Grupo Empresarial Eco Empresarial">
            <meta name="keywords" content="Tributar Asesores, Coveg Auditores, R + B Diseño Experimental, Editores Hache">
            <meta name="author" content="Wilson Velandia">
            <!-- iconos para web apps y favicon -->
            <link rel="shortcut icon" href="../img/favicon.ico" />
            <link rel="apple-touch-icon" href="../img/icono_57.png" />
            <link rel="apple-touch-icon" sizes="72x72" href="../img/icono_72.png" />
            <link rel="apple-touch-icon" sizes="114x114" href="../img/icono_114.png" />
            <!-- Font awesome icon -->
            <link rel="stylesheet" href="../style/font-awesome.css"> 
            <!-- jQuery UI -->
            <link rel="stylesheet" href="../style/jquery-ui.css"> 
            <!-- jQuery Gritter -->
            <link rel="stylesheet" href="../style/jquery.gritter.css">
            <!-- CLEditor -->
            <link rel="stylesheet" href="../style/jquery.cleditor.css"> 
            <!-- Horizontal scroll -->
            <link rel="stylesheet" href="../style/jquery.horizontal.scroll.css">
            <!-- Calendar -->
            <link rel="stylesheet" href="../style/fullcalendar.css">
            <link rel='stylesheet' href='../style/fullcalendar.print.css' media='print' />
            <!-- prettyPhoto -->
            <link rel="stylesheet" href="../style/prettyPhoto.css">   
            <!-- Star rating -->
            <link rel="stylesheet" href="../style/rateit.css">
            <!-- Widgets stylesheet -->
            <link rel="stylesheet" href="../style/widgets.css">
            <!-- Slim slidebar stylesheet -->
            <link rel="stylesheet" href="../style/slim_style.css">
            <!-- DatePicker -->
            <link rel="stylesheet" href="../style/datepicker.css">
            <link rel="stylesheet" href="../style/datepicker3.css">
            <!-- <link rel="stylesheet" href="../style/bootstrap.css"> -->
            <!-- CSS Bootstrapvalidator -->
            <link rel="stylesheet" href="../style/bootstrapValidator.css"/>
            <link rel="stylesheet" href="../style/themify-icons.css">
            <link rel="stylesheet" href="../style/animate.min.css">
            <link rel="stylesheet" href="../style/palette.css">
            <link rel="stylesheet" href="../style/font.css">
            <!-- <link rel="stylesheet" href="../style/main_my.css"> -->
            <link rel="stylesheet" href="../style/bootstrap.min.css">
            <!-- Bootstrap toggle -->
            <link rel="stylesheet" href="../style/bootstrap-switch.css">
            <!-- Date picker -->
            <link rel="stylesheet" href="../style/bootstrap-datetimepicker.min.css">
            <link rel="stylesheet" href="../style/bootstrap-datetimepicker.css">
            <link rel="stylesheet" href="../style/sweet-alert.css">
            <!-- Main stylesheet -->
            <link rel="stylesheet" href="../style/style.css">
            <!-- <script src="../js/cssrefresh.js"></script> -->

            <!-- HTML5 Support for IE -->
            <!--[if lt IE 9]>
            <script src="../js/html5shim.js"></script>
            <![endif]-->

            <!-- Favicon -->
        </head>
        <body>
            <!-- Div de carga de la pagina -->
            <div class="espere">
                <div>
                    <h3>Cargando espere un momento por favor...</h3>
                </div>
            </div>
            <!-- Barra de navegación superior -->
            <div class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">
                <div class="containerk">
                    <!-- Menu button for smallar screens -->
                    <div class="navbar-header">
                        <!-- Menu superior minimizado en tres barras -->
                        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                            <span class="sr-only">Menu Minimizado</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!-- Titulo de la pagina suoerior izquierda -->
                        <a href="./" class="navbar-brand"><span class="bold">E3</span></a>
                    </div>
                    <!-- Site name for smallar screens -->
                    <!-- Barra de navegacion superior derecha -->
                    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
                        <!-- Notifications -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Comment button with number of latest comments count -->
                            <li class="dropdown bblue">
                                <!-- Nombre icono menu -->
                                <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                                    <i class="glyphicon glyphicon-warning-sign"></i><span class="badge">6</span>
                                </a>
                                <!-- Sub menu -->
                                <ul class="dropdown-menu extended notification">
                                    <li class="title">
                                        <p>You have 5 new notifications</p>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="label label-success">
                                                <i class="glyphicon glyphicon-plus"></i>
                                            </span>
                                            <span class="message">New user registration.</span>
                                            <span class="time">1 mins</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="label label-danger">
                                                <i class="glyphicon glyphicon-warning-sign"></i>
                                            </span>
                                            <span class="message">High CPU load on cluster #2.</span>
                                            <span class="time">5 mins</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="label label-success">
                                                <i class="glyphicon glyphicon-plus"></i>
                                            </span>
                                            <span class="message">New user registration.</span>
                                            <span class="time">10 mins</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="label label-info">
                                                <i class="glyphicon glyphicon-bullhorn"></i>
                                            </span>
                                            <span class="message">New items are in queue.</span>
                                            <span class="time">25 mins</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="label label-warning">
                                                <i class="glyphicon glyphicon-bolt"></i>
                                            </span>
                                            <span class="message">Disk space to 85% full.</span>
                                            <span class="time">55 mins</span>
                                        </a>
                                    </li>
                                    <li class="footer">
                                        <a href="#">View all notifications</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- Message button with number of latest messages count-->
                            <li class="dropdown bviolet">
                                <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                                    <i class="glyphicon glyphicon-inbox"></i><span class="badge">6</span>
                                </a>
                                <ul class="dropdown-menu extended notification">
                                    <li class="title">
                                        <p>You have 3 new messages</p>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="photo">
                                              <img alt="" src="../img/user.jpg">
                                            </span>
                                            <span class="subject">
                                                <span class="from">Bob Carter</span>
                                                <span class="time">Just Now</span>
                                            </span>
                                            <span class="text"> Consetetur sadipscing elitr... </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="photo">
                                                <img alt="" src="../img/user.jpg">
                                            </span>
                                            <span class="subject">
                                                <span class="from">Jane Doe</span>
                                                <span class="time">45 mins</span>
                                            </span>
                                            <span class="text"> Sed diam nonumy... </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="photo">
                                                <img alt="" src="../img/user.jpg">
                                            </span>
                                            <span class="subject">
                                                <span class="from">Patrick Nilson</span>
                                                <span class="time">6 hours</span>
                                            </span>
                                            <span class="text"> No sea takimata sanctus... </span>
                                        </a>
                                    </li>
                                    <li class="footer">
                                        <a href="#">View all messages</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- Tasks button with number of latest members count -->
                            <li class="dropdown borange">
                                <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                                    <i class="glyphicon glyphicon-tasks"></i><span   class="badge badge-success">4</span>
                                </a>
                                <ul class="dropdown-menu extended notification">
                                    <li class="title">
                                        <p>You have 7 pending tasks</p>
                                    </li>
                                    <li>
                                        <a href="#">
                                                    <span class="task">
                                                        <span class="desc">Preparing new release</span>
                                                        <span class="percent">30%</span>
                                                    </span>
                                            <div class="progress progress-small">
                                                <div class="progress-bar progress-bar-info" style="width: 30%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                                    <span class="task">
                                                        <span class="desc">Change management</span>
                                                        <span class="percent">80%</span>
                                                    </span>
                                            <div class="progress progress-small progress-striped active">
                                                <div class="progress-bar progress-bar-danger" style="width: 80%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                                    <span class="task">
                                                        <span class="desc">Mobile development</span>
                                                        <span class="percent">60%</span>
                                                    </span>
                                            <div class="progress progress-small">
                                                <div class="progress-bar progress-bar-success" style="width: 60%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                                    <span class="task">
                                                        <span class="desc">Database migration</span>
                                                        <span class="percent">20%</span>
                                                    </span>
                                            <div class="progress progress-small">
                                                <div class="progress-bar progress-bar-warning" style="width: 20%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="footer">
                                        <a href="#">View all tasks</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- flecha arriba abajo para mostrar u ocultar algo -->
                            <li class="statistics-toggle bblack"><a href="#"><i class="glyphicon glyphicon-resize-vertical"></i></a></li>
                            <!-- opcion proyectos abre un div interesante para manejar documentos o tareas -->
                            <li class="dropdown blightblue">
                                <a class="project-switcher-btn dropdown-toggle"  href="#">
                                    <i class="glyphicon glyphicon-folder-open"></i>
                                    <span>Proyectos</span>
                                </a>
                            </li>
                            <!-- Profile Links -->
                            <li class="dropdown bred">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                    <i class="glyphicon glyphicon-male"></i>
                                    <span class="username">Perfil</span>
                                    <b class="caret"></b>
                                </a>
                                <!-- Dropdown menu -->
                                <ul class="dropdown-menu">
                                    <li><a href="#"><i class="glyphicon glyphicon-user"></i> <?php echo $perfil;?></a></li>
                                    <li><a href="#"><i class="glyphicon glyphicon-cogs"></i> Editar</a></li>
                                    <li class="divider"></li>
                                    <li><a href="../cerrar.php"><i class="glyphicon glyphicon-off"></i> Salir</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- esto se muestra la hacer clic en proyectos
                <div class="pdd">
                    <ul id="horiz_container_outer" class="container" >
                        <li id="horiz_container_inner">
                            <ul id="horiz_container" style="width: 2715px;">
                                <li>
                                    <a href="#">
                                        <span class="image">
                                            <i class="glyphicon glyphicon-female"></i>
                                        </span>
                                        <span class="title">icon-female</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="image">
                                            <i class="glyphicon glyphicon-beaker"></i>
                                        </span>
                                        <span class="title">icon-beaker</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="image">
                                            <i class="glyphicon glyphicon-thumbs-up"></i>
                                        </span>
                                        <span class="title">icon-thumbs-up</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="image">
                                            <i class="glyphicon glyphicon-desktop"></i>
                                        </span>
                                        <span class="title">icon-desktop</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="image">
                                            <i class="glyphicon glyphicon-compass"></i>
                                        </span>
                                        <span class="title">icon-compass</span>
                                    </a>
                                </li>
                                <li class="current">
                                    <a href="#">
                                        <span class="image">
                                            <i class="glyphicon glyphicon-male"></i>
                                        </span>
                                        <span class="title">icon-male</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <div id="scrollbar" class="container">
                        <div id="track">
                            <div id="dragBar"></div>
                        </div>
                    </div>
                </div> -->
            </div>
            <!-- Main content starts -->
            <div class="content">
                <!-- Barra de navegacion menu izquierda -->
                <div class="sidebar sidebar-fixed">
                    <!-- Titulo de la barra de menu en tamaño pequeño -->
                    <div class="sidebar-dropdown"><a href="#">Menú</a></div>
                    <div class="sidebar-inner">
                        <!--- Sidebar navigation -->
                        <!-- If the main navigation has sub navigation, then add the class "has_submenu" to "li" of main navigation. -->
                        <!-- Menú -->
                        <ul class="navi"><?php 
                                if($res_menu)
                                {
                                  if(mysql_num_rows($res_menu) > 0)
                                  {
                                    while ($row_menu = mysql_fetch_array($res_menu))
                                    {
                                        if($row_menu[2] == '1'){?>
                                            <li>
                                                <a name="">
                                                     <?php echo $row_menu[0];?>
                                                </a>
                                                <ul id="rrhh">
                                                    <li>
                                                        <a name="<?php echo $row_menu[1];?>">
                                                            Empleados
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a name="solic">
                                                            Solicitudes
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a name="ingreso">
                                                            Ingreso
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li><?php
                                        }
                                        else{?>
                                            <li>
                                                <a name="<?php echo $row_menu[1];?>">
                                                     <?php echo $row_menu[0];?>
                                                </a>
                                            </li><?php 
                                        }
                                    }
                                  }
                                }?>
                        </ul>
                        <!-- Notifications -->
                        <div class="sidebar-title">
                            <span>Notificaciones</span>
                        </div>
                        <ul class="notifications">
                            <li>
                                <div class="col-left">
                                    <span class="label label-danger">
                                        <i class="glyphicon glyphicon-warning-sign"></i>
                                    </span>
                                </div>
                                <div class="col-right with-margin">
                                    <span class="message">
                                        Server <strong>#512</strong> crashed.
                                    </span>
                                    <span class="time">few seconds ago</span>
                                </div>
                            </li>
                            <li>
                                <div class="col-left">
                                    <span class="label label-info">
                                        <i class="glyphicon glyphicon-envelope"></i>
                                    </span>
                                </div>
                                <div class="col-right with-margin">
                                    <span class="message">
                                        <strong>John</strong> sent you a message
                                    </span>
                                    <span class="time">few second ago</span>
                                </div>
                            </li>
                            <li>
                                <div class="col-left">
                                    <span class="label label-success">
                                        <i class="glyphicon glyphicon-plus"></i>
                                    </span>
                                </div>
                                <div class="col-right with-margin">
                                    <span class="message">
                                        <strong>Pedro</strong> sent you a message
                                    </span>
                                    <span class="time">3 hours ago</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- final barra de menu izquierdo -->
              	<!-- contenido de la pagina -->
              	<div class="mainbar">
                    <!-- mapa del sitio y otros links -->
                    <div class="page-head">
                        <!-- Page heading -->
                        <!-- Breadcrumb -->
                        <div class="bread-crumb">
                            <a href="./"><i class="glyphicon glyphicon-home"></i> Inicio</a>
                            <!-- Divider -->
                            <span class="divider">></span>
                            <a href="#" class="bread-current">Recursos Humanos</a>
                            <!-- Divider -->
                            <span class="divider">></span>
                            <a href="#" class="bread-current">Empleados</a>
                        </div>
                        <ul class="crumb-buttons">
                            <li class="first">
                                <a title="" name="solicitudes">
                                    <i class="glyphicon glyphicon-signal"></i>
                                    <span>Solicitudes</span>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" title="">
                                    <i class="glyphicon glyphicon-tasks"></i>
                                        <span>
                                            Contactos <strong>(<span id="n_cont">+2</span>)</strong>
                                        </span>
                                    <i class="glyphicon glyphicon-angle-down left-padding"></i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a title="Nuevo Contacto" name="contactos">
                                            <i class="glyphicon glyphicon-plus"></i>
                                            Nuevo Contacto
                                        </a>
                                    </li>
                                    <li>
                                        <a title="Ver contactos" name="contactos">
                                            <i class="glyphicon glyphicon-reorder"></i>
                                            Ver contactos
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="range">
                                <a name="calendario">
                                    <i class="glyphicon glyphicon-calendar"></i>
                                    <span><?php echo date("Y-m-d H:i:s") ?></span>
                                </a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <!-- Final del mapa del sitio y otros links -->
            	    <!-- Matter Contenido de la pagina -->
            	    <div class="matter">
                        <div class="container">
                            <!-- Contenedor del contenido de la pagina -->
                            <div class="row">
                                <div id="col-md-12" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 column"></div>
                            </div>
                        </div>
            		</div>
            		<!-- Matter final -->
                </div>
               <!-- Mainbar ends -->	    	
               <div class="widget"></div>
            </div>
            <!-- Content ends -->
            <!-- Notification box starts -->
            <div class="slide-box">
                <!-- Notification box head -->
                <div class="slide-box-head btblue">
                  <!-- Title -->
                  <div class="pull-left">Notificaciones</div>          
                  <!-- Icon -->
                  <div class="slide-icons pull-right">
                    <a href="#" class="sminimize"><i class="glyphicon glyphicon-chevron-down"></i></a> 
                    <a href="#" class="sclose"><i class="glyphicon glyphicon-remove"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="slide-content" style="display:none;">

                  <!-- It is default bootstrap nav tabs. See official bootstrap doc for doubts -->
                    <ul class="nav nav-tabs">
                      <!-- Tab links -->
                      <li class="active"><a href="#tab1" data-toggle="tab"><i class="glyphicon glyphicon-bar-chart"></i></a></li>
                      <li><a href="#tab2" data-toggle="tab"><i class="glyphicon glyphicon-phone"></i></a></li>
                      <li><a href="#tab3" data-toggle="tab"><i class="glyphicon glyphicon-comments"></i></a></li>
                    </ul>

                    <!-- Tab content -->
                    
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                            <img src="../img/invitacion.jpg" class="img-responsive" alt="Image">
                        </div>
                        <div class="tab-pane" id="tab2">
                            <img src="../img/invitacion.jpg" class="img-responsive" alt="Image">
                        </div>
                        <div class="tab-pane" id="tab3">
                            <h5>Have some content here.</h5>
                            <p>Aliquam dui libero, pharetra nec venenatis in, scelerisque quis odio. In hac habitasse platea dictumst. Etiam porta placerat turpis, eget fermentum neque egestas at. Vestibulum ullamcorper, augue a sollicitudin vestibulum, orci purus semper felis, lobortis consequat nisi nunc eu enim.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Notification box ends -->   
            <!-- Boton de ir a home se habilita cuando se hace scroll -->
            <span class="totop"><a href="./"><i class="glyphicon glyphicon-chevron-up"></i></a></span> 
            <!-- Div de carga de formulario para ingreso de eventos al calendario -->
            <div class="ing-cal hidden">
                <div>
                    <h3>Cargando espere un momento por favor...</h3>
                </div>
            </div>
            <!-- jQuery -->
            <!--<script src="../js/jquery.js"></script></script>-->
            <script src='../js/jquery.min.js'></script>
            <!-- <script src="../js/jquery-1.10.2.min.js"></script>
            <script src="../js/jquery-1.11.1.min.js"></script>
            <script src="../js/jquery-2.1.3.min.js"></script> -->
            <script src="../js/jquery-ui-1.10.2.custom.min.js"></script>
            <script src="../js/jquery-migrate-1.2.1.js"></script>
            <script src="../js/jquery-ui.js"></script>
            <script src="../js/jquery.appear.js"></script>
            <!-- // <script src="../js/jquery.easing.min.js"></script> -->
            <script src="../js/jquery.color-2.1.2.js"></script>
            <script src="../js/jquery.rateit.min.js"></script> <!-- RateIt - Star rating -->
            <script src="../js/jquery.prettyPhoto.js"></script> <!-- prettyPhoto -->
            <script src="../js/jquery.flot.js"></script>
            <script src="../js/jquery.flot.resize.js"></script>
            <script src="../js/jquery.flot.pie.js"></script>
            <script src="../js/jquery.flot.stack.js"></script>
             <!--<script src="../js/jquery.gritter.min.js"></script> jQuery Gritter -->
            <script src="../js/jquery.mousewheel.js"></script> <!-- Mouse Wheel -->
            <script src="../js/jquery.horizontal.scroll.js"></script> <!-- horizontall scroll with mouse wheel -->
            <script src="../js/jquery.cleditor.min.js"></script> <!-- CLEditor -->
            <script src="../js/jquery.slimscroll.min.js"></script> <!-- vertical scroll with mouse wheel -->
            
            <!-- Librerias para el calendario -->
            <script src='../js/collapse.js'></script>
            <script src='../js/transition.js'></script>
            <script src='../js/moment.js'></script>
            <script src='../js/moment-with-locales.js'></script>
            <script src='../js/fullcalendar.js'></script>
            <script src='../js/lang-all.js'></script>

            <!-- jQuery Flot -->
            <script src="../js/excanvas.min.js"></script>
            <script src="../js/sparklines.js"></script> <!-- Sparklines -->
            <script src="../js/filter.js"></script> <!-- Filter for support page -->
            <script src="../js/custom.js"></script>
            <script src="../js/charts.js"></script> <!-- Custom chart codes -->
            <!-- <script src="../js/es_ES.js"></script>
            <script src="../js/pickers.js"></script> Custom chart codes -->
            <script src="../js/sweet-alert.js"></script><!-- Personalizar alertas -->

            <script src="../js/bootstrap-switch.min.js"></script> <!-- Bootstrap Toggle -->
            <script src="../js/bootstrap-datepicker.js"></script> <!-- Datetimepicker -->
            <script src="../js/bootstrap-datetimepicker.min.js"></script> <!-- Datetimepicker -->
            <script src="../js/bootstrapValidator.js"></script>
            <script src="../js/bootstrap.js"></script> <!-- Bootstrap -->
            <!-- <script src="../js/bootstrap.min.js"></script> -->

            <script src="../js/e3.js"></script>
            <!-- Script for this page -->
            <script>
                $(function () {
                    /* Bar Chart starts */
                    var d1 = [];
                    for (var i = 0; i <= 30; i += 1)
                        d1.push([i, parseInt(Math.random() * 30)]);
                    var d2 = [];
                    for (var i = 0; i <= 30; i += 1)
                        d2.push([i, parseInt(Math.random() * 30)]);
                    var stack = 0, bars = true, lines = false, steps = false;
                    function plotWithOptions() {
                        $.plot($("#bar-chart"), [ d1, d2 ], {
                            series: {
                                stack: stack,
                                lines: { show: lines, fill: true, steps: steps },
                                bars: { show: bars, barWidth: 0.8 }
                            },
                            grid: {
                                borderWidth: 0, hoverable: true, color: "#777"
                            },
                            colors: ["#52b9e9", "#0aa4eb"],
                            bars: {
                                  show: true,
                                  lineWidth: 0,
                                  fill: true,
                                  fillColor: { colors: [ { opacity: 0.9 }, { opacity: 0.8 } ] }
                            }
                        });
                    }
                    plotWithOptions();
                    $(".stackControls input").click(function (e) {
                        e.preventDefault();
                        stack = $(this).val() == "With stacking" ? true : null;
                        plotWithOptions();
                    });
                    $(".graphControls input").click(function (e) {
                        e.preventDefault();
                        bars = $(this).val().indexOf("Bars") != -1;
                        lines = $(this).val().indexOf("Lines") != -1;
                        steps = $(this).val().indexOf("steps") != -1;
                        plotWithOptions();
                    });
                    /* Bar chart ends */
                });
                /* Curve chart starts */
                $(function () {
                    var sin = [], cos = [];
                    for (var i = 0; i < 14; i += 0.5) {
                        sin.push([i, Math.sin(i)]);
                        cos.push([i, Math.cos(i)]);
                    }
                    var plot = $.plot($("#curve-chart"),
                           [ { data: sin, label: "sin(x)"}, { data: cos, label: "cos(x)" } ], {
                               series: {
                                   lines: { show: true, 
                                            fill: true,
                                            fillColor: {
                                              colors: [{
                                                opacity: 0.05
                                              }, {
                                                opacity: 0.01
                                              }]
                                          }
                                  },
                                   points: { show: true }
                               },
                               grid: { hoverable: true, clickable: true, borderWidth:0 },
                               yaxis: { min: -1.2, max: 1.2 },
                               colors: ["#fa3031", "#54728C"]
                             });
                    function showTooltip(x, y, contents) {
                        $('<div id="tooltip">' + contents + '</div>').css( {
                            position: 'absolute',
                            display: 'none',
                            top: y + 5,
                            width: 100,
                            left: x + 5,
                            border: '1px solid #000',
                            padding: '2px 8px',
                            color: '#ccc',
                            'background-color': '#000',
                            opacity: 0.9
                        }).appendTo("body").fadeIn(200);
                    }
                    var previousPoint = null;
                    $("#curve-chart").bind("plothover", function (event, pos, item) {
                        $("#x").text(pos.x.toFixed(2));
                        $("#y").text(pos.y.toFixed(2));

                            if (item) {
                                if (previousPoint != item.dataIndex) {
                                    previousPoint = item.dataIndex;
                                    
                                    $("#tooltip").remove();
                                    var x = item.datapoint[0].toFixed(2),
                                        y = item.datapoint[1].toFixed(2);
                                    
                                    showTooltip(item.pageX, item.pageY, item.series.label + " of " + x + " = " + y);
                                }
                            }
                            else {
                                $("#tooltip").remove();
                                previousPoint = null;            
                            }
                    }); 
                    $("#curve-chart").bind("plotclick", function (event, pos, item) {
                        if (item) {
                            $("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
                            plot.highlight(item.series, item.datapoint);
                        }
                    });
                });
                /* Curve chart ends */
                opcMenu();
                moment().format();
            </script>
        </body>
    </html><?php 
}
else{
    session_destroy();?>
    <script>
        alert("No ha iniciado Sesión");
        window.location = "../";
    </script><?php 
}?>