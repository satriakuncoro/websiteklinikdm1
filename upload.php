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
	<title>Import Excel Disini</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
 
	p{
		color: green;
	}
</style>
<h2>Import Excel Disini</h2>
 
<a href="data-kategori.php">Kembali</a>
<br/><br/>

<form method="post" enctype="multipart/form-data" action="data-kategori.php">
	Pilih File: 
	<input name="filepegawai" type="file" required="required"> 
	<input name="upload" type="submit" value="Import">
</form>
 
<br/><br/>
 
<div class="container">
 				<small>Copyright &copy; 2024 = Persediaan Obat</small>
 </div>
 
</body>
</html>