<?php

    $nim = @$_GET ['nim'];
    $sql = $mysqli -> query ("SELECT * FROM tb_mahasiswa, tb_jurusan,tb_fakultas WHERe tb_mahasiswa.kode_jurusan= tb_jurusan.kode_jurusan AND tb_mahasiswa.kode_fakultas=tb_fakultas.kode_fakultas AND tb_mahasiswa.nim ='$nim'");
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
                                Edit Data Mahasiswa
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
                            <form   method="post" role="form" action="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row clearfix">
                                                <div class="col-lg-3 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="password_2">NIM</label>
                                                </div>
                                                <div class="col-lg-6 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" id="nim" name="nim" class="form-control" value="<?php echo $tampil['nim'] ?>" onkeypress="return validKey(event || window.event, '0123456789');" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-3 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="password_2">NIRM</label>
                                                </div>
                                                <div class="col-lg-6 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" id="nirm" name="nirm" class="form-control" value="<?php echo $tampil['nirm'] ?>" onkeypress="return validKey(event || window.event, '0123456789');"required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-3 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="password_2">Nama</label>
                                                </div>
                                                <div class="col-lg-6 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" id="nama" name="nama" class="form-control" value="<?php echo $tampil['nama_mahasiswa'] ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-3 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="password_2">Jenis Kelamin</label>
                                                </div>
                                                <div class="col-lg-6 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <?php 
                                                            if($tampil['jenis_kelamin']=='Laki-Laki'){
                                                        ?>
                                                            <input type="radio" name="jenis_kelamin" value="Laki-Laki" id="male" class="with-gap"  checked>
                                                            <label for="male">Laki-Laki</label>
                                                            <input type="radio" name="jenis_kelamin" value="Perempuan" id="female" class="with-gap">
                                                            <label for="female" class="m-l-20">Perempuan</label>
                                                        <?php 
                                                        }else if ($tampil['jenis_kelamin']=='Perempuan') {
                                                        ?>
                                                            <input type="radio" name="jenis_kelamin" value="Laki-Laki" id="male" class="with-gap"  >
                                                            <label for="male">Laki-Laki</label>                  
                                                            <input type="radio" name="jenis_kelamin" value="Perempuan" id="female" class="with-gap"checked >
                                                            <label for="female" class="m-l-20">Perempuan</label>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-3 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="password_2">Tempat Lahir</label>
                                                </div>
                                                <div class="col-lg-6 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" value="<?php echo $tampil['tempat_lahir'] ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-3 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="password_2">Tanggal Lahir</label>
                                                </div>
                                                <div class="col-lg-6 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" value="<?php echo $tampil['tanggal_lahir'] ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  
                                        </div>

                                        <div class="col-md-6">
                                            <div class="row clearfix">
                                                <div class="col-lg-3 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="password_2">Fakultas</label>
                                                </div>
                                                <div class="col-lg-6 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <select id="fakultas" class="form-control show-tick "name="fakultas">
                                                                <option value="">Please Select</option>
                                                                <?php
                                                                    $query = mysqli_query($mysqli, "SELECT * FROM tb_fakultas ORDER BY nama_fakultas");
                                                                    while ($row = mysqli_fetch_array($query)) { 
                                                                        if($tampil['kode_fakultas']==$row['kode_fakultas']){
                                                                ?>

                                                                    <option value="<?php echo $row['kode_fakultas']; ?>" selected>
                                                                        <?php echo $row['nama_fakultas']; ?>
                                                                    </option>

                                                                <?php }else{ ?>
                                                                        <option value="<?php echo $row['kode_fakultas']; ?>" selected>
                                                                        <?php echo $row['nama_fakultas']; ?>
                                                                    </option>
                                                                <?php }} ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-3 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="password_2">Jurusan</label>
                                                </div>
                                                <div class="col-lg-6 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                             <select id="jurusan" class="form-control show-tick "name="jurusan">
                                                                <option value="">Please Select</option>
                                                                <?php
                                                                    $query = mysqli_query($mysqli, "SELECT * FROM tb_jurusan  ORDER BY nama_jurusan");
                                                                    while ($row = mysqli_fetch_array($query)) { 
                                                                        if($tampil['kode_jurusan']==$row['kode_jurusan']){
                                                                ?>

                                                                    <option value="<?php echo $row['kode_jurusan']; ?>" selected>
                                                                        <?php echo $row['nama_jurusan']; ?>
                                                                    </option>

                                                                <?php }else{ ?>
                                                                    <option value="<?php echo $row['kode_jurusan']; ?>" selected>
                                                                        <?php echo $row['nama_jurusan']; ?>
                                                                    </option>
                                                                <?php }} ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-3 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="password_2">Alamat</label>
                                                </div>
                                                <div class="col-lg-6 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <!-- <div class="form-line"> -->
                                                            <textarea name="alamat" rows="5" cols="28" required><?php echo $tampil['alamat'] ?></textarea>
                                                        <!-- </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-3 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="password_2">Email</label>
                                                </div>
                                                <div class="col-lg-6 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="email" name="email" class="form-control" value="<?php echo $tampil['email'] ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-3 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="password_2">No Hp</label>
                                                </div>
                                                <div class="col-lg-6 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" id="no_hp" name="no_hp" class="form-control" value="<?php echo $tampil['no_hp'] ?>" onkeypress="return validKey(event || window.event, '0123456789');" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
<!--                                              <div class="row clearfix">
                                                <div class="col-lg-3 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="password_2">Password</label>
                                                </div>
                                                <div class="col-lg-6 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="password" id="no_hp" name="no_hp" class="form-control" value="<?php //echo $tampil['password'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                               <input type="submit" name="simpan" value="Simpan" class="btn btn-success" style="margin-top: 10px;">
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Horizontal Layout -->
        </div>
    </section>
<?php
    $nirm = @$_POST ['nirm'];
    $nama = @$_POST ['nama'];
    $jenis_kelamin = @$_POST ['jenis_kelamin'];
    $tempat_lahir = @$_POST ['tempat_lahir'];
    $tanggal_lahir = @$_POST ['tanggal_lahir'];
    $fakultas = @$_POST ['fakultas'];
    $jurusan = @$_POST ['jurusan'];
    $alamat = @$_POST ['alamat'];
    $email = @$_POST ['email'];
    $no_hp = @$_POST ['no_hp'];

     $simpan = @$_POST ['simpan'];
    if ($simpan) {

        $sql = $mysqli -> query (" UPDATE `tb_mahasiswa` SET `nirm`='$nirm',`nama_mahasiswa`='$nama',`tempat_lahir`='$tempat_lahir',`tanggal_lahir`='$tanggal_lahir',`jenis_kelamin`='$jenis_kelamin',`kode_jurusan`='$jurusan',`kode_fakultas`='$fakultas',`alamat`='$alamat',`email`='$email',`no_hp`='$no_hp' WHERE `nim`='$nim' ");

        if ($sql){
            ?>

                <script type="text/javascript">
                    alert ("Data Berhasil Edit")
                    window.location.href="?page=data_master";
                </script>

                <?php
        }
    }

?>  

<script type="text/javascript">
  function validKey(e, whitelist) {
    var char = String.fromCharCode(e.which).toLowerCase();
    whitelist = whitelist.toLowerCase();
    if (whitelist.indexOf(char) !== -1)
        return true;
    return false;
}
</script>