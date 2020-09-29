<?php

    $nim = @$_GET ['nim'];

    $mysqli -> query("DELETE FROM tb_mahasiswa WHERE nim = '$nim'")

?>

     <script type="text/javascript">
        alert ("Data Berhasil dihapus")
        window.location.href="?page=data_master";
     </script>