<?php
	require_once('core/layout/layout.php');
	session_start();
	
	if(!isset($_SESSION['client'])){
		header("Location: index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Settings | Workzo</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://cdn.tailwindcss.com"></script>
		<style>
			.nav-link {
				display: block;
				padding: 0.6rem 1rem;
				border-radius: 0.75rem;
				color: #cbd5f5;
			}
			.nav-link:hover {
				background: #020617;
				color: white;
			}
			.nav-link.active {
				background: rgba(34,197,94,.15);
				color: #4ade80;
			}
			.input {
				width: 100%;
				background: #020617;
				border: 1px solid #334155;
				border-radius: 0.75rem;
				padding: 0.7rem 1rem;
				font-size: .9rem;
				color: white;
			}
			.input:focus {
				outline: none;
				border-color: #22C55E;
			}
			.btn-primary {
				background: #22C55E;
				color: #052E16;
				padding: 0.6rem 1.8rem;
				border-radius: 9999px;
				font-weight: 600;
			}
			.btn-primary:hover {
				background: #16A34A;
			}
		</style>
	</head>
	
	<body class="bg-[#0F172A] text-slate-200 min-h-screen flex">
	
		<!-- SIDEBAR -->
		<?php clint(); ?>
	
		<!-- MAIN -->
		<main class="flex-1">
	
			<!-- HEADER -->
			<header class="border-b border-slate-800 px-6 py-4">
				<h1 class="text-xl font-semibold text-white">Settings</h1>
			</header>
	
			<!-- SETTINGS CONTENT -->
			<div class="p-6 max-w-full space-y-10">
	
				<form method="POST" id="setting">
					<section class="bg-[#020617] border border-slate-800 rounded-2xl p-6">
						<h2 class="text-lg font-semibold text-white mb-4">Profile Information</h2>
		
						<div class="grid md:grid-cols-2 gap-4">
							<input required class="input" name="name" placeholder="Full Name">
							<input required class="input" name="email" placeholder="Email Address">
							<input required class="input" name="contact" placeholder="Phone Number">
							<input required class="input" name="company" placeholder="Company / Organization">
						</div>
						<button type="submit" class="btn-primary mt-6">Save Changes</button>
					</section>
		
					<!-- CHANGE PASSWORD 
					<section class="bg-[#020617] border border-slate-800 rounded-2xl p-6">
						<h2 class="text-lg font-semibold text-white mb-4">Change Password</h2>
		
						<div class="grid md:grid-cols-2 gap-4">
							<input name="" type="password" class="input" placeholder="Current Password">
							<input name="" type="password" class="input" placeholder="New Password">
							<input name="" type="password" class="input md:col-span-2" placeholder="Confirm New Password">
						</div>
		
						
					</section>-->
				</form>
				<!-- NOTIFICATIONS 
				<section class="bg-[#020617] border border-slate-800 rounded-2xl p-6">
					<h2 class="text-lg font-semibold text-white mb-4">Notifications</h2>
	
					<div class="space-y-4 text-sm text-slate-400">
						<label class="flex items-center gap-3">
							<input type="checkbox" class="accent-green-500" checked>
							Email notifications for new proposals
						</label>
						<label class="flex items-center gap-3">
							<input type="checkbox" class="accent-green-500">
							Message notifications
						</label>
						<label class="flex items-center gap-3">
							<input type="checkbox" class="accent-green-500" checked>
							Weekly account summary
						</label>
					</div>
	
					<button class="btn-primary mt-6">Save Preferences</button>
				</section> -->
	
			</div>
		</main>
		<script src="scripts/setting.js"></script>
	</body>
</html>