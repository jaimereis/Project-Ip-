<!DOCTYPE html>
<html>
    <head>
        <link rel = "shortcut icon" type = "image / x-icon" href = "<?php echo BASE_URL; ?>/assets/images/ipeicone.ico"/>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Ipê Digital</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/plugins/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/plugins/AdminLTE.min.css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/plugins/_all-skins.min.css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/plugins/dataTables.bootstrap.css">
        <link type="text/css" media="all" href="<?php echo BASE_URL; ?>/assets/plugins/pace/pace-theme-minimal.css" rel="stylesheet"/>
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/plugins/jquery-ui.min.css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/plugins/tour/bootstrap-tour.min.css">
        <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
        <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
        <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/plugins/timepicker/chung-timepicker.css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/plugins/bootstrap-select.min.css">


    </head>
    <body class="hold-transition skin-blue sidebar-mini" id="steepFim">

        <div class="wrapper" >

            <header class="main-header" >

                <a href="<?php echo BASE_URL; ?>" class="logo">
                    <span class="logo-mini"><img src="<?php echo BASE_URL; ?>/assets/images/2.png"></i></span>
                    <span class="logo-lg"><img src="<?php echo BASE_URL; ?>/assets/images/2.png"></span>
                </a>
                <nav class="navbar navbar-static-top" role="navigation">
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" id="step7">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu" >
                        <ul class="nav navbar-nav">

                            <li class="dropdown tasks-menu" id="step8" >

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="iniciarTour">
                                    <i class="fa fa-play" aria-hidden="true"></i> Iniciar Tour

                                </a>

                            </li>
                            <li class="dropdown user user-menu" id="step9">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="hidden-xs"><?php echo strtoupper($viewData['info'][0]['login']); ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-header">
                                        <p>
                                            <small>LOGIN : <?php echo strtoupper($viewData['info'][0]['login']); ?></small>
                                            <small>PERFIL : <?php echo strtoupper($viewData['info'][0]['perfil']); ?></small>
                                        </p>
                                    </li>
                                    <li class="user-footer">
                                        <div class="pull-right">
                                            <a href="<?php echo BASE_URL; ?>/login/logout" class="btn btn-default btn-flat">Sair</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </nav>
            </header>
            <aside class="main-sidebar">
                <section class="sidebar">

                    <ul class="sidebar-menu" id="step1">
                        <?php if ($viewData['info'][0]['perfil'] == 'ADMIN') { ?>
                            <li class="treeview" id="step2">
                                <a href="#">
                                    <i class="fa fa-users"></i> <span>Clientes</span> <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="active"><a href="<?php echo BASE_URL ?>/clientes/listar"><i class="fa fa-circle-o"></i> Listar Cliente</a></li>
                                </ul>
                            </li>

                            <li class="treeview" id="step3">
                                <a href="#">
                                    <i class="fa fa-database"></i> <span>Produto</span> <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="active"><a href="<?php echo BASE_URL ?>/produtos/listar"><i class="fa fa-circle-o"></i> Listar Produto</a></li>
                                </ul>
                            </li>

                            <li class="treeview" id="step4">
                                <a href="#">
                                    <i class="fa fa-shopping-cart"></i> <span>Venda</span> <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="active"><a href="<?php echo BASE_URL ?>/venda/cadastrar"><i class="fa fa-circle-o"></i> Cadastrar Venda</a></li>
                                    <li class="active"><a href="<?php echo BASE_URL ?>/venda/buscarVenda"><i class="fa fa-circle-o"></i> Buscar Venda (Filtro)</a></li>
                                </ul>
                            </li>

                        <?php } else { ?>
                            <li class="treeview" id="step2">
                                <a href="#">
                                    <i class="fa fa-users"></i> <span>Clientes</span> <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="active"><a href="<?php echo BASE_URL ?>/clientes/listar"><i class="fa fa-circle-o"></i> Listar Cliente</a></li>
                                </ul>
                            </li>
                            <li class="treeview" id="step4">
                                <a href="#">
                                    <i class="fa fa-shopping-cart"></i> <span>Venda</span> <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="active"><a href="<?php echo BASE_URL ?>/venda/cadastrar"><i class="fa fa-circle-o"></i> Cadastrar Venda</a></li>
                                </ul>
                            </li>
                        <?php } ?>


                    </ul>
                </section>
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <?php
                $this->loadViewInTemplate($viewName, $viewData);
                ?>
            </div><!-- /.box -->

        </div>

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2018 <a href="http://ipe.digital/">Ipe Digital</a>.</strong> Todos os direitos reservados.
    </footer>


    <script src="<?php echo BASE_URL; ?>/assets/plugins/jQuery-2.1.4.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/plugins/fusionCharts/fusioncharts.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/plugins/fusionCharts/fusioncharts-jquery-plugin.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/plugins/app.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/plugins/demo.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/plugins/jquery.dataTables.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/js/scripts.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/plugins/jquery.form.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/plugins/jquery-ui.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/plugins/tour/bootstrap-tour.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/plugins/jquery.mask.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/plugins/jquery.maskMoney.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/plugins/bootstrap-select.js"></script>
    <script  src="<?php echo BASE_URL; ?>/assets/plugins/pace/pace.min.js" type="text/javascript"></script>

</script>
</body>
</html>
