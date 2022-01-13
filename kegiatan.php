<?php
	include'function/function_index.php';   
    
    $kegiatan = query("SELECT * FROM  data_kegiatan ORDER BY  id DESC ");

?>

<!DOCTYPE html>
<head>
    <link rel="icon" type="image/png" href="logo/logo_sekolah.png">
</head>
<div style="min-width: 1350px;">
<head>
	<!-- <link rel="icon" type="image/png" href="logo/logo_sekolah.png">  -->
	<title>Website UPTD SDN 01 Sungai Rimbang</title>
	<link rel="stylesheet" type="text/css" href="css_profil/css/style_kegiatan.css?v=1.1">
	<link rel="stylesheet" type="text/css" href="css_profil/template/style_header.css">
	<link rel="stylesheet" type="text/css" href="css_profil/template/style_footer.css">
<!-- CSS untuk nama judul halaman -->
<style> 
	.header nav a:nth-child(5){
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

    <div class="judul">
        <h1>KEGIATAN</h1>
    </div>
    
	<div class="container">
        <!-- ini berita -->
        <?php foreach($kegiatan as $row) : ?>
            <!-- ini kegiatan -->
	<div class="container3">
		<div class="kegiatan">  
               <div class="isi_kegiatan">
				
					
							
								<img src="admin/file_kegiatan/gambar/<?= $row["foto"] ?>" alt="kegiatan" width=400>
							
								<!-- isi kegiatan -->
								<h2><?= $row["nama"];?></h2>
								<h3> oleh Admin | <?= $row["tanggal_kegiatan"]; ?> </h3>

								<div class="garis"></div>

								<p><?= $row["isi"]?></p>
								<div class="garis"></div>
								<div class="clear"></div>																			
					
				</div>
		</div>
	</div>




        <?php endforeach ?>
    

	</div>
</body>

<?php include'css_profil/template/footer.php';?>  <!-- footer -->

 
</div>


