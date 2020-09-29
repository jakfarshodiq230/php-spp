<?php
session_start();
ob_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../../config/database.php";
require_once "../../../config/fungsi_tanggal.php";

$hari_ini = date("d-m-Y");

// ambil data hasil submit dari form
$tahun_angkatan  = @$_GET['tahun_angkatan'];

    $no    = 1;
    // fungsi query untuk menampilkan data dari tabel obat masuk
    $query = mysqli_query($mysqli, "SELECT * FROM tb_mahasiswa, tb_jurusan,tb_fakultas WHERe tb_mahasiswa.kode_jurusan= tb_jurusan.kode_jurusan AND tb_mahasiswa.kode_fakultas=tb_fakultas.kode_fakultas AND tb_mahasiswa.tahun_angkatan ='$tahun_angkatan' ")or die('Ada kesalahan pada query tampil Transaksi : '.mysqli_error($mysqli));  

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
                <b>LAPORAN DATA MAHASISWA <br> ANGKATAN <?php echo strtoupper($tahun_angkatan) ?></b> 
            </div>
            <br><br><br>
            <table width="100%" border="0.3" cellpadding="0" cellspacing="0" align="center">
                <thead style="background:#e8ecee">
                    <tr class="tr-title">
                        <th height="35" align="center" valign="middle">NO.</th>
                        <th height="35" align="center" valign="middle">NIM</th>
                        <th height="35" align="center" valign="middle">NIRM</th>
                        <th height="35" align="center" valign="middle">NAMA</th>
                        <th height="35" align="center" valign="middle">TEMPAT, TANGGAL LAHIR</th>
                        <th height="35" align="center" valign="middle">Jenis Kelamin</th>
                        <th height="35" align="center" valign="middle">Jurusan</th>
                        <th height="35" align="center" valign="middle">Fakultas</th>
                        <th height="35" align="center" valign="middle">ALAMAT</th>
                        <th height="35" align="center" valign="middle">No HP</th>
                        <th height="35" align="center" valign="middle">EMAIL</th>
                    </tr>
                </thead>
                <tbody>
<?php

        // tampilkan data
        $total=0;
        while ($data = mysqli_fetch_assoc($query)) {
?>
            <tr>
                <td width='30' height='13' align="center"><?php echo $no++ ?></td>
                <td width='80' height='13'align="center"><?php echo $data['nim']  ?></td>
                <td width='80' height='13'align="center"><?php echo $data['nirm']  ?></td>
                <td width='150' height='13'align="center"><?php echo $data['nama_mahasiswa']  ?></td>
                <td width='180' height='13'align="center"><?php echo $data['tempat_lahir']," , ", $data['tanggal_lahir']  ?></td>
                <td width='80' height='13'align="center"><?php echo $data['jenis_kelamin']  ?></td>
                <td width='80' height='13'align="center"><?php echo $data['nama_jurusan']?></td>
                <td width='80' height='13'align="center"><?php echo $data['nama_fakultas']  ?></td>
                <td width='200' height='13'align="left"><?php echo $data['alamat']?></td>
                <td width='80' height='13'align="center"><?php echo $data['no_hp']?></td>
                <td width='170' height='13'align="center"><?php echo $data['email']?></td>
            </tr>
<?php
    }

?>  
                </tbody>
            </table>

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
    $html2pdf = new HTML2PDF('L','Legal','en', false, 'ISO-8859-15',array(10, 10, 10, 10));
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output($filename);
}
catch(HTML2PDF_exception $e) { echo $e; }
?>