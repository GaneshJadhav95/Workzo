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

		$sql = $conn->prepare("SELECT * FROM `freelancer` WHERE `email` = ?");
		$sql->bind_param("s", $email);
		$sql->execute();
		$row1 = $sql->get_result();
		$row = $row1->fetch_assoc();
	
		$f_id = validation_number($row['id']);
		$f_id = esc($conn, $f_id);

		$f = $conn->prepare("SELECT * FROM `jobs` WHERE `id` = ?");
		$f->bind_param("i", $job_id);
		$f->execute();
		$a = $f->get_result();

		if($a->num_rows > 0){
			$ins = $conn->prepare("INSERT INTO `proposals`(`freelancer_id`, `job_id`) VALUES(?, ?)");
			$ins->bind_param("ii", $f_id, $job_id);
			$ins->execute();
			
			if($ins){
				echo json_encode([
					"status" => "success"
				]);
			}else{
				echo json_encode([
					"status" => "unsuccess"
				]);
			}
		}else{
			echo json_encode([
				"status" => "error",
				"message" => "User Not Found"
			]);
		}
	}else{
		echo json_encode([
			"status" => "error",
			"message" => "Invalid Input"
		]);
	}
?>