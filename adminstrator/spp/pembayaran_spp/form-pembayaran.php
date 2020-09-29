<?php
    $kode_tagihan = @$_GET['kode_tagihan_spp'];


    $carikode = mysqli_query($mysqli, "select max(kode_pembayaran) from tb_pembayaran") or die (mysql_error());
      // menjadikannya array
      $datakode = mysqli_fetch_array($carikode);
      // jika $datakode
      if ($datakode) {
       $nilaikode = substr($datakode[0], 1);
       // menjadikan $nilaikode ( int )
       $kode = (int) $nilaikode;
       // setiap $kode di tambah 1
       $kode = $kode + 1;
       $kode_otomatis = "P".str_pad($kode, 4, "0", STR_PAD_LEFT);
      } else {
       $kode_otomatis = "P0001";
      }

      $sql = $mysqli -> query ("SELECT * FROM tb_tagihan_spp,tb_spp,tb_jenis_spp,tb_tahun_ajaran WHERE tb_tagihan_spp.kode_spp=tb_spp.kode_spp AND tb_spp.kode_jenis_spp=tb_jenis_spp.kode_jenis_spp AND tb_spp.kode_tahun_ajaran=tb_tahun_ajaran.kode_tahun_ajaran AND tb_tagihan_spp.kode_tagihan='$kode_tagihan' ");
      $tampil= $sql -> fetch_assoc();
  ?>
 <section class="content">
        <div class="container-fluid">           
            <!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Pembayaran SPP
                            </h2>
                             <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="?page=spp_pembayaran&nim=<?php echo $tampil['nim'] ?>" class="dropdown-toggle"  role="button" aria-haspopup="true" aria-expanded="false">
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
                                        <label>Jenis SPP</label>
                                    </div>
                                    <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="biaya" name="biaya" class="form-control" value="<?php echo $tampil['keterangan_spp'] ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Harga</label>
                                    </div>
                                    <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="biaya" name="biaya" class="form-control" value="<?php echo 'Rp. ',number_format($tampil['harga'],0,',','.')?>"readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Sudah Terbayar</label>

                                    </div>
                                    <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?php
                                                  $sql2 = $mysqli -> query ("SELECT SUM(jumlah_bayar) AS total FROM tb_spp,tb_jenis_spp,tb_tahun_ajaran,tb_tagihan_spp,tb_pembayaran WHERE tb_tagihan_spp.kode_spp=tb_spp.kode_spp AND tb_spp.kode_jenis_spp=tb_jenis_spp.kode_jenis_spp AND tb_spp.kode_tahun_ajaran=tb_tahun_ajaran.kode_tahun_ajaran AND tb_tagihan_spp.kode_tagihan=tb_pembayaran.kode_tagihan AND tb_tagihan_spp.kode_tagihan='$kode_tagihan' ");
                                                  $tampil2= $sql2 -> fetch_assoc();
                                                ?>
                                                <input type="text" id="biaya" name="biaya" class="form-control" value="<?php echo 'Rp. ',number_format($tampil2['total'],0,',','.')?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Sisa Tagihan</label>

                                    </div>
                                    <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?php $sisa = $tampil['harga']-$tampil2['total'] ?>
                                                <input type="text" id="biaya" name="biaya" class="form-control" value="<?php echo 'Rp. ',number_format($sisa,0,',','.')?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Bayar</label>

                                    </div>
                                    <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="bayar" name="bayar" class="form-control" required>
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

<?php
    $kode = @$_POST ['kode'];
    $biaya = @$_POST ['bayar'];
    $kode_tagihan= $tampil['kode_tagihan'];
    date_default_timezone_set('Asia/Jakarta');
    $tanggal_sekarang = date(" y-m-d  h:i:s ");

    $simpan = @$_POST ['simpan'];
    if($biaya == $tampil['harga']){
        $keterangan="LUNAS";
    }else{
        $keterangan="BELUM LUNAS";
    }

    $total2=0;
    $total2 = $tampil2['total'] + $biaya;

    if($tampil['harga']==$total2){
        $keterangan2="LUNAS";
    }else{
        $keterangan2="BELUM LUNAS";
    }
    if ($simpan) {

        $sql4 = $mysqli -> query (" INSERT INTO `tb_pembayaran`(`kode_pembayaran`, `kode_tagihan`, `jumlah_bayar`, `keterangan_pembayaran`, `tanggal`) VALUES ('$kode','$kode_tagihan','$biaya','$keterangan','$tanggal_sekarang') ");

        $update = $mysqli -> query(" UPDATE `tb_tagihan_spp` SET `total`='$total2',`keterangan`='$keterangan2',`tanggal_update`='$tanggal_sekarang' WHERE `kode_tagihan`='$kode_tagihan'");
        if ($update){
            ?>

                <script type="text/javascript">
                    alert ("Data Berhasil Disimpan")
                    window.location.href="?page=spp_pembayaran&nim=<?php echo $tampil['nim'] ?>";
                </script>

                <?php
        }else{
            echo "eroor";
        }
    }
?>