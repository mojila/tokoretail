<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
           folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="../../dist/css/universal.css">
        <!-- Loading Animation -->
        <link rel="stylesheet" href="../../dist/css/simple-loading.css">
        <!-- SweetAlert -->
        <link rel="stylesheet" href="../../dist/css/sweetalert.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- jQuery 3 -->
        <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
        <script src="../../dist/js/universal.js"></script>
        <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
<!-- ADD THE CLASS layout-boxed TO GET A BOXED LAYOUT -->
<body class="hold-transition skin-blue layout-boxed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <!--  Navbar   -->
    <?php
        require '../../components/navbar.php';
    ?>
    <!--  Sidebar  -->
    <?php
        require '../../components/sidebar.php';
    ?>

  <!-- Content Wrapper. Contains page content -->
  <div id="main-content" class="content-wrapper">
      <!--      -->
  </div>
  <!-- /.content-wrapper -->
    <!--  Footer  -->
    <?php
        require '../../components/footer.php';
    ?>
</div>
<!-- ./wrapper -->

    <!-- Bootstrap 3.3.7 -->
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- DataTables -->
    <script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- Pace -->
    <script src="../../dist/js/pace.min.js"></script>
    <!-- SweetAlert -->
    <script src="../../dist/js/sweetalert.min.js"></script>
    <?php
        if(isset($_GET['section'])){
            if($_GET['section']=='barang'){
                echo '
                    <script>
                        $(document).ready(function(){
                            $("#main-content").load("../section/listbarang.php");
                        });
                    </script>
                ';
            } else if($_GET['section']=='tambahbarang'){
                echo '
                    <script>
                        $(document).ready(function(){
                            $("#main-content").load("../section/addbarang.php");
                        });
                    </script>
                ';
            } else if($_GET['section']=='voucher'){
                echo '
                    <script>
                        $(document).ready(function(){
                            $("#main-content").load("../section/listvoucher.php");
                        });
                    </script>
                ';
            } else if($_GET['section']=='tambahvoucher'){
                echo '
                    <script>
                        $(document).ready(function(){
                            $("#main-content").load("../section/addvoucher.php");
                        });
                    </script>
                ';
            }
        }
    ?>
</body>
</html>
