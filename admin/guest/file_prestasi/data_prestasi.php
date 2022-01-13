<head>
    <link rel="icon" type="image/png" href="../../logo/logo_sekolah.png">
</head>

<div style="min-width: 1300px;">

<?php $halaman="data_prestasi"; include "../path.php";?>  <!-- template  -->

<?php
   require "function.php";

    // ambil data dari tabel mahasiswa / query mahasiswa
    $prestasi = query("SELECT * FROM data_prestasi");


    // ketika tombol cari ditekan
     $hasil_cari = true;
    if( isset($_POST["cari"]) ) {
        $prestasi = cari_prestasi($_POST["keyword"]);

        // cek hasil pencarian

        if ( $prestasi == null ){
             $hasil_cari = false;

        }
    }

?>




<!DOCTYPE html>
<html>
<head>
    <title>Daftar Prestasi</title>
    <link rel="stylesheet" type="text/css" href="css/data_prestasi.css">
</head>
<body >



<div class="badan">
    
<div class="judul">
<h1 >Daftar Prestasi</h1></div>

<div class="bungkus_utama">
<br><br>


<form action="" method="post">
    <div class="cari input-group  float-left col-md-4">
    <input class="form-control" type="text" name="keyword" size="40" autofocus placeholder="masukkan kata kunci pencarian..." autocomplete="off" >
    <button class="btn btn-info mr-1" type="submit" name="cari">
                                    <i class="fas fa-search"></i>
                                    Cari</button>
    </div>
</form>

<div class="clear"></div>


<!-- pesan ketika tidak ada hasil pencarian -->
<?php if(!$hasil_cari AND isset($_POST["cari"]) ) : ?>
    <h5 class="alert alert-danger" style="margin-top:20px;">DATA TIDAK DITEMUKAN</h5>
<?php endif ?>
<br>

<div class="bungkus_table">
<table  >
        <tr>
            <th>No.</th>
            <th>Judul</th>
            <th>Keterangan</th>
            <th>tahun</th>
            <th>foto prestasi</th>            
        </tr>
    <?php $i=1 ?>
    <?php foreach($prestasi as $row) : ?>

        <tr>
            <td><?= $i;  ?></td>
            <td><?= $row["judul"]  ?></td>
            <td><?= $row["keterangan"]  ?></td>
            <td><?= $row["tahun"]  ?></td> 
            <td>
                 <?php if($row["foto"]!=1) { ?>
                     <img src="gambar/<?= $row["foto"]; ?>" alt="" width="100">
                <?php }else { ?>
                     <h3> - </h3>
                <?php } ?>
            </td>
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