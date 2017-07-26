<?php
    session_start();
?>
<div class="menu_box">
    <h3>Masukkan Kode Voucher</h3>
    <form action="processors/voucher.php" method="post">
    <input type="hidden" name="email" value="<?php echo $_SESSION['member']; ?>">
    <div class="menu_box_list">
        <ul>
            <li><input class="form-control" type="text" name="kode" placeholder="Contoh: 1234-5678-1212-2442" required></li>
        </ul>
    </div>
    <div class="social_networks">
        <ul>
            <li><button style="height: 64px; border-radius: 4px; width: 100%; border: none;" class="info"><a class="info"><span style="width: 86%; text-align:center;"><i class="ion ion-form color-white"></i> &nbsp; Gunakan</span><div class="clear"></div></a></button></li>
        </ul>
    </div>
    </form>
</div>