<?php
	include'function/function_index.php';   
    
    $berita = query("SELECT * FROM 	data_berita ORDER BY  id DESC ");

?>

<!DOCTYPE html>
<head>
    <link rel="icon" type="image/png" href="logo/logo_sekolah.png">
</head>
<div style="min-width: 1350px;">
<head>
	<!-- <link rel="icon" type="image/png" href="logo/logo_sekolah.png">  -->
	<title>Website UPTD SDN 01 Sungai Rimbang</title>
	<link rel="stylesheet" type="text/css" href="css_profil/css/style_berita.css?v=1.1">
	<link rel="stylesheet" type="text/css" href="css_profil/template/style_header.css">
	<link rel="stylesheet" type="text/css" href="css_profil/template/style_footer.css">
<!-- CSS untuk nama judul halaman -->
<style> 
	.header nav a:nth-child(4){
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
        <h1>BERITA</h1>
    </div>
    
	<div class="container">
        <!-- ini berita -->
        <?php foreach($berita as $row) : ?>
            <div class="berita">  
                     <div class="isi_berita">
                      <h2><?= $row["judul"];?></h2>                                                                          
                                <h3> oleh Admin | <?= $row["tanggal_upload"]; ?> </h3>

                                <div class="garis"></div>

                                <p><?= $row["isi"]?></p>

                                <div class="garis"></div>                     
                    </div>       
            </div>
        <?php endforeach ?>
    

	</div>
</body>

<?php include'css_profil/template/footer.php';?>  <!-- footer -->

 
</div>


