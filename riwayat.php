<?php
session_start();

require_once 'admin/config/db.php';

$req_transaksi = oci_parse(
    $conn,
    "SELECT * FROM transaksi WHERE email='$_SESSION[member]'"
);

oci_execute($req_transaksi);
?>
<div class="menu_box">
    <h3>Riwayat Transaksi</h3>
        <input type="hidden" name="email" value="<?php echo $_SESSION['member']; ?>">
        <div class="menu_box_list">
            <ul>
                <?php
                    while ($data = oci_fetch_array($req_transaksi)){
                        if($data['TIPE'] == 0){
                            echo  '<li><a class="ion ion-calendar" style="color: #00FF00;"><span>'.$data['TANGGAL'].' &nbsp; +'.$data['BERTAMBAH'].'</span><div class="clear"></div></a></li>';
                        } else {
                            echo  '<li><a href="admin/pages/examples/invoice-print.php?id='.$data['ID'].'" class="ion ion-calendar" style="color: #FF0000;"><span>'.$data['TANGGAL'].' &nbsp; -'.$data['BERKURANG'].'</span><div class="clear"></div></a></li>';
                        }
                    }
                ?>
            </ul>
        </div>
        <div class="social_networks">
            <ul>
                <li><a href="index.php" class="info"><span style="width: 86%; text-align:center;"><i class="ion ion-form color-white"></i> &nbsp; Kembali</span><div class="clear"></div></a></li>
            </ul>
        </div>
</div>