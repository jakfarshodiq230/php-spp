<?php
    $sql = $mysqli -> query ("SELECT * FROM tb_identitas");
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
                                IDENTITAS UNIVERSITAS
                            </h2>
                             <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="?page=pengguna" class="dropdown-toggle"  role="button" aria-haspopup="true" aria-expanded="false">
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
                                        <label for="password_2">No </label>
                                    </div>
                                    <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="kode" name="kode" class="form-control" value="<?php echo $tampil['kode_universitas'] ?>"  onkeypress="return validKey(event || window.event, '0123456789');">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Nama </label>
                                    </div>
                                    <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <textarea name="nama" rows="3" cols="28" required><?php echo $tampil['nama_universitas'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">SK</label>
                                    </div>
                                    <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                           <textarea name="sk" rows="3" cols="28" required><?php echo $tampil['sk_universitas'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Alamat 1 </label>
                                    </div>
                                    <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <textarea name="alamat1" rows="3" cols="28" required><?php echo $tampil['alamat_universitas'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Alamat 2 </label>
                                    </div>
                                    <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <textarea name="alamat2" rows="3" cols="28" required><?php echo $tampil['alamat_universitas_2'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">No HP </label>
                                    </div>
                                    <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="no_hp" name="no_hp" class="form-control" value="<?php echo $tampil['no_hp'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Pimpinan </label>
                                    </div>
                                    <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="nama_pimpinan" name="nama_pimpinan" class="form-control" value="<?php echo $tampil['pimpinan_universitas'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Kordinator </label>
                                    </div>
                                    <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="kordinator_universitas" name="kordinator_universitas" class="form-control" value="<?php echo $tampil['kordinator_universitas'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Bendahara </label>
                                    </div>
                                    <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="bendahara_universitas" name="bendahara_universitas" class="form-control" value="<?php echo $tampil['bendahara_universitas'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <!-- <button type="button" class="btn btn-success m-t-15 waves-effect">SIMPAN</button> -->
                                        <input type="submit" name="simpan" value="Edit" class="btn btn-success" style="margin-top: 10px;">
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

    $kode = @$_POST ['kode'];
    $nama = @$_POST ['nama'];
    $sk = @$_POST ['sk'];
    $alamat1 = @$_POST ['alamat1'];
    $alamat2 = @$_POST ['alamat2'];
    $no_hp = @$_POST ['no_hp'];
    $nama_pimpinan = @$_POST ['nama_pimpinan'];
    $kordinator_universitas = @$_POST ['kordinator_universitas'];
    $bendahara_universitas = @$_POST ['bendahara_universitas'];

     $simpan = @$_POST ['simpan'];
    if ($simpan) {

        $sql = $mysqli -> query (" UPDATE `tb_identitas` SET `nama_universitas`='$nama',`sk_universitas`='$sk',`alamat_universitas`='$alamat1',`alamat_universitas_2`='$alamat2',`no_hp`='$no_hp',`pimpinan_universitas`='$nama_pimpinan', `bendahara_universitas`='$bendahara_universitas', `kordinator_universitas`='$kordinator_universitas' WHERE `kode_universitas`='$kode' ");

        if ($sql){
            ?>

                <script type="text/javascript">
                    alert ("Data Berhasil disimpan")
                    window.location.href="?page=identitas";
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
