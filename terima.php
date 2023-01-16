<?php
	include 'function.php'; 
	if (isset($_POST['terima'])){
		$appid = $_POST['appid'];
		$sql = "UPDATE datapelanggan SET status='1' WHERE id_pelanggan = '$appid'";
		$run = mysqli_query($conn,$sql);
		if($run == true){	
			echo "<script> 
					alert('Pesanan Pelanggan Diterima');
					window.open('index3.php','_self');
				  </script>";
		}else{
			echo "<script> 
			alert('Gagal Menerima Pesanan');
			</script>";
		}
	}
 ?>