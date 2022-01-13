<?php 
	 //koneksi ke database
    $conn = mysqli_connect("localhost","root","","website_sd");

    function query($query){
    	global $conn;
    	$result = mysqli_query($conn, $query);
    	$rows = [];
    	while( $row = mysqli_fetch_assoc($result) ){
    		$rows[] = $row;
    	}

    	return $rows;
}


    function ubah_siswa_siswi($data){
        global $conn;
        //ambil data dari setiap elemen form 
        $id = $data["id"];
        $laki_laki = htmlspecialchars($data["laki_laki"]);
        $perempuan = htmlspecialchars($data["perempuan"]);

        $query = "UPDATE data_siswa_siswi SET
                       laki_laki = '$laki_laki',
                       perempuan = '$perempuan'
                    WHERE id = $id
                ";
        // query insert data
        mysqli_query($conn, $query);
        
        return mysqli_affected_rows($conn);
}

    function hitung_siswa($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $jumlah = mysqli_fetch_assoc($result);
    
        return $jumlah;
}














 ?>