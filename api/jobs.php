<?php	
	require_once"../authorization/config.php";
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
	
	$email = $_SESSION['client'];
	
	if(isset($_POST['title']) && isset($_POST['about']) && isset($_POST['type']) && isset($_POST['min']) && isset($_POST['max']) && isset($_POST['level']) && isset($_POST['skills'])){
		$title = $_POST['title'];
		$about = $_POST['about'];
		$type = $_POST['type'];
		$min = $_POST['min'];
		$max = $_POST['max'];
		$level = $_POST['level'];
		$skills = $_POST['skills'];
		
		$sql = mysqli_query($conn, "INSERT INTO `jobs`(`title`, `email`, `detail`, `job_type`, `min_budget`, `max_budget`, `experience`, `skills`) VALUES('$title', '$email', '$about', '$type', '$min', '$max', '$level', '$skills')");
		if($sql){
			echo json_encode(
				[
					"status" => "success",
					"message" => "Inserted"
				]
			);
		}else{
			echo json_encode(
				[
					"status" => "unsuccess",
					"message" => "Not Inserted"
				]
			);
		}
	}
?>