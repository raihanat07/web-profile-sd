<head>
    <link rel="icon" type="image/png" href="../../logo/logo_sekolah.png">
</head>

<div style="min-width: 1300px;">

<?php $halaman="ubah_struktur"; include "../path.php";?>  <!-- template  -->

<?php require "function.php" ?>

<?php 

	// Ambil data di URL
	// $id = $_GET['id'];

	// query data struktur berdasarkan id
	$prs = query("SELECT * FROM data_struktur")[0];
	// var_dump($prs);

	// cek apakah tombol submit sudah di tekan atau belum
	if(isset($_POST["submit"])){

			// cek apakah data berhasil diubah
			if( ubah_struktur($_POST) > 0){
				echo "
					<script> 
						alert('foto struktur organisasi Berhasil Diubah!');
						document.location.href = 'ubah_struktur.php';
					</script>
				";
			}else{
				$error = mysqli_error($conn);
				echo "
					<script> 
						alert('foto struktur organisasi gagal Diubah! ');
				
						document.location.href = 'ubah_struktur.php';
					</script>
				";
			}
	}

 ?>

<!DOCTYPE html>
<html>
<head> 
	<title> Data struktur Organisasi</title>
	<link rel="stylesheet" type="text/css" href="css/ubah_struktur.css">
</head>
<body>

<div class="badan">
	<div class="judul">
<h1> Struktur Organisasi</h1>
	</div >

	<div class="bungkus_utama">
	
	
	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $prs["id"];  ?>">

			<div class="bungkus_foto">
			<div class="gambar">
			<img src="gambar/<?= $prs["foto"];  ?>" alt="foto struktur" >
			</div>
			</div>
			
			<div class="ganti">
			<li>
				<label for="foto">Upload Foto Strutur yang baru
							<span>(file jpeg/jpg/png)</span> 
				</label><br>
				<input type="file" name="foto" id="foto">
				<h5>maksimal ukuran gambar 2 MB!</h5><br>
			</li>
			<li>
				<button type="submit" name="submit" class="btn btn-primary">Ubah Foto!</button>
			</li>
			</div>
		
	</form>

	</div>	<!-- tutup kelas bungkus_utama -->
	</div> <!-- tutup kelas badan -->
</body>
</html>

</div>







