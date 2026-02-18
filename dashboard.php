<?php
	require_once('core/layout/layout.php');
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Dashboard | Freelancer</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://cdn.tailwindcss.com"></script>
		<style>
			.sidebar-link {
				display: block;
				padding: 0.6rem 1rem;
				border-radius: 0.75rem;
				color: #cbd5f5;
			}
			.sidebar-link:hover {
				background: #020617;
				color: white;
			}
			.sidebar-link.active {
				background: rgba(34,197,94,.15);
				color: #4ade80;
			}
			.stat-card {
				background: #020617;
				border: 1px solid #1E293B;
				border-radius: 1.25rem;
				padding: 1.5rem;
			}
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
	
	<body class="bg-[#0F172A] text-slate-200 min-h-screen flex">
	
		<!-- SIDEBAR -->
		<?php aside(); ?>
	
		<!-- MAIN -->
		<main class="flex-1">
	
			<!-- TOP BAR -->
			<header class="border-b border-slate-800 px-6 py-4 flex justify-between items-center">
				<h1 class="text-xl md:text-center font-semibold text-white">Dashboard</h1>
				<img src="public/assets/freelancer/<?php echo $_SESSION['profile'];?>"
					class="w-9 h-9 rounded-full border border-slate-700">
			</header>
	
			<!-- CONTENT -->
			<div class="p-6 space-y-8">
	
				<!-- STATS -->
				<div class="grid md:grid-cols-4 gap-6">
					<div class="stat-card">
						<p class="text-sm text-slate-400">Active Jobs</p>
						<h2 class="text-2xl font-bold text-white mt-2">3</h2>
					</div>
					<div class="stat-card">
						<p class="text-sm text-slate-400">Total Earnings</p>
						<h2 class="text-2xl font-bold text-green-400 mt-2">₹82,500</h2>
					</div>
					<div class="stat-card">
						<p class="text-sm text-slate-400">Pending Proposals</p>
						<h2 class="text-2xl font-bold text-white mt-2">5</h2>
					</div>
					<div class="stat-card">
						<p class="text-sm text-slate-400">Profile Views</p>
						<h2 class="text-2xl font-bold text-white mt-2">148</h2>
					</div>
				</div>
	
				<!-- ACTIVE JOBS
				<div class="bg-[#020617] border border-slate-800 rounded-2xl p-6">
					<h3 class="text-lg font-semibold text-white mb-4">Active Jobs</h3>
	
					<div class="space-y-4">
						<div class="job-row">
							<div>
								<h4 class="text-white font-medium">
									Frontend Dashboard UI
								</h4>
								<p class="text-sm text-slate-400">
									Client: Startup India
								</p>
							</div>
							<span class="status">In Progress</span>
						</div>
	
						<div class="job-row">
							<div>
								<h4 class="text-white font-medium">
									PHP Backend APIs
								</h4>
								<p class="text-sm text-slate-400">
									Client: TechCorp
								</p>
							</div>
							<span class="status">In Review</span>
						</div>
					</div>
				</div> -->
	
				<!-- RECENT ACTIVITY 
				<div class="bg-[#020617] border border-slate-800 rounded-2xl p-6">
					<h3 class="text-lg font-semibold text-white mb-4">Recent Activity</h3>
	
					<ul class="space-y-3 text-sm text-slate-400">
						<li>✔ Proposal sent for <span class="text-white">React Project</span></li>
						<li>💰 Payment received <span class="text-green-400">₹15,000</span></li>
						<li>⭐ Client left a 5-star review</li>
					</ul>
				</div>-->
	
			</div>
	
		</main>	
	</body>
</html>