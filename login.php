<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta  name="viewport" content="width-device-width, initial-scale=1">
	<title>Login | Persediaan Obat</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<link href="<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>
<body id="bg-login">
	<div class="box-login">
		<h1 style="text-align:center">Klinik Dyah Medika 1</h1>
		<h2>Login</h2>
		<form action="" method="POST">
			<input type="text" name="user" placeholder="username" class="input-control">
			<input type="password" name="pass" placeholder="password" class="input-control">
			<input type="submit" name="submit" placeholder="Login" class="btn">
		</form>
		<?php 
		if(isset($_POST['submit'])){
			session_start();
			include 'db.php';

			$user = mysqli_real_escape_string($conn, $_POST['user']);
			$pass = mysqli_real_escape_string($conn,$_POST['pass']);

			$cek = "SELECT * FROM tb_admin WHERE username = '$user' AND password = '$pass'";
			$sql = mysqli_query($conn, $cek);

			if(mysqli_num_rows($sql) > 0){
					echo 'login berhasil';
				$d = mysqli_fetch_object($sql);
				$_SESSION['status_login'] = true;
				$_SESSION['a_global'] = $d;
				$_SESSION['id'] = $d->admin_id;
				// $_SESSION['name'] = $d->admin_name; 
				echo '<script>window.location="dashboard.php"</script>';
			}else{
				echo '<script>alert("Username atau password Anda salah!")</script>';
			}
		}
		?>
	</div>
</body>
</html>