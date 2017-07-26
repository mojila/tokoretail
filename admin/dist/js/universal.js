/**
 * Created by Aji on 16/07/2017.
 */
$(document).ready(function () {
    $('#main-content').load('../section/tips.php');
    $('#sidebar-photo-profile').attr('src', '../../'+administrator.photo_profile);
    $('#sidebar-administrator-name').html(administrator.name);
    $('.job').html(administrator.auth_level);
    $('#daftar-barang').click(function () {
        $('#main-content').load('../section/listbarang.php');
    });
    $('#daftar-voucher').click(function () {
        $('#main-content').load('../section/listvoucher.php');
    });
    $('#daftar-member').click(function () {
        $('#main-content').load('../section/listmember.php');
    });
    $('#tambah-barang').click(function () {
        $('#main-content').load('../section/addbarang.php');
    });
    $('#tambah-voucher').click(function () {
        $('#main-content').load('../section/addvoucher.php');
    });
    $('#dashboard').click(function () {
        $('#main-content').load('../section/tips.php');
    });
    $.dropBarang = function (id) {
        swal({
            title: "Yakin Mengahapus data tersebut?",
            text: "Data akan dihapus",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Baik",
            closeOnConfirm: false,
        },
        function(isConfirm){
            if (isConfirm) {
                window.location="../../processors/dropbarang.php?id="+id;
            }
        });
    };
    $.editBarang = function (id) {
        $('#main-content').load('../section/editbarang.php?id='+id);
    }
});
