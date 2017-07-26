<?php
/**
 * Created by PhpStorm.
 * User: Aji
 * Date: 09/07/2017
 * Time: 12:19
 */
    require_once '../config/db.php';

    $result_administrator = oci_parse(
        $conn,
        "SELECT COUNT(id) FROM administrator WHERE username='$_GET[username]'"
    );
    oci_execute($result_administrator);
    $num = oci_fetch_array($result_administrator);
    if($num[0] > 0){
        $result_administrator_confirmed = oci_parse(
            $conn,
            "SELECT * FROM administrator WHERE username='$_GET[username]'"
        );
        $result_photo_profile = oci_parse(
            $conn,
            "SELECT * FROM photo_profile WHERE username='$_GET[username]' AND active=1"
        );
        oci_execute($result_administrator_confirmed);
        oci_execute($result_photo_profile);
        $data_administrator = oci_fetch_array($result_administrator_confirmed);
        $data_photo_profile = oci_fetch_array($result_photo_profile);
    } else {
        echo '<script>
            swal({
              title: "Username tidak ada",
              text: "Tidak ada pengguna dengan username tersebut!",
              type: "warning",
              confirmButtonText: "Ulangi",
              closeOnConfirm: false,
            },
            function(isConfirm){
              if (isConfirm) {
                window.location="login.php";
              }
            });
        </script>';
    }
?>
<!-- Profile Image -->
<div class="box box-primary">
    <div class="box-body box-profile">
        <img id="profile-image" class="profile-user-img img-responsive img-square" src="../<?php echo $data_photo_profile['PATH']; ?>" alt="User profile picture">

        <h3 class="profile-username text-center"><?php echo $data_administrator['NAME']; ?></h3>

        <p class="text-muted text-center"><?php echo $data_administrator['AUTH_LEVEL']; ?></p>
        <form action="../processors/login.php" method="post">
        <ul class="list-group list-group-unbordered ">
            <div class="form-group has-feedback">
                <input type="hidden" name="username" value="<?php echo $_GET['username']; ?>">
                <input name="password" class="form-control" placeholder="Password" type="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
        </ul>

        <button class="btn btn-primary btn-block"><b>Login</b></button>
        </form>
    </div>
    <!-- /.box-body -->
</div>
<script>
    $(document).ready(function () {
        $('input[name="password"]').focus();
        $('#form-login').addClass('animated fadeInLeft');
    });
</script>