<?php
// session_start();
// ob_start();
$kode_tagihan = @$_GET['kode_pembayaran_spp'];
// Panggil koneksi database.php untuk koneksi database
require_once "../../../config/database.php";
require_once "../../../config/fungsi_tanggal.php";

$hari_ini = date("d-m-Y");
$query2 = mysqli_query($mysqli, "SELECT * FROM `tb_identitas`"); 
$data2 = mysqli_fetch_assoc($query2);
// ambil data hasil submit dari form


    $no    = 1;
    // fungsi query untuk menampilkan data dari tabel obat masuk
    $query = mysqli_query($mysqli, "SELECT tb_pembayaran.tanggal,tb_tagihan_spp.nim,tb_jenis_spp.keterangan_spp,tb_mahasiswa.nama_mahasiswa,tb_mahasiswa.nim, tb_pembayaran.jumlah_bayar,tb_tahun_ajaran.semester, tb_tahun_ajaran.tahun_ajaran,tb_tagihan_spp.keterangan,tb_pembayaran.keterangan_pembayaran,tb_tagihan_spp.total FROM tb_tagihan_spp,tb_spp,tb_jenis_spp,tb_tahun_ajaran,tb_pembayaran,tb_mahasiswa WHERE tb_tagihan_spp.kode_spp=tb_spp.kode_spp AND tb_spp.kode_jenis_spp=tb_jenis_spp.kode_jenis_spp AND tb_spp.kode_tahun_ajaran=tb_tahun_ajaran.kode_tahun_ajaran AND tb_tagihan_spp.kode_tagihan=tb_pembayaran.kode_tagihan AND tb_tagihan_spp.nim=tb_mahasiswa.nim AND tb_pembayaran.kode_pembayaran='$kode_tagihan' ")or die('Ada kesalahan pada query tampil Transaksi : '.mysqli_error($mysqli));
    $data = mysqli_fetch_assoc($query);
?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>BUKTI PEMBAYARAN <?php echo $data['keterangan_spp']?></title>
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
                <b>BUKTI PEMBAYARAN   <?php echo strtoupper($data['keterangan_spp']) ?></b> 
            </div>
            <hr>
            <div id="identitas">
              <table>
                  <tr>
                    <td width="56">Nama</td>
                    <td width="20">:</td>
                    <td width="300"><?php echo $data['nama_mahasiswa'] ?> </td>
                  </tr>
                  <tr>
                    <td>NIM</td>
                    <td>:</td>
                    <td><?php echo $data['nim'] ?></td>
                  </tr>
                  <tr>
                    <td>Tanggal Pembayaran</td>
                    <td>:</td>
                    <td><?php echo $data['tanggal'] ?></td>
                  </tr>
                </table>
            </div>
            <hr><br>
            <?php
                $sql = mysqli_query($mysqli, "SELECT tb_pembayaran.tanggal,tb_tagihan_spp.nim,tb_jenis_spp.keterangan_spp,tb_mahasiswa.nama_mahasiswa,tb_mahasiswa.nim, tb_pembayaran.jumlah_bayar,tb_tahun_ajaran.semester, tb_tahun_ajaran.tahun_ajaran,tb_tagihan_spp.keterangan,tb_pembayaran.keterangan_pembayaran,tb_tagihan_spp.total FROM tb_tagihan_spp,tb_spp,tb_jenis_spp,tb_tahun_ajaran,tb_pembayaran,tb_mahasiswa WHERE tb_tagihan_spp.kode_spp=tb_spp.kode_spp AND tb_spp.kode_jenis_spp=tb_jenis_spp.kode_jenis_spp AND tb_spp.kode_tahun_ajaran=tb_tahun_ajaran.kode_tahun_ajaran AND tb_tagihan_spp.kode_tagihan=tb_pembayaran.kode_tagihan AND tb_tagihan_spp.nim=tb_mahasiswa.nim AND tb_pembayaran.kode_pembayaran='$kode_tagihan' ")or die('Ada kesalahan pada query tampil Transaksi : '.mysqli_error($mysqli));

                if($data['keterangan_pembayaran']==$data['keterangan']){
                   while ($data = $sql -> fetch_assoc()) {
            ?>
            <div id="identitas">
                <i><b style="font-size: 20px;">Pembayaran   <?php echo ucwords($data['keterangan_spp']) ?> Tahun Ajaran   <?php echo $data['tahun_ajaran']," - ", ucwords($data['semester']) ?>  sebesar <?php echo 'Rp. ',number_format($data['total'],0,',','.')?></b></i> 
            </div>
            <?php
                    }
                }else{
            ?>
            <div id="identitas">
                <i><b style="font-size: 20px;">Pembayaran   <?php echo ucwords($data['keterangan_spp']) ?> Tahun Ajaran   <?php echo $data['tahun_ajaran']," - ", ucwords($data['semester']) ?>  sebesar <?php echo 'Rp. ',number_format($data['jumlah_bayar'],0,',','.')?></b></i> 
            </div>
            <?php
                }
            ?>

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
            <br>
            <div id="keterangan">
                <p><b>* Catatan</b><br> - Kuitansi ini Merupakan Bukti Pembayran Yang Sah. <br> - Simpan Bukti Pembayran ini.</P>
            </div>
        </div>
    </body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
$filename="LAPORAN DATA BARANG MASUK.pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
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