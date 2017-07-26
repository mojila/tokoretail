<?php
/**
 * Created by PhpStorm.
 * User: Aji
 * Date: 19/07/2017
 * Time: 16:43
 */
    session_start();
    session_destroy();
    header('location: ../landing.php');