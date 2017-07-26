<?php
    session_start();

    if(!isset($_SESSION['member']))
        header('location: landing.php');

    require_once 'admin/config/db.php';

    $req = oci_parse(
        $conn,
        "SELECT * FROM member WHERE email='$_SESSION[member]'"
    );

    oci_execute($req);
    $member = oci_fetch_array($req);
?>
<!DOCTYPE HTML>
<head>
<title>Toko Retail - Halaman Member</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/ionicons.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/nav.css" rel="stylesheet" type="text/css" media="all"/>
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/login.js"></script>
    <script type="text/javascript" src="js/Chart.js"></script>
    <script type="text/javascript" src="js/jquery.easing.js"></script>
    <script type="text/javascript" src="js/jquery.ulslide.js"></script>
    <!----Calender -------->
    <link rel="stylesheet" href="css/clndr.css" type="text/css" />
    <script src="js/underscore-min.js"></script>
    <script src= "js/moment-2.2.1.js"></script>
    <script src="js/clndr.js"></script>
    <script src="js/site.js"></script>
    <!----End Calender -------->
</head>
<body>
        <div class="wrap">
        <div class="header">
            <div class="header_top">
                    <div class="menu">
                        <a class="toggleMenu" href="#"><img src="images/nav.png" alt="" /></a>
                            <ul class="nav">
                                <li><a href="#"><i><img src="images/user.png" alt="" /></i>Profil</a></li>
                            <div class="clear"></div>
                            </ul>
                            <script type="text/javascript" src="js/responsive-nav.js"></script>
                        </div>
                    <div class="profile_details">
                            <div id="loginContainer">
                                <a id="loginButton" class=""><span>Me</span></a>
                                    <div id="loginBox">
                                    <form id="loginForm">
                                        <fieldset id="body">
                                            <div class="user-info">
                                                <h4>Hello,<a href="#"> <?php echo $_SESSION['member']; ?></a></h4>
                                                <ul>
                                                    <li class="profile active"><a href="#">Profil </a></li>
                                                    <li class="logout"><a href="processors/logout.php"> Logout</a></li>
                                                    <div class="clear"></div>
                                                </ul>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                            <div class="profile_img">
                                <a href="#"><img src="images/profile_img40x40.jpg" alt=""/></a>
                            </div>
                            <div class="clear"></div>
                        </div>
                    <div class="clear"></div>
                </div>
            </div>
    </div>
    <div class="main">
        <div class="wrap">
        <div class="column_middle">
                <div class="social_networks">
                    <ul>
                        <li><a href="qrcode/index.html" class="buy"><span style="width: 90%; text-align:center;"><i class="ion ion-bag color-white"></i> Beli Barang</span>
                        <div class="clear"></div></a></li>
                    </ul>
                </div>
                <div class="social_networks">
                    <ul>
                        <li><a href="#" class="wallet"><span class="wallet" style="width: 80%; margin-left: 3vw; text-align:center;">Saldo : Rp. <?php echo number_format($member['SALDO']); ?>,-</span>
                        <div class="clear"></div></a></li>
                    </ul>
                </div>
        </div>
        <div class="column_left" id="content">
                <div class="menu_box">
                    <h3>Menu Box</h3>
                    <div class="menu_box_list">
                            <ul>
                                <li><a id="voucher" href="#" class="ion ion-card"><span>Gunakan Voucher</span><div class="clear"></div></a></li>
                                <li><a id="riwayat" href="#" class="ion ion-calendar"><span>Riwayat Belanja</span><div class="clear"></div></a></li>
                            </ul>
                    </div>
                </div>
            </div>
        <div class="clear"></div>
    </div>
</div>
    <!--<link href='http://fonts.googleapis.com/css?family=Carrois+Gothic+SC' rel='stylesheet' type='text/css'>-->
    <script>
        $(document).ready(function () {
            $('#voucher').click(function () {
                $('#content').load('voucher.php');
            });
            $('#riwayat').click(function () {
                $('#content').load('riwayat.php');
            });
        });
    </script>
</body>
</html>