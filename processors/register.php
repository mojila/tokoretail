<?php
/**
 * Created by PhpStorm.
 * User: Aji
 * Date: 19/07/2017
 * Time: 6:37
 */
    require_once '../admin/config/db.php';

    $id = rand(1,999)*rand(1,99);
    $password = md5($_POST['password']);
    $req = oci_parse(
        $conn,
        "INSERT INTO member (id, nama, email, password, photo, saldo, status) VALUES ('$id', '$_POST[nama]', '$_POST[email]', '$password', '', 0, 1)"
    );
    oci_execute($req);

    echo '
        <script>
            window.location="../landing.php";
        </script>
    ';
