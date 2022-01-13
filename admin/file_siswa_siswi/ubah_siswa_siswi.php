<head>
    <link rel="icon" type="image/png" href="../../logo/logo_sekolah.png">
</head>

<div style="min-width: 1300px;">

<?php $halaman="data_siswa_siswi"; include "../path.php";?>  <!-- template  -->

<?php require "function.php" ?>

<?php 

	// Ambil data di URL
	$id = $_GET['id'];

	// query data siswa_siswi berdasarkan id
	$prs = query("SELECT * FROM data_siswa_siswi WHERE id=$id")[0];
	
	$error = false;
	$tidak_berubah=false;

	// cek apakah tombol submit sudah di tekan atau belum
	if(isset($_POST["submit"])){

			$laki_laki = trim($_POST['laki_laki']);
			$perempuan = trim($_POST['perempuan']);
            // validasi input data
            if(preg_match("/^[0-9]*$/", $laki_laki) && preg_match("/^[0-9]*$/", $perempuan)){
                			// cek apakah data berhasil diubah
							if( ubah_siswa_siswi($_POST) > 0){
								echo "
									<script> 
										alert('Data Berhasil Diubah!');
										document.location.href = 'data_siswa_siswi.php';
									</script>
								";
							}else
								$tidak_berubah = true;
								
							

            }
			else{
				$error = true;
			}
        
			
	}

 ?>

<!DOCTYPE html>
<html>
<head> 
	<title>Ubah Data siswa_siswi</title>
	<link rel="stylesheet" type="text/css" href="css/ubah_siswa_siswi.css">
	<style>
		form ul li  {
			width:600px;
			/* background-color:blue; */
	}
	</style>
</head>
<body>

<div class="badan">
	<div class="judul">
<h1>Ubah Data siswa siswi</h1>
	</div >

	<div class="bungkus_utama">
	<div class="kembali">
		<a href="data_siswa_siswi.php" class="btn btn-info ">
			<i class="fa fa-arrow-left"></i> 
			kembali ke data siswa siswi
		</a>
	</div>
					<!-- data harus diubah dulu -->
					<br><br>
						<?php if($tidak_berubah == true) :?>
								<p class="alert alert-danger"><b>Ubah Data Terlebih dahulu !!</b></p>
						<?php endif ?>
					<br>
					<!-- inputan harus angka -->
					<?php if($error == true) :?>
							<p class="alert alert-danger"><b>inputan harus berupa angka !!</b></p>
					<?php endif ?>

	<div class="bungkus_isi">
	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $prs["id"];  ?>">
		<ul>
			<li>
				<label for="kelas">kelas : </label><br>
				<h1><?= $prs["kelas"];  ?></h1>
				<br>

			</li>
			<li>
				<label for="laki_laki">laki laki : </label><br>
				<input type="text" name="laki_laki" id="laki_laki" class="form-control"  required   value="<?= $prs["laki_laki"];  ?>"><br>
			</li>
			<li>
				<label for="perempuan">perempuan : </label><br>
				<input type="text" name="perempuan" id="perempuan" class="form-control" required  value="<?= $prs["perempuan"];  ?>"><br>
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





