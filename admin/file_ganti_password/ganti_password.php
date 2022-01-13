<head>
    <link rel="icon" type="image/png" href="../../logo/logo_sekolah.png">
</head>

<div style="min-width: 1300px;">

<?php $halaman="ganti_password"; include "../path.php";?>  <!-- template  -->

<?php require "function.php" ?>

<?php 
	// cek apakah tombol submit sudah di tekan atau belum
	$error_pas_user = false;
	$error_sama = false;
	$error_panjang = false;
	$error_konfirmasi = false;
	

	if(isset($_POST["submit"])){
		
		$username = $_POST["username"];
		$password_lama = $_POST["password_lama"];
		$password_baru = $_POST["password_baru"];
		$konfirmasi = $_POST["konfirmasi"];

		$result = mysqli_query($conn, "SELECT * FROM admin WHERE password = '$password_lama' and username = '$username'");
		$row = mysqli_fetch_assoc($result);

		echo var_dump($row);

		// cek ada gaknya
		if( $row != null  ){
						// cek apakah password baru sama dengan password lama						
						if($password_baru != $row["password"]){
									// cek panjang dari password baru
									if(strlen($password_baru) >= 8 ){
														// kalau password lamanya bener, cek kesamaan password baru dengan  konfirmasi passwordnya
														if( $password_baru == $konfirmasi){
																ganti_password($_POST);
																	echo "
																		<script>
																				alert('Password Berhasil Diubah!');
																				document.location.href = '../file_dashboard/data_dashboard.php';
																		</script>
																	";
														}
														else
														$error_konfirmasi = true;
									}
									else
									$error_panjang = true;
						}
						else
						$error_sama = true;
		}
		else
		$error_pas_user = true;


	}

 ?>

<!DOCTYPE html>
<html>
<head> 
	<title>Ganti Password</title>
	<link rel="stylesheet" type="text/css" href="css/ganti_password.css">
</head>
<body>

<div class="badan">
	<div class="judul">
<h1>Ganti Password Login Admin</h1>
	</div >

	<div class="bungkus_utama">
		<div class="tips">
		<h5>*tips : gunakan password yang unik dan mudah diingat</h5>
		</div>
	<div class="bungkus_isi">
						<!-- apabila password lama salah -->
							<?php if($error_pas_user):?>
								<p  class="alert alert-danger" style="margin-top:20px;">password / username salah!</p>
							<?php endif ?>

						<!-- apabila mirip dengan password lama -->
							<?php if($error_sama) :?>
								<p  class="alert alert-danger" style="margin-top:20px;">password yang baru tidak boleh sama dengan password yang lama!</p>
							<?php endif ?>

						<!-- apabila panjang password baru < 8 -->
						<?php if($error_panjang) :?>
								<p  class="alert alert-danger" style="margin-top:20px;">panjang password minimal 8 karakter </p>
							<?php endif ?>

						<!-- apabila konfirmasi password baru salah -->
							<?php if($error_konfirmasi) :?>
								<p  class="alert alert-danger" style="margin-top:20px;">Konfirmasi Password Baru Salah!</p>
							<?php endif ?>

	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="username">masukkan username : </label><br>
				<input type="text" name="username" id="username"  class="form-control" required ><br>

			</li>
			<li>
				<label for="password_lama">masukkan password lama : </label><br>
				<input type="password" name="password_lama" id="password_lama"  class="form-control" required ><br>

			</li>
			<li>
				<label for="password_baru">masukkan password baru : </label><br>
				<input type="password" name="password_baru" id="password_baru" class="form-control"  required  ><br>
			</li>
			<li>
				<label for="konfirmasi">masukkan ulang password baru : </label><br>
				<input type="password" name="konfirmasi" id="konfirmasi" class="form-control"  required ><br>
			</li>

			<li>
				<button type="submit" name="submit" class="btn btn-primary">Ganti Password!</button>
			</li>
		</ul>
		
	</form>
	</div>	<!-- tutup kelas bungkus_isi -->
	</div>	<!-- tutup kelas bungkus_utama -->
	</div> <!-- tutup kelas badan -->
</body>
</html>

</div>