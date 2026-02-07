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
		$job_id = $data['job_id'];
		
		$sql = mysqli_query($conn, "SELECT * FROM `jobs` WHERE `id` = '$job_id'");
		$row = mysqli_fetch_assoc($sql);
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
					"data" => "Data Not Fount"
				]
			);
		}
	}
?>