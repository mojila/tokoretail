<?php
/**
 * Created by PhpStorm.
 * User: Aji
 * Date: 16/07/2017
 * Time: 6:30
 */
?>
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img id="sidebar-photo-profile" class="user-image" alt="User Image">
            </div>
            <div class="pull-left info">
                <p id="sidebar-administrator-name"></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="#" id="dashboard">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-archive"></i> <span>Barang</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#" id="tambah-barang"><i class="fa fa-circle-o"></i> Barang Masuk</a></li>
                    <li><a href="#" id="daftar-barang"><i class="fa fa-circle-o"></i> Daftar Barang</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-credit-card"></i> <span>Voucher</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#" id="tambah-voucher"><i class="fa fa-circle-o"></i> Rilis Voucher</a></li>
                    <li><a href="#" id="daftar-voucher"><i class="fa fa-circle-o"></i> Daftar Voucher</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#" id="daftar-member">
                    <i class="fa fa-users"></i> <span>Member</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
