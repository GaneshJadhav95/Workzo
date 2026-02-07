<?php	
	require_once"../authorization/config.php";
	session_start();
	if(isset($_POST['email']) && isset($_POST['password'])){
		$_SESSION['freelancer'] = $_POST['email'];
		$email = $_SESSION['freelancer'];
		$password = $_POST['password'];
		$check = mysqli_query($conn, "SELECT * FROM `freelancer` WHERE `email` = '$email' AND `password` = '$password'");
		$st = mysqli_fetch_assoc($check);
		if(mysqli_num_rows($check) > 0){
			header("Location: ../user-profile.php");
		}else{
			echo "<script>
					alert('Try Again');
					window.location.href = '../user-login.php';
				</script>";
		}
	}
?>