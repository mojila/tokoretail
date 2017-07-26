<?php
    session_start();
    require_once 'admin/config/db.php';
    error_reporting(0);
    $id = $_POST['id'];
    $email = $_SESSION['member'];
    $req_num = oci_parse(
        $conn,
        "SELECT COUNT(id) FROM barang WHERE id='$id' AND status=0"
    );
    oci_execute($req_num);
    $num = oci_fetch_array($req_num);
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
    <div class="main" id="main-content">

    </div>
    <?php
    if($num[0] > 0){
        $req_data = oci_parse(
            $conn,
            "SELECT * FROM barang WHERE id='$id'"
        );

        oci_execute($req_data);
        $data = oci_fetch_array($req_data);
        echo '
            <script>
                var barang = {
                    id: '.$data['ID'].',
                    nama: "'.$data['NAMA'].'",
                    harga: '.$data['HARGA'].',
                    photo: "'.$data['PHOTO'].'",
                    status: '.$data['STATUS'].'
                };
                
                $(document).ready(function() {
                    $("#main-content").load("barangexist.php");
                });
            </script>
        ';
    } else {
        echo '
            <script>
                $(document).ready(function() {
                    $("#main-content").load("barangnotfound.php");
                });
            </script>
        ';
    }
    ?>
    <script>
        $.goindex = function () {
            $('body').load('index.php');
        };
    </script>
</body>
</html>
