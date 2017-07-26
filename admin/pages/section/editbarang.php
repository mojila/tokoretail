<?php
session_start();
require_once '../../config/db.php';

$id = $_GET['id'];
$res = oci_parse(
    $conn,
    "SELECT * FROM barang WHERE id='$id'"
);

oci_execute($res);
$data = oci_fetch_array($res);
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Barang Masuk
        <small>Barang Masuk Di Toko Retail</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form role="form" action="../../processors/editbarang.php" method="post" enctype="multipart/form-data">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body pad">
                        <div class="full-width">
                            <div class="box">
                                <div class="box-body pad">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="photo">Photo</label>
                                                <input name="photo" type="file" class="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div id="photo-preview" class="box" style="text-align: center; padding: 1em; background: url('../../../images/<?php echo $data['PHOTO']; ?>') center center no-repeat; width: 100%; height: 320px; background-size: cover;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input name="nama" type="text" placeholder="Nama Barang" class="form-control" value="<?php echo $data['NAMA']; ?>">
                            <input name="id" type="hidden" value="<?php echo $data['ID']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input name="harga" type="number" placeholder="Ex: 10000" class="form-control" value="<?php echo $data['HARGA']; ?>">
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
<script>
    var reader = new FileReader();
    $('input[name="photo"]').change(function (){
        reader.onload = function(e){
            $('#photo-preview').attr('style', 'background: url("'+e.target.result+'") center center no-repeat; width: 100%; height: 320px; background-size: cover;');
        };

        reader.readAsDataURL(this.files[0]);
    });
</script>