<?php
session_start();
ob_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../../config/database.php";
require_once "../../../config/fungsi_tanggal.php";

$hari_ini = date("d-m-Y");

// ambil data hasil submit dari form
$tahun_ajaran  = @$_GET['tahun_ajaran'];
$semester  = @$_GET['semester'];
    $no    = 1;
    // fungsi query untuk menampilkan data dari tabel obat masuk
    $query = mysqli_query($mysqli, "SELECT * FROM tb_tagihan_spp,tb_spp,tb_jenis_spp,tb_tahun_ajaran,tb_pembayaran,tb_mahasiswa WHERE tb_tagihan_spp.kode_spp=tb_spp.kode_spp AND tb_spp.kode_jenis_spp=tb_jenis_spp.kode_jenis_spp AND tb_spp.kode_tahun_ajaran=tb_tahun_ajaran.kode_tahun_ajaran AND tb_tagihan_spp.kode_tagihan=tb_pembayaran.kode_tagihan AND tb_tagihan_spp.nim=tb_mahasiswa.nim AND tb_tahun_ajaran.tahun_ajaran='$tahun_ajaran' ")or die('Ada kesalahan pada query tampil Transaksi : '.mysqli_error($mysqli)); 

    $query2 = mysqli_query($mysqli, "SELECT * FROM `tb_identitas`"); 
    $data2 = mysqli_fetch_assoc($query2);
?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>LAPORAN DATA MAHASISWA</title>
        <link rel="stylesheet" type="text/css" href="laporan.css" />
    </head>
    <body>
        <div>
            <table width="100%"  align="center">
              <tr>
                <td rowspan="4" width="78"><img src="../../../images/logo.jpg" width="100" height="100"></td>
                <td width="733" align="center" style="font-size: 18pt; font-weight: bold; color: #000;"><?php echo strtoupper($data2['nama_universitas'])?></td>
              </tr>
              <tr>
                <td align="center" style="font-size: 18pt; font-weight: bold; color: #000;"><?php echo strtoupper($data2['sk_universitas'])?></td>
              </tr>
              <tr>
                <td align="center" style="font-size: 11pt; font-style: italic; color: #000;"><?php echo "Alamat I  ",ucwords($data2['alamat_universitas'])?></td>
              </tr>
              <tr>
                <td align="center" style="font-size: 11pt; font-style: italic; color: #000;"><?php echo "Alamat II  ", ucwords($data2['alamat_universitas_2'])?></td>
              </tr>
            </table>
        </div>
        
        <hr><br>
        <div id="isi">
            <div id="bukti" align="center">
                <b>LAPORAN KEUANGAN SPP <br> TAHUN AJARAN <?php echo strtoupper($tahun_ajaran)," - ",strtoupper($semester) ?></b> 
            </div>
            <br><br><br>
            <table width="100%" border="0.3" cellpadding="0" cellspacing="0" align="center">
                <thead style="background:#e8ecee">
                    <tr class="tr-title">
                        <th height="35" align="center" valign="middle">NO.</th>
                        <th height="35" align="center" valign="middle">JENIS SPP</th>
                        <th height="35" align="center" valign="middle">TOTAL</th>
                        <th height="35" align="center" valign="middle">TANGGAL BAYAR</th>
                    </tr>
                </thead>
                <tbody>
<?php

        // tampilkan data
    
    $query3 = mysqli_query($mysqli, "SELECT * FROM tb_jenis_spp GROUP BY keterangan_spp")or die('Ada kesalahan pada query tampil Transaksi : '.mysqli_error($mysqli));
        while ($data = mysqli_fetch_assoc($query)) {
    
?>
            <tr>
                <td width='40' height='13' align="center"><?php echo $no++ ?></td>
                <td width='200' height='13'align="center"><?php echo $data['keterangan_spp']  ?></td>
                <td width='200' height='13'align="center"><?php echo 'Rp. ',number_format($data['total'],0,',','.')?></td>
                <td width='200' height='13'align="center"><?php echo $data['tanggal']  ?></td>
            </tr>
<?php
    }
?>  
                </tbody>
            </table>
            <br>
<?php
    $total=0;
    while($data3= mysqli_fetch_assoc($query3)){
        $spp= $data3['keterangan_spp'];
        $query4 = mysqli_query($mysqli, " SELECT SUM(total) AS jumlah FROM tb_tagihan_spp, tb_spp, tb_jenis_spp, tb_tahun_ajaran WHERE tb_tagihan_spp.kode_spp=tb_spp.kode_spp AND tb_spp.kode_jenis_spp=tb_jenis_spp.kode_jenis_spp AND tb_spp.kode_tahun_ajaran=tb_tahun_ajaran.kode_tahun_ajaran AND tb_tahun_ajaran.tahun_ajaran='$tahun_ajaran' AND tb_tahun_ajaran.semester='$semester' AND tb_jenis_spp.keterangan_spp='$spp' ")or die('Ada kesalahan pada query tampil Transaksi : '.mysqli_error($mysqli));
        $data4 = mysqli_fetch_assoc($query4);
        $total=$total+ $data4['jumlah'];
?> 
            <div id="keterangan">
                <i> * Total Uang Masuk <?php echo $spp ?> Sebesar</i> <b><?php echo 'Rp. ',number_format($data4['jumlah'],0,',','.')?>.</b>
            </div>
<?php
    }
?>          
            <hr>
            <div id="keterangan">
                <i> * Total Keseluruhan Uang Masuk Sebesar</i> <b><?php echo 'Rp. ',number_format($total,0,',','.')?>.</b>
            </div>
            <div id="footer-tanggal">
                Pekanbaru, <?php echo tgl_eng_to_ind("$hari_ini"); ?>
            </div>
            <div id="footer-jabatan">
                Pimpinan
            </div>
            
            <div id="footer-nama">
                <?php echo $data2['pimpinan_universitas'] ?>
            </div>
        </div>
    </body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
$filename="LAPORAN DATA PENJUALAN.pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.($content).'</page>';
// panggil library html2pdf
require_once('../../../plugins/pdf/html2pdf_v4.03/html2pdf.class.php');
try
{
    $html2pdf = new HTML2PDF('L','F4','en', false, 'ISO-8859-15',array(10, 10, 10, 10));
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output($filename);
}
catch(HTML2PDF_exception $e) { echo $e; }
?>