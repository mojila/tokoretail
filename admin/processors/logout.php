<?php
/**
 * Created by PhpStorm.
 * User: Aji
 * Date: 09/07/2017
 * Time: 19:04
 */
    session_start();
    $result = session_destroy();
    if($result){
        header('location: ../index.php');
    }