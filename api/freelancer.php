<?php	
	require_once"../authorization/config.php";
	
	if ($_SERVER["REQUEST_METHOD"] === "POST") {
		if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['contact']) && isset($_FILES['profile_p']) && isset($_POST['password']) && isset($_POST['city']) && isset($_POST['state']) && isset($_POST['country']) && isset($_POST['education']) && isset($_POST['college']) && isset($_POST['skills']) && isset($_POST['about']) && isset($_POST['rate'])){
			$name = $_POST['name'];
			$email = $_POST['email'];
			$contact = $_POST['contact'];
			$password = $_POST['password'];
			$city = $_POST['city'];
			$state = $_POST['state'];
			$country = $_POST['country'];
			$education = $_POST['education'];
			$college = $_POST['college'];
			$skills = $_POST['skills'];
			$about = $_POST['about'];
			$h_rate = $_POST['rate'];
	
			$check = mysqli_query($conn, "SELECT * FROM `freelancer` WHERE `email` = '$email' || `contact` = '$contact'");
	
			$uploadDir = "../public/assets/freelancer/";
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
						window.location.href='../user-signup.php';
					</script>";
			} elseif ($fileSize > $maxSize) {
				echo "<script>
						alert('❌ File is too large (max 2MB).');
						window.location.href='../user-signup.php';
					</script>";
			} else {
				$newName = uniqid("assets_", true) . "." . $fileExt;
				$destination = $uploadDir . $newName;
	
				if (move_uploaded_file($fileTmp, $destination)) {
					if(mysqli_num_rows($check) > 0){
						echo "<script>
								alert('Details Already Used');
								window.location.href='../user-signup.php';
							</script>";
					} else{
						$sql = mysqli_query($conn, "INSERT INTO `freelancer`(`name`, `email`, `contact`, `profile_p`, `password`, `city`, `state`, `country`, `education`, `college`, `skills`, `about`, `h_rate`) VALUES('$name', '$email', '$contact', '$newName', '$password', '$city', '$state', '$country', '$education', '$college', '$skills', '$about', '$h_rate')");	
						if($sql){
							echo "<script>
									alert('✅ File uploaded successfully! and inserted into database');
									window.location.href='../user-login.php';
								</script>";							
						}else{
							echo "<script>
								alert('not updated in db');
								window.location.href='../user-signup.php';
							</script>";
						}
					} 
				} else {
					echo "<script>
							alert('❌ Error uploading file.');
							window.location.href='../user-signup.php';
						</script>";
				}
			}
		}else {
			echo "<script>
					alert('❌ No file selected.');
					window.location.href='../user-signup.php';
				</script>";
		}
	}
?>