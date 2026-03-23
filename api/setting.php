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
	
	$email1 = $_SESSION['client'];
	
	if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['contact']) && isset($_POST['company'])){
		$name = validation($_POST['name']);
		$email = validation_email($_POST['email']);
		$contact = validation_number($_POST['contact']);
		$company = validation($_POST['company']);

		$name = esc($conn, $name);
		$email = esc($conn, $email);
		$contact = esc($conn, $contact);
		$company = esc($conn, $company);

		$sql = mysqli_query($conn, "UPDATE `client` SET `name` = '$name', `email` = '$email', `contact` = '$contact', `company` = '$company' WHERE `email` = '$email1'");
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