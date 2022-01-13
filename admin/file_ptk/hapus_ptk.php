<?php 
	
require "function.php";


	$id = $_GET["id"];

	if( hapus_ptk($id) > 0 ){
			echo "
				<script> 
					alert('Data Berhasil Dihapus!');
					document.location.href = 'data_ptk.php';
				</script>
			";
	}
	else{
			echo "
				<script> 
					alert('Data Gagal Dihapus!');
					document.location.href = 'data_ptk.php';
				</script>
			";
	}
	
 ?>