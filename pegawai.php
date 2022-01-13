

<?php
    include 'function/function_pegawai.php';

    $foto_struktur = query("SELECT foto FROM data_struktur")[0];

    $pegawai = query("SELECT * FROM data_ptk");



?>


<!DOCTYPE html>
<head>
    <link rel="icon" type="image/png" href="logo/logo_sekolah.png">
</head>
<div style="min-width: 1350px;">
<head>
	<!-- <link rel="icon" type="image/png" href="logo/logo_sekolah.png">  -->
    <title>Website UPTD SDN 01 Sungai Rimbang</title>
	<link rel="stylesheet" type="text/css" href="css_profil/css/style_pegawai.css?v=1.3">
	<link rel="stylesheet" type="text/css" href="css_profil/template/style_header.css?v=1.2">
    <link rel="stylesheet" type="text/css" href="css_profil/template/style_footer.css">
    

<!-- CSS untuk nama judul halaman -->
<style> 
	.header nav a:nth-child(3){
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
    
        <!-- stuktur organisasi -->
        <div class="container_struktur">
                <p>STRUKTUR ORGANISASI</p>
                  <div class="container_struktur_isi">  
                         <img src="admin/file_struktur/gambar/<?= $foto_struktur["foto"];  ?>" alt="GAMBAR STRUKTUR ORGANISASI">
                 </div>
        </div>
        

        <!-- Data Pendidik dan tenaga kependidikan -->
        <div class="container_pegawai">
                <h1>DATA PENDIDIK & TENAGA KEPENDIDIKAN</h1>
                        <div class="container_pegawai_isi">
                                <?php $i=1; ?>
                                <?php foreach($pegawai as $row) : ?>

                                        <!-- tabel untuk setiap ptk -->
                                        <table border=0 class="table1">
                                                <tr>
                                                        <th colspan=3>
                                                                <!-- nama pegawai -->
                                                                <h2>
                                                                        <?= $i; ?>.                                                                          
                                                                        <?= $row["nama"]; ?>
                                                                </h2>
                                                        </th>
                                                </tr>
                                                <tr>                                                
                                                        <td>
                                                                        <!-- keterangan PTK -->
                                                                        <table border=0 id="table2">
                                                                                <tr>
                                                                                        <td><p> NIP  </p></td>
                                                                                        <td><p> : </p></td>
                                                                                        <td><p><?= $row["nip"]; ?></p></td>
                                                                                </tr>
                                                                                <tr>
                                                                                        <td><p> status kepegawaian  </p></td>
                                                                                        <td><p> : </p></td>
                                                                                        <td><p><?= $row["status_pegawai"]; ?></p></td>
                                                                                </tr>
                                                                                <tr>
                                                                                        <td><p> jenis PTK  </p></td>
                                                                                        <td><p> : </p></td>
                                                                                        <td><p><?= $row["jenis_ptk"]; ?></p></td>
                                                                                </tr>
                                                                                <tr>
                                                                                        <td><p> jurusan/prodi  </p></td>
                                                                                        <td><p> : </p></td>
                                                                                        <td><p><?= $row["jurusan"]; ?></p></td>
                                                                                </tr>
                                                                                <tr>
                                                                                        <td><p> tugas tambahan  </p></td>
                                                                                        <td><p> : </p></td>
                                                                                        <td><p><?= $row["tugas_tambahan"]; ?></p></td>
                                                                                </tr>
                                                                                <tr>
                                                                                        <td><p> mengajar  </p></td>
                                                                                        <td><p> : </p></td>
                                                                                        <td><p><?= $row["mengajar"]; ?></p></td>
                                                                                </tr>
                                                                                <tr>
                                                                                        <td><p>keterangan  </p></td>
                                                                                        <td><p> : </p></td>
                                                                                        <td><p><?= $row["keterangan"]; ?></p></td>
                                                                                </tr>
                                                                        </table>
                                                                
                                                        </td>
                                                        <td><img src="admin/file_ptk/gambar/<?= $row["foto"];?>" alt="foto pegawai"  id="poto "width=150></td>
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


