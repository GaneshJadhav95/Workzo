<?php	
	require_once"../authorization/config.php";
	session_start();
	if(isset($_POST['email']) && isset($_POST['password'])){
		//$_SESSION['login_type'] = "client";
		$email = $_POST['email'];
		$password = $_POST['password'];
		$check = mysqli_query($conn, "SELECT id FROM `client` WHERE `email` = '$email' AND `password` = '$password'");
		$st = mysqli_fetch_assoc($check);
		if(mysqli_num_rows($check) > 0){
			$_SESSION['client_id'] = $st['id'];
			$_SESSION['client'] = $email;
			header("Location: ../clint-profile.php");
		}else{
			echo "<script>
				alert('Try Again');
				window.location.href = '../client-login.php';
			</script>";
		}
	}
?>