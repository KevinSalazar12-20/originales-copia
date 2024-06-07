<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Agrovirtual</title>
    
<!--    <link rel="stylesheet" href="--><?php //echo RUTA_URL; ?><!--public/components/bootstrap-4.3.1/css/bootstrap.min.css">-->
<!--    <link rel="stylesheet" href="--><?php //echo RUTA_URL; ?><!--public/components/bootstrap-4.3.1/js/bootstrap.min.js">-->
<!--    <link rel="stylesheet" href="--><?php //echo RUTA_URL; ?><!--public/components/bootstrap-4.3.1/js/jquery-3.3.1.slim.min.js">-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>   -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>public/components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>public/components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>public/css/AdminLTE.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
    page. However, you can choose any other skin. Make sure you
    apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/css/skins/skin-green.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL; ?>/css/estilos.css">
    <link rel="icon" type="image/png" href="<?php echo RUTA_URL . '/public/img/logo.png' ?>"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!--Iconos-->
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <!--Iconos-->
    <!--Datatable-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css" />
    <link rel="stylesheet" type="text/css"
            href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-html5-1.6.1/datatables.min.css" />
    <!--Datatable-->
</head>

<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>M</b>enu</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Panel</b> Administración</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->

                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="<?php echo RUTA_URL . '/public/imgs/user1-128x128.jpg' ?>" class="user-image"
                                 alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">Administrador</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="<?php echo RUTA_URL . '/public/imgs/user1-128x128.jpg' ?>" class="img-circle"
                                     alt="User Image">

                                <p>
                                    SENNOVA- Web Developer
                                    <small>Centro de Tecnologias Agroindustriales Cartago - Valle</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-4 text-center">
                                        <a href="#"></a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#"></a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#"></a>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Perfil</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?php echo RUTA_URL . 'Enrutador/cerrar_sesion' ?>" class="btn btn-default btn-flat">Salir</a>
                                </div>
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

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo RUTA_URL . '/public/imgs/user1-128x128.jpg' ?>" class="img-circle"
                         alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>Administrador</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>

            <!-- search form (Optional) -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder=" Buscar...">
                    <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
                </div>
            </form>
            <!-- /.search form -->

            <!-- *****************************    MENU LATERAL  *************************** -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">Menu Principal</li>
                <!-- Optionally, you can add icons to the links -->
                <li class="active"><a href="<?php echo RUTA_URL . 'Admin' ?>"><i class="fa fa-link"></i>
                        <span>Inicio</span></a></li>
                <li><a href="<?php echo RUTA_URL . 'Trastienda/admin' ?>"><i class="fa fa-link"></i> <span>Oportunidades Generadas</span></a>
                </li>
                <li><a href=<?php echo RUTA_URL . 'Emprendedor' ?>><i class="fa fa-link"></i> <span>Emprendedor</span></a>
                </li>
       <!--  <li><a href=<?php echo RUTA_URL . 'Trastienda/usuario' ?>><iclass="fa fa-link"></i>
             //           <span>Usuarios</span></a></li>-->
                <li><a href=<?php echo RUTA_URL . 'Categoria' ?>><i class="fa fa-link"></i>
                        <span>Categorías</span></a></li>
                <li><a href=<?php echo RUTA_URL . 'Municipio' ?>><i class="fa fa-link"></i>
                        <span>Municipios</span></a></li>
                <li><a href="<?php echo RUTA_URL . 'Trastienda/producto' ?>"><i class="fa fa-link"></i> <span>Ficha Productos</span></a>
                </li>
<!--                <li class="treeview">-->
<!--                    <a href="#"><i class="fa fa-link"></i> <span>Zonas</span>-->
<!--                        <span class="pull-right-container">-->
<!--                <i class="fa fa-angle-left pull-right"></i>-->
<!--              </span>-->
<!--                    </a>-->
<!--                    <ul class="treeview-menu">-->
<!--                        <li><a href="--><?php //echo RUTA_URL . 'Trastienda/zona' ?><!--">Zonas</a></li>-->
<!--                        <li><a href="--><?php //echo RUTA_URL . 'Trastienda/filtrar_municipio' ?><!--">Municipios </a></li>-->
<!--                    </ul>-->
<!--                </li>-->
<!--                <li><a href="--><?php //echo RUTA_URL . 'evento/MostrarEventos' ?><!--"><i class="fa fa-link"></i>-->
<!--                        <span>Cliente</span></a></li>-->

            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Aca empieza el contenido -->
