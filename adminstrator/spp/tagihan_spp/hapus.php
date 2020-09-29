<?php

    $kode_spp = @$_GET ['kode_spp'];

    $mysqli -> query("DELETE FROM tb_spp WHERE kode_spp = '$kode_spp'");
    $mysqli -> query("DELETE FROM tb_tagihan_spp WHERE kode_spp = '$kode_spp'")

?>

     <script type="text/javascript">
        window.location.href="?page=spp";
     </script>