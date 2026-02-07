<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Sign Up | Workzo</title>
		<script src="https://cdn.tailwindcss.com"></script>
		
		<style>
			/* Gradient animation */
			@keyframes gradient {
			0% { background-position: 0% 50%; }
			50% { background-position: 100% 50%; }
			100% { background-position: 0% 50%; }
			}
			.animate-gradient {
			background-size: 200% 200%;
			animation: gradient 10s ease infinite;
			}
		
			/* Blob animation */
			@keyframes blob {
			0%, 100% { transform: translate(0, 0) scale(1); }
			50% { transform: translate(30px, -40px) scale(1.1); }
			}
			.animate-blob {
			animation: blob 12s infinite;
			}
			.animation-delay-2000 {
			animation-delay: 2s;
			}
		</style>
	</head>
	
	<body class="min-h-screen flex items-center justify-center relative overflow-hidden bg-[#0F172A]">
		
		<!-- Animated Gradient Background -->
		<div class="absolute inset-0 bg-gradient-to-br from-[#0F172A] via-[#020617] to-[#0F172A] animate-gradient"></div>
		
		<!-- Glow Blobs -->
		<div class="absolute w-72 h-72 bg-green-500/20 rounded-full blur-3xl top-10 left-10 animate-blob"></div>
		<div class="absolute w-96 h-96 bg-teal-500/20 rounded-full blur-3xl bottom-10 right-10 animate-blob animation-delay-2000"></div>
		
		<!-- Main Content -->
		<div class="relative z-10 w-full max-w-xl px-6">
		
			<!-- Logo -->
			<div class="text-center mb-8">
				<h1 class="text-3xl font-bold text-green-500">Workzo</h1>
			</div>
		
			<!-- Card -->
			<div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-xl p-8 text-white">
		
				<h2 class="text-2xl font-semibold mb-6 text-center">
					Login as a client or freelancer
				</h2>
				
				<form>
					<!-- Role Selection -->
					<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
				
					<!-- Client -->
					<label class="cursor-pointer">
						<a href="client-login.php">
							<input type="radio" name="role" class="peer hidden">
							<div
							class="border border-white/20 rounded-xl p-5 flex gap-4 transition
									peer-checked:border-green-500 peer-checked:shadow-lg
									hover:border-green-500"
							>
							<span class="text-2xl">👤</span>
							<div>
								<p class="font-semibold">I’m a client</p>
								<p class="text-sm text-gray-400">Hiring for a project</p>
							</div>
							</div>
						</a>
					</label>
				
					<!-- Freelancer -->
					<label class="cursor-pointer">
						<a href="user-login.php">
							<input type="radio" name="role" class="peer hidden">
							<div
							class="border border-white/20 rounded-xl p-5 flex gap-4 transition
									peer-checked:border-green-500 peer-checked:shadow-lg
									hover:border-green-500"
							>
							<span class="text-2xl">💼</span>
							<div>
								<p class="font-semibold">I’m a freelancer</p>
								<p class="text-sm text-gray-400">Looking for work</p>
							</div>
							</div>
						</a>
					</label>
				
					</div>
				</form>
			</div>
		</div>
	
	</body>
</html>