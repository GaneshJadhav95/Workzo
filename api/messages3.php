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
		if($message === ""){
			echo json_encode([
				"status" => "unsuccess",
				"message" => "sorry"
			]);
		}else{
			$sql = mysqli_query($conn, "INSERT INTO `messages`(`sender_id`, `reciever_id`, `message_id`, `message`, `sender_type`) VALUES('$sender', '$reciever', '$message_id', '$message', '$type')");
		
			if($sql){
				$message = mysqli_query($conn, "SELECT * FROM `messages` WHERE `message_id` = '$message_id' ORDER BY created_at");
				$data = mysqli_fetch_all($message, MYSQLI_ASSOC);
				
				echo json_encode([
					"status" => "success",
					"message" => $data
				]);
			}
			exit;
		}
	}
?>