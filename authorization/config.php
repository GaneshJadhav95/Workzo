<?php
	$hostname = "localhost";
	$user = "root";
	$password = "";
	$dbname = "workzo";
	$conn = mysqli_connect($hostname, $user, $password, $dbname);
	
	$ip = $_SERVER['REMOTE_ADDR'];
	$url = $_SERVER['REQUEST_URI'];
	
	$sql = mysqli_query($conn, "INSERT INTO `active_users`(`users`, `url`) VALUES('$ip', '$url')");

	function validation($data){
		$data = trim($data);          
		$data = htmlspecialchars($data);
		$data = stripslashes($data);
		return $data;
	}

	function validation_email($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = filter_var($data, FILTER_SANITIZE_EMAIL);
		return $data;
	}

	function validation_number($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = filter_var($data, FILTER_SANITIZE_NUMBER_INT);
		return $data;
	}

	function esc($conn, $data){
		$data = mysqli_real_escape_string($conn, $data);
		return $data;
	}
?>