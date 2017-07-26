<?php
    /**
     * Created by PhpStorm.
     * User: Aji
     * Date: 16/07/2017
     * Time: 9:57
     */
    require_once '../config/db.php';

    $id = rand(1,99)*rand(1,999);
    $file = $_FILES['photo'];
    $filename = $file['name'];
    $path = 'barang/'.date('dmYHis').'_'.basename($filename);
    if(move_uploaded_file($file['tmp_name'], '../../images/'.$path)){
        $res = oci_parse(
            $conn,
            "INSERT INTO barang (id, nama, harga, photo, status) VALUES ('$id', '$_POST[nama]', '$_POST[harga]', '$path', 0)"
        );

        if(oci_execute($res)){
            echo '
                <script>
                    alert("Berhasil ditambahkan");
                    window.location="../pages/layout/boxed.php?section=barang";                 
                </script>
            ';
        } else {
            echo '
                <script>
                    alert("Gagal menambahkan");
                    window.location="../pages/layout/boxed.php?section=tambahbarang";                 
                </script>
            ';
        }
    }