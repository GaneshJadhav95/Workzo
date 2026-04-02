<?php
require_once "../authorization/config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['contact']) && isset($_FILES['profile_p']) && isset($_POST['password']) && isset($_POST['city']) && isset($_POST['state']) && isset($_POST['country']) && isset($_POST['education']) && isset($_POST['college']) && isset($_POST['skills']) && isset($_POST['about']) && isset($_POST['rate'])) {
		$name = validation($_POST['name']);
		$email = validation_email($_POST['email']);
		$contact = validation_number($_POST['contact']);
		$password = validation($_POST['password']);
		$city = validation($_POST['city']);
		$state = validation($_POST['state']);
		$country = validation($_POST['country']);
		$education = validation($_POST['education']);
		$college = validation($_POST['college']);
		$skills = validation($_POST['skills']);
		$about = validation($_POST['about']);
		$h_rate = validation_number($_POST['rate']);

		$errors = [];

		$name = esc($conn, $name);
		$email = esc($conn, $email);
		//$contact = esc($conn, $contact);
		//$password = password_hash($password, PASSWORD_DEFAULT);
		$city = esc($conn, $city);
		$state = esc($conn, $state);
		$country = esc($conn, $country);
		$education = esc($conn, $education);
		$college = esc($conn, $college);
		$skills = esc($conn, $skills);
		$about = esc($conn, $about);
		$h_rate = esc($conn, $h_rate);

		$check = $conn->prepare("SELECT * FROM `freelancer` WHERE `email` = ? OR `contact` = ?");
		$check->bind_param("si", $email, $contact);
		$check->execute();
		$check1 = $check->get_result();

		$uploadDir = "../public/assets/freelancer/";
		$allowedTypes = ["jpg", "jpeg", "png"];
		$maxSize = 2 * 1024 * 1024; // 2 MB

		$fileName = basename($_FILES["profile_p"]["name"]);
		$fileSize = $_FILES["profile_p"]["size"];
		$fileTmp = $_FILES["profile_p"]["tmp_name"];
		$fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
		$image_info = @getimagesize($fileTmp);

		// 🔒 ADDED: Check real image
		if ($image_info === false) {
			die("Invalid image file");
		}

		// 🔒 ADDED: Prevent double extension attack
		if (preg_match("/\.(php|phtml|php[0-9])$/i", $fileName)) {
			die("Dangerous file detected");
		}

		// Create uploads folder if it doesn't exist
		if (!is_dir($uploadDir)) {
			mkdir($uploadDir, 0755, true);
		}

		// Validation
		$finfo = finfo_open(FILEINFO_MIME_TYPE);
		$mime = finfo_file($finfo, $fileTmp);

		$allowedMime = ["image/jpeg", "image/png"];

		if (!in_array($mime, $allowedMime)) {
			die("Invalid file type");
		}

		// 🔒 ADDED: Extra MIME validation
		if (!in_array($mime, ["image/jpeg", "image/png"])) {
			die("Invalid MIME type");
		}

		if (!in_array($fileExt, $allowedTypes)) {
			echo "<script>
						alert('❌ File type not allowed.');
						window.location.href='../user-signup.php';
					</script>";
		} elseif (!$image_info[0] || !$image_info[1]) {
			echo "<script>
						alert('❌ Invalid Image dimensions');
						window.location.href='../user-signup.php';
					</script>";

		} elseif ($fileSize > $maxSize) {
			echo "<script>
						alert('❌ File is too large (max 2MB).');
						window.location.href='../user-signup.php';
					</script>";
		} else {
			// 🔒 ADDED: Strong random filename
			$secureName = bin2hex(random_bytes(16));
			$newName = $secureName . "." . $fileExt;

			$destination = $uploadDir . $newName;

			if (move_uploaded_file($fileTmp, $destination)) {
				if ($check1->num_rows > 0) {
					echo "<script>
								alert('Details Already Used');
								window.location.href='../user-signup.php';
							</script>";
					exit;
				} else {
					if (strlen($password) < 8) {
						$errors[] = "Password must be at least 8 characters long";
					}
					if (!preg_match("#[A-Z]+#", $password)) {
						$errors[] = "Password must contain at least one uppercase letter";
					}
					if (!preg_match("#[a-z]+#", $password)) {
						$errors[] = "Password must contain at least one lowercase letter";
					}
					if (!preg_match("#[0-9]+#", $password)) {
						$errors[] = "Password must contain at least one number";
					}
					if (!preg_match("#[\\W_]+#", $password)) {
						$errors[] = "Password must contain at least one special character";
					}
					if (!preg_match("/^[0-9]{10}$/", $contact)) {
						$errors[] = "Invalid Phone Number";
					}
					if (empty($errors)) {
						$contact = esc($conn, $contact);
						$password = password_hash($password, PASSWORD_DEFAULT);
						$sql = $conn->prepare("INSERT INTO `freelancer`(`name`, `email`, `contact`, `profile_p`, `password`, `city`, `state`, `country`, `education`, `college`, `skills`, `about`, `h_rate`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
						$sql->bind_param("ssisssssssssi", $name, $email, $contact, $newName, $password, $city, $state, $country, $education, $college, $skills, $about, $h_rate);
						$sql->execute();
						if ($sql) {
							echo "<script>
											alert('✅ File uploaded successfully! and inserted into database');
											window.location.href='../user-login.php';
										</script>";
						} else {
							echo "<script>
										alert('not updated in db');
										window.location.href='../user-signup.php';
									</script>";
						}
					} else {
						echo "<script>
							alert('" . implode("\\n", $errors) . "');
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
	} else {
		echo "<script>
					alert('❌ No file selected.');
					window.location.href='../user-signup.php';
				</script>";
	}
}
?>