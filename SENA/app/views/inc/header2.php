<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title><?= NAME_APP . ' Version: ' . VERSION_APP; ?></title>
    <!-- falta ponerlo en la ruta para llamarlo aqui nuevamente-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css"
        rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/css/AdminLTE.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css" />
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/css/AdminLTE.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-html5-1.6.1/datatables.min.css" />
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/css/skins/skin-blue.min.css">
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/css/styles.css">



</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="index2.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>M</b>enu</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">ADMIN SENA</span>
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
                                <img src="<?php echo RUTA_URL . '/public/imgs/user7-128x128.jpg' ?>" class="user-image"
                                    alt="User Image">
                                Usuario

                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="<?php echo RUTA_URL . '/public/imgs/user7-128x128.jpg' ?>"
                                        class="img-circle" alt="User Image">

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
                                        <a href="<?php echo RUTA_URL . 'controlador/cerrar_session' ?>"
                                            class="btn btn-default btn-flat">Salir</a>
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
                        <img src="<?php echo RUTA_URL . '/public/imgs/user7-128x128.jpg' ?>" class="img-circle"
                            alt="User Image">
                    </div>

                </div>


                <!-- *****************************    MENU LATERAL  *************************** -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">Menu Principal
                    <!-- Optionally, you can add icons to the links -->
                        <li class="item">
                            <a href="<?php echo RUTA_URL . 'ContAprendiz/index' ?>">
                                <i class="icon-compass"></i>
                                <span>Inicio</span></a>
                        </li>
                        <li class="item">
                            <a href="<?php echo RUTA_URL . 'ContAprendiz/index' ?>">
                                <i class="icon-male"></i>
                                <span>Administrar Aprendiz</span></a>
                        </li>
                        <li class="item">
                            <a href="<?php echo RUTA_URL . 'ContEquipo/index' ?>">
                                <i class="icon-male"></i>
                                <span>Administrar Equipos</span></a>
                        </li>
                        <li class="item">
                            <a href="<?php echo RUTA_URL . 'ContVigilante/index' ?>">
                                <i class="icon-male"></i>
                                <span>Administrar Vigilante</span></a>
                        </li>
                        <li class="item">
                            <a href="<?php echo RUTA_URL . 'ContVisitante/index' ?>">
                                <i class="icon-male"></i>
                                <span>Administrar Visitantes</span></a>
                        </li>
                    </li>
                </ul>
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>