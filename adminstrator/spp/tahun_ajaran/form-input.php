<?php
 
    $carikode = mysqli_query($mysqli, "select max(kode_tahun_ajaran) from tb_tahun_ajaran") or die (mysql_error());
      // menjadikannya array
      $datakode = mysqli_fetch_array($carikode);
      // jika $datakode
      if ($datakode) {
       $nilaikode = substr($datakode[0], 1);
       // menjadikan $nilaikode ( int )
       $kode = (int) $nilaikode;
       // setiap $kode di tambah 1
       $kode = $kode + 1;
       $kode_otomatis = "T".str_pad($kode, 4, "0", STR_PAD_LEFT);
      } else {
       $kode_otomatis = "T0001";
      }
    date_default_timezone_set('Asia/Jakarta');
    $tanggal_sekarang = date("d-m-Y");
  ?>
 <section class="content">
        <div class="container-fluid">           
            <!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Input Data Tagihan
                            </h2>
                             <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="?page=spp_aktif" class="dropdown-toggle"  role="button" aria-haspopup="true" aria-expanded="false">
                                    <button type="button" class="btn btn-warning waves-effect">Kembali</button>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="form-horizontal">
                                 <form method="post" role="form" action="" >
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Kode</label>

                                    </div>
                                    <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="kode" name="kode" class="form-control" value="<?php echo $kode_otomatis ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Tahun Ajaran</label>
                                    </div>
                                    <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <select class="form-control show-tick "  name="tahun_ajaran" required>
                                                <option value="">Pilih Tahun</option>
                                                <?php
                                                $thn_skr = date('Y');
                                                for ($x = $thn_skr; $x >= 2010; $x--) {
                                                ?>
                                                    <option value="<?php echo $x ?>"><?php echo $x ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Semester</label>
                                    </div>
                                    <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <input type="radio" name="semester" value="ganjil" id="ganjil" class="with-gap">
                                            <label for="ganjil">Ganjil</label>

                                            <input type="radio" name="semester" value="genap" id="genap" class="with-gap">
                                            <label for="genap" class="m-l-20">Genap</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <!-- <button type="button" class="btn btn-success m-t-15 waves-effect">SIMPAN</button> -->
                                        <input type="submit" id="simpan" name="simpan" value="Simpan" class="btn btn-success" style="margin-top: 10px;">
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- #END# Horizontal Layout -->
<?php
    $kode = @$_POST ['kode'];
    $tahun_ajaran = @$_POST ['tahun_ajaran'];
    $semester = @$_POST ['semester'];
    
    $simpan = @$_POST ['simpan'];
    if ($simpan) {

         $sql = $mysqli -> query (" INSERT INTO `tb_tahun_ajaran`(`kode_tahun_ajaran`, `tahun_ajaran`, `semester`) VALUES('$kode','$tahun_ajaran','$semester') ");

        if ($sql){
            ?>

                <script type="text/javascript">
                    alert ("Data Berhasil Disimpan")
                    window.location.href="?page=spp_aktif";
                </script>

                <?php
        }else{
            echo "eroor";
        }
    }
?>