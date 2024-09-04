<?php
	$hostname = 'localhost';
	$username = 'root';
	$password = "123456";
	$dbname = 'persediaanobat';
 $conn= mysqli_connect($hostname, $username, $password, $dbname) or die ('Gagal tersambung ke database');
?>