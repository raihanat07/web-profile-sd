

<?php
    include 'function/function_index.php';


    $prestasi = query("SELECT * FROM data_prestasi");



?>


<!DOCTYPE html>
<head>
    <link rel="icon" type="image/png" href="logo/logo_sekolah.png">
</head>
<div style="min-width: 1350px;">
<head>
	<!-- <link rel="icon" type="image/png" href="logo/logo_sekolah.png">  -->
    <title>Website UPTD SDN 01 Sungai Rimbang</title>
	<link rel="stylesheet" type="text/css" href="css_profil/css/style_prestasi.css?v=1.3">
	<link rel="stylesheet" type="text/css" href="css_profil/template/style_header.css?v=1.2">
    <link rel="stylesheet" type="text/css" href="css_profil/template/style_footer.css">
    

<!-- CSS untuk nama judul halaman -->
<style> 
	.header nav a:nth-child(7){
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

        

        <!-- Data Pendidik dan tenaga kependidikan -->
        <div class="container_prestasi">
                <h1>PRESTASI</h1>
                        <div class="container_prestasi_isi">
                                <?php $i=1; ?>
                                <?php foreach($prestasi as $row) : ?>

                                        <!-- tabel untuk setiap ptk -->
                                        <table border=0 class="table1">
                                                <tr>
                                                        <th colspan=3>
                                                                <!-- nama prestasi -->
                                                                <h2>
                                                                        <?= $i; ?>.                                                                          
                                                                        <?= $row["judul"]; ?>
                                                                </h2>
                                                        </th>
                                                </tr>
                                                <tr>                                                
                                                        <td>
                                                                        <!-- keterangan PTK -->
                                                                        <table border=0 id="table2">
                                                                                <tr>
                                                                                        <td><p> tahun  </p></td>
                                                                                        <td><p> : </p></td>
                                                                                        <td><p><?= $row["tahun"]; ?></p></td>
                                                                                </tr>
                                                                                <tr>
                                                                                        <td><p> keterangan  </p></td>
                                                                                        <td><p> : </p></td>
                                                                                        <td><p><?= $row["keterangan"]; ?></p></td>
                                                                                </tr>
                                                                        </table>
                                                                
                                                        </td>
                                                        <td><img src="admin/file_prestasi/gambar/<?= $row["foto"];?>" alt="foto prestasi"  id="poto "width=350></td>
                                                </tr>
                                        </table>
                                        
                                <div class="garis"></div>


                                <?php $i++; ?>
                                <?php endforeach ?>
                        </div>
        </div>
</body>

<?php include'css_profil/template/footer.php';?>  <!-- footer -->

 
</div>


