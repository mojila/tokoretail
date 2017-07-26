<?php
    session_start();
    require_once '../../config/db.php';

    $result_barang = oci_parse(
            $conn,
            "SELECT * FROM barang"
    );

    oci_execute($result_barang);
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Daftar Barang
        <small>Semua Barang Di Toko Retail</small>
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
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>QRcode</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            while($data_barang = oci_fetch_array($result_barang)){
                                echo '
                                    <tr>
                                        <td>'.$data_barang['NAMA'].' '.$data_barang['ID'].'</td>
                                        <td>'.$data_barang['HARGA'].'</td>
                                        <td>'.($data_barang['STATUS'] == 0 ? '<label>Belum Laku</label>':'<label>Sudah Laku</label>').'</td>
                                        <td><a href="../qrcode.php?id='.$data_barang['ID'].'"><button class="btn btn-default">QRCode</button></a></td>
                                        <td><button class="btn btn-info" onclick="$.editBarang('.$data_barang['ID'].')">Edit</button>  <button class="btn btn-danger" onclick="$.dropBarang('.$data_barang['ID'].')">Hapus</button></td>
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