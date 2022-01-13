<head>
    <link rel="icon" type="image/png" href="../../logo/logo_sekolah.png">
</head>

<div style="min-width: 1300px;">

<?php $halaman="data_sarana"; include "../path.php";?>  <!-- template  -->

<?php require "function.php" ?>

<?php 
	$error = false;
	$error_jenis = false;
	$error_letak = false;
	$error_kepemilikan = false;
	$error_jumlah = false;
	$error_status = false;

	if(isset($_POST["submit"])){
	

		$jenis = ($_POST["jenis"]);
		$letak = ($_POST["letak"]);
		$kepemilikan = ($_POST["kepemilikan"]);
		$jumlah = ($_POST["jumlah"]);
		$status = ($_POST["status"]);


			if(!preg_match("/^[a-zA-Z0-9\W\s_-]{2,100}$/", $jenis)){
				$error_jenis = true;
				
			}
			if(!preg_match("/^[a-zA-Z0-9\W\s_-]{4,100}$/", $letak)){
				$error_letak = true;
			}
			if(!preg_match("/^[0-9]*$/", $jumlah)){
				$error_jumlah = true;
			}
			if( $kepemilikan == ""){
				$error_kepemilikan = true;
			}
			if( $status == ""){
				$error_status = true;
			}

if($error_jenis == false && $error_letak == false && $error_jumlah == false && $error_status == false && $error_kepemilikan == false){
			// cek apakah data berhasil ditambahkan
			if( tambah_sarana($_POST) > 0){
				echo "
					<script> 
						alert('Data Berhasil Ditambahkan!');
						document.location.href = 'data_sarana.php';
					</script>
				";
			}			
		}
			else
			   $error = true;
	}

 ?>

<!DOCTYPE html>
<html>
<head> 
	<title>Tambah Data sarana</title>
	<link rel="stylesheet" type="text/css" href="css/tambah_sarana.css">
</head>
<body>

<div class="badan">
	<div class="judul">
<h1>Tambah Data sarana</h1>
	</div >

	<div class="bungkus_utama">
	<div class="kembali">
		<a href="data_sarana.php" class="btn btn-info ">
			<i class="fa fa-arrow-left"></i> 
			kembali ke data sarana
		</a>
	</div>
					<br><br>
					<?php if($error == true) :?>
							<p class="alert alert-danger"><b>periksa kembali jenis karakter yang diinput/dipilih</b></p>
					<?php endif ?>

	<div class="bungkus_isi">
	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="jenis">nama : </label><br>
					<?php if($error_jenis == true) :?>
							<p class="alert alert-danger">panjang karakter minimal 2 karakter</p>
					<?php endif ?>
				<input type="text" name="jenis" id="jenis"  class="form-control" required 
					<?php if(isset($_POST["submit"])){ 
						 if($error_jenis==false){?>
					 		 value="<?= $jenis; ?>" 
					<?php }}?>
				><br>

			</li>
			<li>
				<label for="letak">posisi : </label><br>
					<?php if($error_letak == true) :?>
							<p class="alert alert-danger">panjang karakter minimal 4 karakter</p>
					<?php endif ?>
				<input type="text" name="letak" id="letak" class="form-control"  required  
					<?php if(isset($_POST["submit"])){ 
						 if($error_letak==false){?>
					 		 value="<?= $letak; ?>" 
					<?php }}?>
				><br>
			</li>
			<li>
				<label for="kepemilikan">kepemilikan : </label><br>
					<?php if($error_kepemilikan == true) :?>
							<p class="alert alert-danger">pilih terlebih dahulu</p>
					<?php endif ?>

					<select name="kepemilikan">
							<option value="">--Pilih Kepemilikan--</option>
							<option value="Milik">1. Milik</option>
							<option value="Bukan Milik">2. Bukan Milik</option>
					</select>
			</li>
			<br><br>
			<li>
				<label for="jumlah">jumlah : </label><br>
					<?php if($error_jumlah == true) :?>
							<p class="alert alert-danger">inputan harus berupa angka</p>
					<?php endif ?>
				<input type="text" name="jumlah" id="jumlah" class="form-control"  required  
					<?php if(isset($_POST["submit"])){ 
						 if($error_jumlah==false){?>
					 		 value="<?= $jumlah; ?>" 
					<?php }}?>
				><br>
			</li>
			<li>
				<label for="status">status : </label><br>
					<?php if($error_status == true) :?>
							<p class="alert alert-danger">pilih salah satu</p>
					<?php endif ?>

					<select name="status">
							<option	value="">--Pilih status--</option>
							<option value="Laik">1. Laik</option>
							<option value="Tidak Laik">2. Tidak Laik</option>
					</select>

			</li>
			<br><br>
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