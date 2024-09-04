<!DOCTYPE html>
<html>
<head>
	<title>LAPORAN CETAK</title>
	<style>
		td {
			white-space: nowrap;
			font-size: 15px;
		}
	</style>
</head>
<body>
 
	<center>
 
		<h2><small>DATA LAPORAN OBAT</small></h2>
		<h3>KLINIK DYAH MEDIKA 1 SEMARANG</h3>
 
	</center>
 
	<?php 
	include 'db.php';
	?>
 
	<table border="1" style="width: 100%">
		<tr>
			<th width="1%">No</th>
			<th>Kategori nama obat</th>
			<th>Tanggal Beli</th>
			<th>Tanggal Keluar</th>
			<th>Tanggal Expired</th>
			<th>Stok Obat</th>
			<th>Harga Beli</th>
			<th>Harga Jual</th>
		</tr>
		<?php 
		$no = 1;
		$ambildata = mysqli_query($conn, "select * from tb_kategori");
			while ($tampil = mysqli_fetch_array($ambildata)){
					echo "
					<tr>
						<td>$no</td>
						<td>$tampil[kategori_nama_obat]</td>
						<td>$tampil[Tanggal_beli]</td>
						<td>$tampil[Tanggal_keluar]</td>
						<td>$tampil[Tanggal_expired]</td>
						<td>$tampil[stok_obat]</td>
						<td>$tampil[harga_beli]</td>
						<td>$tampil[harga_jual]</td>
					</tr>";

					$no++;
		}
		?>
		<p align="center">
			<input type="button" value="Export Excel" onclick="window.open('laporan-excel.php')">
			<input type="button" value="Export Pdf" onclick="window.open('laporan-cetak.php', '_blank')">
	</p>
	</table>
		