<body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="?index.php"><b>Aprenda</b>Já</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">

        <?php

        $valid = isset($_GET['log'])?$_GET['log']:'';
        if ($valid == '0') {
          echo '<div class="alert alert-danger"><strong>Login ou senha incorretos!</strong> <br>Tente novamente.</div>';
        }
        ?>
        <p class="login-box-msg">Fazer login para prosseguir para o AprendaJá</p>
        <form action="" method="post">
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email" name='email' required>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Senha" name='senhalogin' required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row"><!-- /.col -->
            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
            </div><!-- /.col -->
          </div>
        </form>
        <br>
        <a href="?c=login&a=adicionar" class="text-center">Registrar um novo usuário</a>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
  </body>