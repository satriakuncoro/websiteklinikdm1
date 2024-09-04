<?php
	session_start();
	include 'db.php';
	if($_SESSION['status_login'] = false) {
	echo '<script>window.location="login.php"</script>';
	};

 ?>
 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta  name="viewport" content="width-device-width, initial-scale=1">
	<title>Persediaan Obat</title>
	<link rel="stylesheet" type="text/css" href="style1.css">

	<link href="<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
</head>
<body>

<h3> Laporan Data Obat </h3>

<table border="1">
	<tr>
		<th>No</th>
		<th>Kategori_id</th>
		<th>Kategori_nama_obat</th>
	</tr>
	<?php

		include  "db.php";
		$no=1;
		$ambildata  = mysqli_query($koneksi, "select* from tb_kategori");
		while ($tampil = mysqli_fetch_array($ambildata)) {
			echo "
			<tr>
				<td>$no</td>
				<td>$tampil[kategori_id]</td>
				<td>$tampil[kategori_nama_obat]</td>
		</tr>;

		$no++;
		}

	 ?>
</table>
</head>
</body>
</html>