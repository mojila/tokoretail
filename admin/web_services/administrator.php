<?php
    require_once '../config/db.php';

    // Condition
    if(isset($_GET['action'])){
        if($_GET['action'] == 'select')
            select($conn);
        else if($_GET['action'] == 'delete'){
            if(isset($_GET['username']))
                delete($conn, $_GET['username']);
        } else if($_GET['action'] == 'insert'){
            // disable error reporting
            error_reporting(0);
            // create folder
            mkdir('./../profiles/'.$_POST['username'].'/', 0777, true);
            $file = $_FILES['photo_profile'];
            $path = 'profiles/'.$_POST['username'].'/'.basename(date('dmYHis').'_'.$file['name']);
            move_uploaded_file($file['tmp_name'], '../'.$path);
            insert($conn, $_POST['name'], $_POST['username'], md5($_POST['password']), strtolower($_POST['auth_level']), $path);
        } else if($_GET['action'] == 'update'){
            if(isset($_POST['photo_profile'])){
                // disable error reporting
                error_reporting(0);
                $file = $_FILES['photo_profile'];
                $path = 'profiles/'.$_POST['username'].'/'.basename(date('dmYHis').'_'.$file['name']);
                move_uploaded_file($file['tmp_name'], '../'.$path);
                update($conn, $_POST['username'], $_POST['name'], md5($_POST['password']), $_POST['auth_level'], $path);
            } else {
                if(isset($_POST['photo_from_galeri'])){
                    update($conn, $_POST['username'], $_POST['name'], md5($_POST['password']), $_POST['auth_level'], $_POST['photo_from_galeri']);
                } else {
                    update($conn, $_POST['username'], $_POST['name'], md5($_POST['password']), $_POST['auth_level'], null);
                }
            }

        }

    }

    // Update Function : for update data
    function update($conn, $username, $name, $password, $auth_level, $path){
        if($path !== null){
            $update_administrator = oci_parse(
                $conn,
                "UPDATE administrator SET name='$name', password='$password', auth_level='$auth_level' WHERE username='$username'"
            );
            $result_photo_profile = oci_parse(
                $conn,
                "SELECT * FROM photo_profile WHERE username='$username' AND path='$path'"
            );
            if(oci_num_rows($result_photo_profile) > 0){
                $update_photo_profile = oci_parse(
                    $conn,
                    "UPDATE photo_profile SET active='1' WHERE username='$username' AND path='$path'"
                );
            } else {
                $unset_photo_profile = oci_parse(
                    $conn,
                    "UPDATE photo_profile SET active='0' WHERE username='$username'"
                );
                oci_execute($unset_photo_profile);
                $update_photo_profile = oci_parse(
                    $conn,
                    "INSERT INTO photo_profile (username, path, active) VALUES ('$username', '$path', 1)"
                );
            }
            oci_execute($update_photo_profile);
        } else {
            $update_administrator = oci_parse(
                $conn,
                "UPDATE administrator SET name='$name', password='$password', auth_level='$auth_level' WHERE username='$username'"
            );
        }
        oci_execute($update_administrator);
        header('location: administrator.php?action=select'); // redirect
    }

    // Select Function : for render result as json for all data
    function select($conn){
        $result = oci_parse(
            $conn,
            "SELECT * FROM administrator"
        );

        oci_execute($result);

        $rows = array();

        while ($data = oci_fetch_assoc($result))
            $rows[] = $data;

        $json = json_encode($rows);
        header('Content-Type: application/json');
        echo $json;
    }

    // Delete Function : for deleting data
    function delete($conn, $username){
        // Disable problem report
        error_reporting(0);
        $result_administrator = oci_parse(
            $conn,
            "DELETE FROM administrator WHERE username='$username'"
        );
        $result_photo_profile = oci_parse(
            $conn,
            "DELETE FROM photo_profile WHERE username='$username'"
        );

        oci_execute($result_administrator);
        oci_execute($result_photo_profile);
        removeDirectory('../profiles/'.$username);
        header('location: administrator.php?action=select'); // redirect
    }

    // Remove Directory Function : for delete all files about deleted administrator
    function removeDirectory($path){
        foreach (glob("{$path}/*") as $file){
            if(is_dir($file)){
                removeDirectory($file);
            } else {
                unlink($file);
            }
        }
        rmdir($path);
    }

    // Insert Function : for inserting data
    function insert($conn, $name, $username, $password, $auth_level, $path){
        $result = oci_parse(
            $conn,
              "INSERT ALL 
              INTO administrator (name, username, password, auth_level) VALUES ('$name', '$username', '$password', '$auth_level')
              INTO photo_profile (username, path, active) VALUES ('$username', '$path', 1)
              SELECT * FROM dual"
        );

        oci_execute($result);
        header('location: administrator.php?action=select'); // redirect
    }
?>