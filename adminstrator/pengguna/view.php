<?php 

require_once "adminstrator/data_master/mahasiswa/fungsi_tanggal.php";
?>

<section class="content">
        <div class="container-fluid">
            <!-- Example Tab -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
            <!-- Basic Examples -->
                        <div class="header">
                            <h2>
                                DATA USERS
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="ios">
                                       <button type="button" class="btn bg-green btn-xs waves-effect"><i class="material-icons">cached</i></button>
                                    </a>
                                    <a href="?page=users&aksi=kosongkan" class="dropdown-toggle"  role="button" aria-haspopup="true" aria-expanded="false">
                                    <button type="button" class="btn bg-orange btn-xs waves-effect"><i class="material-icons">delete</i></button>
                                    </a>
                                    <a href="?page=users&aksi=tambah" class="dropdown-toggle"  role="button" aria-haspopup="true" aria-expanded="false">
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
                                            <th>FOTO</th>
                                            <th>NAMA</th>
                                            <th>Tempat,Tanggal Lahir</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>No. hP</th>
                                            <th>Level</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th >No</th>
                                            <th>FOTO</th>
                                            <th>NAMA</th>
                                            <th>Tempat,Tanggal Lahir</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>No. hP</th>
                                            <th>Level</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                                $sql = $mysqli -> query ("select * from tb_user");
                                                $no=1;
                                                while ($data = $sql -> fetch_assoc()) {
                                        ?>
                                        <tr>    
                                            <td ><?php echo $no++ ?></td>
                                            <td align="center"><img style="width: 50px; height: 50px; border-radius: 50%;" src='adminstrator/pengguna/user-default.png' width="48" height="48"></td>
                                            <td ><?php echo $data['nama_user']  ?></td>
                                            <td ><?php echo $data['tempat_lahir'],",  ", tgl_eng_to_ind($data['tanggal_lahir']);  ?></td>
                                            <td ><?php echo $data['username']  ?></td>
                                            <td ><?php echo $data['email']  ?></td>
                                            <td ><?php echo $data['no_hp']  ?></td>
                                            <td ><?php echo $data['level']  ?></td>
                                            <td align="center" >
                                                <a onclick="return confirm('Anda Yakin Akan Mengedit Data Ini ?')" href="?page=users&aksi=edit&kode_user=<?php echo $data['kode_user'] ?>"><button type="button" class="btn bg-green btn-xs waves-effect"><i class="material-icons">edit</i></button></a>
                                                <a onclick="return confirm('Anda Yakin Akan Menghapus Data Ini ?')" href="?page=users&aksi=hapus&kode_user=<?php echo $data['kode_user'] ?>"><button type="button" class="btn bg-red btn-xs waves-effect"><i class="material-icons">delete</i></button></a>
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
            </div>
        </div>
    </div>
</section>