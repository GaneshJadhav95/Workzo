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
		$name = validation($_POST['name']);
		$email = validation_email($_POST['email']);
		$contact = validation_number($_POST['contact']);
		$skills = validation($_POST['skills']);

		$name = esc($conn, $name);
		$email = esc($conn, $email);
		$contact = esc($conn, $contact);
		$skills = esc($conn, $skills);
		
		$sql = $conn->prepare("UPDATE `freelancer` SET `name` = ?, `email` = ?, `contact` = ?, `skills` = ? WHERE `email` = ?");
		$sql->bind_param("ssiss", $name, $email, $contact, $skills, $email1);
		$sql->execute();
		$sql->get_result();
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
	}else{
		echo json_encode(
			[
				"status" => "error",
				"message" => "Invalid Input"
			]
		);
	}
?>