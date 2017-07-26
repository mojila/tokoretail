<?php
/**
 * Created by PhpStorm.
 * User: Aji
 * Date: 09/07/2017
 * Time: 13:01
 */
    require_once '../config/db.php';

    $password = md5($_POST['password']);
    $result_administrator = oci_parse(
        $conn,
        "SELECT COUNT(id) FROM administrator WHERE username='$_POST[username]' AND password='$password'"
    );

    oci_execute($result_administrator);
    $num = oci_fetch_array($result_administrator);
    if($num[0] > 0){
        session_start();
        $_SESSION['username'] = $_POST['username'];
        header('location: ../index.php');
    } else {
        echo '<script>
            alert("Password salah");
            window.location="../pages/login.php";
        </script>';
    }