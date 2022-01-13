<head>
    <link rel="icon" type="image/png" href="../../logo/logo_sekolah.png">
</head>

<div style="min-width: 1300px;">

<?php $halaman="data_kritik"; include "../path.php";?>  <!-- template  -->

<?php require "function.php" ?>

<?php 
	// cek apakah tombol submit sudah di tekan atau belum
	if(isset($_POST["submit"])){

			// cek apakah data berhasil ditambahkan
			if( tambah_kritik($_POST) > 0){
				echo "
					<script> 
						alert('Data Berhasil Ditambahkan!');
						document.location.href = 'data_kritik.php';
					</script>
				";
			}else{
				$error = mysqli_error($conn);
				echo "
					<script> 
						alert('Data gagal Ditambahkan! ');
				
						document.location.href = 'data_kritik.php';
					</script>
				";
			}
	}

 ?>

<!DOCTYPE html>
<html>
<head> 
	<title>Tambah Data kritik</title>
	<link rel="stylesheet" type="text/css" href="css/tambah_kritik.css">
</head>
<body>

<div class="badan">
	<div class="judul">
<h1>Tambah Data kritik</h1>
	</div >

	<div class="bungkus_utama">
	<div class="kembali">
		<a href="data_kritik.php" class="btn btn-info ">
			<i class="fa fa-arrow-left"></i> 
			kembali ke data kritik
		</a>
	</div>

	<div class="bungkus_isi">
	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="email">email : </label><br>
				<input type="email" name="email" id="email" required class="form-control"><br>

			</li>
			<li>
				<label for="isi">isi : </label><br>
				<textarea type="text" name="isi" id="isi" required class="form-control" cols="1" rows="5"></textarea><br>
			</li>
			<li>
				<button type="submit" name="submit" class="btn btn-primary">Tambah Data!</button>
			</li>
		</ul>
		
	</form>
	</div>	<!-- tutup kelas bungkus_isi -->
	</div>	<!-- tutup kelas bungkus_utama -->
	</div> <!-- tutup kelas badan -->
</body>
</html>

</div>