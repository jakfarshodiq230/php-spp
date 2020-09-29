<?php
    require_once "adminstrator/data_master/mahasiswa/fungsi_tanggal.php";
    $nim = @$_GET ['nim'];
    $sql = $mysqli -> query ("SELECT * FROM tb_mahasiswa, tb_jurusan,tb_fakultas WHERe tb_mahasiswa.kode_jurusan= tb_jurusan.kode_jurusan AND tb_mahasiswa.kode_fakultas=tb_fakultas.kode_fakultas AND tb_mahasiswa.nim ='$nim'");
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
    <section class="content">
        <div class="container-fluid">
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
                                <li>
                                    <span>Tahun Angkatan</span>
                                    <span><?php echo $tampil['tahun_angkatan']?></span>
                                </li>
                            </ul>
                                <a href="?page=data_master" class="dropdown-toggle"  role="button" aria-haspopup="true" aria-expanded="false"><button type="button" class="btn btn-primary btn-lg waves-effect btn-block">Kembali</button>
                                </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>