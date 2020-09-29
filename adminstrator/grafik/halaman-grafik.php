    <!-- <section class="content">
        <div class="container-fluid"> -->
            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="header">
                            <h2>BARANG MASUK</h2>
                        </div>
                        <div class="body">
                           <div id='barang_masuk' class="dashboard-donut-chart">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
                <!-- Browser Usage -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="header">
                            <h2>BARANG KELUAR</h2>
                        </div>
                        <div class="body">
                            <div id='container' class="dashboard-donut-chart">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Browser Usage -->
            </div>


            <div class="row clearfix">
                                <!-- Browser Usage -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="header">
                            <h2>BARANG MASUK</h2>
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
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Bulan</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <?php
                                     $tgl=date('Y');
                                    $sql = mysqli_query($mysqli, "SELECT sum(jumlah) AS total FROM tb_barang_masuk WHERE MONTH(tanggal_transaksi)='1' AND YEAR(tanggal_transaksi)='$tgl'");
                              
                                    $row = mysqli_fetch_array($sql); 
                                    
                                    $sql1 = mysqli_query($mysqli, "SELECT sum(jumlah) AS total FROM tb_barang_masuk WHERE  MONTH(tanggal_transaksi)='2'AND YEAR(tanggal_transaksi)='$tgl'");
                              
                                    $row1 = mysqli_fetch_array($sql1);
                                    
                                    $sql2 = mysqli_query($mysqli, "SELECT sum(jumlah) AS total FROM tb_barang_masuk WHERE  MONTH(tanggal_transaksi)='3' AND YEAR(tanggal_transaksi)='$tgl'");
                              
                                    $row2 = mysqli_fetch_array($sql2);
                                    
                                    $sql3 = mysqli_query($mysqli, "SELECT sum(jumlah) AS total FROM tb_barang_masuk WHERE  MONTH(tanggal_transaksi)='4' AND YEAR(tanggal_transaksi)='$tgl'");
                              
                                    $row3 = mysqli_fetch_array($sql3);
                                    
                                    $sql4 = mysqli_query($mysqli, "SELECT sum(jumlah) AS total FROM tb_barang_masuk WHERE  MONTH(tanggal_transaksi)='5' AND YEAR(tanggal_transaksi)='$tgl'");
                              
                                    $row4 = mysqli_fetch_array($sql4);
                                    
                                    $sql5 = mysqli_query($mysqli, "SELECT sum(jumlah) AS total FROM tb_barang_masuk WHERE  MONTH(tanggal_transaksi)='6' AND YEAR(tanggal_transaksi)='$tgl'");
                              
                                    $row5 = mysqli_fetch_array($sql5);
                                    
                                    $sql6 = mysqli_query($mysqli, "SELECT sum(jumlah) AS total FROM tb_barang_masuk WHERE  MONTH(tanggal_transaksi)='7' AND YEAR(tanggal_transaksi)='$tgl'");
                              
                                    $row6 = mysqli_fetch_array($sql6);
                                    
                                    $sql7 = mysqli_query($mysqli, "SELECT sum(jumlah) AS total FROM tb_barang_masuk WHERE  MONTH(tanggal_transaksi)='8' AND YEAR(tanggal_transaksi)='$tgl'");
                              
                                    $row7 = mysqli_fetch_array($sql7);
                                    
                                    $sql8 = mysqli_query($mysqli, "SELECT sum(jumlah) AS total FROM tb_barang_masuk WHERE  MONTH(tanggal_transaksi)='9'");
                              
                                    $row8 = mysqli_fetch_array($sql8);
                                    
                                    $sql9 = mysqli_query($mysqli, "SELECT sum(jumlah) AS total FROM tb_barang_masuk WHERE  MONTH(tanggal_transaksi)='10' AND YEAR(tanggal_transaksi)='$tgl'");
                              
                                    $row9 = mysqli_fetch_array($sql9);
                                    
                                    $sql10 = mysqli_query($mysqli, "SELECT sum(jumlah) AS total FROM tb_barang_masuk WHERE  MONTH(tanggal_transaksi)='11' AND YEAR(tanggal_transaksi)='$tgl'");
                              
                                    $row10 = mysqli_fetch_array($sql10);
                                    
                                    $sql11 = mysqli_query($mysqli, "SELECT sum(jumlah) AS total FROM tb_barang_masuk WHERE  MONTH(tanggal_transaksi)='12' AND YEAR(tanggal_transaksi)='$tgl'");
                              
                                    $row11 = mysqli_fetch_array($sql11);
                                    
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Januari</td>
                                            <td><?php echo $row['total'];?></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Februari</td>
                                            <td><?php echo $row1['total'];?></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Maret</td>
                                            <td><?php echo $row2['total'];?></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>April</td>
                                            <td><?php echo $row3['total'];?></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Mei</td>
                                            <td><?php echo $row4['total'];?></td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Juni</td>
                                            <td><?php echo $row5['total'];?></td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>Juli</td>
                                            <td><?php echo $row6['total'];?></td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>Agustus</td>
                                            <td><?php echo $row7['total'];?></td>
                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td>September</td>
                                            <td><?php echo $row8['total'];?></td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>Oktober</td>
                                            <td><?php echo $row9['total'];?></td>
                                        </tr>
                                        <tr>
                                            <td>11</td>
                                            <td>November</td>
                                            <td><?php echo $row10['total'];?></td>
                                        </tr>
                                        <tr>
                                            <td>12</td>
                                            <td>Desember</td>
                                            <td><?php echo $row11['total'];?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <h5><b><i>*setiap ganti tahun data akan berubah</i></b></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Browser Usage -->
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="header">
                            <h2>BARANG KELUAR</h2>
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
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Bulan</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $tgl=date('Y');
                                    $sqlku = mysqli_query($mysqli, "SELECT sum(jumlah) AS total1 FROM tb_penjualan, tb_detail_penjualan WHERE tb_penjualan.kode_penjualan=tb_detail_penjualan.kode_penjualan AND MONTH(tanggal)='1' AND YEAR(tanggal)='$tgl'");
                          
                                    $rowku = mysqli_fetch_array($sqlku); 
                                    
                                    $sqlku1 = mysqli_query($mysqli, "SELECT sum(jumlah) AS total1 FROM tb_penjualan, tb_detail_penjualan WHERE tb_penjualan.kode_penjualan=tb_detail_penjualan.kode_penjualan AND MONTH(tanggal)='2' AND YEAR(tanggal)='$tgl'");
                          
                                    $rowku1 = mysqli_fetch_array($sqlku1); 
                                    
                                    $sqlku2 = mysqli_query($mysqli, "SELECT sum(jumlah) AS total1 FROM tb_penjualan, tb_detail_penjualan WHERE tb_penjualan.kode_penjualan=tb_detail_penjualan.kode_penjualan AND MONTH(tanggal)='3'AND YEAR(tanggal)='$tgl'");
                          
                                    $rowku2 = mysqli_fetch_array($sqlku2); 
                                    
                                    $sqlku3 = mysqli_query($mysqli, "SELECT sum(jumlah) AS total1 FROM tb_penjualan, tb_detail_penjualan WHERE tb_penjualan.kode_penjualan=tb_detail_penjualan.kode_penjualan AND MONTH(tanggal)='4' AND YEAR(tanggal)='$tgl' ");
                          
                                    $rowku3 = mysqli_fetch_array($sqlku3); 
                                    
                                    $sqlku4 = mysqli_query($mysqli, "SELECT sum(jumlah) AS total1 FROM tb_penjualan, tb_detail_penjualan WHERE tb_penjualan.kode_penjualan=tb_detail_penjualan.kode_penjualan AND MONTH(tanggal)='5' AND YEAR(tanggal)='$tgl'");
                          
                                    $rowku4 = mysqli_fetch_array($sqlku4); 
                                    
                                    $sqlku5 = mysqli_query($mysqli, "SELECT sum(jumlah) AS total1 FROM tb_penjualan, tb_detail_penjualan WHERE tb_penjualan.kode_penjualan=tb_detail_penjualan.kode_penjualan AND MONTH(tanggal)='6' AND YEAR(tanggal)='$tgl'");
                          
                                    $rowku5 = mysqli_fetch_array($sqlku5); 
                                    
                                    $sqlku6 = mysqli_query($mysqli, "SELECT sum(jumlah) AS total1 FROM tb_penjualan, tb_detail_penjualan WHERE tb_penjualan.kode_penjualan=tb_detail_penjualan.kode_penjualan AND MONTH(tanggal)='7' AND YEAR(tanggal)='$tgl'");
                          
                                    $rowku6 = mysqli_fetch_array($sqlku6); 
                                    
                                    $sqlku7 = mysqli_query($mysqli, "SELECT sum(jumlah) AS total1 FROM tb_penjualan, tb_detail_penjualan WHERE tb_penjualan.kode_penjualan=tb_detail_penjualan.kode_penjualan AND MONTH(tanggal)='8' AND YEAR(tanggal)='$tgl'");
                          
                                    $rowku7 = mysqli_fetch_array($sqlku7); 
                                    
                                    $sqlku8 = mysqli_query($mysqli, "SELECT sum(jumlah) AS total1 FROM tb_penjualan, tb_detail_penjualan WHERE tb_penjualan.kode_penjualan=tb_detail_penjualan.kode_penjualan AND MONTH(tanggal)='9' AND YEAR(tanggal)='$tgl'");
                          
                                    $rowku8 = mysqli_fetch_array($sqlku8); 
                                    
                                    $sqlku9 = mysqli_query($mysqli, "SELECT sum(jumlah) AS total1 FROM tb_penjualan, tb_detail_penjualan WHERE tb_penjualan.kode_penjualan=tb_detail_penjualan.kode_penjualan AND MONTH(tanggal)='10' AND YEAR(tanggal)='$tgl'");
                          
                                    $rowku9 = mysqli_fetch_array($sqlku9); 
                                    
                                    $sqlku10 = mysqli_query($mysqli, "SELECT sum(jumlah) AS total1 FROM tb_penjualan, tb_detail_penjualan WHERE tb_penjualan.kode_penjualan=tb_detail_penjualan.kode_penjualan AND MONTH(tanggal)='11' AND YEAR(tanggal)='$tgl'");
                          
                                    $rowku10 = mysqli_fetch_array($sqlku10); 
                                    
                                    $sqlku11 = mysqli_query($mysqli, "SELECT sum(jumlah) AS total1 FROM tb_penjualan, tb_detail_penjualan WHERE tb_penjualan.kode_penjualan=tb_detail_penjualan.kode_penjualan AND MONTH(tanggal)='12' AND YEAR(tanggal)='$tgl'");
                          
                                    $rowku11 = mysqli_fetch_array($sqlku11); 
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Januari</td>
                                            <td><?php echo $rowku['total1'];?></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Februari</td>
                                            <td><?php echo $rowku1['total1'];?></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Maret</td>
                                            <td><?php echo $rowku2['total1'];?></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>April</td>
                                            <td><?php echo $rowku3['total1'];?></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Mei</td>
                                            <td><?php echo $rowku4['total1'];?></td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Juni</td>
                                            <td><?php echo $rowku5['total1'];?></td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>Juli</td>
                                            <td><?php echo $rowku6['total1'];?></td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>Agustus</td>
                                            <td><?php echo $rowku7['total1'];?></td>
                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td>September</td>
                                            <td><?php echo $rowku8['total1'];?></td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>Oktober</td>
                                            <td><?php echo $rowku9['total1'];?></td>
                                        </tr>
                                        <tr>
                                            <td>11</td>
                                            <td>November</td>
                                            <td><?php echo $rowku10['total1'];?></td>
                                        </tr>
                                        <tr>
                                            <td>12</td>
                                            <td>Desember</td>
                                            <td><?php echo $rowku11['total1'];?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <h5><b><i>*setiap ganti tahun data akan berubah</i></b></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->

            </div>
        </div>
    </section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
<script src="http://code.highcharts.com/highcharts.src.js" type="text/javascript"></script>
<script type="text/javascript">
  var chart1; 
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'container',
            type: 'column'
         },   
         title: {
            text: 'Grafik Barang Keluar Product <br> Perbulan Periode <?php echo $tgl=date('Y')?>'
         },
         xAxis: {
            categories: ['Bulan']
         },
         yAxis: {
            title: {
               text: 'Jumlah Barang Keluar'
            }
         },
              series:             
            [
            <?php 
            $tgl=date('Y');
            $sql   = "SELECT MONTH(tanggal) AS bulan FROM tb_penjualan GROUP BY MONTH(tanggal)";
            $query = mysqli_query( $mysqli,$sql )  or die(mysqli_error());
            while( $ret = mysqli_fetch_array( $query ) ){
              $bulan=$ret['bulan']; 

                 $sql_jumlah   = "SELECT sum(jumlah) AS total2 FROM tb_penjualan, tb_detail_penjualan WHERE tb_penjualan.kode_penjualan=tb_detail_penjualan.kode_penjualan AND month(tanggal)='$bulan' AND YEAR(tanggal)='$tgl'";        
                 $query_jumlah = mysqli_query( $mysqli,$sql_jumlah ) or die(mysqli_error());
                 while( $data = mysqli_fetch_array( $query_jumlah ) ){
                    $jumlah = $data['total2'];                 
                  }             
                  ?>
                  {
                      name: '<?php echo $bulan; ?>',
                      data: [<?php echo $jumlah; ?>]
                  },
                  <?php } ?>
            ]
      });
   });  
</script>

<script type="text/javascript">
    var chart1; 
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'barang_masuk',
            type: 'column'
         },   
         title: {
            text: 'Grafik Barang Masuk Product <br>  Perbulan Periode <?php echo $tgl=date('Y') ?>'
         },
         xAxis: {
            categories: ['Bulan']
         },
         yAxis: {
            title: {
               text: 'Jumlah Barang Masuk'
            }
         },
              series:             
            [
            <?php 
            $tgl=date('Y');
           $sql   = "SELECT MONTH(tanggal_transaksi) AS bulan FROM tb_barang_masuk GROUP BY MONTH(tanggal_transaksi)";
            $query = mysqli_query( $mysqli,$sql )  or die(mysqli_error());
            while( $ret = mysqli_fetch_array( $query ) ){
                $bulan=$ret['bulan']; 

                 $sql_jumlah   = "SELECT sum(jumlah) AS total2 FROM tb_barang_masuk WHERE MONTH(tanggal_transaksi)='$bulan' AND YEAR(tanggal_transaksi)='$tgl'";        
                 $query_jumlah = mysqli_query( $mysqli,$sql_jumlah ) or die(mysqli_error());
                 while( $data = mysqli_fetch_array( $query_jumlah ) ){
                    $jumlah = $data['total2'];                 
                  }             
                  ?>
                  {
                      name: '<?php echo $bulan; ?>',
                      data: [<?php echo $jumlah; ?>]
                  },
                  <?php } ?>
            ]
      });
   });  
</script>