<?php
    $kode_spp = @$_GET ['kode_spp'];

    $sql = $mysqli -> query("SELECT * FROM tb_jenis_spp,tb_spp,tb_tahun_ajaran WHERE tb_spp.kode_jenis_spp=tb_jenis_spp.kode_jenis_spp AND tb_spp.kode_tahun_ajaran=tb_tahun_ajaran.kode_tahun_ajaran AND  tb_spp.kode_spp = '$kode_spp'");
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
                                                <input type="text" id="kode" name="kode" class="form-control" value="<?php echo $tampil['kode_spp'] ?>" readonly>
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
                                                     $sql = $mysqli -> query ("SELECT * FROM tb_tahun_ajaran ORDER BY  semester ASC");

                                                     while ($data = $sql->fetch_assoc()){

                                                        
                                                        if($tampil['tahun_ajaran']==$data['tahun_ajaran'] AND $tampil['semester']==$data['semester']){
                                                ?>
                                                <option value="<?php echo $data['kode_tahun_ajaran'] ?>" selected>
                                                        <?php echo $data['tahun_ajaran']," - ", ucwords($data['semester']) ?>
                                                </option>

                                                <?php
                                                        }else{
                                                           echo "<option value='$data[kode_tahun_ajaran]' >$data[tahun_ajaran]</option>";
                                                        } 
                                                    }
                                                ?>
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
                                            <select class="form-control show-tick "  name="jenis_spp" onchange="changeValue3(this.value)" required>
                                                <option value="">Pilih</option>
                                                <?php
                                                    $query = mysqli_query($mysqli, "SELECT * FROM tb_jenis_spp  ORDER BY keterangan_spp ASC ");
                                                    while ($row = mysqli_fetch_array($query)) { 
                                                        if($tampil['keterangan_spp']==$row['keterangan_spp']){
                                                ?>

                                                    <option value="<?php echo $row['kode_jenis_spp'] ?>" selected>
                                                        <?php echo ucwords($row['keterangan_spp']) ?>
                                                    </option>

                                                <?php 
                                                        $jsArray .= "kode['" . $row['kode_jenis_spp'] . "'] = {harga_spp:'" . addslashes($row['harga']) . "'};\n";
                                                    }else{
                                                ?>
                                                    <option value="<?php echo $row['kode_jenis_spp'] ?>">
                                                        <?php echo ucwords($row['keterangan_spp']) ?>
                                                    </option>
                                                <?php
                                                    $jsArray .= "kode['" . $row['kode_jenis_spp'] . "'] = {harga_spp:'" . addslashes($row['harga']) . "'};\n";
                                                    }
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
                                                <input type="text" id="biaya" name="biaya" class="form-control" value="<?php echo $tampil['harga']?>" readonly>
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
                                            <?php
                                                if($tampil['status']=="aktif"){
                                            ?>
                                            <input type="radio" name="status" value="aktif" id="aktif" class="with-gap" checked>
                                            <label for="aktif">Aktif</label>

                                            <input type="radio" name="status" value="tidak aktif" id="tidak" class="with-gap">
                                            <label for="tidak" class="m-l-20">Tidak Aktif</label>
                                            <?php 
                                                }else{
                                            ?>

                                            <input type="radio" name="status" value="aktif" id="aktif" class="with-gap" >
                                            <label for="aktif">Aktif</label>

                                            <input type="radio" name="status" value="tidak aktif" id="tidak" class="with-gap" checked>
                                            <label for="tidak" class="m-l-20">Tidak Aktif</label>
                                            <?php
                                                }
                                            ?>
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
    $tahun_ajaran = @$_POST ['tahun_ajaran'];
    $jenis_spp = @$_POST ['jenis_spp'];
    $status = @$_POST ['status'];
    
    $simpan = @$_POST ['simpan'];
    if ($simpan) {

         $sql = $mysqli -> query (" UPDATE `tb_spp` SET `kode_jenis_spp`='$jenis_spp',`kode_tahun_ajaran`='$tahun_ajaran',`status`='$status' WHERE `kode_spp`='$kode_spp' ");

        if ($sql){
            ?>

                <script type="text/javascript">
                    alert ("Data Berhasil Edit")
                    window.location.href="?page=spp";
                </script>

                <?php
        }else{
            echo "eroor";
        }
    }
?>