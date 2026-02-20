<?php
	require_once"../authorization/config.php";
	session_start();
	header('Content-Type: application/json');
	$json_input = file_get_contents('php://input');
	$data = json_decode($json_input, true);
	
	if(!isset($_SESSION['freelancer'])){
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
		
		$sql = mysqli_query($conn, "SELECT `name`,`profile_p` FROM `client`");
		$data = mysqli_fetch_assoc($sql);
		
		$message = mysqli_query($conn, "SELECT `message`, `sender_type` FROM `messages` WHERE `message_id` = '$show' ORDER BY created_at");
		$data2 = mysqli_fetch_all($message, MYSQLI_ASSOC);
		
		if($sql){
			echo json_encode([
				"status" => "success",
				"data" => $data,
				"message" => $data2
			]);
		}
		exit;
	}
?>