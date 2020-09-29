<?php

    $kode_fakultas = @$_GET ['kode_fakultas'];

    $mysqli -> query("DELETE FROM tb_fakultas WHERE kode_fakultas = '$kode_fakultas'")

?>

     <script type="text/javascript">
        alert ("Data Berhasil dihapus")
        window.location.href="?page=data_master";
     </script>