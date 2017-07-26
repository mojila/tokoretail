<?php
/**
 * Created by PhpStorm.
 * User: Aji
 * Date: 09/07/2017
 * Time: 11:47
 */
    require_once '../config/db.php';

    if($_GET['action']=='search'){
        search($conn, $_GET['username']);
    }

    function search($conn, $username){
        $result = oci_parse(
            $conn,
            "SELECT * FROM photo_profile WHERE username='$username' AND active=1"
        );

        oci_execute($result);

        $rows = array();

        while ($data = oci_fetch_assoc($result))
            $rows[] = $data;

        $json = json_encode($rows);
        header('Content-Type: application/json');
        echo $json;
    }
