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
	
	if(isset($_POST['h_id']) && isset($_POST['title']) && isset($_POST['about']) && isset($_POST['type']) && isset($_POST['min']) && isset($_POST['max']) && isset($_POST['level']) && isset($_POST['skills'])){
		$id = $_POST['h_id'];
		$title = $_POST['title'];
		$about = $_POST['about'];
		$type = $_POST['type'];
		$min = $_POST['min'];
		$max = $_POST['max'];
		$level = $_POST['level'];
		$skills = $_POST['skills'];
		
		$sql = mysqli_query($conn, "UPDATE `jobs` SET `title`='$title', `detail`='$about',`job_type`='$type',`min_budget`='$min',`max_budget`='$max',`experience`='$level',`skills`='$skills' WHERE `email` = '$email' AND `id` = '$id'");
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