Basic Examples -->
<section class="content">
    <div class="container-fluid">   
                        <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>PEMBAYRAN SPP</h2>
                            <ul class="header-dropdown m-r--5">
                                <li>
                                    <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="ios">
                                        <i class="material-icons">loop</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                                <form method="GET" role="form" action="?page=spp_pembayaran">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-4 col-sm-4 col-xs-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="hidden" name="page" value="spp_pembayaran">
                                                <input type="text" name="nim" class="form-control" placeholder="Input Nim" required>
                                            </div>
                                            <i><b>* Masukan Nim Untuk Melakukan Pembayaran SPP</b></i>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <button type="submit" class="btn btn-success waves-effect">Cari</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                    require_once "adminstrator/data_master/mahasiswa/fungsi_tanggal.php";
                    function rubah_tanggal($tgl){
                        $exp = explode('-',$tgl);
                            if(count($exp) == 3){
                                $tgl = $exp[2].'-'.$exp[1].'-'.$exp[0];
                                }
                            return $tgl;
                    }
                    $no1 = 1;
                    $no2 = 1;


                    $ang=@$_GET['nim'];
                    $sql1 = $mysqli -> query ("SELECT * FROM tb_mahasiswa, tb_jurusan,tb_fakultas WHERe tb_mahasiswa.kode_jurusan= tb_jurusan.kode_jurusan AND tb_mahasiswa.kode_fakultas=tb_fakultas.kode_fakultas");
                    while($tampil = $sql1 -> fetch_assoc())
                    {   
                        if ($ang == $tampil['nim']){
                ?>
                                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="header">
                            <h2>Informasi Mahasiswa</h2>
                            <ul class="header-dropdown m-r--5">
                                <li>
                                    <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="ios">
                                        <i class="material-icons">loop</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="profile-card">
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
                                            <span><?php echo $tampil['tempat_lahir'], ",  ",  tgl_eng_to_ind(rubah_tanggal($tampil['tanggal_lahir']))?></span>
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
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
                                                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="header">
                            <h2>List Tagihan SPP</h2>
                            <ul class="header-dropdown m-r--5">
                                <li>
                                    <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="ios">
                                        <i class="material-icons">loop</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th >No</th>
                                            <th>Semester</th>
                                            <th>Jenis SPP</th>
                                            <th>Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th >No</th>
                                            <th>Semester</th>
                                            <th>Jenis SPP</th>
                                            <th>Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                                $sql = $mysqli -> query ("SELECT * FROM tb_spp,tb_jenis_spp,tb_tahun_ajaran,tb_tagihan_spp WHERE tb_tagihan_spp.kode_spp=tb_spp.kode_spp AND tb_spp.kode_jenis_spp=tb_jenis_spp.kode_jenis_spp AND tb_spp.kode_tahun_ajaran=tb_tahun_ajaran.kode_tahun_ajaran AND tb_spp.status='aktif' AND tb_tagihan_spp.nim ='$ang' ORDER BY tahun_ajaran DESC");
                                                $no=1;
                                                
                                                $kondisi= 6;
                                            
                                                while ($data = $sql -> fetch_assoc()) {
                                                    $query = $mysqli -> query("SELECT COUNT(kode_tagihan) AS jumlah FROM `tb_pembayaran` WHERE kode_tagihan= $data[kode_tagihan]");                                                  
                                                    $reng = $query -> fetch_assoc();

                                                    if( $data['harga'] != $data['total']){
                                                        if($reng['jumlah'] != $kondisi){
                                        ?>
                                        <tr>
                                            <td ><?php echo $no++ ?></td>
                                            <td ><?php echo $data['tahun_ajaran']," - ", ucwords($data['semester']) ?></td>
                                            <td ><?php echo $data['keterangan_spp']  ?></td>
                                            <td ><?php echo 'Rp. ',number_format($data['harga'],0,',','.')?></td>
                                            <td align="center">
                                                <a href="?page=spp_pembayaran&aksi=bayar&kode_tagihan_spp=<?php echo $data['kode_tagihan']?>"><button type="button" class="btn bg-blue btn-xs waves-effect">Bayar</button></a>
                                            </td>
                                        </tr>
                                        <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                                <i><b>*Pembayaran SPP Hanya Bisa Dilakukan 6 Kali Pencicilan</b></i>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>History Ansuran Pembayaran</h2>
                            <ul class="header-dropdown m-r--5">
                                <li>
                                    <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="ios">
                                        <i class="material-icons">loop</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th >No</th>
                                            <th>Semester</th>
                                            <th>Jenis SPP</th>
                                            <th>Jumlah Bayar</th>
                                            <!-- <th>Keterangan</th> -->
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th >No</th>
                                            <th>Semester</th>
                                            <th>Jenis SPP</th>
                                            <th>Jumlah Bayar</th>
                                            <!-- <th>Keterangan</th> -->
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                                $sql = $mysqli -> query ("SELECT * FROM tb_spp,tb_jenis_spp,tb_tahun_ajaran,tb_tagihan_spp,tb_pembayaran WHERE tb_tagihan_spp.kode_spp=tb_spp.kode_spp AND tb_spp.kode_jenis_spp=tb_jenis_spp.kode_jenis_spp AND tb_spp.kode_tahun_ajaran=tb_tahun_ajaran.kode_tahun_ajaran AND tb_tagihan_spp.kode_tagihan=tb_pembayaran.kode_tagihan AND tb_spp.status='aktif' AND tb_tagihan_spp.nim ='$ang' ORDER BY tahun_ajaran DESC");
                                                $no=1;
                                                while ($data = $sql -> fetch_assoc()) {
                                                
                                        ?>
                                        <tr>
                                            <td ><?php echo $no++ ?></td>
                                            <td ><?php echo $data['tahun_ajaran']," - ", ucwords($data['semester']) ?></td>
                                            <td ><?php echo $data['keterangan_spp']  ?></td>
                                            <td ><?php echo 'Rp. ',number_format($data['jumlah_bayar'],0,',','.')?></td>
                                            <!-- <td ><?php echo $data['keterangan_pembayaran']?></td> -->
                                            <td align="center">
                                               <a href="adminstrator/spp/pembayaran_spp/cetak.php?kode_pembayaran_spp=<?php echo $data['kode_pembayaran']?>"><button type="button" class="btn bg-green btn-xs waves-effect">Cetak</button></a>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->

                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>History Pembayaran</h2>
                            <ul class="header-dropdown m-r--5">
                                <li>
                                    <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="ios">
                                        <i class="material-icons">loop</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th >No</th>
                                            <th>Semester</th>
                                            <th>Jenis SPP</th>
                                            <th>Total Pembayaran</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th >No</th>
                                            <th>Semester</th>
                                            <th>Jenis SPP</th>
                                            <th>Total Pembayaran</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                                $sql = $mysqli -> query ("SELECT * FROM tb_spp,tb_jenis_spp,tb_tahun_ajaran,tb_tagihan_spp,tb_pembayaran WHERE tb_tagihan_spp.kode_spp=tb_spp.kode_spp AND tb_spp.kode_jenis_spp=tb_jenis_spp.kode_jenis_spp AND tb_spp.kode_tahun_ajaran=tb_tahun_ajaran.kode_tahun_ajaran AND tb_tagihan_spp.kode_tagihan=tb_pembayaran.kode_tagihan AND tb_spp.status='aktif' AND tb_tagihan_spp.nim ='$ang'  GROUP BY keterangan_spp");
                                                $no=1;
                                                while ($data = $sql -> fetch_assoc()) {
                                                
                                        ?>
                                        <tr>
                                            <td ><?php echo $no++ ?></td>
                                            <td ><?php echo $data['tahun_ajaran']," - ", ucwords($data['semester']) ?></td>
                                            <td ><?php echo $data['keterangan_spp']  ?></td>
                                            <td ><?php echo 'Rp. ',number_format($data['total'],0,',','.')?></td>
                                            <td ><?php echo $data['keterangan']?></td>
                                            <td align="center">
                                               <a href="adminstrator/spp/pembayaran_spp/cetak-lunas.php?kode_pembayaran_spp=<?php echo $data['kode_tagihan']?>"><button type="button" class="btn bg-green btn-xs waves-effect">Cetak</button></a>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
                    </div>
                </div>
                <!-- #END# Task Info -->
                <?php
                    }
                }
                ?>
    </div>
</section>
<!-- #END# Basic Examples