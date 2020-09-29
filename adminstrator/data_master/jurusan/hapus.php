<?php

    $kode_jurusan = @$_GET ['kode_jurusan'];

    $mysqli -> query("DELETE FROM tb_jurusan WHERE kode_jurusan = '$kode_jurusan'")

?>

     <script type="text/javascript">
        alert ("Data Berhasil dihapus")
        window.location.href="?page=data_master";
     </script>