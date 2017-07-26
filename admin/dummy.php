<?php
    require_once 'config/db.php';

    $req = oci_parse($conn, "DELETE FROM transaksi");

    oci_execute($req);
?>