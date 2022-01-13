<head>
    <link rel="icon" type="image/png" href="../../logo/logo_sekolah.png">
</head>

<div style="min-width: 1300px;">

<?php $halaman="data_berita"; include "../path.php";?>  <!-- template  -->

<?php require "function.php" ?>

<?php 
		$error = false;
		$error_judul = false;
		$error_isi = false;

	
		if(isset($_POST["submit"])){
		
	
			$judul = ($_POST["judul"]);
			$isi = ($_POST["isi"]);							
	
				if(!preg_match("/^[a-zA-Z0-9\W\s_-]{8,100}$/", $judul)){
					$error_judul = true;
					
				}
				if(!preg_match("/^[a-zA-Z0-9\W\s_-]{15,1000}$/", $isi)){
					$error_isi = true;
				}

				
				if($error_judul == false && $error_isi == false ){
					// cek apakah data berhasil ditambahkan
					if( tambah_berita($_POST) > 0){
						echo "
							<script> 
								alert('Data Berhasil Ditambahkan!');
								document.location.href = 'data_berita.php';
							</script>
						";
					}

				}else
					$error = true;
		}

 ?>

<!DOCTYPE html>
<html>
<head> 
	<title>Tambah Data berita</title>
	<link rel="stylesheet" type="text/css" href="css/tambah_berita.css">
</head>
<body>

<div class="badan">
	<div class="judul">
<h1>Tambah Data berita</h1>
	</div >

	<div class="bungkus_utama">
	<div class="kembali">
		<a href="data_berita.php" class="btn btn-info ">
			<i class="fa fa-arrow-left"></i> 
			kembali ke data berita
		</a>
	</div>
					<br><br>
					<?php if($error == true) :?>
							<p class="alert alert-danger"><b>periksa kembali data inputan </b></p>
					<?php endif ?>
	<div class="bungkus_isi">
	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="judul">Judul : </label><br>
					<?php if($error_judul == true) :?>
								<p class="alert alert-danger">judul terlalu pendek</p>
					<?php endif ?>
				<input type="text" name="judul" id="judul" required class="form-control" 
					<?php if(isset($_POST["submit"])){ 
						 if($error_judul==false){?>
					 		 value="<?= $judul; ?>" 
					<?php }}?>
				>
				<br>

			</li>
			<li>
				<label for="isi">Isi : </label><br>
					<?php if($error_isi == true) :?>
								<p class="alert alert-danger">isi terlalu pendek</p>
					<?php endif ?>
				<input type="text" name="isi" id="isi" required class="form-control" 
					<?php if(isset($_POST["submit"])){ 
						 if($error_isi==false){?>
					 		 value="<?= $isi; ?>" 
					<?php }}?>
				>

				<br>
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