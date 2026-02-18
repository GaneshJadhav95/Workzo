<?php
	require_once('core/layout/layout.php');
	require_once'authorization/config.php';
	session_start();
	
	if(!isset($_SESSION['freelancer'])){
		header("Location: index.php");
	}
	
	$email = $_SESSION['freelancer'];
	$sql = mysqli_query($conn, "SELECT * FROM `freelancer` WHERE `email` = '$email'");
	$row = mysqli_fetch_assoc($sql);
	$_SESSION['profile'] = $row['profile_p'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Profile | Workzo</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://cdn.tailwindcss.com"></script>
		<style>
			.skill {
				background: rgba(34,197,94,0.15);
				color: #4ade80;
				padding: 0.4rem 0.75rem;
				border-radius: 9999px;
				font-size: 0.8rem;
			}
		</style>
	</head>
	
	<body class="bg-[#0F172A] text-slate-200 min-h-screen">
	
		<!-- Navbar -->
		<?php nav(); ?>
	
		<!-- Main -->
		<div class="max-w-7xl mx-auto px-6 py-8 grid lg:grid-cols-3 gap-8">
	
			<!-- LEFT CONTENT -->
			<div class="lg:col-span-2 space-y-6">
	
				<!-- Profile Header -->
				<div class="bg-[#020617] rounded-2xl p-6 flex gap-6">
					<img src="public/assets/freelancer/<?php echo $row['profile_p']; ?>"
						class="w-28 h-28 rounded-full border-2 border-green-500">
	
					<div class="flex-1">
						<div class="flex items-center gap-2">
							<h2 class="text-2xl font-semibold text-white"><?php echo $row['name']; ?></h2>
							<span class="text-xs bg-green-500/20 text-green-400 px-2 py-1 rounded-full">
								Top Rated
							</span>
						</div>
						<p class="text-slate-400 mt-1">
							Full Stack Web Developer
						</p>
	
						<div class="flex gap-4 mt-4 text-sm">
							<span>⭐ 4.9</span>
							<span>•</span>
							<span>100% Job Success</span>
							<span>•</span>
							<span><?php echo $row['country']; ?></span>
						</div>
					</div>
				</div>
	
				<!-- About -->
				<div class="bg-[#020617] rounded-2xl p-6">
					<h3 class="text-lg font-semibold text-white mb-3">About</h3>
					<p class="text-slate-400 leading-relaxed">
						<?php echo $row['about']; ?>
					</p>
				</div>
	
				<!-- Skills -->
				<div class="bg-[#020617] rounded-2xl p-6">
					<h3 class="text-lg font-semibold text-white mb-3">Skills</h3>
					<div class="flex flex-wrap gap-2">
						<span class="skill"><?php echo $row['skills']; ?></span>
					</div>
				</div>
	
				<!-- Work History 
				<div class="bg-[#020617] rounded-2xl p-6">
					<h3 class="text-lg font-semibold text-white mb-4">Work History</h3>
	
					<div class="space-y-4">
						<div class="border border-slate-800 rounded-xl p-4">
							<h4 class="font-medium text-white">
								Freelance Website Development
							</h4>
							<p class="text-sm text-slate-400 mt-1">
								Built a responsive business website using Tailwind & PHP.
							</p>
							<span class="text-xs text-green-400 mt-2 inline-block">
								⭐⭐⭐⭐⭐ 5.0
							</span>
						</div>
	
						<div class="border border-slate-800 rounded-xl p-4">
							<h4 class="font-medium text-white">
								Admin Dashboard System
							</h4>
							<p class="text-sm text-slate-400 mt-1">
								Designed an admin panel with authentication and analytics.
							</p>
							<span class="text-xs text-green-400 mt-2 inline-block">
								⭐⭐⭐⭐⭐ 5.0
							</span>
						</div>
					</div>
				</div>-->
	
			</div>
	
			<!-- RIGHT SIDEBAR -->
			<div class="space-y-6">
	
				<!-- Hire Card 
				<div class="bg-[#020617] rounded-2xl p-6">
					<button class="w-full bg-green-500 hover:bg-green-600 text-[#052E16]
						font-semibold py-3 rounded-full">
						Message
					</button>
				</div>-->
	
				<!-- Profile Details -->
				<div class="bg-[#020617] rounded-2xl p-6 space-y-3 text-sm">
					<div class="flex justify-between">
						<span class="text-slate-400">Location</span>
						<span><?php echo $row['country']; ?></span>
					</div>
					<div class="flex justify-between">
						<span class="text-slate-400">Member Since</span>
						<span><?php echo $row['created_at']; ?></span>
					</div>
					<div class="flex justify-between">
						<span class="text-slate-400">Total Jobs</span>
						<span>25</span>
					</div>
				</div>
	
			</div>
	
		</div>
		<?php footer(); ?>
	</body>
</html>