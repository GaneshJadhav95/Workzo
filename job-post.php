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
		<title>Post a Job | Workzo</title>
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
			.btn-primary:hover { background: #16A34A; }
			.btn-outline {
				border: 1px solid #334155;
				padding: 0.6rem 1.8rem;
				border-radius: 9999px;
				font-size: .9rem;
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
				<h1 class="text-xl font-semibold text-white">Post a Job</h1>
			</header>
	
			<!-- CONTENT -->
			<div class="p-6 max-w-full space-y-10">
				<form id="job" method="POST">
					<!-- JOB DETAILS -->
					<section class="bg-[#020617] border border-slate-800 rounded-2xl p-6">
						<h2 class="text-lg font-semibold text-white mb-4">
							Job Details
						</h2>
		
						<div class="space-y-4">
							<input name="title" required class="input" placeholder="Job Title">
		
							<textarea name="about" required rows="5" class="input"
								placeholder="Describe the work you need done..."></textarea>
						</div>
					</section>
		
					<!-- JOB TYPE -->
					<section class="bg-[#020617] mt-5 border border-slate-800 rounded-2xl p-6">
						<h2 class="text-lg font-semibold text-white mb-4">
							Job Type
						</h2>
		
						<div class="flex gap-6 text-sm">
							<label class="flex items-center gap-2">
								<input type="radio" required value="Hourly" name="type" class="accent-green-500" checked>
								Hourly
							</label>
							<label class="flex items-center gap-2">
								<input type="radio" required value="Fixed Price" name="type" class="accent-green-500">
								Fixed Price
							</label>
						</div>
					</section>
		
					<!-- BUDGET -->
					<section class="bg-[#020617] mt-5 border border-slate-800 rounded-2xl p-6">
						<h2 class="text-lg font-semibold text-white mb-4">
							Budget
						</h2>
		
						<div class="grid md:grid-cols-2 gap-4">
							<input type="number" required name="min" class="input" placeholder="Min Budget (₹)">
							<input type="number" required name="max" class="input" placeholder="Max Budget (₹)">
						</div>
					</section>
		
					<!-- EXPERIENCE -->
					<section class="bg-[#020617] mt-5 border border-slate-800 rounded-2xl p-6">
						<h2 class="text-lg font-semibold text-white mb-4">
							Experience Level
						</h2>
		
						<div class="flex gap-6 text-sm">
							<label class="flex items-center gap-2">
								<input type="radio" required value="Entry" name="level" class="accent-green-500" checked>
								Entry
							</label>
							<label class="flex items-center gap-2">
								<input type="radio" required value="Intermediate" name="level" class="accent-green-500">
								Intermediate
							</label>
							<label class="flex items-center gap-2">
								<input type="radio" required value="Expert" name="level" class="accent-green-500">
								Expert
							</label>
						</div>
					</section>
		
					<!-- SKILLS -->
					<section class="bg-[#020617] mt-5 border border-slate-800 rounded-2xl p-6">
						<h2 class="text-lg font-semibold text-white mb-4">
							Required Skills
						</h2>
		
						<input class="input" required name="skills" placeholder="e.g. HTML, PHP, React, Tailwind">
					</section>
		
					<!-- SUBMIT -->
					<section class="flex justify-end gap-4">
						<button type="submit" class="btn-primary mt-5">Post Job</button>
					</section>
				</form>
			</div>
	
		</main>
		<script src="scripts/jobs.js"></script>
	</body>
</html>