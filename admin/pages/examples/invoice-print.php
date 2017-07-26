<?php
    require_once '../../config/db.php';

    $id = $_GET['id'];
    $req = oci_parse(
        $conn,
    "SELECT * FROM transaksi WHERE id='$id'"
    );

    oci_execute($req);
    $data_transaksi = oci_fetch_array($req);
    $member_email = $data_transaksi['EMAIL'];
    $req_member = oci_parse(
        $conn,
        "SELECT * FROM member WHERE email='$member_email'"
    );
    oci_execute($req_member);
    $data_member = oci_fetch_array($req_member);

    $barang_id = $data_transaksi['KETERANGAN'];
    $req_barang = oci_parse(
        $conn,
        "SELECT * FROM barang WHERE id='$barang_id'"
    );
    oci_execute($req_barang);
    $data_barang = oci_fetch_array($req_barang);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Toko Retail | Pembayaran</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> Toko Retail
          <small class="pull-right" id="tanggal">Date: <?php echo $data_transaksi['TANGGAL']; ?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        Dari
        <address>
          <strong>Toko Retail</strong><br>
          Jl. Ahmad Yani No. 14<br>
          Surabaya, Jawa Timur 61262<br>
          Phone: (804) 123-5432<br>
          Email: info@tokoretail.com
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        To
        <address>
          <strong><span id="nama-member"><?php echo $data_member['NAMA']; ?></span></strong><br>
          Email: <span id="email-member"><?php echo $data_member['EMAIL']; ?></span>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Pembayaran #<span id="id-transaksi"><?php echo $data_transaksi['ID']; ?></span></b><br>
        <br>
        <b>Order ID:</b> <span id="id-transaksi"><?php echo $data_transaksi['ID']; ?></span><br>
        <b>Tanggal Pembayaran: </b id="tanggal-transaksi"><?php echo $data_transaksi['TANGGAL']; ?><br>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>Qty</th>
            <th>Nama Barang</th>
            <th>Serial Barang</th>
            <th>Di Beli Oleh</th>
            <th>Subtotal</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td>1</td>
            <td><span id="nama-barang"><?php echo $data_barang['NAMA']; ?></span></td>
            <td><span id="id-barang"><?php echo $data_barang['ID']; ?></span></td>
            <td><span id="pembeli-barang"><?php echo $data_member['NAMA']; ?></span></td>
            <td><span id="harga-barang">Rp. <?php echo number_format($data_barang['HARGA']); ?></span></td>
          </tr>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <!-- /.col -->
      <div class="col-xs-6">
        <p class="lead" id="tanggal-pembayaran">Dibayar Pada <?php echo $data_transaksi['TANGGAL']; ?></p>

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th>Total:</th>
              <td><span id="harga">Rp. <?php echo number_format($data_barang['HARGA']); ?></span></td>
            </tr>
              <tr>
                  <td><button onclick="window.print();">Print</button></td>
              </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<script src="../../dist/js/jquery.min.js"></script>
<script>
  $(document).ready(function () {
    
  });
</script>
</body>
</html>
