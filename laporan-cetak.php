<?php
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>LAPORAN CETAK</title>
	<link rel="stylesheet" href="style1.css">
    <style>
        .page-break {
            page-break-after: always;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .fixed-width {
            width: 11%;
        }
    </style>
</head>
<body>
	<div class="pdf-center">
		<h2>LAPORAN CETAK</h2>
		<?php 
		include 'db.php';
		?>
		<table>
		<tr>
			<th class="fixed-width">No</th>
			<th class="fixed-width">Kategori nama obat</th>
			<th class="fixed-width">Tanggal Beli</th>
			<th class="fixed-width">Tanggal Keluar</th>
			<th class="fixed-width">Tanggal Expired</th>
			<th class="fixed-width">Stok Obat</th>
			<th class="fixed-width">Harga Beli</th>
			<th class="fixed-width">Harga Jual</th>
		</tr>
		<?php 
		$no = 1;
		$ambildata = mysqli_query($conn, "SELECT * FROM tb_kategori");
		$count = 0;
		while ($tampil = mysqli_fetch_array($ambildata)){
		    echo "
		    <tr>
		        <td class='fixed-width'>{$no}</td>
		        <td class='fixed-width'>{$tampil['kategori_nama_obat']}</td>
		        <td class='fixed-width'>{$tampil['Tanggal_beli']}</td>
		        <td class='fixed-width'>{$tampil['Tanggal_keluar']}</td>
		        <td class='fixed-width'>{$tampil['Tanggal_expired']}</td>
		        <td class='fixed-width'>{$tampil['stok_obat']}</td>
		        <td class='fixed-width'>{$tampil['harga_beli']}</td>
		        <td class='fixed-width'>{$tampil['harga_jual']}</td>
		    </tr>";
		    $no++;
		    $count++;
		    if ($count % 30 == 0) {
		        echo '</table><div class="page-break"></div><table>';
		        echo '
		        <tr>
		            <th class="fixed-width">No</th>
		            <th class="fixed-width">Kategori nama obat</th>
		            <th class="fixed-width">Tanggal Beli</th>
		            <th class="fixed-width">Tanggal Keluar</th>
		            <th class="fixed-width">Tanggal Expired</th>
		            <th class="fixed-width">Stok Obat</th>
		            <th class="fixed-width">Harga Beli</th>
		            <th class="fixed-width">Harga Jual</th>
		        </tr>';
		    }
		}
		?>
		</table>
	</div>
</body>
</html>
<?php
$content = ob_get_clean();
require_once(dirname(__FILE__).'../konversipdf/html2pdf/html2pdf.class.php');
try
{
    $html2pdf = new HTML2PDF('P', 'A4', 'en', array(8, 8, 8, 8));
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output('laporan.pdf');
}
catch (HTML2PDF_exception $e) {
    echo $e;
    exit;
}
?>
