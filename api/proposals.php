<?php
	require_once"../authorization/config.php";
	header('Comtent-Type: application/json');
	$json_input = file_get_contents('php://input');
	$data = json_decode($json_input, true);
	
	session_start();
	
	if(!isset($_SESSION['client'])){
		echo json_encode(
			[
				"status" => "error",
				"message" => "Session Error"
			]
		);
		exit;
	}
	//$email = $_SESSION['client'];
	
	$sql1 = mysqli_query($conn, "SELECT * FROM `proposals`");
	$r = mysqli_fetch_assoc($sql1);
	$id = $r['freelancer_id'];
	$sql = mysqli_query($conn, "SELECT * FROM `freelancer` WHERE `id` = '$id'");
	$data = mysqli_fetch_assoc($sql);
	if($sql){
		echo json_encode([
			"status" => "success",
			"data" => $data
		]);
	}
	exit;
?>