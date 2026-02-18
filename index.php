<?php
	require_once('core/layout/layout.php');
	require_once"authorization/config.php";	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Workzo | Hire Top Freelancers</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://cdn.tailwindcss.com"></script>
		<style>
			.card {
				background: #020617;
				border: 1px solid #1E293B;
				border-radius: 1rem;
				padding: 1.5rem;
				text-align: center;
				cursor: pointer;
				transition: all .3s;
			}
			.card:hover {
				border-color: #22C55E;
				transform: translateY(-4px);
			}
			.step {
				width: 3rem;
				height: 3rem;
				border-radius: 9999px;
				background: rgba(34,197,94,.2);
				color: #4ade80;
				display: flex;
				align-items: center;
				justify-content: center;
				margin: auto;
				font-weight: bold;
			}
		</style>
	</head>
	
	<body class="bg-[#0F172A] text-slate-200">
	
		<!-- NAVBAR -->
		<?php indexnav(); ?>
	
		<!-- HERO -->
		<section class="relative overflow-hidden">
			<div class="absolute inset-0 bg-gradient-to-br from-[#0F172A] via-[#020617] to-[#0F172A]"></div>
	
			<div class="relative max-w-7xl mx-auto px-6 py-24 grid md:grid-cols-2 gap-12 items-center">
				<div>
					<h2 class="text-4xl md:text-5xl font-bold text-white leading-tight">
						Hire the best freelancers for any job, online
					</h2>
					<p class="text-slate-400 mt-4 max-w-xl">
						Workzo connects businesses with skilled freelancers across design,
						development, marketing, and more.
					</p>
	
					<!--<div class="flex gap-4 mt-6">
						<a href="find-talent.php" class="bg-green-500 hover:bg-green-600 text-[#052E16]
							font-semibold px-6 py-3 rounded-full">
							Find Talent
						</a>
						<a href="find-work.php" class="border border-slate-700 px-6 py-3 rounded-full">
							Find Work
						</a>
					</div>-->
	
					<div class="flex gap-6 mt-8 text-sm text-slate-400">
						<span>✔ Trusted by startups</span>
						<span>✔ Secure payments</span>
						<span>✔ Verified freelancers</span>
					</div>
				</div>
	
				<div class="hidden md:block">
					<img src="https://illustrations.popsy.co/gray/freelancer.svg"
						class="w-full max-w-md mx-auto">
				</div>
			</div>
		</section>
	
		<!-- STATS -->
		<section class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
			<div>
				<p class="text-3xl font-bold text-white">10K+</p>
				<p class="text-slate-400 text-sm">Freelancers</p>
			</div>
			<div>
				<p class="text-3xl font-bold text-white">5K+</p>
				<p class="text-slate-400 text-sm">Clients</p>
			</div>
			<div>
				<p class="text-3xl font-bold text-white">20K+</p>
				<p class="text-slate-400 text-sm">Jobs Posted</p>
			</div>
			<div>
				<p class="text-3xl font-bold text-white">99%</p>
				<p class="text-slate-400 text-sm">Success Rate</p>
			</div>
		</section>
	
		<!-- CATEGORIES -->
		<section class="max-w-7xl mx-auto px-6 py-16">
			<h3 class="text-2xl font-semibold text-white mb-8">
				Browse Talent by Category
			</h3>
	
			<div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
				<div class="card">Web Development</div>
				<div class="card">Mobile Apps</div>
				<div class="card">UI / UX Design</div>
				<div class="card">Digital Marketing</div>
				<div class="card">Content Writing</div>
				<div class="card">Data Analysis</div>
				<div class="card">SEO Experts</div>
				<div class="card">Video Editing</div>
			</div>
		</section>
	
		<!-- HOW IT WORKS -->
		<section class="bg-[#020617] py-16">
			<div class="max-w-7xl mx-auto px-6">
				<h3 class="text-2xl font-semibold text-white mb-12 text-center">
					How Workzo Works
				</h3>
	
				<div class="grid md:grid-cols-3 gap-8 text-center">
					<div>
						<p class="step">1</p>
						<h4 class="font-semibold text-white mt-4">Post a Job</h4>
						<p class="text-slate-400 text-sm mt-2">
							Tell us what you need done.
						</p>
					</div>
					<div>
						<p class="step">2</p>
						<h4 class="font-semibold text-white mt-4">Hire Talent</h4>
						<p class="text-slate-400 text-sm mt-2">
							Choose from top freelancers.
						</p>
					</div>
					<div>
						<p class="step">3</p>
						<h4 class="font-semibold text-white mt-4">Get Work Done</h4>
						<p class="text-slate-400 text-sm mt-2">
							Pay securely when satisfied.
						</p>
					</div>
				</div>
			</div>
		</section>
	
		<!-- CTA -->
		<section class="max-w-7xl mx-auto px-6 py-20 text-center">
			<h3 class="text-3xl font-bold text-white">
				Get started on Workzo today
			</h3>
			<p class="text-slate-400 mt-4">
				Join thousands of freelancers and clients growing their business.
			</p>
	
			<a href="welcomepage.php"
				class="inline-block mt-6 bg-green-500 hover:bg-green-600
				text-[#052E16] font-semibold px-8 py-4 rounded-full">
				Create Free Account
			</a>
		</section>
	
		<!-- FOOTER -->
		<?php footer(); ?>
	
	</body>
</html>