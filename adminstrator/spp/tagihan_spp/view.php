<!-- Basic Examples -->
<div class="row clearfix">
    <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> -->
        <!-- <div class="card"> -->
            <div class="header">
                <h2>
                    DATA TAGIHAN PER-TAHUN AJARAN
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="ios">
                           <button type="button" class="btn bg-green btn-xs waves-effect"><i class="material-icons">cached</i></button>
                        </a>
                        <a href="?page=spp&aksi=kosongkan" class="dropdown-toggle"  role="button" aria-haspopup="true" aria-expanded="false">
                        <button type="button" class="btn bg-orange btn-xs waves-effect"><i class="material-icons">delete</i></button>
                        </a>
                        <a href="?page=spp&aksi=tambah" class="dropdown-toggle"  role="button" aria-haspopup="true" aria-expanded="false">
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
                                <th>Tahun Ajaran</th>
                                <th>Jenis SPP</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Tahun Ajaran</th>
                                <th>Jenis SPP</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php 
                                    $sql = $mysqli -> query ("SELECT * FROM tb_jenis_spp,tb_spp,tb_tahun_ajaran WHERE tb_spp.kode_jenis_spp=tb_jenis_spp.kode_jenis_spp AND tb_spp.kode_tahun_ajaran=tb_tahun_ajaran.kode_tahun_ajaran ORDER BY tahun_ajaran DESC");
                                    $no=1;
                                    while ($data = $sql -> fetch_assoc()) {
                            ?>
                            <tr>
                                <td ><?php echo $no++ ?></td>
                                <td ><?php echo $data['tahun_ajaran']," - ", ucwords($data['semester'])   ?></td>
                                <td ><?php echo $data['keterangan_spp']  ?></td>
                                <td ><?php echo $data['harga']?></td>
                                <td ><?php echo $data['status']?></td>
                                <td align="center">
                                    <a href="?page=spp&aksi=edit&kode_spp=<?php echo $data['kode_spp']?>"><button type="button" class="btn bg-blue btn-xs waves-effect"><i class="material-icons">edit</i></button></a>
                                    <a onclick="return confirm('Anda Yakin Akan Menghapus Data Ini ?')" href="?page=spp&aksi=hapus&kode_spp=<?php echo $data['kode_spp']?>"><button type="button" class="btn bg-red btn-xs waves-effect"><i class="material-icons">delete</i></button></a>
                                    <?php if ($data['status']=='aktif') { ?>
                                                    <a data-toggle="tooltip" data-placement="top" title="Blokir" style="margin-right:2px" class="btn bg-green btn-xs waves-effect" href="adminstrator/spp/tagihan_spp/proses-update.php?page=off&kode_spp=<?php echo $data['kode_spp'];?>">
                                                        <i style="color:#fff" class="glyphicon glyphicon-ok"></i>
                                                    </a>
                                    <?php
                                        } else { 
                                    ?>
                                                    <a data-toggle="tooltip" data-placement="top" title="Aktifkan" style="margin-right:5px" class="btn bg-orange btn-xs waves-effect" href="adminstrator/spp/tagihan_spp/proses-update.php?page=on&kode_spp=<?php echo $data['kode_spp'];?>">
                                                        <i style="color:#fff" class="glyphicon glyphicon-off"></i>
                                                    </a>
                                    <?php
                                        }
                                    ?>

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