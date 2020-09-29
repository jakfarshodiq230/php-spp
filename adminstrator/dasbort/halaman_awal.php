
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>HOME</h2>
            </div>
            <?php
            include 'config/database.php';
            if ($_SESSION['level']=='admin' || $_SESSION['level']=='pimpinan' ||  $_SESSION['level']=='bendahara'){
            ?>
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">supervisor_account</i>
                        </div>
                        <div class="content">
                            <div class="text">DATA MAHASISWA</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">
                                <?php
                                $sql= $mysqli -> query("SELECT count(*) AS total FROM tb_mahasiswa");
                                $data = $sql -> fetch_assoc();
                                echo $data['total'];
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">supervisor_account</i>
                        </div>
                        <div class="content">
                            <div class="text">DATA JURUSAN</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">
                                <?php
                                $sql2= $mysqli -> query("SELECT count(*) AS total FROM tb_jurusan");
                                $data2 = $sql2 -> fetch_assoc();
                                echo $data2['total'];
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">save_alt</i>
                        </div>
                        <div class="content">
                            <div class="text">DATA FAKULTAS</div>
                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20">
                                
                                <?php
                                $sql3= $mysqli -> query("SELECT count(*) AS total FROM tb_fakultas");
                                $data3 = $sql3 -> fetch_assoc();
                                echo $data3['total'];
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">PENGGUNA</div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20">
                                <?php
                                $sql5= $mysqli -> query("SELECT count(*) AS total FROM tb_user");
                                $data5 = $sql5 -> fetch_assoc();
                                echo $data5['total'];
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
            <?php
                }elseif ($_SESSION['level']=='mahasiswa'){
                    require_once "adminstrator/data_master/mahasiswa/fungsi_tanggal.php";
                    // $nim = @$_GET ['nim'];
                    $sql = $mysqli -> query ("SELECT * FROM tb_mahasiswa, tb_jurusan,tb_fakultas WHERe tb_mahasiswa.kode_jurusan= tb_jurusan.kode_jurusan AND tb_mahasiswa.kode_fakultas=tb_fakultas.kode_fakultas AND tb_mahasiswa.nim ='".$_SESSION['username']."'");
                    $tampil = $sql -> fetch_assoc();
                     function rubah_tanggal($tgl)
                     {
                        $exp = explode('-',$tgl);
                        if(count($exp) == 3)
                     {
                        $tgl = $exp[2].'-'.$exp[1].'-'.$exp[0];
                     }
                        return $tgl;
                     }
            ?>
             <div class="alert bg-green alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Selamat Datang <b><?php echo $tampil['nama_mahasiswa']?></b> Di Sistem Informasi Pembayaran SPP 
            </div>
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-5">
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
                                <img src="adminstrator/data_master/mahasiswa/user.png" alt="AdminBSB - Profile Image" width="120" height="120" />
                            </div>
                            <div class="content-area">
                                <h3><?php echo $tampil['nama_mahasiswa']?></h3>
                            </div>
                        </div>
                        <div class="profile-footer">
                            <ul>
                                <li>
                                    <span>NIM</span>
                                    <span><?php echo $tampil['nim']?></span>
                                </li>
                                <li>
                                    <span>NIRM</span>
                                    <span><?php echo $tampil['nirm']?></span>
                                </li>
                                <li>
                                    <span>Jenis Kelamin</span>
                                    <span><?php echo $tampil['jenis_kelamin']?></span>
                                </li>
                                <li>
                                    <span>Tempat, Tanggal Lahir</span>
                                    <span><?php echo $tampil['tempat_lahir'], ",  ",  tgl_eng_to_ind(rubah_tanggal($data['tanggal_lahir']))?></span>
                                </li>
                                <li>
                                    <span>Jurusan</span>
                                    <span><?php echo $tampil['nama_jurusan']?></span>
                                </li>
                                <li>
                                    <span>Fakultas</span>
                                    <span><?php echo $tampil['nama_fakultas']?></span>
                                </li>
                            </ul>
                        </div>
                    </div>

            <?php
                }
            ?>
       <!--  </div>
    </section> -->