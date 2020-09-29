
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
                                            <th>Tagihan</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th >No</th>
                                            <th>Semester</th>
                                            <th>Jenis SPP</th>
                                            <th>Tagihan</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                                $sql = $mysqli -> query ("SELECT * FROM tb_spp,tb_jenis_spp,tb_tahun_ajaran,tb_tagihan_spp WHERE tb_tagihan_spp.kode_spp=tb_spp.kode_spp AND tb_spp.kode_jenis_spp=tb_jenis_spp.kode_jenis_spp AND tb_spp.kode_tahun_ajaran=tb_tahun_ajaran.kode_tahun_ajaran AND tb_spp.status='aktif' AND tb_tagihan_spp.nim ='".$_SESSION['username']."' ORDER BY tahun_ajaran DESC");
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
                                        </tr>
                                        <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                                <i><b>*Pembayaran SPP Hanya Bisa Dilakukan 6 Kali Ansuran Per-jenis SPP</b></i>
                        </div>