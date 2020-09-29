<?php
	require_once "../../../config/database.php";
	// update status menjadi aktif
	if ($_GET['page']=='on') {
		if (isset($_GET['kode_spp'])) {
			// ambil data hasil submit dari form
			$kode_spp = $_GET['kode_spp'];
			$status  = "aktif";

			// perintah query untuk mengubah data pada tabel users
            $query = mysqli_query($mysqli, "UPDATE tb_spp SET status  = '$status'
                                                          WHERE kode_spp = '$kode_spp'")
                                            or die('Ada kesalahan pada query update status on : '.mysqli_error($mysqli));

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil update data
                header("location: ../../../menu.php?page=spp_aktif");
            }
		}
	}

	// update status menjadi blokir
	elseif ($_GET['page']=='off') {
		if (isset($_GET['kode_spp'])) {
			// ambil data hasil submit dari form
			$kode_spp = $_GET['kode_spp'];
			$status  = "tidak aktif";

			// perintah query untuk mengubah data pada tabel users
            $query = mysqli_query($mysqli, "UPDATE tb_spp SET status  = '$status'
                                              WHERE kode_spp = '$kode_spp'")
                                or die('Ada kesalahan pada query update status on : '.mysqli_error($mysqli));

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil update data
                header("location: ../../../menu.php?page=spp_aktif");
            }
		}
	}
?>