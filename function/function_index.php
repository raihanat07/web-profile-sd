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


    function tambah_kritik($data){
        global $conn;

        //ambil data dari setiap elemen form 
        $email = htmlspecialchars($data["email"]);
        $isi = htmlspecialchars($data["isi"]);

        $query = "INSERT INTO data_kritik(id,email,isi)
                    VALUES
                ('','$email','$isi')
                ";
        // query insert data
        mysqli_query($conn, $query);
        
        return mysqli_affected_rows($conn);
}



?>