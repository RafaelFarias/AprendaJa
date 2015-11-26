<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AprendaJá | <?= ucfirst($_GET['c']).'/'.ucfirst($_GET['a']) ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="public/js/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="public/js/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="public/js/plugins/iCheck/square/blue.css">
    <link rel="apple-touch-icon" sizes="57x57" href="public/img/favicon.ico">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<?= (!empty($success)) ? $success : '' ?>

<?php include "visoes/{$arquivo}.php"; ?>


<!-- FastClick -->
<script src="public/js/plugins/fastclick/fastclick.min.js"></script>

<!-- jQuery 2.1.4 -->
<script src="public/js/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="public/js/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="public/js/plugins/iCheck/icheck.min.js"></script>
<script src="public/js/funcoes.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</html>
