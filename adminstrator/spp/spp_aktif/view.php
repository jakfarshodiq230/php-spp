<!-- Basic Examples -->
<div class="row clearfix">
    <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> -->
        <!-- <div class="card"> -->
            <div class="header">
                <h2>
                    DATA JENIS SPP
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="ios">
                           <button type="button" class="btn bg-green btn-xs waves-effect"><i class="material-icons">cached</i></button>
                        </a>
                        <a href="?page=spp_aktif&aksi=kosongkan" class="dropdown-toggle"  role="button" aria-haspopup="true" aria-expanded="false">
                        <button type="button" class="btn bg-orange btn-xs waves-effect"><i class="material-icons">delete</i></button>
                        </a>
                        <a href="?page=spp_aktif&aksi=tambah" class="dropdown-toggle"  role="button" aria-haspopup="true" aria-expanded="false">
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
                                    $sql = $mysqli -> query ("SELECT * FROM tb_jenis_spp ");
                                    $no=1;
                                    while ($data = $sql -> fetch_assoc()) {
                            ?>
                            <tr>
                                <td ><?php echo $no++ ?></td>
                                <td ><?php echo $data['kode_jenis_spp']  ?></td>
                                <td ><?php echo $data['keterangan_spp']  ?></td>
                                <td ><?php echo 'Rp. ',number_format($data['harga'],0,',','.')?></td>
                                <td align="center">
                                    <a href="?page=spp_aktif&aksi=edit&kode_jenis_spp=<?php echo $data['kode_jenis_spp']?>"><button type="button" class="btn bg-green btn-xs waves-effect"><i class="material-icons">edit</i></button></a>
                                    <a onclick="return confirm('Anda Yakin Akan Menghapus Data Ini ?')" href="?page=spp_aktif&aksi=hapus&kode_jenis_spp=<?php echo $data['kode_jenis_spp']?>"><button type="button" class="btn bg-red btn-xs waves-effect"><i class="material-icons">delete</i></button></a>
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