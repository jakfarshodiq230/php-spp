 <section class="content">
        <div class="container-fluid">           
            <!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Input Data Mahasiswa
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
                            <!-- <div class="form-horizontal"> -->
                            <form   method="post" role="form" action="" id="form1" name="form1">
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
                                                            <input type="text" id="nim" name="nim" class="form-control" placeholder="Inputkan Nim" onkeypress="return validKey(event || window.event, '0123456789');" required>
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
                                                            <input type="text" id="nirm" name="nirm" class="form-control" placeholder="Inputkan Nirm" onkeypress="return validKey(event || window.event, '0123456789');"required>
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
                                                            <input type="text" id="nama" name="nama" class="form-control" placeholder="Inputkan Nama" required>
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
                                                        <input type="radio" name="jenis_kelamin" value="Laki-Laki" id="male" class="with-gap">
                                                        <label for="male">Laki-Laki</label>

                                                        <input type="radio" name="jenis_kelamin" value="Perempuan" id="female" class="with-gap">
                                                        <label for="female" class="m-l-20">Perempuan</label>
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
                                                            <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" placeholder="Inputkan Tempat Lahir" required>
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
                                                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" placeholder="Inputkan Tanggal Lahir" required>
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
                                                            <select id="fakultas" class="form-control" name="fakultas">
                                                                <option value="">Please Select</option>
                                                                <?php
                                                                    $query = mysqli_query($mysqli, "SELECT * FROM tb_fakultas ORDER BY nama_fakultas");
                                                                    while ($row = mysqli_fetch_array($query)) { ?>

                                                                    <option value="<?php echo $row['kode_fakultas'] ?>">
                                                                        <?php echo $row['nama_fakultas']; ?>
                                                                    </option>

                                                                <?php } ?>
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
                                                            <select id="jurusan" class="form-control" name="jurusan">
                                                                <option value="">Please Select</option>
                                                                <?php
                                                                    $query = mysqli_query($mysqli, "SELECT * FROM tb_jurusan ORDER BY nama_jurusan");
                                                                    while ($row = mysqli_fetch_array($query)) { ?>

                                                                    <option value="<?php echo $row['kode_jurusan'] ?>">
                                                                        <?php echo $row['nama_jurusan']; ?>
                                                                    </option>

                                                                <?php } ?>
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
                                                            <textarea name="alamat" rows="5" cols="28" required></textarea>
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
                                                            <input type="email" name="email" class="form-control" placeholder="Inputkan Email" required>
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
                                                            <input type="text" id="no_hp" name="no_hp" class="form-control" placeholder="Inputkan Nama" onkeypress="return validKey(event || window.event, '0123456789');" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                               <input type="submit" name="simpan" value="Simpan" class="btn btn-success" style="margin-top: 10px;">
                            </div>
                          </form>
                        <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Horizontal Layout -->
        </div>
    </section>
<!-- <script type="text/javascript" src="js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script> -->
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
    function rubah_tanggal($tgl)
 {
    $exp = explode('-',$tgl);
    if(count($exp) == 3)
 {
    $tgl = $exp[2].'-'.$exp[1].'-'.$exp[0];
 }
    return $tgl;
 }
    $nim = @$_POST ['nim'];
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

    date_default_timezone_set('Asia/Jakarta');
    $tahun_angkatan = date("Y");

    $tanggal= rubah_tanggal($tanggal_lahir);
    $password = md5($tanggal);
    
    $simpan = @$_POST ['simpan'];
    if ($simpan) {

         $sql = $mysqli -> query (" INSERT INTO `tb_mahasiswa`(`nim`, `nirm`, `nama_mahasiswa`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `kode_jurusan`, `kode_fakultas`, `alamat`, `email`, `no_hp`, `password`,`tahun_angkatan`) VALUES ('$nim','$nirm','$nama','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$jurusan','$fakultas','$alamat','$email','$no_hp','$password','$tahun_angkatan') ");

        if ($sql){
            ?>

                <script type="text/javascript">
                    alert ("Data Berhasil disimpan")
                    window.location.href="?page=data_master";
                </script>

                <?php
        }else{
            echo "eroor";
        }
    }

?>  
