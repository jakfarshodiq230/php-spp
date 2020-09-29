<?php
include 'config/database.php';
session_start();
if(!isset($_SESSION['username'])){  
        //die("");//jika belum login jangan lanjut..
        header("location:index.php");
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>PEMBAYARAN SPP</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />
    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />
    <!-- Morris Chart Css-->
    <link href="plugins/morrisjs/morris.css" rel="stylesheet" />
      <!-- JQuery DataTable Css -->
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />

        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
        <!--WaitMe Css-->
    <link href="plugins/waitme/waitMe.css" rel="stylesheet" />


    
</head>

<body class="theme-deep-purple">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="">SISTEM INFORMASI PEMBAYARAN SPP </a>
            </div>
            <!-- membuat jam sekaraang -->
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="pull-right"><a href="" class="js-right-sidebar" data-close="true"><?php echo date('l, d F Y') ?></a></li>
                </ul>
            </div>
            <!-- akhir jam sekarang -->
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="images/user.png" width="48" height="48" alt="User" />
                </div>
                <?php  
                if($_SESSION['level']=='pimpinan' || $_SESSION['level']=='admin' || $_SESSION['level']=='bendahara' ){                             
                     $sql = $mysqli -> query ("select * from tb_user WHERE kode_user='".$_SESSION['username']."'");
                     $data = $sql -> fetch_assoc();
                ?>
                    <div class="info-container">
                        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $data['nama_user']?></div>
                        <div class="email"><?php echo $data['email']?></div>
                        <div class="btn-group user-helper-dropdown">
                            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                            <ul class="dropdown-menu pull-right">
                                <li><a onclick="return confirm('Anda Yakin Ingin Keluar ?')" href="logout.php"><i class="material-icons">input</i>Sign Out</a></li>
                            </ul>
                        </div>
                    </div>
                <?php
                }else{
                     $sql = $mysqli -> query ("select * from tb_mahasiswa WHERE nim ='".$_SESSION['username']."'");
                     $data = $sql -> fetch_assoc();
                ?>
                    <div class="info-container">
                        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $data['nama_mahasiswa']?></div>
                        <div class="email"><?php echo $data['email']?></div>
                        <div class="btn-group user-helper-dropdown">
                            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                            <ul class="dropdown-menu pull-right">
                                <li><a onclick="return confirm('Anda Yakin Ingin Merubah Password ?')" href="?page=siswa&aksi=password"><i class="material-icons">vpn_key</i>Password</a></li>
                                <li><a onclick="return confirm('Anda Yakin Ingin Keluar ?')" href="logout.php"><i class="material-icons">input</i>Sign Out</a></li>
                            </ul>
                        </div>
                    </div>
                <?php } ?>    
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header" align="center">MENU</li>
                    <li class="active">
                        <a href="?page=halaman1">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <?php
                        if ($_SESSION['level']=='admin'){
                    ?>
                    <li>
                        <a href="?page=data_master">
                            <i class="material-icons">assignment</i>
                            <span>Data Master</span>
                        </a>
                    </li>
                    <?php
                        }
                        if ($_SESSION['level']=='admin' || $_SESSION['level']=='bendahara'){
                    ?>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>Kelola SPP</span>
                        </a>
                        <ul class="ml-menu">
                            <?php
                                if ($_SESSION['level']=='admin'){
                            ?>
                            <li>
                                <a href="?page=spp_aktif">Aktifkan SPP</a>
                            </li>
                            <?php 
                                } 
                            ?>
                            <li>
                                <a href="?page=spp_data">Data SPP</a>
                            </li>
                            <li>
                                <a href="?page=spp_pembayaran">Pembayaran SPP</a>
                            </li>
                        </ul>
                    </li>
                    <?php
                        }
                        if ($_SESSION['level']=='admin' || $_SESSION['level']=='pimpinan' || $_SESSION['level']=='bendahara' ){
                    ?>
                    <li>
                        <a href="?page=laporan">
                            <i class="material-icons">create</i>
                            <span>Kelola Laporan</span>
                        </a>
                    </li>
                    <?php
                        }
                        if ($_SESSION['level']=='admin'){
                    ?>
                    <li>
                        <a href="?page=identitas">
                            <i class="material-icons">location_city</i>
                            <span>Identitas Universitas</span>
                        </a>
                    </li>
                    <li>
                        <a href="?page=users">
                            <i class="material-icons">person</i>
                            <span>Users</span>
                        </a>
                    </li>
                    <?php
                        }
                        if ($_SESSION['level']=='mahasiswa'){
                    ?>
                    <li>
                        <a href="?page=cetak">
                            <i class="material-icons">person</i>
                            <span>Cetak Kartu</span>
                        </a>
                    </li>
                    <li>
                        <a href="?page=keuangan">
                            <i class="material-icons">person</i>
                            <span>Keuangan</span>
                        </a>
                    </li>
                    <?php
                        }
                    ?>
                    <li class="header" align="center">LABELS</li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2020 <a href="javascript:void(0);">Pembayaran SPP - UMRI Pekanbaru</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

            <?php
                    
                    $page = @$_GET['page'];
                    $aksi = @$_GET['aksi'];
                    
                    if ($page == "halaman1") {
                        if ($aksi == "") {
                            include "adminstrator/dasbort/halaman_awal.php";
                            //include "adminstrator/grafik/halaman-grafik.php";
                        }
                    }

                    elseif ($page == "data_master") {
                        if ($aksi == "") {
                            include "adminstrator/data_master/view.php";
                        }
                    }

                    elseif ($page == "siswa") {
                        if ($aksi == "tambah") {
                            include "adminstrator/data_master/mahasiswa/form-input.php";
                        }elseif ($aksi == "edit") {
                             include "adminstrator/data_master/mahasiswa/form-edit.php";
                        }elseif ($aksi == "hapus") {
                             include "adminstrator/data_master/mahasiswa/hapus.php";
                        }elseif ($aksi == "kosongkan") {
                             include "adminstrator/data_master/mahasiswa/kosongkan.php";
                        }elseif ($aksi == "lihat") {
                             include "adminstrator/data_master/mahasiswa/view_data_mahasiswa.php";
                        }elseif ($aksi == "password") {
                             include "adminstrator/data_master/mahasiswa/password/form-password.php";
                        }
                    }

                    elseif ($page == "fakultas") {
                        if ($aksi == "tambah") {
                            include "adminstrator/data_master/fakultas/form-input.php";
                        }elseif ($aksi == "edit") {
                             include "adminstrator/data_master/fakultas/form-edit.php";
                        }elseif ($aksi == "hapus") {
                             include "adminstrator/data_master/fakultas/hapus.php";
                        }elseif ($aksi == "kosongkan") {
                             include "adminstrator/data_master/fakultas/kosongkan.php";
                        }
                    }

                    elseif ($page == "jurusan") {
                        if ($aksi == "tambah") {
                            include "adminstrator/data_master/jurusan/form-input.php";
                        }elseif ($aksi == "edit") {
                             include "adminstrator/data_master/jurusan/form-edit.php";
                        }elseif ($aksi == "hapus") {
                             include "adminstrator/data_master/jurusan/hapus.php";
                        }elseif ($aksi == "kosongkan") {
                             include "adminstrator/data_master/jurusan/kosongkan.php";
                        }
                    }

                    elseif ($page == "users") {
                        if ($aksi == "") {
                           include "adminstrator/pengguna/view.php";
                        }elseif ($aksi == "edit") {
                             include "adminstrator/pengguna/form-edit.php";
                        }elseif ($aksi == "hapus") {
                             include "adminstrator/pengguna/hapus.php";
                        }elseif ($aksi == "kosongkan") {
                             include "adminstrator/pengguna/kosongkan.php";
                        }elseif ($aksi == "tambah") {
                             include "adminstrator/pengguna/form-input.php";
                        }
                    }


                    elseif ($page == "spp_aktif") {
                        if ($aksi == "") {
                            include "adminstrator/spp/view.php";
                        }elseif ($aksi == "tambah") {
                            include "adminstrator/spp/spp_aktif/form-input.php";
                        }elseif ($aksi == "edit") {
                             include "adminstrator/spp/spp_aktif/form-edit.php";
                        }elseif ($aksi == "hapus") {
                             include "adminstrator/spp/spp_aktif/hapus.php";
                        }elseif ($aksi == "kosongkan") {
                             include "adminstrator/spp/spp_aktif/kosongkan.php";
                        }
                    }

                    elseif ($page == "tahun_ajaran") {
                        if ($aksi == "") {
                            include "adminstrator/spp/view.php";
                        }elseif ($aksi == "tambah") {
                            include "adminstrator/spp/tahun_ajaran/form-input.php";
                        }elseif ($aksi == "edit") {
                             include "adminstrator/spp/tahun_ajaran/form-edit.php";
                        }elseif ($aksi == "hapus") {
                             include "adminstrator/spp/tahun_ajaran/hapus.php";
                        }elseif ($aksi == "kosongkan") {
                             include "adminstrator/spp/tahun_ajaran/kosongkan.php";
                        }
                    }

                    elseif ($page == "spp") {
                        if ($aksi == "") {
                            include "adminstrator/spp/view.php";
                        }elseif ($aksi == "tambah") {
                            include "adminstrator/spp/tagihan_spp/form-input.php";
                        }elseif ($aksi == "edit") {
                             include "adminstrator/spp/tagihan_spp/form-edit.php";
                        }elseif ($aksi == "hapus") {
                             include "adminstrator/spp/tagihan_spp/hapus.php";
                        }elseif ($aksi == "kosongkan") {
                             include "adminstrator/spp/tagihan_spp/kosongkan.php";
                        }
                    }

                    elseif ($page == "spp_data") {
                        if ($aksi == "") {
                            include "adminstrator/spp/data_spp/view.php";
                        }elseif ($aksi == "tambah") {
                            include "adminstrator/spp/data_spp/form-input.php";
                        }elseif ($aksi == "edit") {
                             include "adminstrator/spp/data_spp/form-edit.php";
                        }elseif ($aksi == "hapus") {
                             include "adminstrator/spp/data_spp/hapus.php";
                        }elseif ($aksi == "kosongkan") {
                             include "adminstrator/spp/data_spp/kosongkan.php";
                        }
                    }


                    elseif ($page == "spp_pembayaran") {
                        if ($aksi == "") {
                           include "adminstrator/spp/pembayaran_spp/view.php";
                        }elseif ($aksi == "bayar") {
                           include "adminstrator/spp/pembayaran_spp/form-pembayaran.php";
                        }elseif ($aksi == "cetak") {
                           include "adminstrator/spp/pembayaran_spp/cetak.php";
                        }
                    }


                    elseif ($page == "laporan") {
                        if ($aksi == "") {
                           include "adminstrator/laporan/view.php";
                        }
                    }

                    elseif ($page == "cetak") {
                        if ($aksi == "") {
                           include "adminstrator/mahasiswa/cetak-kartu/view.php";
                        }
                    }

                    elseif ($page == "keuangan") {
                        if ($aksi == "") {
                           include "adminstrator/mahasiswa/keuangan/view.php";
                        }
                    }

                    elseif ($page == "identitas") {
                        if ($aksi == "") {
                           include "adminstrator/identitas/form-input.php";
                        }
                    }

                    elseif ($page == "") {
                    
                        include "adminstrator/dasbort/halaman_awal.php";
                        //include "adminstrator/grafik/halaman-grafik.php";
                    }
                include 'foter.php';
            ?>
</body>

</html>