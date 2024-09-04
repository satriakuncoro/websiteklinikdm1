<?php
	session_start();
	include 'db.php';
	if($_SESSION['status_login'] != false) {
		echo '<script>window.location="login.php"</script>';
	}
	$id1 = $_GET['id'];
	$sql=mysqli_query($conn, "Select * from tb_kategori where kategori_id = '$id1'");
	$data=mysqli_fetch_array($sql);
	
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
 				<h3>Edit Data Obat</h3>
 				<div class="box">
					 
 			  <form action="" method="post">
 				<input type="text" name="id" placeholder="ID Obat" class="input-control" value="<?php echo $data['kategori_id'] ?>">
 				<input type="text" name="nama" placeholder="Nama Obat" class="input-control" value="<?php echo $data['kategori_nama_obat'] ?>" required>
				 <input type="text" name="Tanggal_beli" placeholder="Tanggal beli" class="input-control" value="<?php echo $data['Tanggal_beli'] ?>" required>
				 <input type="text" name="Tanggal_keluar" placeholder="Tanggal keluar" class="input-control" value="<?php echo $data['Tanggal_keluar'] ?>" required>
				 <input type="text" name="Tanggal_expired" placeholder="Tanggal expired" class="input-control" value="<?php echo $data['Tanggal_expired'] ?>" required>
 				<input type="submit" name="submit" value="submit" class="btn">
 			</form>
 			<?php
 				if(isset($_POST['submit'])){
 					$id = $_POST['id'];
 					$name = $_POST['nama'];
 					$update = "UPDATE tb_kategori SET kategori_nama_obat = '$name' WHERE kategori_id = '$id'";
					 $sqll = mysqli_query($conn, $update);
 						// tanggal_beli = '$_POST[tanggal_beli]',
 						// tanggal_keluar = '$_POST[tanggal_keluar]',
 						// tanggal_expired = '$_POST[tanggal_expired]'where kategori_id=$_GET[update]") 
 					
 					if($sqll){
 						echo '<script>alert("Edit Data Berhasil")</script>';
 						echo '<script>window.location="data-kategori.php"</script>';
 					}else{
 						echo 'gagal' .mysqli_error($conn); 					
					}
				}
 			?>
 		</div>

 		<!-- footer -->
 		<footer>
 			<div class="container">
 				<h5>Copyright &copy; 2024 = Persediaan Obat</h5>
 			</div>
 		</footer>
</body>
</html>