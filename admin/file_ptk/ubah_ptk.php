<head>
    <link rel="icon" type="image/png" href="../../logo/logo_sekolah.png">
</head>

<div style="min-width: 1300px;">

<?php $halaman="data_ptk"; include "../path.php";?>  <!-- template  -->

<?php require "function.php" ?>

<?php 

	// Ambil data di URL
	$id = $_GET['id'];

	// query data ptk berdasarkan id
	$p = query("SELECT * FROM data_ptk WHERE id=$id")[0];
	
	$error = false;
	$tidak_berubah=false;
	$error_nip = false;
	$error_nama = false;
	$error_status_pegawai = false;
	$error_jenis_ptk = false;
	$error_jurusan = false;
	$error_tugas_tambahan = false;
	$error_mengajar = false;
	$error_keterangan = false;


	if(isset($_POST["submit"])){
	

		$nip = ($_POST["nip"]);
		$nama = ($_POST["nama"]);							
		$status_pegawai = ($_POST["status_pegawai"]);
		$jenis_ptk = ($_POST["jenis_ptk"]);
		$jurusan = ($_POST["jurusan"]);
		$tugas_tambahan = ($_POST["tugas_tambahan"]);
		$mengajar = ($_POST["mengajar"]);
		$keterangan = ($_POST["keterangan"]);

			if(!preg_match("/^[0-9\-]{18,18}$/", $nip) && !preg_match("/^[-]*$/", $nip)){
				$error_nip = true;				
			}
			if(!preg_match("/^[a-zA-Z\-\.\,\s]*$/", $nama) && !preg_match("/^[-]*$/", $nama)){
				$error_nama = true;
			}
			if($status_pegawai == ""){
				$error_status_pegawai = true;
			}
			if($jenis_ptk == ""){
				$error_jenis_ptk = true;
			}
			if(!preg_match("/^[a-zA-Z\-\s]*$/", $jurusan) && !preg_match("/^[-]*$/", $jurusan)){
				$error_jurusan = true;
			}
			if(!preg_match("/^[a-zA-Z0-9\-\s]*$/", $tugas_tambahan) && !preg_match("/^[-]*$/", $tugas_tambahan)){
				$error_tugas_tambahan = true;
			}
			if($mengajar == ""){
				$error_mengajar = true;
			}
			if(!preg_match("/^[a-zA-Z0-9-_\s]*$/", $keterangan) && !preg_match("/^[-]*$/", $keterangan)){
				$error_keterangan = true;
			}

			
			if($error_nip == false && $error_nama == false && $error_status_pegawai == false && $error_jenis_ptk == false && $error_jurusan == false && $error_tugas_tambahan == false && $error_mengajar == false && $error_keterangan == false){
				// cek apakah data berhasil diubah
				if( ubah_ptk($_POST) > 0){
					echo "
						<script>
							alert('Data Berhasil Diubah!');
							document.location.href = 'data_ptk.php';
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
	<title>Ubah Data  Pendidik dan Tenaga Kependidikan</title>
	<link rel="stylesheet" type="text/css" href="css/ubah_ptk.css">
	<style>
		form ul li input:nth-child(3),form ul li input:nth-child(2) {
			width:850px;
		}
		form ul li label{
			color : rgb(51, 51, 51);
		}
	</style>
</head>
<body>

<div class="badan">
	<div class="judul">
<h1>Ubah Data  Pendidik dan Tenaga Kependidikan</h1>
	</div >

	<div class="bungkus_utama">
	<div class="kembali">
		<a href="data_ptk.php" class="btn btn-info ">
			<i class="fa fa-arrow-left"></i> 
			kembali ke data ptk
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
		<input type="hidden" name="id" value="<?= $p["id"];  ?>">
		<input type="hidden" name="foto_lama" value="<?= $p["foto"];  ?>">
		<ul>
			<li>
				<label for="nip">Nip : </label><br>
					<?php if($error_nip == true) :?>
								<p class="alert alert-danger">hanya angka yang diizinkan dengan panjang 18 karakter</p>
					<?php endif ?>
				<input type="text" name="nip" id="nip" required class="form-control" value="<?= $p["nip"];?>"><br>
			</li>
			<li>
				<label for="nama">Nama : </label><br>
					<?php if($error_nama == true) :?>
								<p class="alert alert-danger">hanya huruf yang diizinkan</p>
					<?php endif ?>
				<input type="text" name="nama" id="nama" required class="form-control" value="<?= $p["nama"];?>"><br>
			</li>
			<li>
				<label for="status_pegawai">status_pegawai : </label><br>
					<?php if($error_status_pegawai == true) :?>
							<p class="alert alert-danger">pilih terlebih dahulu</p>
					<?php endif ?>

					<select name="status_pegawai">
							<option value="<?= $p["status_pegawai"];  ?>"> <?= $p["status_pegawai"];  ?> </option>
							<option value="PNS">1. PNS</option>
							<option value="CPNS">2. CPNS</option>
							<option value="Tenaga Honor Sekolah">3. Tenaga Honor Sekolah</option>
							<option value="Guru Honor Sekolah">4. Guru Honor Sekolah</option>
							<option value="-">5. -</option>
					</select>
					<br><br><br><br>
			</li>
			<li>
				<label for="jenis_ptk">jenis_ptk : </label><br>
					<?php if($error_jenis_ptk == true) :?>
							<p class="alert alert-danger">pilih terlebih dahulu</p>
					<?php endif ?>

					<select name="jenis_ptk">
							<option value="<?= $p["jenis_ptk"];  ?>"> <?= $p["jenis_ptk"];  ?> </option>
							<option value="Kepala Sekolah">1. Kepala Sekolah</option>
							<option value="Guru Kelas">2. Guru Kelas</option>
							<option value="Guru Mapel">3. Guru Mapel</option>
							<option value="Tenaga Administrasi Sekolah">4. Tenaga Administrasi Sekolah</option>
							<option value="-">5. -</option>
					</select>			
			</li>
			<li>
				<label for="jurusan">Jurusan : </label><br>
					<?php if($error_jurusan == true) :?>
							<p class="alert alert-danger">inputan berupa huruf</p>
					<?php endif ?>
				<input type="text" name="jurusan" id="jurusan" required class="form-control" value="<?= $p["jurusan"];?>"><br>
			</li>
			<li>
				<label for="tugas_tambahan">Tugas Tambahan : </label><br>
					<?php if($error_tugas_tambahan == true) :?>
							<p class="alert alert-danger">pilih terlebih dahulu</p>
					<?php endif ?>
				<input type="text" name="tugas_tambahan" id="tugas_tambahan" required class="form-control" value="<?= $p["tugas_tambahan"];?>"><br>
			</li>
			<li>
				<label for="mengajar">mengajar : </label><br>
					<?php if($error_mengajar == true) :?>
							<p class="alert alert-danger">pilih terlebih dahulu</p>
					<?php endif ?>

					<select name="mengajar">
							<option value="<?= $p["mengajar"];  ?>"> <?= $p["mengajar"];  ?> </option>
							<option value="Guru Kelas SD/MI/SLB">1. Guru Kelas SD/MI/SLB</option>
							<option value="Pendidikan Agama Islam">2. Pendidikan Agama Islam</option>
							<option value="Pendidikan Jasmani, Olahraga">3. Pendidikan Jasmani, Olahraga</option>	
							<option value="-">4. -</option>		
					</select>
			</li>
			<li>
				<label for="keterangan">Keterangan : </label><br>
					<?php if($error_keterangan == true) :?>
								<p class="alert alert-danger">tidak boleh ada karakter asing</p>
					<?php endif ?>
				<input type="text" name="keterangan" id="keterangan" required class="form-control" value="<?= $p["keterangan"];?>"><br>
			</li>

			<li>
				<label for="foto">Upload Foto PTK 
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




