<head>
    <link rel="icon" type="image/png" href="../../logo/logo_sekolah.png">
</head>

<div style="min-width: 1300px;">

<?php $halaman="data_dashboard"; include "../path.php";?>  <!-- template  -->

<?php
   require "function.php";

    // ambil data dari tabel mahasiswa / query mahasiswa

        // cara itung jumlah siswa
            // $result = mysqli_query($conn, "SELECT sum(laki_laki) as jum FROM data_dashboard");
            // $l = mysqli_fetch_assoc($result);
            // echo ($l['jum']);
    

    $berita = hitung("SELECT count(id) as jum FROM data_berita");
    $kegiatan = hitung("SELECT count(id) as jum FROM data_kegiatan");
    $ptk = hitung("SELECT count(id) as jum FROM data_ptk");
    $prestasi = hitung("SELECT count(id) as jum FROM data_prestasi");


    $l = hitung("SELECT sum(laki_laki) as jum FROM data_siswa_siswi");
    $p = hitung("SELECT sum(perempuan) as jum FROM data_siswa_siswi");
    
    $jum = $l['jum'] + $p['jum'];
?>



<!DOCTYPE html>
<html>
<head>
    <title>dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/data_dashboard.css">
</head>

<style>

</style>

<body >

<div class="badan">
    
    <div class="judul">
        <h1 >Selamat Datang</h1><br>
        
    </div>

<div class="bungkus_utama">
<br>




<br>

<div class="bungkus_table">

<!-- waktu saat ini -->
<div class="waktu">
    <h1><?php echo waktu(); ?></h1>
</div>
<!-- card 1 -->
<div class="card text-white bg-info mb-3" id="pertama">
  <div class="card-header"><h1> Berita</h1></div>
  <div class="card-body">
    <h5 class="card-title"><b><?= $berita["jum"]; ?><b></h5>
  </div>
</div>

<!-- card 2 -->
<div class="card text-white bg-info mb-3"  id="pertama">
  <div class="card-header"><h1> Kegiatan</h1></div>
  <div class="card-body">
    <h5 class="card-title"><b><?= $kegiatan["jum"]; ?><b></h5>
  </div>
</div>

<!-- card 3 -->
<div class="card text-white bg-info mb-3"  id="pertama">
  <div class="card-header"><h1> PTK</h1></div>
  <div class="card-body">
    <h5 class="card-title"><b><?= $ptk["jum"]; ?><b></h5>
  </div>
</div>

<div class="clear"></div>

<!-- card 4 -->
<div class="card text-white bg-info mb-3"  id="pertama">
  <div class="card-header"><h1> Siswa </h1></div>
  <div class="card-body">
    <h5 class="card-title"><b><?= $jum; ?><b></h5>
  </div>
</div>

<!-- card 5 -->
<div class="card text-white bg-info mb-3"  id="pertama">
  <div class="card-header"><h1>prestasi</h1></div>
  <div class="card-body">
    <h5 class="card-title"><b><?= $prestasi['jum']; ?><b></h5>
  </div>
</div>

<div class="clear"></div>


        <h5></h5>
        <h5></h5>
       
</div> <!-- penutup class bungkus tabel-->
    </div>
</div>
</body>
</html>



</div>