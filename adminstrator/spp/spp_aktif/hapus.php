<?php

    $kode_jenis_spp = @$_GET ['kode_jenis_spp'];

    $mysqli -> query("DELETE FROM tb_jenis_spp WHERE kode_jenis_spp = '$kode_jenis_spp'")

?>

     <script type="text/javascript">
        window.location.href="?page=spp_aktif";
     </script>