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
$nim  = @$_GET['nim'];
    $no    = 1;
    // fungsi query untuk menampilkan data dari tabel obat masuk
    $query = mysqli_query($mysqli, "SELECT * FROM tb_tagihan_spp,tb_spp,tb_jenis_spp,tb_tahun_ajaran,tb_pembayaran,tb_mahasiswa WHERE tb_tagihan_spp.kode_spp=tb_spp.kode_spp AND tb_spp.kode_jenis_spp=tb_jenis_spp.kode_jenis_spp AND tb_spp.kode_tahun_ajaran=tb_tahun_ajaran.kode_tahun_ajaran AND tb_tagihan_spp.kode_tagihan=tb_pembayaran.kode_tagihan AND tb_tagihan_spp.nim=tb_mahasiswa.nim AND tb_tahun_ajaran.tahun_ajaran='$tahun_ajaran' AND tb_tahun_ajaran.semester='$semester' AND tb_mahasiswa.nim='$nim' ")or die('Ada kesalahan pada query tampil Transaksi : '.mysqli_error($mysqli)); 

    $sql = mysqli_query($mysqli, "SELECT * FROM tb_tagihan_spp,tb_spp,tb_jenis_spp,tb_tahun_ajaran,tb_pembayaran,tb_mahasiswa,tb_jurusan WHERE tb_tagihan_spp.kode_spp=tb_spp.kode_spp AND tb_spp.kode_jenis_spp=tb_jenis_spp.kode_jenis_spp AND tb_spp.kode_tahun_ajaran=tb_tahun_ajaran.kode_tahun_ajaran AND tb_tagihan_spp.kode_tagihan=tb_pembayaran.kode_tagihan AND tb_tagihan_spp.nim=tb_mahasiswa.nim AND tb_mahasiswa.kode_jurusan=tb_jurusan.kode_jurusan AND tb_tahun_ajaran.tahun_ajaran='$tahun_ajaran' AND tb_tahun_ajaran.semester='$semester' AND tb_mahasiswa.nim='$nim' ")or die('Ada kesalahan pada query tampil Transaksi : '.mysqli_error($mysqli)); 
    $data = mysqli_fetch_assoc($sql);

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
                <b>KARTU PEMBAYARAN MAHASISWA</b> 
            </div>
            <br>
            <div id="identitas">
              <table >
                  <tr>
                    <td width="40">NAMA</td>
                    <td width="20">:</td>
                    <td width="600"><?php echo ucwords($data['nama_mahasiswa']) ?> </td>
                    <td >PROGRAM STUDI</td>
                    <td>:</td>
                    <td><?php echo ucwords($data['nama_jurusan']) ?></td>
                  </tr>
                  <tr>
                    <td>NIM</td>
                    <td>:</td>
                    <td><?php echo $data['nim'] ?></td>
                    <td>SEMESTER</td>
                    <td>:</td>
                    <td><?php echo ucwords($data['semester']) ?></td>
                  </tr>
                </table>
            </div>
            <br>
                <table width="100%" border="0.3" cellpadding="0" cellspacing="0" align="center">
                    <thead style="background:#e8ecee">
                  <tr >
                    <td  rowspan="3"  ><div align="center" style="  font-size: 10pt;font-weight: bold; margin-top: 30px;width:100%;white-space:nowrap;">NO</div></td>
                    <td  rowspan="3" ><div align="center" style="  font-size: 10pt;font-weight: bold; margin-top: 30px;width:100%;white-space:nowrap;">KETERANGAN </div></td>
                    <td  colspan="12" ><div align="center" style="  font-size: 10pt;font-weight: bold;margin-top: 10px;width:100%;white-space:nowrap;">TAHAP PEMBAYARAN DAN PARAF </div></td>
                    <td  rowspan="3" ><div align="center" style="  font-size: 10pt;font-weight: bold; margin-top: 30px;width:100%;white-space:nowrap;">TOTAL </div></td>
                  </tr>
                  <tr>
                    <td colspan="2"><div align="center" style="  font-size: 10pt;font-weight: bold; margin-top: 5px;width:100%;white-space:nowrap;">PERTAMA (I)</div></td>
                    <td colspan="2"><div align="center" style="  font-size: 10pt;font-weight: bold; margin-top: 5px;width:100%;white-space:nowrap;">KEDUA (II)</div></td>
                    <td colspan="2"><div align="center" style="  font-size: 10pt;font-weight: bold; margin-top: 5px;width:100%;white-space:nowrap;">KETIGA (III)</div></td>
                    <td colspan="2"><div align="center" style="  font-size: 10pt;font-weight: bold; margin-top: 5px;width:100%;white-space:nowrap;">KEEMPAT (IV)</div></td>
                    <td colspan="2"><div align="center" style="  font-size: 10pt;font-weight: bold; margin-top: 5px;width:100%;white-space:nowrap;">KELIMA (V)</div></td>
                    <td colspan="2"><div align="center" style="  font-size: 10pt;font-weight: bold; margin-top: 5px; width:95%; white-space:nowrap;">KEENAM (VI)</div></td>
                  </tr>
                  <tr>
                    <td ><div align="center">Jumlah</div></td>
                    <td ><div align="center">Paraf</div></td>
                    <td ><div align="center">Jumlah</div></td>
                    <td ><div align="center">Paraf</div></td>
                    <td ><div align="center">Jumlah</div></td>
                    <td ><div align="center">Paraf</div></td>
                    <td ><div align="center">Jumlah</div></td>
                    <td ><div align="center">Paraf</div></td>
                    <td ><div align="center">Jumlah</div></td>
                    <td ><div align="center">Paraf</div></td>
                    <td ><div align="center">Jumlah</div></td>
                    <td ><div align="center">Lunas</div></td>
                  </tr>
                </thead>

<?php
$no=1;

    $query3 = mysqli_query($mysqli, "SELECT * FROM tb_jenis_spp GROUP BY keterangan_spp")or die('Ada kesalahan pada query tampil Transaksi : '.mysqli_error($mysqli));
        while($data3= mysqli_fetch_assoc($query3)){
        $spp= $data3['keterangan_spp'];

?>
                  <tr>
                    <td width='30' height='13' align="center"><?php echo $no++?></td>
                    <td width='120' height='13' align="center"><?php echo $spp; ?></td>
<?php 
        $query = mysqli_query($mysqli, "SELECT * FROM tb_tagihan_spp,tb_spp,tb_jenis_spp,tb_tahun_ajaran,tb_pembayaran,tb_mahasiswa WHERE tb_tagihan_spp.kode_spp=tb_spp.kode_spp AND tb_spp.kode_jenis_spp=tb_jenis_spp.kode_jenis_spp AND tb_spp.kode_tahun_ajaran=tb_tahun_ajaran.kode_tahun_ajaran AND tb_tagihan_spp.kode_tagihan=tb_pembayaran.kode_tagihan AND tb_tagihan_spp.nim=tb_mahasiswa.nim AND tb_tahun_ajaran.tahun_ajaran='$tahun_ajaran' AND tb_tahun_ajaran.semester='$semester' AND tb_mahasiswa.nim='$nim' AND tb_jenis_spp.keterangan_spp='$spp'")or die('Ada kesalahan pada query tampil Transaksi : '.mysqli_error($mysqli));
        $total=0; 
        for ($x = 0; $x < 6; $x++) {
                // if($data['jumlah_bayar'] == ''){
            $data= mysqli_fetch_assoc($query);
?>
                    <td width='80' height='13' align="center"><?php 
                    if($data['jumlah_bayar'] != 0)
                        {
                             echo 'Rp. ',number_format($data['jumlah_bayar'],0,',','.');
                             $total=$total+$data['jumlah_bayar'];
                        }else{
                           echo "-";
                        }?>
                            
                    </td>
                    <td width='80' height='13' align="center">
                        <?php
                        if($data['jumlah_bayar'] != 0)
                            {
                        ?>
                            <img src="../../../images/ceklis.png" width="20" height="20">
                        <?php
                            }else{
                               echo "-";
                            }
                        ?>
                    </td>
<?php
    }
?>
                    <td width='80' height='13' align="center">
                    <?php 
                        if($total != 0){
                            echo 'Rp. ',number_format($total,0,',','.');
                        }else{
                            echo "-";
                        }
                    ?>
                    </td>
                  </tr>
<?php
}

?>
                </table>
            <br><br><br><br>
            <div id="footer-jabatan2">
                BENDAHARA YAYASAN KHIFAYATUL AKHYAR
            </div>

            
            <div id="footer-nama2">
                <?php echo $data2['bendahara_universitas'] ?>
            </div>


            <div id="footer-tanggal">
                Pekanbaru, <?php echo tgl_eng_to_ind("$hari_ini"); ?>
            </div>
            <div id="footer-jabatan">
                KORDINATOR
            </div>
            
            <div id="footer-nama">
                <?php echo $data2['kordinator_universitas'] ?>
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
    $html2pdf = new HTML2PDF('L','lEGAL','en', false, 'ISO-8859-15',array(10, 10, 10, 10));
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output($filename);
}
catch(HTML2PDF_exception $e) { echo $e; }
?>