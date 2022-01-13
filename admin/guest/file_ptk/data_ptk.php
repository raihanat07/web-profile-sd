<head>
    <link rel="icon" type="image/png" href="../../logo/logo_sekolah.png">
</head>

<div style="min-width: 1800px;">

<?php $halaman="data_ptk"; include "../path.php";?>  <!-- template  -->

<?php
   require "function.php";

    // ambil data dari tabel mahasiswa / query mahasiswa
    $ptk = query("SELECT * FROM data_ptk");


    // ketika tombol cari ditekan
     $hasil_cari = true;
    if( isset($_POST["cari"]) ) {
        $ptk = cari_ptk($_POST["keyword"]);

        // cek hasil pencarian

        if ( $ptk == null ){
             $hasil_cari = false;

        }
    }

?>




<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pendidik dan Tenaga Kependidikan</title>
    <link rel="stylesheet" type="text/css" href="css/data_ptk.css?v=1.2">
</head>
<body >



<div class="badan">
    
<div class="judul">
<h1 >Daftar Pendidik dan Tenaga Kependidikan</h1></div>

<div class="bungkus_utama">
    <div class="cetak-tambah">

                <a href="print_ptk.php" class="btn btn-success mr-7" target="_blank">Cetak
                            <i class="fas  fa-print"></i></a>
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
            <th>nip</th>
            <th>nama</th>
            <th>status pegawai</th>
            <th>jenis PTK</th>
            <th>jurusan/Prodi</th>
            <th>mengajar</th>
            <th>tugas Tambahan</th>
            <th>keterangan</th>
            <th>foto</th>            
        </tr>
    <?php $i=1 ?>
    <?php foreach($ptk as $row) : ?>

        <tr>
            <td><?= $i;  ?></td>
            <td><?= $row["nip"]  ?></td>
            <td><?= $row["nama"]  ?></td>
            <td><?= $row["status_pegawai"]  ?></td>
            <td><?= $row["jenis_ptk"]  ?></td>
            <td><?= $row["jurusan"]  ?></td>
            <td><?= $row["mengajar"]  ?></td>
            <td><?= $row["tugas_tambahan"]  ?></td>
            <td><?= $row["keterangan"]  ?></td>

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