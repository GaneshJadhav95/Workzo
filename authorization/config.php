<?php
	require('security.php');

	$hostname = "localhost";
	$user = "root";
	$password = "";
	$dbname = "workzo";
	$conn = mysqli_connect($hostname, $user, $password, $dbname);
	
	$ip = $_SERVER['REMOTE_ADDR'];
	$url = $_SERVER['REQUEST_URI'];
	
	$sql = mysqli_query($conn, "INSERT INTO `active_users`(`users`, `url`) VALUES('$ip', '$url')");
?>