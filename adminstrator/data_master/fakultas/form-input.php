<?php
 
    $carikode = mysqli_query($mysqli, "select max(kode_fakultas) from tb_fakultas") or die (mysql_error());
      // menjadikannya array
      $datakode = mysqli_fetch_array($carikode);
      // jika $datakode
      if ($datakode) {
       $nilaikode = substr($datakode[0], 1);
       // menjadikan $nilaikode ( int )
       $kode = (int) $nilaikode;
       // setiap $kode di tambah 1
       $kode = $kode + 1;
       $kode_otomatis = "F".str_pad($kode, 4, "0", STR_PAD_LEFT);
      } else {
       $kode_otomatis = "F0001";
      }
  ?>
    <section class="content">
        <div class="container-fluid">           
            <!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Input Fakultas
                            </h2>
                             <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="?page=data_master" class="dropdown-toggle"  role="button" aria-haspopup="true" aria-expanded="false">
                                    <button type="button" class="btn btn-warning waves-effect">Kembali</button>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="form-horizontal">
                            <form method="post" role="form" action="">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Kode Fakultas</label>
                                    </div>
                                    <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="kode" name="kode" class="form-control"
                                                 value="<?php echo $kode_otomatis?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Nama Fakultas</label>
                                    </div>
                                    <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="nama" name="nama" class="form-control" placeholder="Inputkan Nama" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <!-- <button type="button" class="btn btn-success m-t-15 waves-effect">SIMPAN</button> -->
                                        <input type="submit" name="simpan" value="Simpan" class="btn btn-success" style="margin-top: 10px;">
                                    </div>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Horizontal Layout -->
        </div>
    </section>
<?php

    $kode = @$_POST ['kode'];
    $nama = @$_POST ['nama'];
    
    $simpan = @$_POST ['simpan'];
    if ($simpan) {

        $sql = $mysqli -> query (" INSERT INTO `tb_fakultas`(`kode_fakultas`, `nama_fakultas`) 
                                                    VALUES ('$kode','$nama') ");

        if ($sql){
            ?>

                <script type="text/javascript">
                    alert ("Data Berhasil disimpan")
                    window.location.href="?page=data_master";
                </script>

                <?php
        }
    }

?>  