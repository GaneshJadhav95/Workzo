<?php
	require_once"../authorization/config.php";
	session_start();
	header('Content-type: application/json');
	$json_input = file_get_contents('php://input');
	$data = json_decode($json_input, true);
	
	if(!isset($_SESSION['freelancer'])){
		echo json_encode(
			[
				"status" => "error",
				"message" => "Session Error",
			]
		);
		exit;
	}
	
	$email = $_SESSION['freelancer'];
	
	if(isset($data['job_id'])){
		$job_id = validation_number($data['job_id']);
		$job_id = esc($conn, $job_id);

		$sql = mysqli_query($conn, "SELECT * FROM `freelancer` WHERE `email` = '$email'");
		$row = mysqli_fetch_assoc($sql);
		$f_id = $row['id'];
		
		$ins = mysqli_query($conn, "INSERT INTO `proposals`(`freelancer_id`, `job_id`) VALUES('$f_id', '$job_id')");
		if($ins){
			echo json_encode([
				"status" => "success"
			]);
		}else{
			echo json_encode([
				"status" => "unsuccess"
			]);
		}
	}
?>