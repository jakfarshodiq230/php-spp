<!-- Basic Examples -->
<div class="row clearfix">
    <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> -->
        <!-- <div class="card"> -->
            <div class="header">
                <h2>
                    DATA TAHUN AJARAN
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="ios">
                           <button type="button" class="btn bg-green btn-xs waves-effect"><i class="material-icons">cached</i></button>
                        </a>
                        <a href="?page=tahun_ajaran&aksi=kosongkan" class="dropdown-toggle"  role="button" aria-haspopup="true" aria-expanded="false">
                        <button type="button" class="btn bg-orange btn-xs waves-effect"><i class="material-icons">delete</i></button>
                        </a>
                        <a href="?page=tahun_ajaran&aksi=tambah" class="dropdown-toggle"  role="button" aria-haspopup="true" aria-expanded="false">
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
                                <th>No</th>
                                <th>Kode</th>
                                <th>Jenis SPP</th>
                                <th>Jumlah </th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Jenis SPP</th>
                                <th>Jumlah </th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php 
                                    $sql = $mysqli -> query ("SELECT * FROM tb_tahun_ajaran ORDER BY kode_tahun_ajaran DESC ");
                                    $no=1;
                                    while ($data = $sql -> fetch_assoc()) {
                            ?>
                            <tr>
                                <td ><?php echo $no++ ?></td>
                                <td ><?php echo $data['kode_tahun_ajaran']  ?></td>
                                <td ><?php echo $data['tahun_ajaran']  ?></td>
                                <td ><?php echo $data['semester']?></td>
                                <td align="center">
                                    <a href="?page=tahun_ajaran&aksi=edit&kode_tahun_ajaran=<?php echo $data['kode_tahun_ajaran']?>"><button type="button" class="btn bg-green btn-xs waves-effect"><i class="material-icons">edit</i></button></a>
                                    <a onclick="return confirm('Anda Yakin Akan Menghapus Data Ini ?')" href="?page=tahun_ajaran&aksi=hapus&kode_tahun_ajaran=<?php echo $data['kode_tahun_ajaran']?>"><button type="button" class="btn bg-red btn-xs waves-effect"><i class="material-icons">delete</i></button></a>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <!-- </div> -->
    <!-- </div> -->
</div>
<!-- #END# Basic Examples -->