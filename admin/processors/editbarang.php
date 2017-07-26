<?php
    require_once '../config/db.php';
    /**
     * Created by PhpStorm.
     * User: Aji
     * Date: 16/07/2017
     * Time: 12:07
     */
    if($_FILES['photo']['name'] !== ''){
        $file = $_FILES['photo'];
        $filename = $file['name'];
        $path = 'barang/'.date('dmYHis').'_'.basename($filename);

        if(move_uploaded_file($file['tmp_name'], '../../images/'.$path)){
            $req = oci_parse(
                $conn,
                "UPDATE barang SET nama='$_POST[nama]', harga='$_POST[harga]', photo='$path' WHERE id='$_POST[id]'"
            );

            if(oci_execute($req)){
                echo '
                    <script>
                        alert("Berhasil Diedit");
                        window.location="../pages/layout/boxed.php?section=barang";
                    </script>
                ';
            } else {
                echo '
                    <script>
                        alert("Gagal Mengedit");
                        window.location="../pages/layout/boxed.php?section=barang";
                    </script>
                ';
            }
        }
    } else {
        $req = oci_parse(
            $conn,
            "UPDATE barang SET nama='$_POST[nama]', harga='$_POST[harga]' WHERE id='$_POST[id]'"
        );

        if(oci_execute($req)){
            echo '
                    <script>
                        alert("Berhasil Diedit");
                        window.location="../pages/layout/boxed.php?section=barang";
                    </script>
                ';
        } else {
            echo '
                    <script>
                        alert("Gagal Mengedit");
                        window.location="../pages/layout/boxed.php?section=barang";
                    </script>
                ';
        }
    }