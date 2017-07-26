<?php
/**
 * Created by PhpStorm.
 * User: Aji
 * Date: 19/07/2017
 * Time: 23:28
 */
    session_start();
    require_once '../admin/config/db.php';
    $member_email = $_SESSION['member'];

    $req_barang = oci_parse(
        $conn,
        "SELECT * FROM barang WHERE id='$_GET[id]'"
    );

    oci_execute($req_barang);
    $barang = oci_fetch_array($req_barang);
    $harga = $barang['HARGA'];
    $req_member = oci_parse(
        $conn,
        "SELECT * FROM member WHERE email='$member_email'"
    );

    oci_execute($req_member);
    $member = oci_fetch_array($req_member);

    if($member['SALDO'] > $harga){
        $req_member_saldo = oci_parse(
            $conn,
            "UPDATE member SET saldo=saldo-$harga WHERE email='$_SESSION[member]'"
        );
        oci_execute($req_member_saldo);
        $req_barang_status = oci_parse(
            $conn,
            "UPDATE barang SET status=1 WHERE id='$_GET[id]'"
        );
        oci_execute($req_barang_status);

        $date = date('Y/m/d');
        $id_rand = rand(1,999)*rand(1,99);
        $req_transaksi = oci_parse(
            $conn,
            "INSERT INTO transaksi (id, email, tipe, berkurang, tanggal, keterangan) VALUES ('$id_rand', '$_SESSION[member]', 1, '$harga', TO_DATE('$date', 'yyyy/mm/dd'), '$_GET[id]')"
        );

        oci_execute($req_transaksi);
        header('location: ../beliokay.php');
    } else {
        header('location: ../belifail.php');
    }