<?php	
	require_once"../authorization/config.php";
	session_start();
	
	if(!isset($_SESSION['freelancer'])){
		echo json_encode(
			[
				"status" => "error",
				"message" => "Session Error"
			]
		);
		exit;
	}
	
	$email1 = $_SESSION['freelancer'];
	
	if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['contact']) && isset($_POST['skills'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$contact = $_POST['contact'];
		$skills = $_POST['skills'];
		
		$sql = mysqli_query($conn, "UPDATE `freelancer` SET `name` = '$name', `email` = '$email', `contact` = '$contact', `skills` = '$skills' WHERE `email` = '$email1'");
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