<?php
	require_once('core/layout/layout.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Client Dashboard | Workzo</title>
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
			.card {
				background: #020617;
				border: 1px solid #334155;
				border-radius: 1rem;
				padding: 1.5rem;
			}
			.job-card,
			.proposal-card {
				display: flex;
				justify-content: space-between;
				align-items: center;
				background: #020617;
				border: 1px solid #334155;
				border-radius: 1rem;
				padding: 1rem 1.2rem;
			}
			.btn-primary {
				background: #22C55E;
				color: #052E16;
				padding: 0.6rem 1.5rem;
				border-radius: 9999px;
				font-weight: 600;
			}
			.btn-primary:hover { background: #16A34A; }
			.btn-outline-sm {
				border: 1px solid #334155;
				padding: 0.4rem 1rem;
				border-radius: 9999px;
				font-size: .85rem;
			}
			.btn-primary-sm {
				background: #22C55E;
				color: #052E16;
				padding: 0.4rem 1rem;
				border-radius: 9999px;
				font-size: .85rem;
			}
		</style>
	</head>
	
	<body class="bg-[#0F172A] text-slate-200 min-h-screen flex">
	
		<!-- SIDEBAR -->
		<?php clint();?>
	
		<!-- MAIN -->
		<main class="flex-1">
	
			<!-- HEADER -->
			<header class="border-b border-slate-800 px-6 py-4 flex justify-between items-center">
				<h1 class="text-xl font-semibold text-white">Dashboard</h1>
			</header>
	
			<!-- CONTENT -->
			<div class="p-6 space-y-8">
	
				<!-- STATS -->
				<section class="grid md:grid-cols-4 gap-6">
					<div class="card">
						<p class="text-sm text-slate-400">Active Jobs</p>
						<h2 class="text-3xl font-bold text-white mt-2">4</h2>
					</div>
					<div class="card">
						<p class="text-sm text-slate-400">Total Hires</p>
						<h2 class="text-3xl font-bold text-white mt-2">12</h2>
					</div>
					<div class="card">
						<p class="text-sm text-slate-400">Open Proposals</p>
						<h2 class="text-3xl font-bold text-white mt-2">18</h2>
					</div>
					<div class="card">
						<p class="text-sm text-slate-400">Total Spend</p>
						<h2 class="text-3xl font-bold text-green-400 mt-2">₹1,25,000</h2>
					</div>
				</section>
	
				<!-- ACTIVE JOBS 
				<section class="bg-[#020617] border border-slate-800 rounded-2xl p-6">
					<h2 class="text-lg font-semibold text-white mb-4">
						Active Job Posts
					</h2>
	
					<div class="space-y-4">
	
						<div class="job-card">
							<div>
								<h3 class="font-semibold text-white">
									Full Stack Developer (PHP + React)
								</h3>
								<p class="text-sm text-slate-400">
									Posted 2 days ago • 8 Proposals
								</p>
							</div>
							<button class="btn-outline-sm">View</button>
						</div>
	
						<div class="job-card">
							<div>
								<h3 class="font-semibold text-white">
									UI Designer for SaaS Dashboard
								</h3>
								<p class="text-sm text-slate-400">
									Posted 5 days ago • 5 Proposals
								</p>
							</div>
							<button class="btn-outline-sm">View</button>
						</div>
	
					</div>
				</section>-->
	
				<!-- RECENT PROPOSALS
				<section class="bg-[#020617] border border-slate-800 rounded-2xl p-6">
					<h2 class="text-lg font-semibold text-white mb-4">
						Recent Proposals
					</h2>
	
					<div class="space-y-4">
	
						<div class="proposal-card">
							<div>
								<h4 class="font-semibold text-white">
									Amit Sharma
								</h4>
								<p class="text-sm text-slate-400">
									Applied for Full Stack Developer
								</p>
							</div>
							<button class="btn-primary-sm">Review</button>
						</div>
	
						<div class="proposal-card">
							<div>
								<h4 class="font-semibold text-white">
									Rahul Verma
								</h4>
								<p class="text-sm text-slate-400">
									Applied for UI Designer
								</p>
							</div>
							<button class="btn-primary-sm">Review</button>
						</div>
	
					</div>
				</section> -->
	
			</div>
		</main>
	</body>
</html>