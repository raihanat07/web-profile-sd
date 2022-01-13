<?php 
	
require "function.php";


	$id = $_GET["id"];

	if( hapus_prestasi($id) > 0 ){
			echo "
				<script> 
					alert('Data Berhasil Dihapus!');
					document.location.href = 'data_prestasi.php';
				</script>
			";
	}
	else{
			echo "
				<script> 
					alert('Data Gagal Dihapus!');
					document.location.href = 'data_prestasi.php';
				</script>
			";
	}
	
 ?>