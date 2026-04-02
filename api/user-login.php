<?php	
	require_once"../authorization/config.php";
	session_start();
	if(isset($_POST['email']) && isset($_POST['password'])){
		$email = validation_email($_POST['email']);
		$password = validation($_POST['password']);

		$email = esc($conn, $email);

		//$check = mysqli_query($conn, "SELECT * FROM `freelancer` WHERE `email` = '$email' AND `password` = '$password'");
		$check = $conn->prepare("SELECT id, password FROM `freelancer` WHERE `email` = ?");
		$check->bind_param("s", $email);
		$check->execute();
		$a = $check->get_result();
		
		if($a->num_rows > 0){
			$st = $a->fetch_assoc();

			if(password_verify($password, $st["password"])){
				$_SESSION['freelancer'] = $email;
				$_SESSION['freelancer_id'] = $st['id'];
				header("Location: ../user-profile.php");
			}else{
				echo "<script>
					alert('Invalid Email or Password');
					window.location.href = '../user-login.php';
				</script>";
			}
		}else{
			echo "<script>
					alert('Try Again');
					window.location.href = '../user-login.php';
				</script>";
		}
	}
?>