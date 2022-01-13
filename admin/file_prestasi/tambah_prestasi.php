<head>
    <link rel="icon" type="image/png" href="../../logo/logo_sekolah.png">
</head>

<div style="min-width: 1300px;">

<?php $halaman="data_prestasi"; include "../path.php";?>  <!-- template  -->

<?php require "function.php" ?>

<?php 
		$error = false;
		$error_judul = false;
		$error_keterangan = false;
		$error_tahun = false;

	
		if(isset($_POST["submit"])){
		
	
			$judul = ($_POST["judul"]);
			$keterangan = ($_POST["keterangan"]);
			$tahun = ($_POST["tahun"]);

			
	
	
				if(!preg_match("/^[a-zA-Z0-9\W\s_-]{8,100}$/", $judul)){
					$error_judul = true;
					
				}
				if(!preg_match("/^[a-zA-Z0-9\W\s_-]{15,1000}$/", $keterangan)){
					$error_keterangan = true;
				}
				if($tahun == ""){
					$error_tahun = true;
				}
				
				if($error_judul == false && $error_keterangan == false && $error_tahun == false ){
					// cek apakah data berhasil ditambahkan
					if( tambah_prestasi($_POST) > 0){
						echo "
							<script> 
								alert('Data Berhasil Ditambahkan!');
								document.location.href = 'data_prestasi.php';
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
	<title>Tambah Data Mahasiswa</title>
	<link rel="stylesheet" type="text/css" href="css/tambah_prestasi.css">
</head>
<body>

<div class="badan">
	<div class="judul">
<h1>Tambah Data Prestasi</h1>
	</div >

	<div class="bungkus_utama">
	<div class="kembali">
		<a href="data_prestasi.php" class="btn btn-info ">
			<i class="fa fa-arrow-left"></i> 
			kembali ke data prestasi
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
				<label for="keterangan">Keterangan : </label><br>
					<?php if($error_keterangan == true) :?>
							<p class="alert alert-danger">keterangan terlalu pendek</p>
					<?php endif ?>
				<textarea type="text" name="keterangan" id="keterangan" required class="form-control" cols="1" rows="5"
					<?php if(isset($_POST["submit"])){ 
						 if($error_keterangan==false){?>
					 		 value="<?= $keterangan; ?>" 
					<?php }}?>
				></textarea><br>
			</li>
			<li>
				<label for="tahun">Tahun : </label><br>
					<?php if($error_tahun == true) :?>
							<p class="alert alert-danger">pilih terlebih dahulu</p>
					<?php endif ?>

					<select name="tahun" >
						<option value="">--pilih tahun--</option>
						<?php  $thn = floor((time()/(365*24*60*60))+1970) ;
								for($a=$thn; $a>=1970; $a--){							
						?>
						     <option value=<?= $a; ?>> <?= $a; }?></option>
						
					</select>
				
			</li>
			<br><br>
			<li>
				<label for="foto">Upload Foto Prestasi 
							<span>(file jpeg/jpg/png)</span>
				</label><br>
				<input type="file" name="foto" id="foto"><br>
				<h5>maksimal ukuran gambar 2 MB!</h5><br>
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