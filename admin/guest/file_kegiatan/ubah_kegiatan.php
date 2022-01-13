<head>
    <link rel="icon" type="image/png" href="../../logo/logo_sekolah.png">
</head>

<div style="min-width: 1300px;">

<?php $halaman="data_kegiatan"; include "../path.php";?>  <!-- template  -->

<?php require "function.php" ?>

<?php 

	// Ambil data di URL
	$id = $_GET['id'];

	// query data kegiatan berdasarkan id
	$prs = query("SELECT * FROM data_kegiatan WHERE id=$id")[0];
	
	$error = false;
	$tidak_berubah=false;
	$error_nama = false;
	$error_isi = false;


	if(isset($_POST["submit"])){
	

		$nama = ($_POST["nama"]);
		$isi = ($_POST["isi"]);							

			if(!preg_match("/^[a-zA-Z0-9\W\s_-]{8,100}$/", $nama)){
				$error_nama = true;
				
			}
			if(!preg_match("/^[a-zA-Z0-9\W\s_-]{15,1000}$/", $isi)){
				$error_isi = true;
			}

			
			if($error_nama == false && $error_isi == false ){
				// cek apakah data berhasil diubah
				if( ubah_kegiatan($_POST) > 0){
					echo "
						<script> 
							alert('Data Berhasil Diubah!');
							document.location.href = 'data_kegiatan.php';
						</script>
					";
				}else
					$tidak_berubah=true;

			}else
				$error = true;
	}

?>

<!DOCTYPE html>
<html>
<head> 
	<title>Ubah Data kegiatan</title>
	<link rel="stylesheet" type="text/css" href="css/ubah_kegiatan.css">
</head>
<body>

<div class="badan">
	<div class="judul">
<h1>Ubah Data kegiatan</h1>
	</div >

	<div class="bungkus_utama">
	<div class="kembali">
		<a href="data_kegiatan.php" class="btn btn-info ">
			<i class="fa fa-arrow-left"></i> 
			kembali ke data kegiatan
		</a>
	</div>
					<!-- data harus diubah dulu -->
					<br><br>
						<?php if($tidak_berubah == true) :?>
								<p class="alert alert-danger"><b>Ubah Data Terlebih dahulu !!</b></p>
						<?php endif ?>
					<!-- periksa jenis karakter inputan -->
					<br><br>
						<?php if($error == true) :?>
								<p class="alert alert-danger"><b>periksa kembali jenis karakter yang diinput/dipilih</b></p>
						<?php endif ?>
	<div class="bungkus_isi">
	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $prs["id"];  ?>">
		<input type="hidden" name="foto_lama" value="<?= $prs["foto"];  ?>">
		<ul>
			<li>
				<label for="nama">nama kegiatan: </label><br>
					<?php if($error_nama == true) :?>
								<p class="alert alert-danger">nama kegiatan terlalu pendek</p>
					<?php endif ?>
				<input type="text" name="nama" id="nama"  class="form-control" required  value="<?= $prs["nama"];  ?>"><br>

			</li>

			<li>
				<label for="isi">isi kegiatan : </label><br>
					<?php if($error_isi == true) :?>
							<p class="alert alert-danger">isi kegiatan terlalu pendek</p>
					<?php endif ?>
				<input type="text" name="isi" id="isi"  class="form-control" required  value="<?= $prs["isi"];  ?>"><br>

			</li>

			<li>
				<label for="foto">Upload Foto kegiatan 
							<span>(file jpeg/jpg/png)</span> 
				</label><br>
				<input type="file" name="foto" id="foto">
				<h5>maksimal ukuran gambar 2 MB!</h5><br>
			</li>
			<li>
				<button type="submit" name="submit" class="btn btn-primary">Ubah Data!</button>
			</li>
		</ul>
		
	</form>
	</div>	<!-- tutup kelas bungkus_isi -->
	</div>	<!-- tutup kelas bungkus_utama -->
	</div> <!-- tutup kelas badan -->
</body>
</html>

</div>




