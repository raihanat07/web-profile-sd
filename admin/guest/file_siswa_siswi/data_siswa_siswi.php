<head>
    <link rel="icon" type="image/png" href="../../logo/logo_sekolah.png">
</head>

<div style="min-width: 1300px;">

<?php $halaman="data_siswa_siswi"; include "../path.php";?>  <!-- template  -->

<?php
   require "function.php";

    // ambil data dari tabel mahasiswa / query mahasiswa
    $siswa_siswi = query("SELECT * FROM data_siswa_siswi");

        // cara itung jumlah siswa
            // $result = mysqli_query($conn, "SELECT sum(laki_laki) as jum FROM data_siswa_siswi");
            // $l = mysqli_fetch_assoc($result);
            // echo ($l['jum']);
    

    $l = hitung_siswa("SELECT sum(laki_laki) as jum FROM data_siswa_siswi");
    $p = hitung_siswa("SELECT sum(perempuan) as jum FROM data_siswa_siswi");
    
    $jumlah = $l['jum'] + $p['jum'];

?>



<!DOCTYPE html>
<html>
<head>
    <title>Daftar siswa siswi</title>
    <link rel="stylesheet" type="text/css" href="css/data_siswa_siswi.css">
</head>
<body >

<div class="badan">
    
    <div class="judul">
        <h1 >Daftar siswa siswi</h1>
    </div>

<div class="bungkus_utama">
<br>


<div class="clear"></div>

<br>

<div class="bungkus_table">
<table  >
        <tr>
            <th>No.</th>
            <th>kelas</th>
            <th>laki laki</th>
            <th>perempuan</th>
            <th>aksi</th>
        </tr>
    <?php $i=1 ?>
    <?php foreach($siswa_siswi as $row) : ?>

        <tr>
            <td><?= $i;  ?></td>
            <td><?= $row["kelas"]  ?></td>
            <td><?= $row["laki_laki"]  ?></td>
            <td><?= $row["perempuan"]  ?></td>
            <td >
                <a class="btn btn-primary " href="ubah_siswa_siswi.php?id=<?= $row["id"];  ?>"> 
                            <i class="fa fa-edit"></i>
                             Ubah</a> 
            </td>
        </tr>
        <?php $i++; ?>
    <?php endforeach ?>

        <tr>
            <th colspan=2 ><h5><b>Jumlah data siswa<b></h5></th>
            <th ><h5><b><?= $l["jum"]; ?><b></h5></th>
            <th ><h5><b><?= $p["jum"]; ?><b></h5></th>
            <th ><h5><b><?= $jumlah; ?> </h5></b></th>
        </tr>
</table>
</div> <!-- penutup class bungkus tabel-->
    </div>
</div>
</body>
</html>



</div>