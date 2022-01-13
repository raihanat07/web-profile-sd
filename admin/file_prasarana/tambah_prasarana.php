<head>
    <link rel="icon" type="image/png" href="../../logo/logo_sekolah.png">
</head>

<div style="min-width: 1300px;">

<?php $halaman="data_prasarana"; include "../path.php";?>  <!-- template  -->

<?php require "function.php" ?>

<?php 
	$error = false;
	$error_nama = false;
	$error_panjang = false;
	$error_lebar = false;
	$error_kerusakan = false;
	$error_keterangan = false;

	if(isset($_POST["submit"])){
	

		$nama = ($_POST["nama"]);
		$panjang = ($_POST["panjang"]);
		$lebar = ($_POST["lebar"]);
		$kerusakan = ($_POST["kerusakan"]);
		$keterangan = ($_POST["keterangan"]);


			if(!preg_match("/^[a-zA-Z0-9\W\s_-]{3,100}$/", $nama)){
				$error_nama = true;
				
			}
			if(!preg_match("/^[0-9]*$/", $panjang)){
				$error_panjang = true;
			}
			if(!preg_match("/^[0-9]*$/", $kerusakan) || $kerusakan >100 || $kerusakan <0){
				$error_kerusakan = true;
			}
			if(!preg_match("/^[0-9]*$/", $lebar)){
				$error_lebar = true;
			}
			if( $keterangan == "/^[a-zA-Z0-9\W\s_-]{3,100}$/"){
				$error_keterangan = true;
			}

if($error_nama == false && $error_panjang == false && $error_kerusakan == false && $error_keterangan == false && $error_lebar == false){

			// cek apakah data berhasil ditambahkan
			if( tambah_prasarana($_POST) > 0){
				echo "
					<script> 
						alert('Data Berhasil Ditambahkan!');
						document.location.href = 'data_prasarana.php';
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
	<title>Tambah Data prasarana</title>
	<link rel="stylesheet" type="text/css" href="css/tambah_prasarana.css">
</head>
<body>

<div class="badan">
	<div class="judul">
<h1>Tambah Data prasarana</h1>
	</div >

	<div class="bungkus_utama">
	<div class="kembali">
		<a href="data_prasarana.php" class="btn btn-info ">
			<i class="fa fa-arrow-left"></i> 
			kembali ke data prasarana
		</a>
	</div>
						<!-- periksa jenis karakter inputan -->
						<br><br>
						<?php if($error == true) :?>
								<p class="alert alert-danger"><b>periksa kembali jenis karakter yang diinput/dipilih</b></p>
						<?php endif ?>
	<div class="bungkus_isi">
	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="nama">nama prasarana : </label><br>
					<?php if($error_nama == true) :?>
							<p class="alert alert-danger">tidak boleh ada karakter asing</p>
					<?php endif ?>
				<input type="text" name="nama" id="nama"  class="form-control" required 
					<?php if(isset($_POST["submit"])){ 
						 if($error_nama==false){?>
					 		 value="<?= $nama; ?>" 
					<?php }}?>
				><br>

			</li>
			<li>
				<label for="panjang">panjang (m) : </label><br>
					<?php if($error_panjang == true) :?>
							<p class="alert alert-danger">hanya inputan angka yang diizinkan</p>
					<?php endif ?>
				<input type="text" name="panjang" id="panjang"  class="form-control" required 
					<?php if(isset($_POST["submit"])){ 
						 if($error_panjang==false){?>
					 		 value="<?= $panjang; ?>" 
					<?php }}?>
				><br>
			</li>
			<li>
				<label for="lebar">lebar (m) : </label><br>
					<?php if($error_lebar == true) :?>
							<p class="alert alert-danger">hanya inputan angka yang diizinkan</p>
					<?php endif ?>
				<input type="text" name="lebar" id="lebar"  class="form-control" required 
					<?php if(isset($_POST["submit"])){ 
						 if($error_lebar==false){?>
					 		 value="<?= $lebar; ?>" 
					<?php }}?>
				><br>
			</li>
			<li>
				<label for="kerusakan">kerusakan (%) : </label><br>
					<?php if($error_kerusakan == true) :?>
							<p class="alert alert-danger">hanya inputan angka dengan rentang 0-100 yang diizinkan</p>
					<?php endif ?>
				<input type="text" name="kerusakan" id="kerusakan"  class="form-control" required 
					<?php if(isset($_POST["submit"])){ 
						 if($error_kerusakan==false){?>
					 		 value="<?= $kerusakan; ?>" 
					<?php }}?>
				><br>
			</li>
			<li>
				<label for="keterangan">keterangan : </label><br>
					<?php if($error_keterangan == true) :?>
							<p class="alert alert-danger">tidak boleh ada karakter asing</p>
					<?php endif ?>
				<input type="text" name="keterangan" id="keterangan"  class="form-control" required 
					<?php if(isset($_POST["submit"])){ 
						 if($error_keterangan==false){?>
					 		 value="<?= $keterangan; ?>" 
					<?php }}?>
				><br>
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