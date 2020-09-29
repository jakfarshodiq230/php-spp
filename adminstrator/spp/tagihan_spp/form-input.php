<?php
 
    $carikode = mysqli_query($mysqli, "select max(kode_tagihan) from tb_tagihan_spp") or die (mysql_error());
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

    $carikode2 = mysqli_query($mysqli, "select max(kode_spp) from tb_spp") or die (mysql_error());
      // menjadikannya array
      $datakode2 = mysqli_fetch_array($carikode2);
      // jika $datakode
      if ($datakode2) {
       $nilaikode2 = substr($datakode2[0], 1);
       // menjadikan $nilaikode ( int )
       $kode2 = (int) $nilaikode2;
       // setiap $kode di tambah 1
       $kode2 = $kode2 + 1;
       $kode_otomatis2 = "T".str_pad($kode2, 4, "0", STR_PAD_LEFT);
      } else {
       $kode_otomatis2 = "T0001";
    }
    $jsArray = "var kode = new Array();\n";
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
                                            <select class="form-control show-tick " name="tahun_ajaran" required>
                                                <option value="">Pilih</option>
                                                <?php
                                                    $query = mysqli_query($mysqli, "SELECT * FROM tb_tahun_ajaran  GROUP BY semester ");
                                                    while ($row = mysqli_fetch_array($query)) { ?>

                                                    <option value="<?php echo $row['kode_tahun_ajaran'] ?>">
                                                        <?php echo $row['tahun_ajaran']," - ", ucwords($row['semester']) ?>
                                                    </option>

                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Jenis SPP</label>
                                    </div>
                                    <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <select class="form-control show-tick " name="jenis_spp" onchange="changeValue3(this.value)" class="form-control show-tick " required>
                                                <option value="">Pilih</option>
                                                <?php
                                                    $query = mysqli_query($mysqli, "SELECT * FROM tb_jenis_spp  ORDER BY keterangan_spp ASC ");
                                                    while ($row = mysqli_fetch_array($query)) { ?>

                                                    <option value="<?php echo $row['kode_jenis_spp'] ?>">
                                                        <?php echo ucwords($row['keterangan_spp']) ?>
                                                    </option>

                                                <?php 
                                                        $jsArray .= "kode['" . $row['kode_jenis_spp'] . "'] = {harga_spp:'" . addslashes($row['harga']) . "'};\n";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Beayay</label>

                                    </div>
                                    <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="biaya" name="biaya" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="ccol-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Status</label>
                                    </div>
                                    <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <input type="radio" name="status" value="aktif" id="aktif" class="with-gap">
                                            <label for="aktif">Aktif</label>

                                            <input type="radio" name="status" value="tidak aktif" id="tidak" class="with-gap">
                                            <label for="tidak" class="m-l-20">Tidak Aktif</label>
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
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
<?php echo $jsArray ?>
function changeValue3(kode_spp) {
      document.getElementById("biaya").value = kode[kode_spp].harga_spp;
    };
</script>
<?php
    $kode = @$_POST ['kode'];
    $tahun_ajaran = @$_POST ['tahun_ajaran'];
    $jenis_spp = @$_POST ['jenis_spp'];
    $biaya = @$_POST ['biaya'];
    $status = @$_POST ['status'];

    date_default_timezone_set('Asia/Jakarta');
    $tanggal_sekarang = date(" y-m-d  h:i:s ");
    $simpan = @$_POST ['simpan'];
    $query2 = $mysqli -> query(" SELECT nim FROM tb_mahasiswa");
    if ($simpan) {
        while ($data2 = $query2 -> fetch_assoc()) {
            $copy= $data2['nim'];
            $sql = $mysqli -> query (" INSERT INTO `tb_tagihan_spp`(`kode_tagihan`, `nim`, `kode_spp`,`status`,`tanggal`) 
                VALUES ('$kode','$copy','$kode_otomatis2','$status','$tanggal_sekarang') ");
        }
        $sql2 = $mysqli -> query (" INSERT INTO `tb_spp`(`kode_spp`,`kode_jenis_spp`, `kode_tahun_ajaran`, `status`, `tanggal`) 
            VALUES ('$kode_otomatis2','$jenis_spp','$tahun_ajaran','$status','$tanggal_sekarang') ");
        if ($sql2){
            ?>

                <script type="text/javascript">
                    alert ("Data Berhasil Disimpan")
                    window.location.href="?page=spp";
                </script>

                <?php
        }else{
            echo "eroor";
        }
    }
?>