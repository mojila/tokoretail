<?php
    /**
    * Created by PhpStorm.
    * User: Aji
    * Date: 16/07/2017
    * Time: 5:28
    */
    session_start();
    if(!isset($_SESSION['username']))
        header('location: ../login.php');

    require_once '../../config/db.php';

    $result_administrator = oci_parse(
        $conn,
        "SELECT * FROM administrator WHERE username='$_SESSION[username]'"
    );
    $result_administrator_photo_profile = oci_parse(
        $conn,
        "SELECT * FROM photo_profile WHERE username='$_SESSION[username]' AND active=1"
    );

    oci_execute($result_administrator);
    oci_execute($result_administrator_photo_profile);
    $administrator = oci_fetch_array($result_administrator);
    $administrator_photo_profile = oci_fetch_array($result_administrator_photo_profile);
    echo '
        <script>
            var administrator = { name: "'.$administrator['NAME'].'", photo_profile: "'.$administrator_photo_profile['PATH'].'", auth_level: "'.$administrator['AUTH_LEVEL'].'" };
        </script>
    ';
?>
<header class="main-header">
    <!-- Logo -->
    <a href="../../index.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>R</b>TL</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Re</b>tail</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="../../<?php echo $administrator_photo_profile['PATH']; ?>" class="user-image" alt="User Image">
                        <span class="hidden-xs">
                            <?php echo $administrator['NAME']; ?>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="../../<?php echo $administrator_photo_profile['PATH']; ?>" class="img-circle" alt="User Image">

                            <p>
                                <?php echo $administrator['NAME']; ?> - <?php echo $administrator['AUTH_LEVEL']; ?>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="../../processors/logout.php" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>

<!-- =============================================== -->
