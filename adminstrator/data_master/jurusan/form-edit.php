<?php

    $kode_jurusan = @$_GET ['kode_jurusan'];
    $sql = $mysqli -> query ("SELECT * FROM tb_jurusan,tb_fakultas WHERE tb_jurusan.kode_fakultas=tb_fakultas.kode_fakultas AND tb_jurusan.kode_jurusan='$kode_jurusan'");
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
                                Edit Jurusan
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
                            <form class="form-horizontal" method="post" role="form" action="">
                                 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Kode Jurusan</label>
                                    </div>
                                    <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="nama" name="nama" class="form-control" value="<?php echo $tampil['kode_jurusan']?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Fakultas</label>

                                    </div>
                                    <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <select class="form-control show-tick "  name="fakultas" required>
                                                <option>Pilih</option>
                                                <?php

                                                     $sql = $mysqli -> query ("SELECT * FROM tb_fakultas ORDER BY  nama_fakultas ASC");

                                                     while ($data = $sql->fetch_assoc()){
                                                        if($tampil['kode_fakultas']==$data['kode_fakultas']){
                                                        echo "<option value='$data[kode_fakultas]' selected >$data[nama_fakultas]</option>";
                                                        }else{
                                                           echo "<option value='$data[kode_fakultas]' >$data[nama_fakultas]</option>";
                                                        }
                                                     }

                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Jurusan</label>
                                    </div>
                                    <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="nama" name="nama" class="form-control" value="<?php echo $tampil['nama_jurusan']?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <input type="submit" name="simpan" value="Simpan" class="btn btn-success" style="margin-top: 10px;">
                                    </div>
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
    $fakultas = @$_POST ['fakultas'];
    $nama = @$_POST ['nama'];

     $simpan = @$_POST ['simpan'];
    if ($simpan) {

        $sql = $mysqli -> query (" UPDATE `tb_jurusan` SET `nama_jurusan`='$nama',`kode_fakultas`='$fakultas' WHERE `kode_jurusan`='$kode_jurusan' ");

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