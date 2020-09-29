<?php

    $kode_tahun_ajaran = @$_GET ['kode_tahun_ajaran'];

    $mysqli -> query("DELETE FROM tb_tahun_ajaran WHERE kode_tahun_ajaran = '$kode_tahun_ajaran'")

?>

     <script type="text/javascript">
        window.location.href="?page=tahun_ajaran";
     </script>