<?php
    /**
     * Created by PhpStorm.
     * User: Aji
     * Date: 18/07/2017
     * Time: 0:51
     */
    require_once '../config/db.php';

    $id = rand(1, 999)*rand(3,78);
    $kode = rand(1000,1999).'-'.rand(1000,1999).'-'.rand(1000,1999).'-'.rand(1000,1999);

    $req = oci_parse(
        $conn,
        "INSERT INTO voucher (id, kode, nilai, status) VALUES ('$id', '$kode', '$_POST[nilai]', 0)"
    );

    if(oci_execute($req)){
        echo '
            <script>  
                alert("Berhasil Menambahkan");
                window.location="../pages/layout/boxed.php?section=voucher";
            </script>  
        ';
    } else {
        echo '
            <script>  
                alert("Gagal Menambahkan, coba lagi");
                window.location="../pages/layout/boxed.php?section=tambahvoucher";
            </script>  
        ';
    }