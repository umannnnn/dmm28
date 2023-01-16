<?php

    include('function.php'); 
    $sql = "DELETE FROM datapelanggan WHERE id_pelanggan='" . $_GET["id"] . "'";
    $run = mysqli_query($conn,$sql);

    if($run == true){     
        echo "<script> 
                alert('Pesanan Pelanggan Ditolak');
                window.open('index3.php','_self');
            </script>";
    }else{
        echo "<script> 
        alert('Gagal Menolak Pesanan');
        </script>";
    }

    mysqli_close($conn);

?>