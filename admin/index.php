<?php
    session_start();
    if(!isset($_SESSION['username']))
        header('location: pages/login.php');
    echo '
        <script>
            window.location="pages/layout/boxed.php";
        </script>
    ';