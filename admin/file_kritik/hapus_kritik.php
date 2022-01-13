<?php 
	
require "function.php";


	$id = $_GET["id"];

	if( hapus_kritik($id) > 0 ){
			echo "
				<script> 
					alert('Data Berhasil Dihapus!');
					document.location.href = 'data_kritik.php';
				</script>
			";
	}
	else{
			echo "
				<script> 
					alert('Data Gagal Dihapus!');
					document.location.href = 'data_kritik.php';
				</script>
			";
	}
	
 ?>