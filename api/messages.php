<?php
	require_once"../authorization/config.php";
	session_start();
	header('Content-Type: application/json');
	$json_input = file_get_contents('php://input');
	$data = json_decode($json_input, true);
	
	if(!isset($_SESSION['client'])){
		echo json_encode(
			[
				"status" => "error",
				"message" => "Session Error"
			]
		);
		exit;
	}
		
	
	if(isset($data['reciver_id']) && isset($data['message']) && isset($data['type'])){
		$reciever = validation_number($data['reciver_id']);
		$message = validation($data['message']);
		$type = validation($data['type']);

		$reciever = esc($conn, $reciever);
		$message = esc($conn, $message);
		$type = esc($conn, $type);

		$sender = validation_number($_SESSION['client_id']);
		$sender = esc($conn, $sender);
		
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