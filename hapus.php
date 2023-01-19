<?php
require 'function.php';

$id = $_GET["id_mobil"];

if( hapus($id) > 0 ){
    echo "
        <script>
            alert('data berhasil dihapus!');
            document.location.href = 'index2.php';
        </script> 
        ";
} else {
    echo "
        <script>
            alert('data gagal dihapus!');
            document.location.href = 'index2.php';
        </script> 
        ";
}

?>