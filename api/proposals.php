<?php
	require_once"../authorization/config.php";
	header('Comtent-Type: application/json');
	$json_input = file_get_contents('php://input');
	$data = json_decode($json_input, true);
	
	session_start();
	
	if(!isset($_SESSION['client'])){
		echo json_encode(
			[
				"status" => "error",
				"message" => "Session Error"
			]
		);
		exit;
	}
	
	$email = validation_email($_SESSION['client']);
	$client_id = validation_number($_SESSION['client_id']);

	$email = esc($conn, $email);
	$client_id = esc($conn, $client_id);
	
	$sql = mysqli_query($conn, "SELECT 
									proposals.freelancer_id,
									proposals.job_id,
									freelancer.name,
									freelancer.id,
									freelancer.profile_p,
									freelancer.skills,
									freelancer.about
								FROM proposals
								JOIN freelancer
									ON proposals.freelancer_id = freelancer.id
								JOIN jobs
									ON proposals.job_id = jobs.id
								WHERE jobs.email = '$email'
								");
	$data = mysqli_fetch_all($sql, MYSQLI_ASSOC);
	$check = mysqli_query($conn, "SELECT DISTINCT(reciever_id) FROM `messages` WHERE `sender_id` = '$client_id'");
	$data2 = mysqli_fetch_all($check, MYSQLI_ASSOC);
	
	if($sql){
		echo json_encode([
			"status" => "success",
			"data" => $data,
			"check" => $data2
		]);
	}
	exit;
?>