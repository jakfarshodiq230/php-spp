<?php
    $kode_tahun_ajaran = @$_GET ['kode_tahun_ajaran'];

    $sql = $mysqli -> query("SELECT * FROM tb_tahun_ajaran WHERE kode_tahun_ajaran = '$kode_tahun_ajaran'");
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
                                        <label for="password_2">Kode</label>

                                    </div>
                                    <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="kode" name="kode" class="form-control" value="<?php echo $tampil['kode_tahun_ajaran'] ?>" readonly>
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
                                                        if($tampil['tahun_ajaran']==$thn_skr)
                                                            {  
                                                            
                                                ?>
                                                                <option value="<?php echo $x ?>" selected ><?php echo $tampil['tahun_ajaran'] ?></option>

                                                <?php
                                                    for ($x = $thn_skr; $x >= 2010; $x--)
                                                        {

                                                ?>
                                                         <option value="<?php echo $x ?>" ><?php echo $x ?></option> 
                                                <?php
                                                        }
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
                                            <?php
                                                if($tampil['semester']=="ganjil"){

                                            ?>
                                            <input type="radio" name="semester" value="ganjil" id="ganjil" class="with-gap" checked>
                                            <label for="ganjil">Ganjil</label>

                                            <input type="radio" name="semester" value="genap" id="genap" class="with-gap">
                                            <label for="genap" class="m-l-20">Genap</label>
                                            <?php
                                                }elseif($tampil['semester']=="genap"){
                                            ?>
                                            <input type="radio" name="semester" value="ganjil" id="ganjil" class="with-gap" >
                                            <label for="ganjil">Ganjil</label>

                                            <input type="radio" name="semester" value="genap" id="genap" class="with-gap" checked>
                                            <label for="genap" class="m-l-20">Genap</label>
                                            <?php } ?>
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
    $jenis_spp = @$_POST ['jenis_spp'];
    $harga_spp = @$_POST ['harga_spp'];
    
    $simpan = @$_POST ['simpan'];
    if ($simpan) {

         $sql = $mysqli -> query (" UPDATE `tb_spp` SET `keterangan_spp`='$jenis_spp',`jumlah_spp`='$harga_spp' WHERE `kode_spp`='$kode_spp' ");

        if ($sql){
            ?>

                <script type="text/javascript">
                    alert ("Data Berhasil Edit")
                    window.location.href="?page=tahun_ajaran";
                </script>

                <?php
        }else{
            echo "eroor";
        }
    }
?>