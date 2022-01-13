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


    function tambah_prasarana($data){
        global $conn;

        //ambil data dari setiap elemen form 
        $nama = htmlspecialchars($data["nama"]);
        $panjang = htmlspecialchars($data["panjang"]);
        $lebar = htmlspecialchars($data["lebar"]);
        $kerusakan = htmlspecialchars($data["kerusakan"]);
        $keterangan = htmlspecialchars($data["keterangan"]);

        $query = "INSERT INTO data_prasarana
                    VALUES
                ('','$nama','$panjang','$lebar','$kerusakan','$keterangan')
                ";
        // query insert data
        mysqli_query($conn, $query);
        
        return mysqli_affected_rows($conn);
}



    function hapus_prasarana($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM data_prasarana WHERE id=$id ");
        return mysqli_affected_rows($conn);
}


    function ubah_prasarana($data){
        global $conn;
        //ambil data dari setiap elemen form 
        $id = $data["id"];
        $nama = htmlspecialchars($data["nama"]);
        $panjang = htmlspecialchars($data["panjang"]);
        $lebar = htmlspecialchars($data["lebar"]);
        $kerusakan = htmlspecialchars($data["kerusakan"]);
        $keterangan = htmlspecialchars($data["keterangan"]);


        $query = "UPDATE data_prasarana SET
                       nama ='$nama',
                       panjang ='$panjang',
                       lebar ='$lebar',
                       kerusakan ='$kerusakan',
                       keterangan ='$keterangan'
                    WHERE id = '$id'
                ";
        // query insert data
        mysqli_query($conn, $query);
        
        return mysqli_affected_rows($conn);
}




function cari_prasarana($keyword){
    $query = "SELECT * FROM data_prasarana
                WHERE
            nama LIKE '%$keyword%'   ||            
            keterangan LIKE '%$keyword%' 
            ";

    return query($query);

}













 ?>