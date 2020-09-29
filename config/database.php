

<?php
// deklarasi parameter koneksi database
$server   = "localhost";
$username = "root";
$password = "";
$database = "db_pembayaran_spp_ningsih";

// koneksi database
$mysqli = new mysqli($server, $username, $password, $database);

// cek koneksi
if ($mysqli->connect_error) {
    die('Koneksi Database Gagal : ' . $mysqli->connect_error);
}
?>