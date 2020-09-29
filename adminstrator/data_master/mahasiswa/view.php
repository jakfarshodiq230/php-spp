<?php 

require_once "adminstrator/data_master/mahasiswa/fungsi_tanggal.php";
?>
            <!-- Basic Examples -->
                        <div class="header">
                            <h2>
                                DATA MAHASISWA
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="ios">
                                       <button type="button" class="btn bg-green btn-xs waves-effect"><i class="material-icons">cached</i></button>
                                    </a>
                                    <a href="?page=siswa&aksi=kosongkan" class="dropdown-toggle"  role="button" aria-haspopup="true" aria-expanded="false">
                                    <button type="button" class="btn bg-orange btn-xs waves-effect"><i class="material-icons">delete</i></button>
                                    </a>
                                    <a href="?page=siswa&aksi=tambah" class="dropdown-toggle"  role="button" aria-haspopup="true" aria-expanded="false">
                                    <button type="button" class="btn bg-blue btn-xs waves-effect"><i class="material-icons">add</i></button>
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
                                            <th>Nim</th>
                                            <th>Nirm</th>
                                            <th>Nama</th>
                                            <th>Tempat, Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th >No</th>
                                            <th>Nim</th>
                                            <th>Nirm</th>
                                            <th>Nama</th>
                                            <th>Tempat, Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                                $sql = $mysqli -> query ("SELECT * FROM tb_mahasiswa, tb_jurusan,tb_fakultas WHERe tb_mahasiswa.kode_jurusan= tb_jurusan.kode_jurusan AND tb_mahasiswa.kode_fakultas=tb_fakultas.kode_fakultas");
                                                $no=1;
                                                    function rubah_tanggal($tgl)
                                                     {
                                                        $exp = explode('-',$tgl);
                                                        if(count($exp) == 3)
                                                     {
                                                        $tgl = $exp[2].'-'.$exp[1].'-'.$exp[0];
                                                     }
                                                        return $tgl;
                                                     }
                                                while ($data = $sql -> fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td ><?php echo $no++ ?></td>
                                            <td ><?php echo $data['nim']  ?></td>
                                            <td ><?php echo $data['nirm']  ?></td>
                                            <td ><?php echo $data['nama_mahasiswa']  ?></td>
                                            <td ><?php echo $data['tempat_lahir'],",  ", tgl_eng_to_ind(rubah_tanggal($data['tanggal_lahir']));  ?></td>
                                            <td ><?php echo $data['jenis_kelamin']  ?></td>
                                            <td align="center">
                                                <a href="?page=siswa&aksi=password&nim=<?php echo $data['nim']?>"><button type="button" class="btn bg-blue btn-xs waves-effect"><i class="material-icons">vpn_key</i></button></a>
                                                <a href="?page=siswa&aksi=lihat&nim=<?php echo $data['nim']?>"><button type="button" class="btn bg-orange btn-xs waves-effect"><i class="material-icons">visibility</i></button></a>
                                                <a onclick="return confirm('Anda Yakin Akan Mengedit Data Ini ?')" href="?page=siswa&aksi=edit&nim=<?php echo $data['nim']?>"><button type="button" class="btn bg-green btn-xs waves-effect"><i class="material-icons">edit</i></button></a>
                                                <a onclick="return confirm('Anda Yakin Akan Menghapus Data Ini ?')" href="?page=siswa&aksi=hapus&nim=<?php echo $data['nim']?>"><button type="button" class="btn bg-red btn-xs waves-effect"><i class="material-icons">delete</i></button></a>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
            <!-- #END# Basic Examples -->