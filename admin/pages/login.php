<?php
    session_start();
    if(isset($_SESSION['username'])){
        header('location: ../index.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Toko Retail | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">
    <!-- Animate.css -->
    <link rel="stylesheet" href="../dist/css/animate.css">
    <!-- Loading Animation -->
    <link rel="stylesheet" href="../dist/css/simple-loading.css">
    <!-- SweetAlert -->
    <link rel="stylesheet" href="../dist/css/sweetalert.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <b>Log</b>In
    </div>
    <!-- /.login-logo -->
    <div id="form-login" class="col-md-12">
        <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile">
                <p class="text-muted text-center">Masukkan Username</p>

                <ul class="list-group list-group-unbordered ">
                    <div class="form-group has-feedback">
                        <input name="username_blank" class="form-control" placeholder="Username" type="text">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                </ul>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
</div>
    <!-- /.login-box -->
    <!-- jQuery 3 -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="../plugins/iCheck/icheck.min.js"></script>
    <!-- Pace -->
    <script src="../dist/js/pace.min.js"></script>
    <!-- SweetAlert -->
    <script src="../dist/js/sweetalert.min.js"></script>
    <script>
    $(document).ready(function () {
        $('input[name="username_blank"]').focus();
        $('#form-login').addClass('animated bounce');
    });
    $('input[name="username_blank"]').on('keypress', function (e) {
        if(e.which === 13){
            $.login($('input[name="username_blank"]').val());
        }
    });
    $.login = function(data){
        $('#form-login').load('login_confirmation.php?username='+data);
    };
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
