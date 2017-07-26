<?php
    session_start();
    require_once '../../config/db.php';
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Daftar Catatan <span class="job"></span>
        <small>Buat Catatan</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <?php
    $select_tips_kasir_penting = oci_parse(
        $conn,
        "SELECT * FROM tips WHERE priority='penting' AND subject='kasir'"
    );
    $select_tips_kasir_biasa = oci_parse(
        $conn,
        "SELECT * FROM tips WHERE priority='biasa' AND subject='kasir'"
    );
    $select_tips_penting = oci_parse(
        $conn,
        "SELECT * FROM tips WHERE priority='penting' AND subject='$_SESSION[username]'"
    );
    $select_tips_biasa = oci_parse(
        $conn,
        "SELECT * FROM tips WHERE priority='biasa' AND subject='$_SESSION[username]'"
    );

    oci_execute($select_tips_kasir_penting);
    oci_execute($select_tips_kasir_biasa);
    oci_execute($select_tips_penting);
    oci_execute($select_tips_biasa);

    while($row_tips_kasir_penting = oci_fetch_array($select_tips_kasir_penting)){
        echo '
                    <div class="callout callout-danger">
                        <h4>Untuk <span class="job">Kasir</span></h4>
                        
                        <p>'.$row_tips_kasir_penting['TIP'].'</p>
                    </div>
                ';
    }

    while($row_tips_kasir_biasa = oci_fetch_array($select_tips_kasir_biasa)){
        echo '
                    <div class="callout callout-info">                        
                        <h4>Untuk <span class="job">Kasir</span></h4>
                        
                        <p>'.$row_tips_kasir_biasa['TIP'].'</p>
                    </div>
                ';
    }

    while($row_tips_penting = oci_fetch_array($select_tips_penting)){
        echo '
                    <div class="callout callout-danger">
                        <button onclick="window.location=\'../../processors/droptips.php?id='.$row_tips_penting['ID'].'\'" type="button" class="btn btn-box-tool pull-right" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times color-white"></i></button>
                        <h4>Untuk <span class="">Pribadi</span></h4>
                        
                        <p>'.$row_tips_penting['TIP'].'</p>
                  </div>
                ';
    }

    while($row_tips_biasa = oci_fetch_array($select_tips_biasa)){
        echo '
                        <div class="callout callout-info">
                            <button onclick="window.location=\'../../processors/droptips.php?id='.$row_tips_biasa['ID'].'\'" type="button" class="btn btn-box-tool pull-right" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times color-white"></i></button>
                            <h4>Untuk <span class="">Pribadi</span></h4>
                            
                            <p>'.$row_tips_biasa['TIP'].'</p>
                      </div>
                    ';
    }
    ?>
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Tambah Catatan</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <form role="form" action="../../processors/addtips.php" method="post">
            <div class="box-body">
                <div class="form-group">
                    <label for="priority">Prioritas</label>
                    <select name="priority" class="form-control">
                        <option value="">Pilih Prioritas</option>
                        <option value="penting">Penting</option>
                        <option value="biasa">Biasa</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="subject">Subyek</label>
                    <select name="subject" class="form-control">
                        <option value="">Pilih Subyek</option>
                        <option value="<?php echo $_SESSION['username']; ?>">Pribadi</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tip">Isi Catatan</label>
                    <textarea name="tip" class="form-control" id="isi-catatan"></textarea>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button class="btn btn-success pull-right">Simpan Catatan</button>
            </div>
        </form>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->