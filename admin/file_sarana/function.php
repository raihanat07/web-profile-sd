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


    function tambah_sarana($data){
        global $conn;

        //ambil data dari setiap elemen form 
        $jenis = htmlspecialchars($data["jenis"]);
        $letak = htmlspecialchars($data["letak"]);
        $kepemilikan = htmlspecialchars($data["kepemilikan"]);
        $jumlah = htmlspecialchars($data["jumlah"]);
        $status = htmlspecialchars($data["status"]);

        $query = "INSERT INTO data_sarana
                    VALUES
                ('','$jenis','$letak','$kepemilikan','$jumlah','$status')
                ";
        // query insert data
        mysqli_query($conn, $query);
        
        return mysqli_affected_rows($conn);
}



    function hapus_sarana($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM data_sarana WHERE id=$id ");
        return mysqli_affected_rows($conn);
}


    function ubah_sarana($data){
        global $conn;
        //ambil data dari setiap elemen form 
        $id = $data["id"];
        $jenis = htmlspecialchars($data["jenis"]);
        $letak = htmlspecialchars($data["letak"]);
        $kepemilikan = htmlspecialchars($data["kepemilikan"]);
        $jumlah = htmlspecialchars($data["jumlah"]);
        $status = htmlspecialchars($data["status"]);


        $query = "UPDATE data_sarana SET
                       jenis ='$jenis',
                       letak ='$letak',
                       kepemilikan ='$kepemilikan',
                       jumlah ='$jumlah',
                       status ='$status'
                    WHERE id = '$id'
                ";
        // query insert data
        mysqli_query($conn, $query);
        
        return mysqli_affected_rows($conn);
}


function cari_sarana($keyword){
    $query = "SELECT * FROM data_sarana
                WHERE
            jenis LIKE '%$keyword%'   ||            
            letak LIKE '%$keyword%'   ||
            kepemilikan LIKE '%$keyword%'   ||
            jumlah LIKE '%$keyword%'   ||
            status LIKE '%$keyword%' 
            ";

    return query($query);

}













 ?>