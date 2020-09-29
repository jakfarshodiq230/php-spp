<?php
 
    $carikode = mysqli_query($mysqli, "select max(kode_jenis_spp) from tb_jenis_spp") or die (mysql_error());
      // menjadikannya array
      $datakode = mysqli_fetch_array($carikode);
      // jika $datakode
      if ($datakode) {
       $nilaikode = substr($datakode[0], 1);
       // menjadikan $nilaikode ( int )
       $kode = (int) $nilaikode;
       // setiap $kode di tambah 1
       $kode = $kode + 1;
       $kode_otomatis = "S".str_pad($kode, 4, "0", STR_PAD_LEFT);
      } else {
       $kode_otomatis = "S0001";
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
                                        <label for="password_2">Kode SPP</label>

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
                                        <label>Jenis SPP</label>
                                    </div>
                                    <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="jenis_spp" name="jenis_spp" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Harga SPP</label>
                                    </div>
                                    <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="harga_spp" name="harga_spp" class="form-control" onkeypress="return validKey(event || window.event, '0123456789');" required>
                                            </div>
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
<script type="text/javascript">
  function validKey(e, whitelist) {
    var char = String.fromCharCode(e.which).toLowerCase();
    whitelist = whitelist.toLowerCase();
    if (whitelist.indexOf(char) !== -1)
        return true;
    return false;
}

</script>
<?php
    $kode = @$_POST ['kode'];
    $jenis_spp = @$_POST ['jenis_spp'];
    $harga_spp = @$_POST ['harga_spp'];
    
    $simpan = @$_POST ['simpan'];
    if ($simpan) {

         $sql = $mysqli -> query (" INSERT INTO `tb_jenis_spp`(`kode_jenis_spp`, `keterangan_spp`, `harga`) VALUES ('$kode','$jenis_spp','$harga_spp') ");

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