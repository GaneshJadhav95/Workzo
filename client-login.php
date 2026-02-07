<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Login | Workzo</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://cdn.tailwindcss.com"></script>
		<style>
			.input {
				width: 100%;
				background: #020617;
				border: 1px solid #334155;
				border-radius: 0.75rem;
				padding: 0.7rem 1rem;
				color: white;
				font-size: .9rem;
			}
			.input:focus {
				outline: none;
				border-color: #22C55E;
			}
			.btn-primary {
				background: #22C55E;
				color: #052E16;
				padding: 0.7rem;
				border-radius: 9999px;
				font-weight: 600;
			}
			.btn-primary:hover {
				background: #16A34A;
			}
		</style>
	</head>
	
	<body class="min-h-screen flex items-center justify-center bg-[#0F172A]">
	
		<!-- BACKGROUND GLOW -->
		<div class="absolute inset-0 overflow-hidden">
			<div class="absolute w-96 h-96 bg-green-500/20 rounded-full blur-3xl top-10 left-10"></div>
			<div class="absolute w-96 h-96 bg-emerald-500/20 rounded-full blur-3xl bottom-10 right-10"></div>
		</div>
	
		<!-- LOGIN CARD -->
		<div class="relative z-10 w-full max-w-md bg-[#020617] border border-slate-800 rounded-2xl p-8 shadow-xl">
	
			<!-- LOGO -->
			<div class="text-center mb-6">
				<h1 class="text-3xl font-bold text-white">Workzo</h1>
				<p class="text-sm text-slate-400">Login to your account</p>
			</div>
	
			<form method="POST" class="space-y-4" action="api/clint-login.php">
	
				<input type="email" name="email" required class="input" placeholder="Email address">
				<input type="password" name="password" required class="input" placeholder="Password">
	
				<div class="flex items-center justify-between text-sm text-slate-400">
					<label class="flex items-center gap-2">
						<input required type="checkbox" class="accent-green-500">
						Remember me
					</label>
					<a href="#" class="hover:text-white">Forgot password?</a>
				</div>
	
				<button type="submit" class="btn-primary w-full">Login</button>
	
			</form>
	
			<div class="text-center text-sm text-slate-400 mt-6">
				Don’t have an account?
				<a href="client-signup.php" class="text-green-400 hover:underline">Sign up</a>
			</div>
	
		</div>
	</body>
</html>