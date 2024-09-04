<?php
	session_start();
	include 'db.php';
	if($_SESSION['status_login'] = false) {
	echo '<script>window.location="login.php"</script>';
	};

	$query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id']."' ");
	$d = mysqli_fetch_object($query);
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
 				<h3>Profil</h3>
 				<div class="box">

 			  <form action="" method="POST">
 				<input type="hidden" name="id" class="input-control" value="<?php echo $d->admin_id ?>">
 				<input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?php echo $d->admin_name ?>" required>
 				<input type="text" name="user" placeholder="Username" class="input-control" value="<?php echo $d->username ?>" required>
 				<input type="text" name="hp" placeholder="No Hp" class="input-control" value="<?php echo $d->admin_telp ?>" required>
 				<input type="text" name="email" placeholder="Email" class="input-control" value="<?php echo $d->admin_email ?>" required>
 				<input type="text" name="alamat" placeholder="Alamat" class="input-control" value="<?php echo $d->admin_address ?>" required>
 				<input type="submit" name="submit" value="Ubah Profil" class="btn">
 			</form>

 			<?php 
 				if(isset($_POST['submit'])){

					$id = $_POST['id'];
 					$nama 	= ucwords($_POST['nama']);
 					$user 	= $_POST['user'];
 					$hp 	= $_POST['hp'];
 					$email 	= $_POST['email'];
 					$alamat = ucwords($_POST['alamat']);

 					$update = mysqli_query($conn, "UPDATE tb_admin SET 
 									admin_name = '$nama',
 									username = '$user',
 									admin_telp = '$hp',
 									admin_email = '$email',
 									admin_address = '$alamat'
 									WHERE admin_id = '$id'");
 					if($update){
 						echo '<script>alert("Ubah data berhasil")</script>';
 						echo '<script>window.location="profil1.php"</script>';
 						}else{
 							echo 'gagal'.mysqli_error($conn);
 						}
 					}
 			 ?>
 		</div>

 			<h3>Ubah Password</h3>
 				<div class="box">

 			  <form action="" method="POST">
 				<input type="hidden" name="id" value="<?php echo $d->admin_id ?>">
 				<input type="password" name="pass1" placeholder="Password Baru" class="input-control" required>
 				<input type="Password" name="pass2" placeholder="Konfirmasi Password Baru" class="input-control" required>
 				<input type="submit" name="ubah_password" value="Ubah Password" class="btn">
 			</form>

 			<?php 
 				if (isset($_POST['ubah_password'])) {

					$id = $_POST['id'];
 					$pass1	= $_POST['pass1'];
 					$pass2 	= $_POST['pass2'];

 					if($pass2 != $pass1){
 						echo '<script>alert("Konfirmasi Password Baru tidak sesuai")</script>';
 					 }else{

 					 	$ubah_password = mysqli_query($conn, "UPDATE tb_admin SET 
 									password = '$pass1'
 									WHERE admin_id = '$id'");
 					 	if($ubah_password){
 					 			echo '<script>alert("Ubah data berhasil"</script>';
 								echo '<script>window.location="profil1.php"</script>';
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
			 <h5>Copyright &copy; 2024 = Persediaan Obat</h5>
 			</div>
 		</footer>
</body>
</html>