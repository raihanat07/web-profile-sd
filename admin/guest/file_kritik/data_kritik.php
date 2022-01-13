<head>
    <link rel="icon" type="image/png" href="../../logo/logo_sekolah.png">
</head>

<div style="min-width: 1300px;">

<?php $halaman="data_kritik"; include "../path.php";?>  <!-- template  -->

<?php
   require "function.php";

    // ambil data dari tabel mahasiswa / query mahasiswa
    $kritik = query("SELECT * FROM data_kritik");



?>




<!DOCTYPE html>
<html>
<head>
    <title>Daftar kritik</title>
    <link rel="stylesheet" type="text/css" href="css/data_kritik.css">
</head>
<body >



<div class="badan">
    
<div class="judul">
<h1 >Daftar kritik dan saran</h1></div>

<div class="bungkus_utama">
    <!-- <div class="cetak-tambah">
                <a href="tambah_kritik.php" class="btn btn-success mr-2">tambah data
                            <i class="fa  fa-plus"></i></a>

    </div> -->
<br>



<div class="clear"></div>


<div class="bungkus_table">
<table  >
        <tr>
            <th>No.</th>
            <th>email</th>
            <th>tanggal kirim</th>
            <th>isi</th>            
        </tr>
    <?php $i=1 ?>
    <?php foreach($kritik as $row) : ?>

        <tr>
            <td><?= $i;  ?></td>
            <td><?= $row["email"]  ?></td>
            <td><?= $row["tanggal_kritik"]  ?></td>
            <td><?= $row["isi"]  ?></td>            
        </tr>
        <?php $i++; ?>
    <?php endforeach ?>

</table>
</div> <!-- penutup class bungkus tabel-->
    </div>
</div>
</body>
</html>



</div>