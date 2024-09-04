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
 				<h3>Data Kategori</h3>
 				<div class="box">
 					<p> <a href="tambah-kategori.php">Tambah Data Obat</a></p>
 					<table border="1" cellspacing="0" class="table">
 						<thead>
 							<tr>
 								<th width="60px">No</th>
 								<th>Kategori</th>
 								<th width="170px">Aksi</th>
 							</tr>
 						</thead>
 						<tbody>
 							<?php
 							$no =1;
 							$kategori = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY kategori_id DESC");
 							 while($row = mysqli_fetch_array($kategori)){


 							?>
 							<tr>
 								<td><?php echo $no++ ?></td>
 								<td><?php echo $row['kategori_nama_obat']?></td>
 								<td>
 									<a href="edit-kategori.php?id=<?php echo $row['kategori_id'] ?>">Edit</a> || <a href="proses-hapus.php?idk=<?php echo $row['kategori_id'] ?>" onclick="return confirm('Yakin ingin dihapus?')">Hapus</a>
 								</td>
 								</tr>
 							 	<?php } ?>
 						</tbody>
 					</table>
 		</div>
 		<!-- footer -->
 		<footer>
 			<div class="container">
			 <h5>Copyright &copy; 2024 = Persediaan Obat</h5>
 			</div>
 		</footer>
</body>
</html><!DOCTYPE html>
<html>
