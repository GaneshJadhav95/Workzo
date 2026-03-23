<?php	
	require_once"../authorization/config.php";
	session_start();
	if(isset($_POST['email']) && isset($_POST['password'])){
		$email = validation_email($_POST['email']);
		$password = validation($_POST['password']);

		$email = esc($conn, $email);
		$password = esc($conn, $password);

		$check = mysqli_query($conn, "SELECT * FROM `freelancer` WHERE `email` = '$email' AND `password` = '$password'");
		$st = mysqli_fetch_assoc($check);
		if(mysqli_num_rows($check) > 0){
			$_SESSION['freelancer'] = $email;
			$_SESSION['freelancer_id'] = $st['id'];
			header("Location: ../user-profile.php");
		}else{
			echo "<script>
					alert('Try Again');
					window.location.href = '../user-login.php';
				</script>";
		}
	}
?>