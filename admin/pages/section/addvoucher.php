<?php
session_start();
require_once '../../config/db.php';

?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Rilis Voucher
        <small>Rilis Voucher Untuk Toko Retail</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form role="form" action="../../processors/addvoucher.php" method="post">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body pad">
                        <div class="form-group">
                            <label for="nilai">Nilai Voucher</label>
                            <select name="nilai" class="form-control">
                                <option>Pilih Nilai</option>
                                <option value="5000">Rp. <?php echo number_format(5000); ?></option>
                                <option value="10000">Rp. <?php echo number_format(10000); ?></option>
                                <option value="50000">Rp. <?php echo number_format(50000); ?></option>
                                <option value="100000">Rp. <?php echo number_format(100000); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="box-footer pad">
                        <button class="btn btn-success">Tambahkan</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.col-->
    </div>
    <!-- ./row -->
</section>
<!-- /.content -->