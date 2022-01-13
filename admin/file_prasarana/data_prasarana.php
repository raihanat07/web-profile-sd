<head>
    <link rel="icon" type="image/png" href="../../logo/logo_sekolah.png">
</head>

<div style="min-width: 1300px;">

<?php $halaman="data_prasarana"; include "../path.php";?>  <!-- template  -->

<?php
   require "function.php";

    // ambil data dari tabel mahasiswa / query mahasiswa
    $prasarana = query("SELECT * FROM data_prasarana");

    
     // ketika tombol cari ditekan
     $hasil_cari = true;
    if( isset($_POST["cari"]) ) {
        $prasarana = cari_prasarana($_POST["keyword"]);

        // cek hasil pencarian

        if ( $prasarana == null ){
             $hasil_cari = false;

        }
    }


?>




<!DOCTYPE html>
<html>
<head>
    <title>Daftar prasarana </title>
    <link rel="stylesheet" type="text/css" href="css/data_prasarana.css">
</head>
<body >



<div class="badan">
    
<div class="judul">
<h1 >Daftar prasarana </h1></div>

<div class="bungkus_utama">
    <div class="cetak-tambah">
                <a href="tambah_prasarana.php" class="btn btn-success mr-2">tambah data 
                            <i class="fa  fa-plus"></i></a>

    </div>
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
            <th>Nama</th>
            <th>panjang (m)</th>
            <th>lebar (m)</th>
            <th>kerusakan (%)</th>
            <th>keterangan</th>
            <th>aksi</th>
        </tr>
    <?php $i=1 ?>
    <?php foreach($prasarana as $sar) : ?>

        <tr>
            <td><?= $i;  ?></td>
            <td><?= $sar["nama"]  ?></td>
            <td><?= $sar["panjang"]  ?></td>
            <td><?= $sar["lebar"]  ?></td>   
            <td><?= $sar["kerusakan"]  ?></td>
            <td><?= $sar["keterangan"]  ?></td>
            <td >
                <a class="btn btn-primary " href="ubah_prasarana.php?id=<?= $sar["id"];  ?>"> 
                            <i class="fa fa-edit"></i>
                             Ubah</a> 
                <a class="btn btn-danger" href="hapus_prasarana.php?id=<?= $sar["id"];  ?>" onclick=" return confirm('apakah anda yakin ingin menghapus data ini?')">
                             <i class="far fa-trash-alt"></i>
                             Hapus</a>
                             
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