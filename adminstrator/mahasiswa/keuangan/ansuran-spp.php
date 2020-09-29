
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
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th >No</th>
                                            <th>Semester</th>
                                            <th>Jenis SPP</th>
                                            <th>Jumlah Bayar</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                                $sql = $mysqli -> query ("SELECT * FROM tb_spp,tb_jenis_spp,tb_tahun_ajaran,tb_tagihan_spp,tb_pembayaran WHERE tb_tagihan_spp.kode_spp=tb_spp.kode_spp AND tb_spp.kode_jenis_spp=tb_jenis_spp.kode_jenis_spp AND tb_spp.kode_tahun_ajaran=tb_tahun_ajaran.kode_tahun_ajaran AND tb_tagihan_spp.kode_tagihan=tb_pembayaran.kode_tagihan AND tb_spp.status='aktif' AND tb_tagihan_spp.nim ='".$_SESSION['username']."' ORDER BY tahun_ajaran DESC");
                                                $no=1;
                                                while ($data = $sql -> fetch_assoc()) {
                                                
                                        ?>
                                        <tr>
                                            <td ><?php echo $no++ ?></td>
                                            <td ><?php echo $data['tahun_ajaran']," - ", ucwords($data['semester']) ?></td>
                                            <td ><?php echo $data['keterangan_spp']  ?></td>
                                            <td ><?php echo 'Rp. ',number_format($data['jumlah_bayar'],0,',','.')?></td>
                                            <td ><?php echo $data['keterangan_pembayaran']?></td>
                                            <td align="center">
                                               <a href="adminstrator/mahasiswa/keuangan/cetak-lunas.php?kode_pembayaran_spp=<?php echo $data['kode_pembayaran']?>&nim=<?php echo $_SESSION['username']?>"><button type="button" class="btn bg-green btn-xs waves-effect">Cetak</button></a>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>