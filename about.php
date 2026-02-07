<?php
	require_once('core/layout/layout.php');
	if($_SESSION['freelancer'] == null){
		header("Location: index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>About Us | Workzo</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://cdn.tailwindcss.com"></script>
	</head>
	
	<body class="bg-[#0F172A] text-slate-200 min-h-screen">
	
		<!-- NAVBAR -->
		<?php nav(); ?>
	
		<!-- HERO -->
		<section class="max-w-7xl mx-auto px-6 py-20 text-center">
			<h1 class="text-4xl md:text-5xl font-bold text-white mb-6">
				Connecting Talent with Opportunity
			</h1>
			<p class="max-w-3xl mx-auto text-slate-400 text-lg">
				Workzo is a global freelancing platform that helps businesses
				find skilled professionals and empowers freelancers to build
				careers on their own terms.
			</p>
		</section>
	
		<!-- WHAT WE DO -->
		<section class="max-w-7xl mx-auto px-6 py-14 grid md:grid-cols-3 gap-8">
	
			<div class="bg-[#020617] p-6 rounded-2xl border border-slate-800">
				<h3 class="text-white font-semibold mb-2">For Clients</h3>
				<p class="text-sm text-slate-400">
					Post jobs, browse freelancers, and hire experts
					for short-term or long-term projects with confidence.
				</p>
			</div>
	
			<div class="bg-[#020617] p-6 rounded-2xl border border-slate-800">
				<h3 class="text-white font-semibold mb-2">For Freelancers</h3>
				<p class="text-sm text-slate-400">
					Find quality work, set your rates, build your profile,
					and grow your freelance business.
				</p>
			</div>
	
			<div class="bg-[#020617] p-6 rounded-2xl border border-slate-800">
				<h3 class="text-white font-semibold mb-2">Secure Payments</h3>
				<p class="text-sm text-slate-400">
					Workzo ensures safe and transparent payments through
					escrow and milestone-based systems.
				</p>
			</div>
	
		</section>
	
		<!-- WHY WORKZO -->
		<section class="max-w-7xl mx-auto px-6 py-16">
			<h2 class="text-3xl font-bold text-white text-center mb-10">
				Why Choose Workzo
			</h2>
	
			<div class="grid md:grid-cols-4 gap-6 text-center">
				<div class="bg-[#020617] p-6 rounded-2xl border border-slate-800">
					<h3 class="text-xl font-bold text-green-400">10K+</h3>
					<p class="text-sm text-slate-400 mt-2">Freelancers</p>
				</div>
				<div class="bg-[#020617] p-6 rounded-2xl border border-slate-800">
					<h3 class="text-xl font-bold text-green-400">5K+</h3>
					<p class="text-sm text-slate-400 mt-2">Clients</p>
				</div>
				<div class="bg-[#020617] p-6 rounded-2xl border border-slate-800">
					<h3 class="text-xl font-bold text-green-400">20K+</h3>
					<p class="text-sm text-slate-400 mt-2">Jobs Posted</p>
				</div>
				<div class="bg-[#020617] p-6 rounded-2xl border border-slate-800">
					<h3 class="text-xl font-bold text-green-400">99%</h3>
					<p class="text-sm text-slate-400 mt-2">Payment Success</p>
				</div>
			</div>
		</section>
	
		<!-- CTA -->
		<section class="bg-[#020617] border-t border-slate-800 py-16">
			<div class="max-w-7xl mx-auto px-6 text-center">
				<h2 class="text-3xl font-bold text-white mb-4">
					Start your journey with Workzo
				</h2>
				<p class="text-slate-400 mb-6">
					Join thousands of freelancers and businesses growing together.
				</p>
				<button class="bg-green-500 hover:bg-green-600
					text-[#052E16] px-8 py-3 rounded-full font-semibold">
					Get Started
				</button>
			</div>
		</section>
	
		<!-- FOOTER -->
		<?php footer(); ?>
	</body>
</html>