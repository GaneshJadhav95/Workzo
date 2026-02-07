<?php
	require_once('core/layout/layout.php');
	session_start();
	require_once"authorization/config.php";	
	if($_SESSION['client'] == null){
		header("Location: index.php");
	}
	$email = $_SESSION['client'];
	$sql = mysqli_query($conn, "SELECT * FROM `client` WHERE `email` = '$email'");
	$row = mysqli_fetch_assoc($sql);
	$_SESSION['c_profile'] = $row['profile_p'];
?>
<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Client Profile | Workzo</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://cdn.tailwindcss.com"></script>
		<style>
			.job-row {
				display: flex;
				justify-content: space-between;
				align-items: center;
				background: #020617;
				border: 1px solid #1E293B;
				border-radius: 1rem;
				padding: 1rem 1.25rem;
			}
			.status {
				background: rgba(34,197,94,.15);
				color: #4ade80;
				padding: .3rem .7rem;
				border-radius: 9999px;
				font-size: .75rem;
			}
		</style>
	</head>
	
	<body class="bg-[#0F172A] text-slate-200 min-h-screen">
	
		<!-- NAVBAR -->
		<?php clintnav(); ?>
	
		<!-- MAIN -->
		<div class="max-w-7xl mx-auto px-6 py-10 grid lg:grid-cols-3 gap-8">
	
			<!-- LEFT -->
			<div class="lg:col-span-2 space-y-8">
	
				<!-- CLIENT INFO -->
				<div class="bg-[#020617] border border-slate-800 rounded-2xl p-6">
					<div class="flex gap-5 items-start">
						<img src="public/assets/client/<?php echo $row['profile_p']; ?>"
							class="w-20 h-20 rounded-full border border-slate-700">
	
						<div>
							<h2 class="text-2xl font-semibold text-white">
								<?php echo $row['name']; ?>
							</h2>
							<p class="text-sm text-slate-400">
								<?php echo $row['company']; ?>
							</p>
	
							<div class="flex gap-4 mt-3 text-sm text-slate-400">
								<span>⭐ 4.9</span>
								<span>•</span>
								<span>38 jobs posted</span>
								<span>•</span>
								<span>₹9.2L spent</span>
							</div>
						</div>
					</div>
	
					<p class="text-sm text-slate-400 mt-5 leading-relaxed">
						<?php echo $row['about'];?>
					</p>
				</div>
	
				<!-- JOB HISTORY -->
				<div class="bg-[#020617] border border-slate-800 rounded-2xl p-6">
					<h3 class="text-lg font-semibold text-white mb-4">
						Job History
					</h3>
	
					<div class="space-y-4">
	
						<div class="job-row">
							<div>
								<h4 class="text-white font-medium">
									React Dashboard UI
								</h4>
								<p class="text-sm text-slate-400">
									Completed · ₹45,000
								</p>
							</div>
							<span class="status">5 ⭐</span>
						</div>
	
						<div class="job-row">
							<div>
								<h4 class="text-white font-medium">
									PHP Backend APIs
								</h4>
								<p class="text-sm text-slate-400">
									Completed · ₹60,000
								</p>
							</div>
							<span class="status">4.8 ⭐</span>
						</div>
	
					</div>
				</div>
	
			</div>
	
			<!-- RIGHT -->
			<aside class="space-y-6">
	
				<!-- VERIFICATION -->
				<div class="bg-[#020617] border border-slate-800 rounded-2xl p-6">
					<h3 class="text-white font-semibold mb-4">Client Details</h3>
	
					<ul class="text-sm text-slate-400 space-y-3">
						<li>✔ Email verified</li>
						<li>✔ Phone verified</li>
						<li>✔ Payment method verified</li>
						<li>📍 Location: India</li>
						<li>🕒 Member since 2024</li>
					</ul>
				</div>
	
				<!-- ACTION -->
				<div class="bg-[#020617] border border-slate-800 rounded-2xl p-6 text-center">
					<button class="bg-green-500 hover:bg-green-600
						text-[#052E16] px-6 py-2 rounded-full font-semibold">
						Message Client
					</button>
				</div>
	
			</aside>
	
		</div>
		<?php footer(); ?>
	</body>
</html>