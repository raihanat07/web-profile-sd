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




    function ganti_password($data){
        global $conn;
        //ambil data dari setiap elemen form 
        $username = $_POST["username"];
        $password_baru = $_POST["password_baru"];



        $query = "UPDATE admin SET
                       password ='$password_baru' WHERE username = '$username'
                ";
        // query insert data
        mysqli_query($conn, $query);
        return 1;
}
















 ?>