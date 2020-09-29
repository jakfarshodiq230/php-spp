<?php

    $kode_user = @$_GET ['kode_user'];

    $mysqli -> query("DELETE FROM tb_user WHERE kode_user = '$kode_user'")

?>

     <script type="text/javascript">
        alert ("Data Berhasil dihapus")
        window.location.href="?page=users";
     </script>