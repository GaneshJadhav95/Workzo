<?php
	require_once"../authorization/config.php";
	session_start();
	header('Comtent-Type: application/json');
	$json_input = file_get_contents('php://input');
	$data = json_decode($json_input, true);
	
	if(!isset($_SESSION['freelancer']) || !isset($_SESSION['client'])){
		echo json_encode(
			[
				"status" => "error",
				"message" => "Session Error"
			]
		);
		exit;
	}
		
	$client = $_SESSION['client'];
	$freelancer = $_SESSION['freelancer'];
	
	if(isset($data['reciver_id']) && isset($data['message']) && isset($data['type'])){
		$sender = $data['reciver_id'];
		$message = $data['message'];
		$type = $data['type'];
		
		$re = mysqli_query($conn, "SELECT * FROM `freelancer` WHERE `email` = '$freelancer'");
		$d = mysqli_fetch_assoc($re);
		$reciever = $d['id'];
		
		$message_id = $sender . $reciever;
		
		$sql = mysqli_query($conn, "INSERT INTO `messages`(`sender_id`, `reciever_id`, `message_id`, `message`, `sender_type`) VALUES('$sender', '$reciever', '$message_id', '$message', '$type')");
		
		if($sql){
			echo json_encode([
				"status" => "success",
				"message" => "ok"
			]);
		}
		exit;
	}
?>