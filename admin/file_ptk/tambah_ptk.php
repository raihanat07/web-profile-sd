<head>
    <link rel="icon" type="image/png" href="../../logo/logo_sekolah.png">
</head>

<div style="min-width: 1300px;">

<?php $halaman="data_ptk"; include "../path.php";?>  <!-- template  -->

<?php require "function.php" ?>

<?php 
		$error = false;
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
	
				if(!preg_match("/^[0-9]{18,18}$/", $nip)  && !preg_match("/^[-]*$/", $nip)){
					$error_nip = true;				
				}
				if(!preg_match("/^[a-zA-Z\.\,\s]*$/", $nama)  && !preg_match("/^[-]*$/", $nama)){
					$error_nama = true;
				}
				if($status_pegawai == ""){
					$error_status_pegawai = true;
				}
				if($jenis_ptk == ""){
					$error_jenis_ptk = true;
				}
				if(!preg_match("/^[a-zA-Z\s]*$/", $jurusan)  && !preg_match("/^[-]*$/", $jurusan)){
					$error_jurusan = true;
				}
				if(!preg_match("/^[a-zA-Z0-9\s]*$/", $tugas_tambahan)  && !preg_match("/^[-]*$/", $tugas_tambahan)){
					$error_tugas_tambahan = true;
				}
				if($mengajar == ""){
					$error_mengajar = true;
				}
				if(!preg_match("/^[a-zA-Z0-9-_\s]*$/", $keterangan)  && !preg_match("/^[-]*$/", $keterangan)){
					$error_keterangan = true;
				}

				
				if($error_nip == false && $error_nama == false && $error_status_pegawai == false && $error_jenis_ptk == false && $error_jurusan == false && $error_tugas_tambahan == false && $error_mengajar == false && $error_keterangan == false){
					// cek apakah data berhasil ditambahkan
					if( tambah_ptk($_POST) > 0){
						echo "
							<script> 
								alert('Data Berhasil Ditambahkan!');
								document.location.href = 'data_ptk.php';
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
	<title>Tambah data Pendidik dan Tenaga Kependidikan</title>
	<link rel="stylesheet" type="text/css" href="css/tambah_ptk.css">
	<style>
		form ul li input:nth-child(3),form ul li input:nth-child(2) {
			width:850px;
		}
		form ul li label{
			color : rgb(51, 51, 51);
			/* font-size: 100px; */
		}
	</style>
</head>
<body>

<div class="badan">
	<div class="judul">
<h1>Tambah Data  Pendidik dan Tenaga Kependidikan</h1>
	</div >

	<div class="bungkus_utama">
	<div class="kembali">
		<a href="data_ptk.php" class="btn btn-info ">
			<i class="fa fa-arrow-left"></i> 
			kembali ke data ptk
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
				<label for="nip">nip : </label><br>
					<?php if($error_nip == true) :?>
								<p class="alert alert-danger">hanya angka yang diizinkan dengan panjang 18 karakter</p>
					<?php endif ?>
				<input type="text" name="nip" id="nip" required class="form-control" 
					<?php if(isset($_POST["submit"])){ 
						 if($error_nip==false){?>
					 		 value="<?= $nip; ?>" 
					<?php }}?>
				>
				<br>
			</li>
			<li>
				<label for="nama">nama pegawai : </label><br>
					<?php if($error_nama == true) :?>
								<p class="alert alert-danger">hanya huruf yang diizinkan</p>
					<?php endif ?>
				<input type="text" name="nama" id="nama" required class="form-control" 
					<?php if(isset($_POST["submit"])){ 
						 if($error_nama==false){?>
					 		 value="<?= $nama; ?>" 
					<?php }}?>
				>
				<br>
			</li>
			<li>
				<label for="status_pegawai">status_pegawai : </label><br>
					<?php if($error_status_pegawai == true) :?>
							<p class="alert alert-danger">pilih terlebih dahulu</p>
					<?php endif ?>

					<select name="status_pegawai">
							<option value="">--Pilih status_pegawai--</option>
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
							<option value="">--Pilih jenis_ptk--</option>
							<option value="Kepala Sekolah">1. Kepala Sekolah</option>
							<option value="Guru Kelas">2. Guru Kelas</option>
							<option value="Guru Mapel">3. Guru Mapel</option>
							<option value="Tenaga Administrasi Sekolah">4. Tenaga Administrasi Sekolah</option>
							<option value="-">5. -</option>
					</select>					
			</li>
			<br><br><br><br>
			<li>
				<label for="jurusan">Jurusan : </label><br>
					<?php if($error_jurusan == true) :?>
							<p class="alert alert-danger">inputan berupa huruf</p>
					<?php endif ?>
					<input type="text" name="jurusan" id="jurusan" required class="form-control" 
					<?php if(isset($_POST["submit"])){ 
						 if($error_jurusan==false){?>
					 		 value="<?= $jurusan; ?>" 
					<?php }}?>
				>
				<br>
			</li>
			<li>
				<label for="tugas_tambahan">tugas tambahan : </label><br>
					<?php if($error_tugas_tambahan == true) :?>
							<p class="alert alert-danger">pilih terlebih dahulu</p>
					<?php endif ?>

					<input type="text" name="tugas_tambahan" id="tugas_tambahan" required class="form-control" 
					<?php if(isset($_POST["submit"])){ 
						 if($error_tugas_tambahan==false){?>
					 		 value="<?= $tugas_tambahan; ?>" 
					<?php }}?>
				>
				<br>
			</li>
			<li>
				<label for="mengajar">mengajar : </label><br>
					<?php if($error_mengajar == true) :?>
							<p class="alert alert-danger">pilih terlebih dahulu</p>
					<?php endif ?>

					<select name="mengajar">
							<option value="">--Pilih mengajar--</option>
							<option value="Guru Kelas SD/MI/SLB">1. Guru Kelas SD/MI/SLB</option>
							<option value="Pendidikan Agama Islam">2. Pendidikan Agama Islam</option>
							<option value="Pendidikan Jasmani, Olahraga">3. Pendidikan Jasmani, Olahraga</option>	
							<option value="-">4. -</option>		
					</select>
			</li>
			<br><br>
			<li>
				<label for="keterangan">keterangan  : </label><br>
					<?php if($error_keterangan == true) :?>
								<p class="alert alert-danger">tidak boleh ada karakter asing</p>
					<?php endif ?>
				<input type="text" name="keterangan" id="keterangan" required class="form-control" 
					<?php if(isset($_POST["submit"])){ 
						 if($error_keterangan==false){?>
					 		 value="<?= $keterangan; ?>" 
					<?php }}?>
				>
				<br>
			</li>

			<li>
				<label for="foto">Upload Foto PTK 
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