<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="?index.php"><b>Aprenda</b>Já</a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">Registro do Usuário</p>
            <form action="" method="post">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Nome Completo" name="nome" required>
                    <span class="glyphicon glyphicon-user form-control-feedback" required></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email" name="email" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Senha" name="senha" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Redigite a senha" name='senha2' required>
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button id='btnSalvar' type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                        <a href="?index.php" class="btn btn-danger btn-block btn-flat">Cancelar</a>
                    </div><!-- /.col -->
                </div>
            </form>
        </div><!-- /.form-box -->
    </div><!-- /.register-box -->

    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="../../plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>