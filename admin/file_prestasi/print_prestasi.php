<?php 
	require_once __DIR__ . '/../vendor/autoload.php';

 	require "function.php";
    // ambil data dari tabel mahasiswa / query mahasiswa
    $prestasi = query("SELECT * FROM data_prestasi");


	$mpdf = new \Mpdf\Mpdf();

$html = ' <!DOCTYPE html>
	 <html>
	 <head>
	 	<title>PDF-Daftar Prestasi</title>
	 </head>
	 <body>
	 	<h1>Daftar Prestasi</h1>
	 	<table cellpadding="15" cellspacing="0" border=1   >
        <tr>
            <td>No.</td>
            <td>Judul</td>
            <td>Keterangan</td>
            <td>tahun</td>
            <td>foto prestasi</td>
        </tr>';

        $i = 1;
        foreach($prestasi as $prs){
        	$html .= '<tr>
        		<td>'. $i++ .'</td>
        		<td>'. $prs["judul"] .'</td>
        		<td>'. $prs["keterangan"] .'</td>
        		<td>'. $prs["tahun"] .'</td>
        		<td><img src = "gambar/'.$prs["foto"] .'" width="60"></td>
        	</tr>';
        }

 $html.='</table>

	 </body>
	 </html>';



	$mpdf->WriteHTML($html);
	$mpdf->Output('Daftar-Prestasi.pdf', \Mpdf\Output\Destination::INLINE); 
 





 ?>

