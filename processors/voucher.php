<?php
/**
 * Created by PhpStorm.
 * User: Aji
 * Date: 19/07/2017
 * Time: 17:12
 */
    require_once '../admin/config/db.php';

    $req_voucher = oci_parse(
        $conn,
        "SELECT COUNT(id) FROM voucher WHERE kode='$_POST[kode]' AND status=0"
    );

    oci_execute($req_voucher);
    $num = oci_fetch_array($req_voucher);
    if($num[0] > 0){
        $req_voucher_value = oci_parse(
            $conn,
            "SELECT * FROM voucher WHERE kode='$_POST[kode]'"
        );
        oci_execute($req_voucher_value);
        $voucher = oci_fetch_array($req_voucher_value);
        $nilai = $voucher['NILAI'];
        $req_member = oci_parse(
            $conn,
            "UPDATE member SET saldo=saldo+$nilai WHERE email='$_POST[email]'"
        );

        oci_execute($req_member);
        $req_voucher_edit = oci_parse(
            $conn,
            "UPDATE voucher SET status=1 WHERE kode='$_POST[kode]'"
        );

        oci_execute($req_voucher_edit);
        $date = date('Y/m/d');
        $id_rand = rand(1,999)*rand(1,99);
        $req_transaksi = oci_parse(
            $conn,
            "INSERT INTO transaksi (id, email, tipe, bertambah, tanggal) VALUES ('$id_rand', '$_POST[email]', 0, '$nilai', TO_DATE('$date', 'yyyy/mm/dd'))"
        );

        oci_execute($req_transaksi);
        header('location: ../vouchersuccessful.php');
    } else {
        header('location: ../voucherfailed.php');
    }
