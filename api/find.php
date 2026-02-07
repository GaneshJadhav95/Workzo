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
	$email = $_SESSION['freelancer'];
	
	if(isset($data['job_type']) && isset($data['experience'])){
		$job_type = $data['job_type'];
		$experience = $data['experience'];
		
		$where = "1=1 ";
		if(!empty($job_type)){
			$ajit = "'". implode("','", $job_type) . "'";
			$where .= " AND `job_type` IN ($ajit)";
		}
		
		if(!empty($experience)){
			$ganesh = "'". implode("','", $experience) . "'";
			$where .= " AND `experience` IN ($ganesh)";
		}
		
		//$sql = mysqli_query($conn, "SELECT * FROM `jobs` WHERE $where");
		$sql = mysqli_query($conn, "SELECT jobs.*, proposals.job_id FROM `jobs` LEFT JOIN proposals ON ((SELECT id FROM freelancer WHERE email = '$email') = proposals.freelancer_id AND jobs.id = proposals.job_id) WHERE $where");
		/*
		if(mysqli_num_rows($sql) > 0){
			
			
			while($row = mysqli_fetch_assoc($sql)){
				$data[] = $row;
			}
		}
		*/
		$data = mysqli_fetch_all($sql, MYSQLI_ASSOC);
		
		echo json_encode(
			[
				"status" => "success",
				"data" => $data
			]
		);
		exit;
	}
?>