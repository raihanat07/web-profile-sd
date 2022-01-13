<?php 
	require_once __DIR__ . '/../vendor/autoload.php';

 	require "function.php";
    // ambil data dari tabel mahasiswa / query mahasiswa
    $ptk = query("SELECT * FROM data_ptk");


	$mpdf = new \Mpdf\Mpdf();

$html = ' <!DOCTYPE html>
	 <html>
	 <head>
		 <title>PDF-Daftar Pendidik dan Tenaga Kependidikan</title>
		 
		 <style>
		 		th {
					background-color :  rgb(231, 231, 231);
				}
		 </style>

	 </head>
	 <body>
	 	<h1>Daftar Pendidik dan Tenaga Kependidikan</h1>
	 	<table cellpadding="15" cellspacing="0" border=1   >
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
        </tr>';

        $i = 1;
        foreach($ptk as $p){
        	$html .= '<tr>
        		<td>'. $i++ .'</td>
        		<td>'. $p["nip"] .'</td>
        		<td>'. $p["nama"] .'</td>
				<td>'. $p["status_pegawai"] .'</td>
				<td>'. $p["jenis_ptk"] .'</td>
				<td>'. $p["jurusan"] .'</td>
				<td>'. $p["mengajar"] .'</td>
				<td>'. $p["tugas_tambahan"] .'</td>
				<td>'. $p["keterangan"] .'</td>
        	</tr>';
        }

 $html.='</table>

	 </body>
	 </html>';



	$mpdf->WriteHTML($html);
	$mpdf->Output('Daftar-pendidik-dan-tenagakependidikan-UPTD-SDN-01-sungai-rimbang.pdf', \Mpdf\Output\Destination::INLINE); 
 





 ?>

