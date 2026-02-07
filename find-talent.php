<?php
	require_once('core/layout/layout.php');
	require_once"authorization/config.php";
	
	session_start();
	
	if(!isset($_SESSION['client'])){
		header("Location: index.php");
	}	
	
	$email = $_SESSION['client'];
?>
<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Find Freelancers | Workzo</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://cdn.tailwindcss.com"></script>
		<style>
			.freelancer-card {
				display: flex;
				gap: 1.5rem;
				background: #020617;
				border: 1px solid #1E293B;
				border-radius: 1.25rem;
				padding: 1.5rem;
			}
			.freelancer-card:hover {
				border-color: #22C55E;
			}
			.skill {
				background: rgba(34,197,94,.15);
				color: #4ade80;
				padding: .3rem .7rem;
				border-radius: 9999px;
				font-size: .75rem;
			}
			.btn-primary {
				background: #22C55E;
				color: #052E16;
				padding: .45rem 1.4rem;
				border-radius: 9999px;
				font-weight: 600;
			}
			.btn-primary:hover { background: #16A34A; }
			.btn-outline {
				border: 1px solid #475569;
				padding: .45rem 1.4rem;
				border-radius: 9999px;
				color: #E5E7EB;
			}
			.input {
				width: 100%;
				background: #020617;
				border: 1px solid #334155;
				border-radius: 0.75rem;
				padding: 0.4rem 0.8rem;
				color: white;
			}
		</style>
	</head>
	
	<body class="bg-[#0F172A] text-slate-200 min-h-screen">
	
		<!-- NAVBAR -->
		<?php clintnav(); ?>
	
		<!-- MAIN -->
		<div class="max-w-7xl mx-auto px-6 py-8 grid lg:grid-cols-4 gap-8">
	
			<!-- FILTERS -->
			<aside class="space-y-6">
	
				<div class="bg-[#020617] rounded-2xl p-5">
					<h3 class="font-semibold text-white mb-3">Filters</h3>
	
					<div class="space-y-4 text-sm">
	
						<div>
							<p class="text-slate-400 mb-2">Experience</p>
							<label class="flex items-center gap-2">
								<input type="checkbox" class="accent-green-500"> Web Developer
							</label>
							<label class="flex items-center gap-2">
								<input type="checkbox" class="accent-green-500"> PHP Developer
							</label>
							<label class="flex items-center gap-2">
								<input type="checkbox" class="accent-green-500"> Frontend Developer
							</label>
						</div>
	
						<!--<div>
							<p class="text-slate-400 mb-2">Availability</p>
							<label class="flex items-center gap-2">
								<input type="checkbox" class="accent-green-500"> Available Now
							</label>
						</div>-->
					</div>
				</div>
	
			</aside>
	
			<!-- FREELANCER LIST -->
			<main class="lg:col-span-3 space-y-6">
	
				<h2 class="text-xl font-semibold text-white">
					Freelancers you might like
				</h2>
	
				<!-- FREELANCER CARD -->
				<?php
					$sql = mysqli_query($conn, "SELECT * FROM `freelancer`");
					if(mysqli_num_rows($sql) > 0){
						while($row = mysqli_fetch_assoc($sql)){
				?>
				<div class="freelancer-card">
					<img src="public/assets/freelancer/<?php echo $row['profile_p'];?>"
						class="w-20 h-20 rounded-full border-2 border-green-500">
	
					<div class="flex-1">
						<div class="flex justify-between">
							<div>
								<h3 class="text-white font-semibold">
									<?php echo $row['name'];?>
								</h3>
								<p class="text-sm text-slate-400">
									<?php echo $row['skills'];?>
								</p>
							</div>
							<p class="font-semibold text-white">₹<?php echo $row['h_rate'];?> / hr</p>
						</div>
	
						<div class="flex gap-3 text-xs text-slate-400 mt-2">
							<span>⭐ 4.9</span>
							<span>•</span>
							<span>100% Job Success</span>
							<span>•</span>
							<span><?php echo $row['country'];?></span>
						</div>
	
						<p class="text-sm text-slate-400 mt-3">
							<?php echo $row['about'];?>
						</p>
	
						<div class="flex flex-wrap gap-2 mt-3">
							<span class="skill"><?php echo $row['skills'];?></span>
						</div>
	
						<div class="flex gap-4 mt-4">
							<button class="btn-primary"><a href="user-profile.php">View Profile</a></button>
						</div>
					</div>
				</div>
				<?php 
						}
					}
				?>
			</main>
	
		</div>
		<?php footer(); ?>
	</body>
</html>