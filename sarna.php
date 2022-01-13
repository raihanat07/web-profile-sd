<?php
	include'function/function_index.php';   
    
    $sarana = query("SELECT * FROM data_sarana ");
    $prasarana = query("SELECT * FROM data_prasarana ");


?>

<!DOCTYPE html>
<head>
    <link rel="icon" type="image/png" href="logo/logo_sekolah.png">
</head>
<div style="min-width: 1350px;">
<head>
	<!-- <link rel="icon" type="image/png" href="logo/logo_sekolah.png">  -->
	<title>Website UPTD SDN 01 Sungai Rimbang</title>
	<link rel="stylesheet" type="text/css" href="css_profil/css/style_sarna.css?v=2">
	<link rel="stylesheet" type="text/css" href="css_profil/template/style_header.css">
	<link rel="stylesheet" type="text/css" href="css_profil/template/style_footer.css">
<!-- CSS untuk nama judul halaman -->
<style> 
	.header nav a:nth-child(8){
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
    
<!-- data untuk sarana BOSSKU -->
    <div class="sarana">
            <div class="judul">
                <h1>SARANA</h1>
            </div>
            
            <div class="container">
                    <!-- ini siswa_siswi -->            
                    <div class="isi_sar">
                        <div class="jum">
                            <h4> Berikut daftar sarana UPTD SDN 01 Sungai Rimbang </h4>
                        </div>
                        <table > 
                                <tr>          
                                    <th>No</th>              
                                    <th>Jenis</th>
                                    <th>letak</th>
                                    <th>kepemilikan</th>                
                                    <th>Jumlah</th>
                                    <th>status</th>
                                </tr>                        
                                    <?php $i=1; ?>
                                    <?php foreach($sarana as $sar) : ?>  
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $sar["jenis"]?></td>
                                            <td><?= $sar["letak"]?></td>
                                            <td><?= $sar["kepemilikan"]?></td> 
                                            <td><?= $sar["jumlah"]?></td> 
                                            <td><?= $sar["status"]?></td> 
                                        </tr>
                                    <?php $i++; ?>
                                    <?php endforeach ?>
                            
                        </table>
                    </div>
            </div>
    </div>


<!-- data untuk prasarana BOSSKU -->
<div class="prasarana">
            <div class="judul">
                <h1>PRASARANA</h1>
            </div>
            
            <div class="container">
                    <!-- ini siswa_siswi -->            
                    <div class="isi_pra">
                        <div class="jum">
                            <h4> Berikut daftar prasarana UPTD SDN 01 Sungai Rimbang </h4>
                        </div>
                        <table > 
                                <tr>          
                                    <th>No</th>              
                                    <th>Nama</th>
                                    <th>Panjang (m)</th>
                                    <th>Lebar (m)</th>                
                                    <th>Kerusakan (%)</th>
                                    <th>status</th>
                                </tr>                        
                                    <?php $i=1; ?>
                                    <?php foreach($prasarana as $pra) : ?>  
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $pra["nama"]?></td>
                                            <td><?= $pra["panjang"]?></td>
                                            <td><?= $pra["lebar"]?></td> 
                                            <td><?= $pra["kerusakan"]?></td> 
                                            <td><?= $pra["keterangan"]?></td> 
                                        </tr>
                                    <?php $i++; ?>
                                    <?php endforeach ?>
                            
                        </table>
                    </div>
            </div>
    </div>

</body>

<?php include'css_profil/template/footer.php';?>  <!-- footer -->

 
</div>


