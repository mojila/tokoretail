<div class="wrap">
    <div class="header">
        <div class="header_top">
            <div class="menu">
                <a class="toggleMenu" href="#" onclick="$.goindex()"><img src="images/arrow-left.png" alt="" /></a>
                <script type="text/javascript" src="js/responsive-nav.js"></script>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<div class="main">
        <div class="wrap">
            <div class="column_left">
                <div class="menu_box">
                    <h3 id="nama-barang">Register Form</h3>
                    <div class="menu_box_list">
                        <ul>
                            <li><img id="photo-barang" src="" style="width: 100%;"></li>
                            <li><a class="ion ion-card"><span id="harga-barang">Rp. </span><div class="clear"></div></a></li>
                        </ul>
                    </div>
                </div>
                <div class="social_networks">
                    <ul>
                        <li><a id="beli-barang" class="buy"><span style="width: 86%; text-align:center;"><i class="ion color-white"></i> BELI</span><div class="clear"></div></a></li>
                    </ul>
                </div>
            </div>
            <div class="clear"></div>
        </div>
</div>
<script>
    $(document).ready(function () {
       $('#nama-barang').html(barang.nama);
       $('#photo-barang').attr('src', 'images/'+barang.photo);
       $('#harga-barang').append(barang.harga);
       $('#beli-barang').attr('href', 'processors/buy.php?id='+barang.id);
    });
</script>