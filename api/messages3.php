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
				"message" => "Session Error3"
			]
		);
		exit;
	}
		
	
	if(isset($data['reciver_id']) && isset($data['message']) && isset($data['type'])){
		$reciever = validation_number($data['reciver_id']);
		$message = validation($data['message']);
		$type = validation($data['type']);
		$sender = $_SESSION['client_id'];
		
		$reciever = esc($conn, $reciever);
		$message = esc($conn, $message);
		$type = esc($conn, $type);

		$message_id = $sender . $reciever;
		if($message === ""){
			echo json_encode([
				"status" => "unsuccess",
				"message" => "sorry"
			]);
		}else{
			//$sql = mysqli_query($conn, "INSERT INTO `messages`(`sender_id`, `reciever_id`, `message_id`, `message`, `sender_type`) VALUES('$sender', '$reciever', '$message_id', '$message', '$type')");
			$sql = $conn->prepare("INSERT INTO `messages`(`sender_id`, `reciever_id`, `message_id`, `message`, `sender_type`) VALUES(?, ?, ?, ?, ?)");
			$sql->bind_param("iiiss", $sender, $reciever, $message_id, $message, $type);
			$sql->execute();
			
			if($sql){
				//$message = mysqli_query($conn, "SELECT * FROM `messages` WHERE `message_id` = '$message_id' ORDER BY created_at");
				$message = $conn->prepare("SELECT * FROM `messages` WHERE `message_id` = ? ORDER BY created_at");
				$message->bind_param("i", $message_id);
				$message->execute();
				$a = $message->get_result();
				$data = $a->fetch_all(MYSQLI_ASSOC);
				echo json_encode([
					"status" => "success",
					"message" => $data
				]);
			}
			exit;
		}
	}
?>