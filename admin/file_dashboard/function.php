<?php 
	 //koneksi ke database
    $conn = mysqli_connect("localhost","root","","website_sd");


    function hitung($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $jumlah = mysqli_fetch_assoc($result);
    
        return $jumlah;
}

    function waktu(){
        $waktu = time();
        $format_waktu = date('l, d F Y', $waktu);
        return $format_waktu;    
    }













 ?>