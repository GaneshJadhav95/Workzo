<?php	
	require_once"../authorization/config.php";
	session_start();
	if(isset($_POST['email']) && isset($_POST['password'])){
		$email = validation_email($_POST['email']);
		$password = validation($_POST['password']);

		$email = esc($conn, $email);

		$check = $conn->prepare("SELECT id, password FROM `client` WHERE `email` = ?");
		$check->bind_param("s", $email);
		$check->execute();

		$a = $check->get_result();
		
		if($a->num_rows > 0){	
            $st = $a->fetch_assoc();

			if(password_verify($password, $st['password'])){
				$_SESSION['client_id'] = $st['id'];
				$_SESSION['client'] = $email;
				header("Location: ../clint-profile.php");
			} else {
				echo "<script>
					alert('Invalid Email or Password');
					window.location.href = '../client-login.php';
				</script>";
			}
		}else{
			echo "<script>
				alert('Try Again');
				window.location.href = '../client-login.php';
			</script>";
		}
	}
?>