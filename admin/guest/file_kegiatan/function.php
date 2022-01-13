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


    function tambah_kegiatan($data){
        global $conn;

        //ambil data dari setiap elemen form 
        $nama = htmlspecialchars($data["nama"]);
        $isi = htmlspecialchars($data["isi"]);

        // upload gambar
        $foto = upload();
        if(!$foto){
            return false;
        }

        $query = "INSERT INTO data_kegiatan(id,nama,isi,foto)
                    VALUES
                ('','$nama','$isi','$foto')
                ";
        // query insert data
        mysqli_query($conn, $query);
        
        return mysqli_affected_rows($conn);
}


    function upload(){

            $nama_file = $_FILES['foto']['name'];
            $ukuran_file = $_FILES['foto']['size'];
            $error = $_FILES['foto']['error'];
            $tmp_name = $_FILES['foto']['tmp_name'];

            // cek apakah ada gambar yang diupload
                     // jika mengharuskan mengupload gambar
                            if($error === 4){
                                echo "
                                    <script>
                                         alert('Pilih foto terlebih dahulu!');
                                     </script>
                                ";
                             return false;
                            }
                    // jika tidak harus mengupload gambar
            // if($error === 4){
            //  return true;
            // }

            // cek apakah yang diupload adalah gambar
            $ekstensi_foto_valid = ['jpg', 'jpeg', 'png'];
            $ekstensi_foto = explode('.', $nama_file);
            $ekstensi_foto = strtolower(end($ekstensi_foto));

            if(!in_array ($ekstensi_foto, $ekstensi_foto_valid) ){
                echo "
                    <script>
                         alert('Yang anda upload tidak sesuai dengan format file');
                     </script>
                ";
             return false;
            }
            
            // cek ukuran file 
            // maksimal 2MB (1KB = 1024 Byte)
            
            if( $ukuran_file >  (1024 * 1024 * 2) || $ukuran_file == 0){
                 echo "
                    <script>
                         alert('File yang diupload tidak sesuai dengan ukuran');
                     </script>
                ";
             return false;
            }

            // jika lolos pengecekan, gambar siap untuk diupload
            // generate nama gambar baru

            $nama_file_baru = uniqid();
            $nama_file_baru .= '.';
            $nama_file_baru .= $ekstensi_foto; 

            move_uploaded_file($tmp_name, 'gambar/' . $nama_file_baru);
            return $nama_file_baru;
}




    function hapus_kegiatan($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM data_kegiatan WHERE id=$id ");
        return mysqli_affected_rows($conn);
}


    function ubah_kegiatan($data){
        global $conn;
        //ambil data dari setiap elemen form 
        $id = $data["id"];
        $nama = htmlspecialchars($data["nama"]);
        $isi = htmlspecialchars($data["isi"]);
    
       
        $foto_lama = htmlspecialchars($data["foto_lama"]);

        // cek apakah user pilih gambar baru atau tidak
        if($_FILES['foto']['error'] === 4){
            $foto = $foto_lama;
        } else {
            $foto = upload_2();
        }

        // cek apakah ada kesalahan pada file
        if(!$foto){
            return false;
        }
        

        $query = "UPDATE data_kegiatan SET
                       nama = '$nama',
                       isi = '$isi',
                       foto = '$foto'
                    WHERE id = $id
                ";
        // query insert data
        mysqli_query($conn, $query);
        
        return mysqli_affected_rows($conn);
}





function cari_kegiatan($keyword){
    $query = "SELECT * FROM data_kegiatan
                WHERE
            nama LIKE '%$keyword%'   ||            
            isi LIKE '%$keyword%'   ||
            tanggal_kegiatan LIKE '%$keyword%' 
            ";

    return query($query);

}




function upload_2(){

    $nama_file = $_FILES['foto']['name'];
    $ukuran_file = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmp_name = $_FILES['foto']['tmp_name'];

    // cek apakah ada gambar yang diupload
             // jika mengharuskan mengupload gambar
                    // if($error === 4){
                    //     echo "
                    //         <script>
                    //              alert('Pilih foto terlebih dahulu!');
                    //          </script>
                    //     ";
                    //  return false;
                    // }
            // jika tidak harus mengupload gambar
    if($error === 4){
     return true;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensi_foto_valid = ['jpg', 'jpeg', 'png'];
    $ekstensi_foto = explode('.', $nama_file);
    $ekstensi_foto = strtolower(end($ekstensi_foto));

    if(!in_array ($ekstensi_foto, $ekstensi_foto_valid) ){
        echo "
            <script>
                 alert('Yang anda upload tidak sesuai dengan format file');
             </script>
        ";
     return false;
    }
    
    // cek ukuran file 
    // maksimal 2MB (1KB = 1024 Byte)
    
    if( $ukuran_file >  (1024 * 1024 * 2) || $ukuran_file == 0){
         echo "
            <script>
                 alert('File yang diupload tidak sesuai dengan ukuran');
             </script>
        ";
     return false;
    }

    // jika lolos pengecekan, gambar siap untuk diupload
    // generate nama gambar baru

    $nama_file_baru = uniqid();
    $nama_file_baru .= '.';
    $nama_file_baru .= $ekstensi_foto; 

    move_uploaded_file($tmp_name, 'gambar/' . $nama_file_baru);
    return $nama_file_baru;
}








 ?>