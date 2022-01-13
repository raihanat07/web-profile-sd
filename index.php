
<?php 
	// function
	include'function/function_index.php';   

	$berita = query("SELECT * FROM 	data_berita ORDER BY  id DESC LIMIT 1")[0];
	$kegiatan = query("SELECT * FROM 	data_kegiatan ORDER BY  id DESC LIMIT 1")[0];

	// cek apakah tombol kirim saran ditekan
	if(isset($_POST["submit"])){
		// cek apakah data berhasil dikirim
		if(tambah_kritik($_POST)){
			echo "
				<script>
					alert('Kritik dan Saran Berhasil dikirimkan');
				</script>
			";
		}
		else{
			echo "
				<script>
						alert('kritik dan saran gagal dikirimkan');
				</script>
			";
		}
	}

?>






<!DOCTYPE html>
<head>
    <link rel="icon" type="image/png" href="logo/logo_sekolah.png">
</head>
<div style="min-width: 1350px;">
<head>
	<title>Website UPTD SDN 01 Sungai Rimbang</title>
	<link rel="stylesheet" type="text/css" href="css_profil/css/style_index.css?v=2.1">
	<link rel="stylesheet" type="text/css" href="css_profil/template/style_header.css">
	<link rel="stylesheet" type="text/css" href="css_profil/template/style_footer.css?v=2.1">
	
<!-- CSS untuk nama judul halaman -->
<style> 
.header nav a:nth-child(1){
	color: yellow;
	text-decoration: none;
	background-color:rgb(8, 81, 150);
	margin-top: -15px;
	padding:10px 15px 0;
	height: 40px;
	transform: translate(0,-5px);
	box-shadow:  0px 3px .5px rgb(37, 37, 37),
				inset 0px 4px  yellow,
				inset .3px 0px .5px rgb(37, 37, 37),
				inset -.3px 0px .5px rgb(37, 37, 37);}
</style>
</head>


<body>
	
<?php include'css_profil/template/header.php';?>  <!-- header -->
	
	<div class="gambar_depan">
			<div class="isi_gambar_depan">
					<h2>Selamat Datang Di Website </h2>
					<h3>UPTD SDN 01 Sungai Rimbang</h3>
					<div class="tombol">
							<a href="visi_misi.php"><h1>Visi & Misi</h1></a>
					</div>
			</div>
		<h5>Alamat : Tanah Tingkah, Sungai Rimbang, Kecamatan Suliki, Kabupaten Lima Puluh kota, Provinsi Sumatera Barat </h2>	
		<img src="gambar/sekolah.jpg" alt="">
		
		
	</div>
	
	<!-- ini sambutan -->
	<div class="container1">
		<div class="kata_sambutan">  
				<h1>Kata Sambutan Kepala Sekolah</h1>
				<div class="isi_sambutan">
					<table>
						<td>
							<img src="gambar/masgeni.jpg" alt="foto kepala sekolah">
							<h2>Masgeni.D, S.Pd</h2>
						</td>
						<td>
							<p>
							Assalamualaikum Warahmatullahi Wabarakatuh, Di sini kami mengajak anda para orang tua siswa untuk berpartisipasi membangun masyarakat pembelajar dalam rangka menyongsong era baru bagi anak-anak kita dan menjadikan anak-anak kita generasi yang mampu berkompetisi tanpa kehilangan wajah budaya dan moral. Memasuki pergaulan global yang penuh dengan kompetisi ini, kita perlu menyiapkan mental anak-anak kita agar mampu bersaing dengan baik dengan memiliki moral/adab islami, kemandirian, kecerdasan, juga tentunya kreatifitas-inovasi sesuai tumbuh kembangnya. Di UPTD SDN 01 Sungai Rimbang setiap siswa memiliki hak untuk berprestasi dan mendapatkan pelayanan yang baik. Karena kami memandang ini semua adalah amanah yang akan kami pertanggung jawabkan di hadapan Allah SWT. Tentu hal ini semakin terasa mudah dengan adanya kerjasama dari para orang tua siswa dalam menjalankan program sekolah. Sebagai penutup, sekali lagi kami ucapkan selamat datang di UPTD SDN 01 Sungai Rimbang. Marilah bekerjasama agar anak-anak kita dapat berkembang dengan baik sehingga tumbuh menjadi generasi yang berakhlakul karimah dan cerdas.
							</p>
						</td>

					</table>
				</div>
		</div>
	</div>


	<!-- ini berita -->
	<div class="container2">
		<div class="berita">  
				<h1>Berita Terkini !</h1>
				<div class="isi_berita">
						
							<h2><?= $berita["judul"];?></h2>
							<h3> oleh Admin | <?= $berita["tanggal_upload"]; ?> </h3>

							<div class="garis"></div>

							<p><?= $berita["isi"]?></p>

							<div class="garis"></div>
							<div class="button">
								<a href="berita.php"><h4>Berita Lainnya</h4></a>
							</div>
				</div>

		</div>
	</div>

	<!-- ini kegiatan -->
	<div class="container3">
		<div class="kegiatan">  
				<h1>kegiatan Terbaru</h1>
				<div class="isi_kegiatan">
					
							
								<img src="admin/file_kegiatan/gambar/<?= $kegiatan["foto"] ?>" alt="kegiatan" width=400>
							
								<!-- isi kegiatan -->
								<h2><?= $kegiatan["nama"];?></h2>
								<h3> oleh Admin | <?= $kegiatan["tanggal_kegiatan"]; ?> </h3>

								<div class="garis"></div>

								<p><?= $kegiatan["isi"]?></p>
								<div class="garis"></div>
								<div class="clear"></div>
								<div class="button">
									<a href="kegiatan.php"><h4>Kegiatan Lainnya</h4></a>
								</div>
								
						
					
				</div>
		</div>
	</div>

	<!-- Lokasi dan kritik -->
	<div class="container4">
			<!-- lokasi -->
			<div class="container_lokasi">
						<div class="google_maps">			
									<span>
											<img src="gambar/lokasi_maps.png" alt="">
											<h1>Lokasi Sekolah</h1>
									</span>		
											<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127673.99239852658!2d100.4672136585315!3d-0.0998439577248237!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd550ede6f547b1%3A0x9fda27b65f22e8ba!2sSD%20N%2002%20Sungai%20Rimbang!5e0!3m2!1sid!2sid!4v1600528177903!5m2!1sid!2sid" width="450" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
									<h3>*note : nama sekolah di google maps belum diupdate</h3>	
						</div>
			</div>


			<!-- kritik dan saran -->
			<div class="container_kritik">
						<div class="kritik">
						<img src="logo/logo_email.ico" alt="">
							<h1> Kritik dan Saran</h1>
							<form action="" method="post">
								<table>
										<tr>
											<td><label> Email  </label></td>
											<td> : </td>
											<td><input type="email" name="email" id="email" autocomplete="off" required></td>
										</tr>
											<tr></tr>
										<tr>
											<td><label> Kritik dan Saran </label></td>
											<td> : </td>
											<td><textarea type="text" name="isi"" id="isi" required></textarea></td>		
										</tr>
								</table>
								<button type="submit" name="submit" class="kirim">Kirim!</button>
							</form>

						</div>
			</div>

		<div class="clear"></div>
	</div>
	

	
</body>

<?php include'css_profil/template/footer.php';?>  <!-- footer -->

</div>
 



