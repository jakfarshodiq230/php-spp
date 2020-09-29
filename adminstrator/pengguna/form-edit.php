<?php

    $kode_user = @$_GET ['kode_user'];
    $sql = $mysqli -> query ("SELECT * FROM tb_user WHERE kode_user ='$kode_user'");
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
                                Input Users
                            </h2>
                             <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="?page=users" class="dropdown-toggle"  role="button" aria-haspopup="true" aria-expanded="false">
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
                                        <label for="password_2">Nama </label>
                                    </div>
                                    <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="nama" name="nama" class="form-control" value="<?php echo $tampil['nama_user'] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Tempat Lahir </label>
                                    </div>
                                    <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" value="<?php echo $tampil['tempat_lahir'] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Tanggal Lahir </label>
                                    </div>
                                    <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" value="<?php echo $tampil['tanggal_lahir'] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Jenis Kelamin</label>
                                    </div>
                                    <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
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
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Username </label>
                                    </div>
                                    <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="username" name="username" class="form-control" value="<?php echo $tampil['username'] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Password </label>
                                    </div>
                                    <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" id="password" name="password" class="form-control" value="<?php echo $tampil['password']?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">No. HP</label>
                                    </div>
                                    <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="no_hp" name="no_hp" class="form-control" value="<?php echo $tampil['no_hp'] ?>"  onkeypress="return validKey(event || window.event, '0123456789');" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Email </label>
                                    </div>
                                    <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="email" name="email" class="form-control" value="<?php echo $tampil['email'] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Level</label>
                                    </div>
                                    <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select id="level" class="form-control show-tick " name="level"  required>
                                                <?php
                                                    if($tampil['level']=="admin"){
                                                ?>                                                                                                <option value="admin" selected>Admin</option>
                                                    <option value="pimpinan">Pimpinan</option>
                                                    <option value="bendahara">Bendahara</option>

                                                <?php
                                                    }else if($tampil['level']=="pimpinan"){
                                                ?>
                                                    <option value="admin">Admin</option>
                                                    <option value="pimpinan" selected>Pimpinan</option>
                                                    <option value="bendahara">Bendahara</option>
                                                <?php        
                                                    }else if($tampil['level']=="bendahara"){
                                                ?>
                                                    <option value="admin">Admin</option>
                                                    <option value="pimpinan">Pimpinan</option>
                                                    <option value="bendahara" selected>Bendahara</option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
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

    $nama = @$_POST ['nama'];
    $tempat_lahir = @$_POST ['tempat_lahir'];
    $tanggal_lahir = @$_POST ['tanggal_lahir'];
    $jenis_kelamin = @$_POST ['jenis_kelamin'];
    $username = @$_POST ['username'];
    $password = md5(@$_POST ['password']);
    $no_hp = @$_POST ['no_hp'];
    $email = @$_POST ['email'];
    $level = @$_POST ['level'];

    date_default_timezone_set('Asia/Jakarta');
    $tanggal_sekarang = date("d-m-Y");
    $simpan = @$_POST ['simpan'];
    if ($simpan) {

        $sql = $mysqli -> query (" UPDATE `tb_user` SET `nama_user`='$nama',`tempat_lahir`='$tempat_lahir',`tanggal_lahir`='$tanggal_lahir',`jenis_kelamin`='$jenis_kelamin',`no_hp`='$no_hp',`email`='$email',`username`='$username',`password`='$password',`level`='$level',`tanggal_insert`='$tanggal_sekarang' WHERE `kode_user`=$kode_user ");

        if ($sql){
            ?>

                <script type="text/javascript">
                    alert ("Data Berhasil disimpan")
                    window.location.href="?page=users";
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
