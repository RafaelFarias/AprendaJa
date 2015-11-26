<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<style>
    td a {
        padding:5px;
    }
</style>
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
                <li class="treeview">
                    <a href="?c=aula&a=adicionar">
                        <i class="fa fa-book"></i> <span>Cadastro de Aulas</span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <div class="example-modal">
            <div class="modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Modal Default</h4>
                        </div>
                        <div class="modal-body">
                            <p>One fine body&hellip;</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div><!-- /.example-modal -->

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Listas de Aulas</h3>

                            <div class="box-tools">
                                <div class="input-group" style="width: 150px;">
                                    <input type="button" name="table_search" class="form-control input-sm pull-right"
                                           placeholder="Search">

                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <thead>

                                <tr>
                                    <th>Assunto</th>
                                    <th>Valor</th>
                                    <th>Status</th>
                                    <th>Vagas</th>
                                    <th>Duração</th>
                                    <th>Operações</th>
                                </tr>
                                </thead>

                                <tbody>

                                <?php
                                if ($listaAulas)
                                    foreach ($listaAulas as $aula) {

                                        switch ($aula['fl_status_aula']) {
                                            case 'A':
                                                $status = 'Aberta';
                                                break;
                                            case 'F':
                                                $status = 'Fechada';
                                                break;
                                            case 'C':
                                                $status = 'Concluída';
                                                break;
                                            case 'S':
                                                $status = 'Suspensa';
                                                break;
                                        }


                                        echo '<tr>';
                                        echo '<td>' . $aula['nm_titulo_aula'] . '</td>';
                                        echo '<td>' . $aula['nr_valor_aula'] . '</td>';
                                        echo '<td>' . $status . '</td>';
                                        echo '<td>' . $aula['qt_vagas'] . '</td>';
                                        echo '<td>' . $aula['duracao'] . '</td>';

                                        if ($_SESSION['usuario']['id_usuario'] == $aula['id_professor']) {
                                            echo '<td>' .
                                                '<a data-toggle="tooltip" data-placement="top" title="EDITAR" href="?c=aula&a=editar&id=' . $aula['id_aula'] . '"><span class="glyphicon glyphicon-edit"></span> Editar</a> ' .
                                                '<a data-toggle="tooltip" data-placement="top" title="APAGAR"  href="?c=aula&a=deletar&id=' . $aula['id_aula'] . '"><span class="glyphicon glyphicon-trash" ></span> Apagar</a>' .
                                                '<a data-toggle="tooltip" data-placement="top" title="INFORMAÇÕES"  href="?c=aula&a=visualizar&id=' . $aula['id_aula'] . '"><span class="fa fa-info-circle" data-toggle="modal" data-target="#myModal"></span> Informações</a>' .
                                                '<td>';
                                        } else {
                                            echo '<td><a data-toggle="tooltip" data-placement="top" title="INFORMAÇÕES"  href="#"><span class="fa fa-info-circle"></span> Informações</a></td>';
                                        }

                                    }
                                ?>
                                </tbody>

                            </table>
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