<?php	
	require_once"../authorization/config.php";
	
	if ($_SERVER["REQUEST_METHOD"] === "POST") {
		if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['contact']) && isset($_FILES['profile_p']) && isset($_POST['password']) && isset($_POST['city']) && isset($_POST['state']) && isset($_POST['country']) && isset($_POST['company']) && isset($_POST['about']) && isset($_POST['servises'])){
			$name = validation($_POST['name']);
			$email = validation_email($_POST['email']);
			$contact = validation_number($_POST['contact']);
			$password = validation($_POST['password']);
			$city = validation($_POST['city']);
			$state = validation($_POST['state']);
			$country = validation($_POST['country']);
			$company = validation($_POST['company']);
			$about = validation($_POST['about']);
			$servises = validation($_POST['servises']);

			$name = esc($conn, $name);
			$email = esc($conn, $email);
			$contact = esc($conn, $contact);
			$password = esc($conn, $password);
			$city = esc($conn, $city);
			$state = esc($conn, $state);
			$country = esc($conn, $country);
			$company = esc($conn, $company);
			$about = esc($conn, $about);
			$servises = esc($conn, $servises);

			$check = mysqli_query($conn, "SELECT * FROM `client` WHERE `email` = '$email' || `contact` = '$contact'");
	
			$uploadDir = "../public/assets/client/";
			$allowedTypes = ["jpg", "jpeg", "png"];
			$maxSize = 2 * 1024 * 1024; // 2 MB
	
			$fileName = basename($_FILES["profile_p"]["name"]);
			$fileSize = $_FILES["profile_p"]["size"];
			$fileTmp  = $_FILES["profile_p"]["tmp_name"];
			$fileExt  = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
	
			// Create uploads folder if it doesn't exist
			if (!is_dir($uploadDir)) {
				mkdir($uploadDir, 0755, true);
			}
	
			// Validation
			if (!in_array($fileExt, $allowedTypes)) {
				echo "<script>
						alert('❌ File type not allowed.');
						window.location.href='../client-signup.php';
					</script>";
			} elseif ($fileSize > $maxSize) {
				echo "<script>
						alert('❌ File is too large (max 2MB).');
						window.location.href='../client-signup.php';
					</script>";
			} else {
				$newName = uniqid("assets_", true) . "." . $fileExt;
				$destination = $uploadDir . $newName;
	
				if (move_uploaded_file($fileTmp, $destination)) {
					if(mysqli_num_rows($check) > 0){
						echo "<script>
								alert('Details Already Used');
								window.location.href='../client-signup.php';
							</script>";
					} else{
						$sql = mysqli_query($conn, "INSERT INTO `client`(`name`, `email`, `contact`, `profile_p`, `password`, `city`, `state`, `country`, `company`, `about`, `servises`) VALUES('$name', '$email', '$contact', '$newName', '$password', '$city', '$state', '$country', '$company', '$about', '$servises')");	
						if($sql){
							echo "<script>
									alert('✅ File uploaded successfully! and inserted into database');
									window.location.href='../client-login.php';
								</script>";							
						}else{
							echo "<script>
								alert('not updated in db');
								window.location.href='../client-signup.php';
							</script>";
						}
					} 
				} else {
					echo "<script>
							alert('❌ Error uploading file.');
							window.location.href='../client-signup.php';
						</script>";
				}
			}
		}else {
			echo "<script>
					alert('❌ No file selected.');
					window.location.href='../client-signup.php';
				</script>";
		}
	}
?>