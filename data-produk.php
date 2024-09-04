<!DOCTYPE html>
<html>
<?php
	session_start();
	include 'db.php';
	if($_SESSION['status_login'] = false) {
	echo '<script>window.location="login.php"</script>';
	};
 ?>
<head>
	<meta charset="utf-8">
	<meta  name="viewport" content="width-device-width, initial-scale=1">
	<title>Persediaan Obat</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<link href="<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
		<h1><a href="dashboard.php">Persediaan Obat</a></h1>
		<ul>
			<li><a href="dashboard.php">Dashboard</a></li>
			<li><a href="profil1.php">Profil</a></li>
			<li><a href="data-kategori.php">Data Kategori</a></li>
			<li><a href="data-produk.php">Data Obat</a></li>
			<li><a href="login.php">Keluar</a></li>
		</ul>
	</div>
 </header>
 		<!--content -->
 		<div class="section">
 			<div class="container">
 				<h3>Data Obat</h3>
 				<div class="box">
 					<p> <a href="tambah-kategori.php">Tambah Data Obat</a></p>
 					<table border="1" cellspacing="0" class="table">
 						<thead>
	<table border="1">
		<tr>
			<th>No</th>
			<th>Kategori id</th>
			<th>Kategori nama obat</th>
			<th>Tanggal Beli</th>
			<th>Tanggal Keluar</th>
			<th>Tanggal Expired</th>
			<th>Stok Obat</th>
			<th>Harga Beli</th>
			<th>Harga Jual</th>
		</tr>
		<?php 

			include "db.php";
			$no=1;
			$ambildata = mysqli_query($conn, "select * from tb_kategori");
			while ($tampil = mysqli_fetch_array($ambildata)){
					echo "
					<tr>
						<td>$no</td>
						<td>$tampil[kategori_id]</td>
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
			<br> <br>
		<a href="cetak.php" target="_blank">CETAK LAPORAN</as>
			</br> </br>
		</table>
		</h3>
 		</div>
 		<!-- footer -->
 		<footer>
 			<div class="container">
			 <h5>Copyright &copy; 2024 = Persediaan Obat</h5>
 			</div>
 		</footer>
</body>
</html>