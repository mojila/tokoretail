<?php
session_start();
require_once '../../config/db.php';

$result_voucher = oci_parse(
    $conn,
    "SELECT * FROM voucher"
);

oci_execute($result_voucher);
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Daftar Barang
        <small>Semua Barang Di <To></To>ko Retail</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Tabel Daftar Barang</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nilai</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while($data_voucher = oci_fetch_array($result_voucher)){
                            echo '
                                    <tr>
                                        <td>'.$data_voucher['KODE'].'</td>
                                        <td>'.$data_voucher['NILAI'].'</td>
                                        <td>'.($data_voucher['STATUS'] == 0 ? '<label>Belum Terpakai</label>':'<label>Sudah Terpakai</label>').'</td>
                                        <td><button class="btn btn-danger" onclick="$.dropVoucher('.$data_voucher['ID'].')">Hapus</button></td>
                                    </tr>
                                ';
                        }
                        ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Status</th>
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
</script>