<?php
	include'function/function_index.php';   
    
    $siswa_siswi = query("SELECT * FROM data_siswa_siswi ");
    $l = query("SELECT sum(laki_laki) as cowo FROM data_siswa_siswi")[0];
    $p = query("SELECT sum(perempuan) as cewe FROM data_siswa_siswi")[0];

    $jum = $l["cowo"] + $p["cewe"];

?>

<!DOCTYPE html>
<head>
    <link rel="icon" type="image/png" href="logo/logo_sekolah.png">
</head>
<div style="min-width: 1350px;">
<head>
	<!-- <link rel="icon" type="image/png" href="logo/logo_sekolah.png">  -->
	<title>Website UPTD SDN 01 Sungai Rimbang</title>
	<link rel="stylesheet" type="text/css" href="css_profil/css/style_siswa_siswi.css?v=2">
	<link rel="stylesheet" type="text/css" href="css_profil/template/style_header.css">
	<link rel="stylesheet" type="text/css" href="css_profil/template/style_footer.css">
<!-- CSS untuk nama judul halaman -->
<style> 
	.header nav a:nth-child(6){
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
        <h1>SISWA & SISWI</h1>
    </div>
    
	<div class="container">
            <!-- ini siswa_siswi -->            
            <div class="siswa_siswi">
                <div class="jum">
                    <h4> Jumlah Siswa dan Siswi UPTD SDN 01 Sungai Rimbang : <?= $jum;?> siswa</h4>
                </div>
                <table > 
                        <tr>          
                            <th>No</th>              
                            <th>Kelas</th>
                            <th>Laki - Laki</th>
                            <th>Perempuan</th>                
                        </tr>                        
                            <?php $i=1; ?>
                            <?php foreach($siswa_siswi as $row) : ?>                                                                    
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $row["kelas"]?></td>
                                    <td><?= $row["laki_laki"]?></td>
                                    <td><?= $row["perempuan"]?></td>                      
                                </tr>
                            <?php $i++; ?>
                            <?php endforeach ?>
                        <tr>
                            <td colspan=2>Jumlah Siswa dan Siswi</td>
                            <td><?= $l["cowo"];?></td>
                            <td><?= $p["cewe"];?></td>                            
                        </tr>
                        
                </table>
            </div>
	</div>
</body>

<?php include'css_profil/template/footer.php';?>  <!-- footer -->

 
</div>


