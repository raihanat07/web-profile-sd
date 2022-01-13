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


    function tambah_berita($data){
        global $conn;

        //ambil data dari setiap elemen form 
        $judul = htmlspecialchars($data["judul"]);
        $isi = htmlspecialchars($data["isi"]);

        $query = "INSERT INTO data_berita(id,judul,isi)
                    VALUES
                ('','$judul','$isi')
                ";
        // query insert data
        mysqli_query($conn, $query);
        
        return mysqli_affected_rows($conn);
}



    function hapus_berita($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM data_berita WHERE id=$id ");
        return mysqli_affected_rows($conn);
}


    function ubah_berita($data){
        global $conn;
        //ambil data dari setiap elemen form 
        $id = $data["id"];
        $judul = htmlspecialchars($data["judul"]);
        $isi = htmlspecialchars($data["isi"]);


        $query = "UPDATE data_berita SET
                       judul = '$judul',
                       isi = '$isi'
                    WHERE id = $id
                ";
        // query insert data
        mysqli_query($conn, $query);
        
        return mysqli_affected_rows($conn);
}





function cari_berita($keyword){
    $query = "SELECT * FROM data_berita
                WHERE
            judul LIKE '%$keyword%'   ||            
            isi LIKE '%$keyword%'   ||
            tanggal_upload LIKE '%$keyword%' 
            ";

    return query($query);

}











 ?>