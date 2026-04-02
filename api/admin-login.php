<?php
	require_once "../authorization/config.php";
	session_start();

	if (isset($_POST['email']) && isset($_POST['password'])) {

		$email = validation_email($_POST['email']);
		$password = validation($_POST['password']);

		$email = esc($conn, $email);

		// Fetch user by email only
		$check = $conn->prepare("SELECT id, password FROM `admin` WHERE `email` = ?");
		$check->bind_param("s", $email);
		$check->execute();

		$result = $check->get_result();

		if ($result->num_rows > 0) {
			$user = $result->fetch_assoc();

			// Verify password
			if (password_verify($password, $user['password'])) {

				$_SESSION['admin'] = $user['id'];
				header("Location: ../admin/dashboard.php");
				exit;

			} else {
				echo "<script>
					alert('Invalid Email or Password');
					window.location.href = '../admin/login.php';
				</script>";
			}

		} else {
			echo "<script>
				alert('Invalid Email or Password');
				window.location.href = '../admin/login.php';
			</script>";
		}

	} else {
		header("Location: ../admin/login.php");
		exit;
	}
?>