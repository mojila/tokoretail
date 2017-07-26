<?php
    /**
     * Created by PhpStorm.
     * User: Aji
     * Date: 16/07/2017
     * Time: 7:58
     */
    require_once '../config/db.php';
    $id = rand(1,99)*rand(1,88);
    $res = oci_parse(
        $conn,
        "INSERT INTO tips (id, tip, priority, subject) VALUES ('$id', '$_POST[tip]', '$_POST[priority]', '$_POST[subject]')"
    );

    if(oci_execute($res)){
        echo '
            <script>  
                alert("Berhasil Menambahkan");
                window.location="../pages/layout/boxed.php";
            </script>  
        ';
    } else {
        echo '
            <script>  
                alert("Gagal Menambahkan");
                window.location="../pages/layout/boxes.php";
            </script>  
        ';
    }