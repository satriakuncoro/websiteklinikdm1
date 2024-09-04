<!DOCTYPE html>
<html>
<?php
	session_start();
	if($_SESSION['status_login'] = false) {
	echo '<script>window.location="login.php"</script>';
	};
 ?>
<head>
	<meta charset="utf-8">
	<meta  name="viewport" content="width-device-width, initial-scale=1">
	<title>Persediaan Obat</title>
	<link href="<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="style1.css">
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
 			<br>
 			<h1 style="text-align:center; font-weight: bold;"> SELAMAT DATANG DI KLINIK DYAH MEDIKA 1</h1>
 			<!-- <img src="images/gambar1.jpg" alt="Gambar Profil" style="width: 900px"> -->

 			<br>
 			<br>
 				<h3>Dashboard</h3>
 				<div class="box">
 			<h4>Selamat Datang <?php echo $_SESSION['a_global']->admin_name ?> di Persediaan Obat</h4>
 		</div>
 		<!-- footer -->
 		<footer>
 			<div class="container">
 				<h5>Copyright &copy; 2024 = Persediaan Obat</h5>
 			</div>
 		</footer>
</body>
</html>