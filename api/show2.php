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
		
	if(isset($data['show'])){
		$show = $data['show'];
		
		$sql = mysqli_query($conn, "SELECT * FROM `freelancer` WHERE `id` = '$show'");
		$data = mysqli_fetch_assoc($sql);
		
		$message = mysqli_query($conn, "SELECT * FROM `messages` WHERE `reciever_id` = '$show' AND `sender_type` = 'Client' ORDER BY created_at");
		$data2 = mysqli_fetch_all($message, MYSQLI_ASSOC);
		
		$message2 = mysqli_query($conn, "SELECT * FROM `messages` WHERE `sender_id` = '$show' AND `sender_type` = 'Freelancer' ORDER BY created_at");
		$data3 = mysqli_fetch_all($message2, MYSQLI_ASSOC);
		
		if($sql){
			echo json_encode([
				"status" => "success",
				"data" => $data,
				"message" => $data2,
				"message2" => $data3
			]);
		}
		exit;
	}
?>