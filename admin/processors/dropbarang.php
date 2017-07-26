<?php
    /**
     * Created by PhpStorm.
     * User: Aji
     * Date: 16/07/2017
     * Time: 8:16
     */
    require_once '../config/db.php';

    $res = oci_parse(
        $conn,
        "DELETE FROM barang WHERE id='$_GET[id]'"
    );

    if(oci_execute($res)){
        echo '
                <script>  
                    alert("Berhasil dihapus");
                    window.location="../pages/layout/boxed.php?section=barang";
                </script>  
            ';
    } else {
        echo '
                <script>  
                    alert("Gagal menghapus");
                    window.location="../pages/layout/boxed.php?section=barang";
                </script>  
            ';
    }