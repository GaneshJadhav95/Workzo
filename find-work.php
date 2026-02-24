<?php
	require_once('core/layout/layout.php');
	require_once"authorization/config.php";
	
	session_start();
	
	if(!isset($_SESSION['freelancer'])){
		header("Location: index.php");
	}	
	
	$email = $_SESSION['freelancer'];
?>
<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Find Work | Workzo</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://cdn.tailwindcss.com"></script>
		<style>
			.job-card {
				background: #020617;
				border: 1px solid #1E293B;
				border-radius: 1.25rem;
				padding: 1.5rem;
			}
			.job-card:hover {
				border-color: #22C55E;
			}
			.skill {
				background: rgba(34,197,94,.15);
				color: #4ade80;
				padding: .3rem .7rem;
				border-radius: 9999px;
				font-size: .75rem;
			}
			.btn-apply {
				background: #22C55E;
				color: #052E16;
				padding: .4rem 1.2rem;
				border-radius: 9999px;
				font-weight: 600;
			}
			.btn-apply2 {
				color: #052E16;
				padding: .4rem 1.2rem;
				border-radius: 9999px;
				font-weight: 600;
			}
			.btn-apply:hover { background: #16A34A; }
		</style>
	</head>
	
	<body class="bg-[#0F172A] text-slate-200 min-h-screen">
	
		<!-- NAVBAR -->
		<?php navsearch(); ?>
		
		<div class=" px-6 py-8 grid lg:grid-cols-4">
			<div id="print2"></div>
		</div>
		<!-- MAIN -->
		<div class="max-w-7xl mx-auto px-6 py-8 grid lg:grid-cols-4 gap-8">
			<!-- FILTERS -->
			<aside class="space-y-6">
	
				<div class="bg-[#020617] rounded-2xl p-5">
					<h3 class="font-semibold text-white mb-3">Filters</h3>
	
					<div class="space-y-4 text-sm">
						<div>
							<p class="text-slate-400 mb-2">Job Type</p>
							<label class="flex items-center gap-2">
								<input type="checkbox" name="job_type" value="Hourly" class="accent-green-500"> Hourly
							</label>
							<label class="flex items-center gap-2">
								<input type="checkbox" name="job_type" value="Fixed Price" class="accent-green-500"> Fixed Price
							</label>
						</div>
	
						<div>
							<p class="text-slate-400 mb-2">Experience Level</p>
							<label class="flex items-center gap-2">
								<input type="checkbox" name="experience" value="Entry" class="accent-green-500"> Entry
							</label>
							<label class="flex items-center gap-2">
								<input type="checkbox" name="experience" value="Intermediate" class="accent-green-500"> Intermediate
							</label>
							<label class="flex items-center gap-2">
								<input type="checkbox" name="experience" value="Expert" class="accent-green-500"> Expert
							</label>
						</div>
	
						<!--<div>
							<p class="text-slate-400 mb-2">Budget</p>
							<input type="range" class="w-full accent-green-500">
						</div>-->
						<button class="btn-apply w-full" onclick="submit()">SUBMIT</button>
					</div>
				</div>
	
			</aside>
	
			<!-- JOB LIST -->
			<main class="lg:col-span-3 space-y-6">
	
				<h2 class="text-xl font-semibold text-white">Jobs you might like</h2>
	
				<!-- JOB CARD -->
				<div id="print">
				<?php
					$sql = mysqli_query($conn, "SELECT jobs.*, proposals.job_id FROM `jobs` LEFT JOIN proposals ON ((SELECT id FROM freelancer WHERE email = '$email') = proposals.freelancer_id AND jobs.id = proposals.job_id)");
					if(mysqli_num_rows($sql) > 0){
						while($row = mysqli_fetch_assoc($sql)){
				?>
					<div class="job-card mt-5">
						<div class="flex justify-between">
							<h3 class="text-white font-semibold">
								<?php echo $row['title'];?>
							</h3>
						</div>
		
						<p class="text-sm text-slate-400 mt-1">
							<?php echo $row['detail'];?>
						</p>
		
						<div class="flex gap-3 text-xs mt-3 text-slate-400">
							<span><?php echo $row['job_type'];?></span>
							<span>•</span>
							<span>₹<?php echo $row['min_budget'];?></span> – <span>₹<?php echo $row['max_budget'];?></span>
							<span>•</span>
							<span><?php echo $row['experience'];?></span>
						</div>
		
						<div class="flex flex-wrap gap-2 mt-3">
							<span class="skill"><?php echo $row['skills'];?></span>
						</div>
		
						<div class="flex justify-between items-center mt-4">
							<span class="text-xs text-slate-500">
								Posted <span><?php echo $row['created_at'];?></span> hours ago
							</span>
							<?php
								if(!$row['job_id']){
							?>
								<button id="ab<?php echo $row['id'];?>" data-job="<?php echo $row['id'];?>" onclick="apply(this)" class="btn-apply">Apply Now</button>
							<?php
								}else{
							?>
								<button id="ab<?php echo $row['id'];?>" class="btn-apply">Applied</button>
							<?php
								}
							?>
						</div>
					</div>
				<?php
						}
					}
				?>
				</div>
			</main>
	
		</div>
		<?php footer(); ?>
		<script src="scripts/find.js"></script>
	</body>
</html>