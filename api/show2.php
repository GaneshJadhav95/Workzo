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
				"message" => "Session Error123"
			]
		);
		exit;
	}
	
	
	if(isset($data['show']) && isset($data['id'])){
		$show = validation_number($data['show']);
		$id = validation_number($data['id']);
		
		$show = esc($conn, $show);
		$id = esc($conn, $id);

		//$sql = mysqli_query($conn, "SELECT `name`,`profile_p` FROM `freelancer` WHERE `id` = '$id'");
		$sql = $conn->prepare("SELECT `name`,`profile_p` FROM `freelancer` WHERE `id` = ?");
		$sql->bind_param("i", $id);
		$sql->execute();
		$result = $sql->get_result();
		$data = $result->fetch_assoc();
		
		//$message = mysqli_query($conn, "SELECT `message`, `sender_type` FROM `messages` WHERE `message_id` = '$show' ORDER BY created_at");
		$message = $conn->prepare("SELECT `message`, `sender_type` FROM `messages` WHERE `message_id` = ? ORDER BY created_at");
		$message->bind_param("i", $show);
		$message->execute();
		$result2 = $message->get_result();
		$data2 = $result2->fetch_all(MYSQLI_ASSOC);
		
		if($sql){
			echo json_encode([
				"status" => "success",
				"data" => $data,
				"message" => $data2
			]);
		}
	}else{
		echo json_encode(
			[
				"status" => "error",
				"message" => "Invalid Input"
			]
		);
	}
?>