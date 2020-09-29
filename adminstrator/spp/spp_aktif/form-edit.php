<?php
    $kode_jenis_spp = @$_GET ['kode_jenis_spp'];

    $sql = $mysqli -> query("SELECT * FROM tb_jenis_spp WHERE kode_jenis_spp = '$kode_jenis_spp'");
    $tampil = $sql -> fetch_assoc();
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
                                                <input type="text" id="kode" name="kode" class="form-control" value="<?php echo $tampil['kode_jensi_spp'] ?>" readonly>
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
                                                <input type="text" id="jenis_spp" name="jenis_spp" class="form-control" value="<?php echo $tampil['keterangan_spp'] ?>" required>
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
                                                <input type="text" id="harga_spp" name="harga_spp" class="form-control" onkeypress="return validKey(event || window.event, '0123456789');" value="<?php echo $tampil['harga'] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <!-- <button type="button" class="btn btn-success m-t-15 waves-effect">SIMPAN</button> -->
                                        <input type="submit" id="simpan" name="simpan" value="Edit" class="btn btn-success" style="margin-top: 10px;">
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
    $jenis_spp = @$_POST ['jenis_spp'];
    $harga_spp = @$_POST ['harga_spp'];
    
    $simpan = @$_POST ['simpan'];
    if ($simpan) {

         $sql = $mysqli -> query (" UPDATE `tb_jenis_spp` SET `keterangan_spp`='$jenis_spp',`harga`='$harga_spp' WHERE `kode_jenis_spp`='$kode_jenis_spp' ");

        if ($sql){
            ?>

                <script type="text/javascript">
                    alert ("Data Berhasil Edit")
                    window.location.href="?page=spp_aktif";
                </script>

                <?php
        }else{
            echo "eroor";
        }
    }
?>