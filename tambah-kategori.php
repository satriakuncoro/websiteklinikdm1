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
 				<h3>Tambah Data Obat</h3>
 				<div class="box">
 			  <form action="" method="post">
 				<input type="text" name="nama_obat" placeholder="Nama  Obat / satuan" class="input-control" required>
 				<br>
 				<p>Tanggal Beli</p>	
 				<input type="date" name="dateform_beli" value="<?php echo date('Y-m-d'); ?>" placeholder="tgl_beli"/>
 			</br>
 			<br>
 				<p>Tanggal Keluar</p>	
 				<input type="date" name="dateform_keluar" value="<?php echo date('Y-m-d'); ?>" placeholder="tgl_keluar"/>
 			</br>
 				<br>
 				<p>Tanggal Expired </p>	
 				<input type="date" name="dateform_expired" value="<?php echo date('Y-m-d'); ?>" placeholder="tgl_expired"/> </br>
 				<br>
 				<input type="text" name="stok_obat" placeholder="stok obat" class="input-control" required>
 				<br>
 				<input type="text" name="harga_beli" placeholder="harga_beli" class="input-control" required>
 				<br>
 				<input type="text" name="harga_jual" placeholder="harga Jual" class="input-control" required>
 				<br>
 				<textarea class="input-control" name="deskripsi" placeholder="Deskripsi"></textarea><br></br>
 				<input type="submit" name="submit" value="Submit" class="btn">
 			</form>
 			<?php
 				if(isset($_POST['submit'])){

					$name_obat = ucwords($_POST['nama_obat']);
					$tgl_masuk = $_POST['dateform_beli'];
					$tgl_keluar = $_POST['dateform_keluar'];
					$tgl_expired = $_POST['dateform_expired'];
					$stok_obat = ucwords($_POST['stok_obat']);
					$harga_beli = $_POST['harga_beli'];
					$harga_jual = $_POST['harga_jual'];
					$deskripsi = $_POST['deskripsi'];
					
 					$query = "INSERT INTO tb_kategori VALUES('','$name_obat', '$tgl_masuk', '$tgl_keluar', '$tgl_expired', '$stok_obat', '$harga_beli', '$harga_jual', '$deskripsi')";
					 $result = mysqli_query($conn, $query);

 					if($result){
 						echo '<script>alert("Tambah Data Berhasil")</script>';
 						echo '<script>window.location="data-kategori.php"</script>';
 					}else{
 						echo 'gagal'.mysqli_error($conn); 				}
 				}
 			?>
 		</div>

 		<!-- footer -->
 		<footer>
 			<div class="container">
			 <h5>Copyright &copy; 2024 = Persediaan Obat</h5>
 			</div>
 		</footer>
 		<script>
 			CKEDITOR.replace( 'deskripsi' );
 		</script>
</body>
</html>