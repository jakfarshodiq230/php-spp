<?php
    session_start();
    $nim = @$_GET ['nim'];
    // $sql = $mysqli -> query ("SELECT * FROM tb_mahasiswa, tb_jurusan,tb_fakultas WHERe tb_mahasiswa.kode_jurusan= tb_jurusan.kode_jurusan AND tb_mahasiswa.kode_fakultas=tb_fakultas.kode_fakultas AND tb_mahasiswa.nim ='$nim'");
    // $tampil = $sql -> fetch_assoc();
?>
    <section class="content">
        <div class="container-fluid">           
            <!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Edit Password
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <?php
                                        if ($_SESSION['level']=='admin'){
                                    ?>
                                    <a href="?page=data_master" class="dropdown-toggle"  role="button" aria-haspopup="true" aria-expanded="false">
                                    <button type="button" class="btn btn-warning waves-effect">Kembali</button>
                                    </a>
                                    <?php 
                                        }else if ($_SESSION['level']=='mahasiswa'){
                                    ?>
                                    <a href="?page=halaman1" class="dropdown-toggle"  role="button" aria-haspopup="true" aria-expanded="false">
                                    <button type="button" class="btn btn-warning waves-effect">Kembali</button>
                                    </a>
                                    <?php 
                                        } 
                                    ?>
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
                                                    <label for="password_2">Password</label>
                                                </div>
                                                <div class="col-lg-6 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="password" id="password" name="password" class="form-control">
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
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Horizontal Layout -->
        </div>
    </section>
<?php
    $password = @$_POST ['password'];
    $konvers = md5($password);

     $simpan = @$_POST ['simpan'];
    if ($simpan) {

        $sql = $mysqli -> query (" UPDATE `tb_mahasiswa` SET `password`='$konvers' WHERE `nim`='$nim' ");

        if ($sql){
            if ($_SESSION['level']=='admin'){
            ?>

                <script type="text/javascript">
                    alert ("Data Berhasil Edit")
                    window.location.href="?page=data_master";
                </script>

<?php

            }else if($_SESSION['level']=='mahasiswa'){
?>
                <script type="text/javascript">
                    alert ("Data Berhasil Edit")
                    window.location.href="?page=halaman1";
                </script>

<?php
                }
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