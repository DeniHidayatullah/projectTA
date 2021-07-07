<?php
if(!isset($authPage)) {
  $authPage = FALSE;
}
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Anjaya Mebel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?=base_url();?>assets/sufee/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/sufee/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/sufee/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/daterangepicker/css/datepicker.min.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/daterangepicker/css/datepicker-bs4.min.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/pace-style.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/dropify/css/dropify.min.css">
    
    <link href="<?php echo base_url('asset/tabel/dataTables.bootstrap4.min.css');?>" rel="stylesheet">

    <link rel="stylesheet" href="<?=base_url();?>assets/sufee/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>
 <!-- Page level plugins -->
 
  <script src="<?=base_url();?>assets/jquery.js"></script>
  <script src="<?=base_url();?>assets/sufee/vendors/popper.js/dist/umd/popper.min.js"></script>
  <script src="<?=base_url();?>assets/sufee/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- <script src="<?=base_url();?>assets/sufee/vendors/datatables.net/js/jquery.dataTables.min.js"></script> -->
  <!-- <script src="<?=base_url();?>assets/sufee/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script> -->
  <script src="<?=base_url();?>assets/sweetalert2/sweetalert2.all.min.js"></script>
  <script src="<?=base_url();?>assets/daterangepicker/js/datepicker-full.min.js"></script>
  <script src="<?=base_url();?>assets/sufee/vendors/chart.js/dist/Chart.min.js"></script>

  <!-- <script src="<?=base_url();?>assets/sufee/vendors/chart.js/dist/Chart.min.js"></script> -->
  <script src="<?=base_url();?>assets/dropify/js/dropify.min.js"></script>
  <script src="<?php echo base_url('assets/tabel/jquery.dataTables.min.js');?>"></script>
  <script src="<?php echo base_url('assets/tabel/dataTables.bootstrap4.min.js');?>"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url('assets/tabel/datatables-demo.js');?>"></script>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel bg-primary">
        <nav class="navbar navbar-expand-sm bg-primary">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="<?=base_url();?>">ANJAYA MEBEL</a>
                <a class="navbar-brand hidden" href="<?=base_url();?>">B</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav" >
                    <li>
                        <a href="<?=base_url("home");?>"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                  <h3 class="menu-title">Data Master</h3>
                    <li>
                        <a href="<?=base_url("barang");?>"> <i class="menu-icon fa fa-cogs"></i>Data Barang </a>
                    </li>
                  <h3 class="menu-title">Transaksi</h3>
                    <li>
                        <a href="<?=base_url("penjualan");?>"> <i class="menu-icon fa fa-list"></i>Transaksi Penjualan</a>
                    </li>
                    <li>
                        <a href="<?=base_url("pembelian");?>"> <i class="menu-icon fa fa-plus-square"></i>Transaksi Pembelian</a>
                    </li>
                    <h3 class="menu-title">Laporan</h3>
                    <li>
                        <a href="<?=base_url("penjualan/laporanpenjualan");?>"> <i class="menu-icon fa fa-bar-chart-o"></i>Laporan Penjualan</a>
                    </li>
                    <li>
                        <a href="<?=base_url("pembelian/laporanpembelian");?>"> <i class="menu-icon fa fa-bar-chart-o"></i>Laporan Pembelian</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <div class="header-left">
                        <div style="height:41px"></div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="<?=base_url("assets/avatar-1.png");?>" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">

                            <a class="nav-link" href="<?=base_url("setting/change_password");?>"><i class="fa fa-key"></i> Ganti Password</a>

                            <a class="nav-link" href="<?=base_url("setting/shop_info");?>"><i class="fa fa-cog"></i> Pengaturan</a>

                            <a class="nav-link" href="<?=base_url("auth/logout");?>"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>
                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

