<?php
session_start();
require_once '../../config/db.php';

$result_member = oci_parse(
    $conn,
    "SELECT * FROM member"
);

oci_execute($result_member);
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Daftar Member
        <small>Member Toko Retail</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Tabel Daftar Member</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Saldo</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while($data_member = oci_fetch_array($result_member)){
                            echo '
                                    <tr>
                                        <td>'.$data_member['ID'].'</td>
                                        <td>'.$data_member['NAMA'].'</td>
                                        <td>'.$data_member['EMAIL'].'</td>
                                        <td>Rp. '.number_format($data_member['SALDO']).'</td>
                                        <td><button class="btn '.($data_member['STATUS']==1?'btn-warning':'btn-success').'" onclick="$.blokir()">'.($data_member['STATUS']==1?'Blokir':'Batal Blokir').'</button></td>
                                    </tr>
                                ';
                        }
                        ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Saldo</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
<script>
    $(function () {
        $('#example1').DataTable({});
    })
    $.blokir = function(){
      alert('adaw');
    };
</script>