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
			<li><a href="profil.html">Profil</a></li>
			<li><a href="data-kategori.php">Data Kategori</a></li>
			<li><a href="data-produk.php">Data Obat</a></li>
			<li><a href="login.php">Keluar</a></li>
		</ul>
	</div>
 </header>
 		<!--content -->
 		<div class="section">
 			<div class="container">
 				<h3>Tambah Data Produk</h3>
 				<div class="box">
 			<form>
 			  <form action="" method="POST" enctype="multipart/form-data">
 				<select  class="input-control" name="kategori" required>
 					<option value="">--pilih--</option>
 					<?php
 						$kategori = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY kategori_id DESC");
 							while ($r = mysqli_fetch_array($kategori)) {
 					?>
 					<option value="<?php echo $r['kategori_id'] ?>"><?php echo $r['kategori_nama_obat'] ?></option>
 					<?php } ?>
 				</select>

 				<input type="text" name="nama" class="input-control" placeholder="Nama Obat" required>
 				<input type="text" name="harga" class="input-control" placeholder="Harga" required>
 				<input type="text" name="qty" class="input-control" placeholder="Qty" required>
 				<p>Tanggal Beli</p>
 				<input type="date" name="dateForm" value="<?php echo date('Y-m-d'); ?>" placeholder="tgl_beli"/>
 				<p>Tanggal Keluar</p>	
 				<input type="date" name="dateForm" value="<?php echo date('Y-m-d'); ?>" placeholder="tgl_keluar"/>
 				<p>Tanggal Expired </p>	
 				<input type="date" name="dateForm" value="<?php echo date('Y-m-d'); ?>" placeholder="tgl_expired"/>
 				<textarea class="input-control" name="deskripsi" placeholder="Deskripsi"></textarea><br>
 				<select class="input-control" name="status">
 					<option value="">--pilih--</option>
 					<option value="1">--Aktif--</option>
 					<option value="0">--Tidak  Aktif--</option>
 				</select>
 				<input type="submit" name="submit" value="Submit" class="btn">
 			</form>
 			<?php
 					if(isset($_POST['submit'])){

 					 	// print_r($file['gambar']);
 						// menampung inputan dari form
 						$kategori = $_POST['kategori'];
 						$nama = $_POST['nama'];
 						$harga = $_POST['harga'];
 						$qty = $_POST['qty'];
 						$tgl_beli = $_POST['tgl_beli'];
 						$tgl_keluar = $_POST['tgl_keluar'];
 						$tgl_expired = $_POST['tgl_expired'];

 						// menampung data file yang diupload
 						$file = $_FILES['gambar']['name'];
 						$tmp_name= $_FILES['gambar']['tmp_name'];

 						$type1 = explode('.',$filename);
 						$type2 = $type1[1];

 						$newname = 'produk'.time().''.$type2;

 						// menampung data format file  yang diizinkan
 						$tipe_diizzinkan = array('jpg', 'jpeg', 'png', 'gif');


 						// validasi format file
 						if(!in_array($type2, $tipe_diizinkan)){
 							// jika format file tidakada didalam tipe diizinkan
 							echo '<script>alert("Format file tidak diizinkan")</script>';

 						}else{
 						
 						// jika format file sesuai yang ada didalam  array tipe  diizinkan
 						// proses upload file sekaligus insert ke database
 							move_uploaded_file($tmp_name, './produk'.$newname);

 							$insert = mysqli_query($conn, "INSERT INTO tb_produk VALUES (
 								null,
 								'".$kategori."',
 								'".$nama."'
 								'".$harga."'
 								'".$qty."'
 								'".$tgl_beli."'
 								'".$tgl_keluar."'
 								'".$tgl_expired."'

 								) ");

 							if($insert){
 								echo '<script>alert("Tambah data berhasil")</script>';
 								echo '<script>window.location="data-produk.php"</script>';
 							}else{
 								echo 'gagal'.mysqli_error($conn);
 							}
 						}

 				}
 			?>
 		</div>

 		<!-- footer -->
 		<footer>
 			<div class="container">
 				<small>Copyright &copy; 2024 = Persediaan Obat</small>
 			</div>
 		</footer>
 		<script>
 			CKEDITOR.replace( 'deskripsi' );
 		</script>
</body>
</html>