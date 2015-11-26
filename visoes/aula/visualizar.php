<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
            <span class="logo-lg"><b>Aprenda</b>Já</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="public/img/avatar5.png" class="user-image" alt="User Image">
                            <span class="hidden-xs"><?= $_SESSION['usuario']['nm_usuario'] ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="public/img/avatar5.png" class="img-circle" alt="User Image">

                                <p style="color:black;">
                                    <?= $_SESSION['usuario']['ds_email'] ?>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="?c=login&a=deslogar" class="btn btn-default btn-flat">Sair</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header" style="background:#99a4ac"></li>
                <li class="treeview">
                    <a href="?c=dashboard">
                        <i class="fa fa-home"></i> <span>Tela Inicial</span>
                    </a>
                </li>
                <li class="treeview active">
                    <a href="?c=aula&a=adicionar ">
                        <i class="fa fa-book"></i> <span>Cadastro de Aulas</span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <?php
            
            $valid = isset($_GET['valid'])?$_GET['valid']:'';
            if ($valid == '0') {
                echo '<div class="alert alert-danger"><strong>Erro de validação!</strong> Todos campos devem estar preechidos.</div>';
            }
            ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="box">
                        <div class="box-header">
                            <h1 class="box-title" style="font-size: 30px;"><i class="fa fa-book"></i> Cadastro de Aulas</h1>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <form action="" method="post">
                                <fieldset>
                                    <legend> Informações da Aula </legend>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group col-sm-12">
                                                <?= isset($aula['ds_descricao_aula'])?$aula['ds_descricao_aula']:'' ?>
                                            </div>
                                        </div>
                                    </div>

                                    <hr />
                                    <a type="button" class="btn btn-block btn-info" id="dtAula" href="?c=dashboard">Voltar</a>
                                </fieldset>
                            </form>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 0.0.1
        </div>
        <strong>AprendaJá 2015 </strong>
    </footer>

</div><!-- ./wrapper -->
</body>