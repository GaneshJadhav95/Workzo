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
		$id = validation_number($_POST['h_id']);
		$title = validation($_POST['title']);
		$about = validation($_POST['about']);
		$type = validation($_POST['type']);
		$min = validation_number($_POST['min']);
		$max = validation_number($_POST['max']);
		$level = validation($_POST['level']);
		$skills = validation($_POST['skills']);
		
		$title = esc($conn, $title);
		$about = esc($conn, $about);
		$type = esc($conn, $type);
		$min = esc($conn, $min);
		$max = esc($conn, $max);
		$level = esc($conn, $level);
		$skills = esc($conn, $skills);

		$sql = mysqli_query($conn, "UPDATE `jobs` SET `title`='$title', `detail`='$about',`job_type`='$type',`min_budget`='$min',`max_budget`='$max',`experience`='$level',`skills`='$skills' WHERE `email` = '$email' AND `id` = '$id'");
		if($sql){
			echo json_encode(
				[
					"status" => "success",
					"message" => "Updated Successfully"
				]
			);
		}else{
			echo json_encode(
				[
					"status" => "unsuccess",
					"message" => "Not Updated"
				]
			);
		}
	}
?>