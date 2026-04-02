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
	
	$email = $_SESSION['client'];
	
	if(isset($data['job_id'])){
		$job_id = validation_number($data['job_id']);
		$job_id = esc($conn, $job_id);

		//$sql = mysqli_query($conn, "SELECT * FROM `jobs` WHERE `id` = '$job_id'");
		$sql = $conn->prepare("SELECT * FROM `jobs` WHERE `id` = ?");
		$sql->bind_param("i", $job_id);
		$sql->execute();
		$result = $sql->get_result();
		$row = $result->fetch_assoc();
		if($sql){
			echo json_encode(
				[
					"status" => "success",
					"data" => $row
				]
			);
		}else{
			echo json_encode(
				[
					"status" => "unsuccess",
					"data" => "Data Not Found"
				]
			);
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