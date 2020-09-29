<?php

    $kode_fakultas= @$_GET ['kode_fakultas'];
    $sql = $mysqli -> query ("SELECT * FROM tb_fakultas WHERE  kode_fakultas='$kode_fakultas'");
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
                                Edit Fakultas
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
                                        <label for="password_2">Kode Fakultas</label>
                                    </div>
                                    <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="nama" name="nama" class="form-control" value="<?php echo $tampil['kode_fakultas']?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Nama Fakultas</label>
                                    </div>
                                    <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="nama" name="nama" class="form-control" value="<?php echo $tampil['nama_fakultas']?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <input type="submit" name="simpan" value="Edit" class="btn btn-success" style="margin-top: 10px;">
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

    $nama = @$_POST ['nama'];

     $simpan = @$_POST ['simpan'];
    if ($simpan) {

        $sql = $mysqli -> query (" UPDATE `tb_jenis_barang` SET `nama_jenis_barang`='$nama' WHERE `kode_jenis_barang`='$kode_jenis_barang' ");

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