<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Register | Workzo</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="public/styles/user-signup.css">
		<script src="https://cdn.tailwindcss.com"></script>
	</head>
	
	<body class="min-h-screen flex items-center justify-center relative overflow-hidden bg-[#0F172A]">
	
		<!-- Gradient Background -->
		<div class="absolute inset-0 bg-gradient-to-br from-[#0F172A] via-[#020617] to-[#0F172A] animate-gradient"></div>
	
		<!-- Glow Blobs -->
		<div class="absolute w-72 h-72 bg-green-500/20 rounded-full blur-3xl top-10 left-10 animate-blob"></div>
		<div class="absolute w-96 h-96 bg-teal-500/20 rounded-full blur-3xl bottom-10 right-10 animate-blob animation-delay-2000"></div>
	
		<!-- Content -->
		<div class="relative z-10 w-full max-w-2xl px-6">
	
			<!-- Logo -->
			<div class="text-center mb-6 text-white">
				<h1 class="text-4xl font-bold tracking-wide"><i>Workzo</i></h1>
				<p class="text-sm text-slate-300">Create your Clint account</p>
			</div>
	
			<!-- Progress -->
			<div class="mb-6">
				<div class="h-1 bg-white/20 rounded">
					<div id="progress" class="h-1 bg-green-500 rounded w-1/3 transition-all duration-500"></div>
				</div>
			</div>
	
			<form method="POST" action="api/client.php" onsubmit="return validatePassword()" enctype="multipart/form-data">
	
				<!-- STEP 1 -->
				<div id="step1" class="card">
					<h2 class="title">Account Details</h2>
	
					<div class="grid md:grid-cols-2 gap-4">
						<input required class="input" type="text" name="name" placeholder="Full Name">
						<input required class="input" type="email" name="email" placeholder="Email">
						<input required class="input" 
							type="tel" 
							minlength="10" 
							maxlength="10" 
							pattern="\d{10}" 
							title="Please enter exactly 10 digits" 
							name="contact" 
							placeholder="Contact"/>
	
						<label class="file-input">
							Upload Profile Photo
							<input type="file" name="profile_p" required hidden>
						</label>
	
						<input minlength="6" required type="password" class="input" name="password" id="password" placeholder="Password">
						<input minlength="6" required type="password" class="input" name="con-password" id="con_password" placeholder="Confirm Password">
						<p class="mt-1 text-sm text-black-500 dark:text-gray-300" id="message"></p>
						
						<div class="md:col-span-2">
							<button type="button" onclick="nextStep(2)" class="btn-primary">Next</button>
						</div>
					</div>
				</div>
	
				<!-- STEP 2 -->
				<div id="step2" class="card hidden">
					<h2 class="title">Personal Info</h2>
	
					<div class="grid md:grid-cols-2 gap-4">
						<select class="input" name="city">
							<option>Chh Sambhaji Nagar</option>
							<option>Mumbai</option>
							<option>Pune</option>
							<option>Nashik</option>
						</select>
						<select class="input" name="state">
							<option>Maharatra</option>
							<option>UP</option>
							<option>MP</option>
							<option>AP</option>
						</select>
						<select class="input" name="country">
							<option>India</option>
						</select>
						<input required name="company" class="input" placeholder="company Name">
	
						<textarea required name="about" class="input md:col-span-2" rows="3" placeholder="About you"></textarea>
	
						<div class="md:col-span-2 flex gap-4">
							<button type="button" onclick="back(1)" class="btn-outline">Back</button>
							<button type="button" onclick="nextStep(3)" class="btn-primary">Next</button>
						</div>
					</div>
				</div>
	
				<!-- STEP 3 -->
				<div id="step3" class="card hidden">
					<h2 class="title">Finish Setup</h2>
	
					<div class="grid gap-4">
						<input name="servises" required type="text" class="input" placeholder="Servises">
	
						<label class="flex items-center gap-2 text-sm text-slate-300">
							<input required type="checkbox" class="accent-green-500">
							I agree to Terms & Privacy Policy
						</label>
	
						<div class="flex gap-4">
							<button type="button" onclick="back(2)" class="btn-outline">Back</button>
							<button class="btn-primary">Create Account</button>
						</div>
					</div>
				</div>
	
			</form>
		</div>
	
		<!-- JS -->
		<script>
			function nextStep(step) {
				document.querySelectorAll('[id^="step"]').forEach(s => s.classList.add('hidden'));
				document.getElementById('step' + step).classList.remove('hidden');
	
				const progress = {1:'33%',2:'66%',3:'100%'};
				document.getElementById('progress').style.width = progress[step];
			}
			function back(step) { nextStep(step); }
			
			function validatePassword() {
				var password = document.getElementById("password").value;
				var confirm_password = document.getElementById("con_password").value;
				var message = document.getElementById("message");
			
				if (password === confirm_password) {
					message.innerHTML = "Passwords match!";
					message.style.color = "green";
					return true;
				} else {
					message.innerHTML = "Passwords do not match!";
					message.style.color = "red";
					return false; 
				}
			}
		</script>
	</body>
</html>