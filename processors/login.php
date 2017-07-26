<?php
    /**
     * Created by PhpStorm.
     * User: Aji
     * Date: 19/07/2017
     * Time: 11:00
     */
    require_once '../admin/config/db.php';

    $pass = md5($_POST['password']);

    $req = oci_parse(
        $conn,
        "SELECT COUNT(id) FROM member WHERE email='$_POST[email]' AND password='$pass'"
    );

    oci_execute($req);
    $num = oci_fetch_array($req);

    if($num[0] > 0){
        session_start();
        $_SESSION['member'] = $_POST['email'];
        header('location: ../index.php');
    } else {
        header('location: ../landing.php');
    }