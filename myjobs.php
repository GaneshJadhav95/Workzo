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
		<title>My Jobs | Workzo</title>
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
			.job-card {
				display: flex;
				justify-content: space-between;
				align-items: center;
				background: #020617;
				border: 1px solid #334155;
				border-radius: 1rem;
				padding: 1rem 1.2rem;
			}
			.status {
				padding: .2rem .6rem;
				border-radius: 9999px;
				font-size: .75rem;
				font-weight: 500;
				color: white;
			}
			.status.open { background: #16a34a; }         /* green */
			.status.inprogress { background: #facc15; }   /* yellow */
			.status.completed { background: #3b82f6; }    /* blue */
			.btn-primary {
				background: #22C55E;
				color: #052E16;
				padding: 0.5rem 1.5rem;
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
			.skill-tag {
				padding: 6px 12px;
				border-radius: 9999px;
				background: rgba(99, 102, 241, 0.1);
				color: #818cf8;
				font-size: 13px;
			}
		</style>
	</head>
	
	<body class="bg-[#0F172A] text-slate-200 min-h-screen flex">
	
		<!-- SIDEBAR -->
		<?php clint(); ?>
	
		<!-- MAIN -->
		<main class="flex-1">
	
			<!-- HEADER -->
			<header class="border-b border-slate-800 px-6 py-4 flex justify-between items-center">
				<h1 class="text-xl font-semibold text-white">My Jobs</h1>
			</header>
	
			<!-- JOB LIST -->
			<div class="p-6 max-w-full space-y-6">
				<?php
					$sql = mysqli_query($conn, "SELECT * FROM `jobs` WHERE `email` = '$email'");
					if(mysqli_num_rows($sql) > 0){
						while($row = mysqli_fetch_assoc($sql)){
				?>
				<div class="job-card">
					<div>
						<h3 class="text-white font-semibold text-lg"><?php echo $row['title']; ?></h3>
						<p class="text-sm text-slate-400 mt-1">
							Status: <span class="status open">Open</span> • 5 proposals
						</p>
					</div>
					<div class="flex gap-2">
						<button data-see="<?php echo $row['id'];?>" onclick="view(this)" command="show-modal" commandfor="dialog2" class="btn-outline-sm">
							<i class="fa fa-pen"></i> View 
						</button>
						<button data-ac="<?php echo $row['id'];?>" onclick="modal(this)" command="show-modal" commandfor="dialog" class="btn-outline-sm">
							<i class="fa fa-pen"></i> Edit
						</button>
						<!--<button data-c="<?php// echo $row['id'];?>" onclick="modal(this, 'close')" class="btn-outline-sm">Close</button>-->
					</div>
				</div>
				<?php
						}
					}else{
						echo "data not found";
					}
				?>
			</div>
			
			<el-dialog>
				<dialog id="dialog" aria-labelledby="dialog-title" class="fixed inset-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent backdrop:bg-transparent">
					<el-dialog-backdrop class="fixed inset-0 bg-gray-500/75 transition-opacity data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in"></el-dialog-backdrop>
				
					<div tabindex="0" class="flex min-h-full items-end justify-center p-4 text-center focus:outline-none sm:items-center sm:p-0">
					<el-dialog-panel class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all data-closed:translate-y-4 data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in sm:my-8 sm:w-full sm:max-w-lg data-closed:sm:translate-y-0 data-closed:sm:scale-95">
						<div class="bg-[#0F172A] px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
						<form id="update" method="POST">
							<section class="bg-[#020617] border border-slate-800 rounded-2xl p-6">
								<h2 class="text-lg font-semibold text-white mb-4">
									Job Details
								</h2>
				
								<div class="space-y-4">
									<input name="title" required class="input" placeholder="Job Title">
									<input name="h_id" id="h_id" type="hidden">
				
									<textarea name="about" required rows="5" class="input"
										placeholder="Describe the work you need done..."></textarea>
								</div>
							</section>
				
							<!-- JOB TYPE -->
							<section class="bg-[#020617] text-white mt-3 border border-slate-800 rounded-2xl p-6">
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
							<section class="bg-[#020617] mt-3 border border-slate-800 rounded-2xl p-6">
								<h2 class="text-lg font-semibold text-white mb-4">
									Budget
								</h2>
				
								<div class="grid md:grid-cols-2 gap-4">
									<input type="number" required name="min" class="input" placeholder="Min Budget (₹)">
									<input type="number" required name="max" class="input" placeholder="Max Budget (₹)">
								</div>
							</section>
				
							<!-- EXPERIENCE -->
							<section class="bg-[#020617] text-white mt-3 border border-slate-800 rounded-2xl p-6">
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
							<section class="bg-[#020617] mt-3 border border-slate-800 rounded-2xl p-6">
								<h2 class="text-lg font-semibold text-white mb-4">
									Required Skills
								</h2>
				
								<input class="input" required name="skills" placeholder="e.g. HTML, PHP, React, Tailwind">
							</section>
				
							<!-- SUBMIT -->
							<section class="flex justify-end gap-4">
								<button type="button" command="close" commandfor="dialog" class="btn-outline-sm text-white mt-5">Cancel</button>
								<button type="submit" class="btn-primary mt-5">Post Job</button>
							</section>
						</form>
					</el-dialog-panel>
					</div>
				</dialog>
			</el-dialog>
			
			<el-dialog>
				<dialog id="dialog2" aria-labelledby="dialog-title" class="fixed inset-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent backdrop:bg-transparent">
					<el-dialog-backdrop class="fixed inset-0 bg-gray-500/75 transition-opacity data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in"></el-dialog-backdrop>
					
					<div tabindex="0" class="flex min-h-full items-end justify-center p-4 text-center focus:outline-none sm:items-center sm:p-0">
					<el-dialog-panel class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all data-closed:translate-y-4 data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in sm:my-8 sm:w-full sm:max-w-lg data-closed:sm:translate-y-0 data-closed:sm:scale-95">
						<div class="bg-[#0F172A] px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
							<section class="bg-[#020617] border border-slate-800 rounded-2xl p-6">
								<h2 class="text-lg font-semibold text-white mb-4">Job Details</h2>
								
								<div class="space-y-3 text-sm text-slate-300">
									<div class="flex justify-between">
										<span>Job Title</span>
										<span class="text-white font-medium" id="name"></span>
									</div>
							
									<div>
										<span class="block mb-1">Description</span>
										<p id="des" class="text-slate-400 leading-relaxed">
										
										</p>
									</div>
								</div>
							</section>
							
							<!-- JOB TYPE -->
							<section class="bg-[#020617] mt-3 border border-slate-800 rounded-2xl p-6">
								<h2 class="text-lg font-semibold text-white mb-4">Job Type</h2>
							
								<div class="flex gap-3">
									<span id="type" class="px-4 py-1 rounded-full bg-indigo-500/10 text-indigo-400 text-sm">
										
									</span>
								</div>
							</section>
							
							<!-- BUDGET -->
							<section class="bg-[#020617] mt-3 border border-slate-800 rounded-2xl p-6">
								<h2 class="text-lg font-semibold text-white mb-4">Budget</h2>
							
								<div class="flex items-center gap-2 text-sm">
									<span id="budget" class="px-4 py-1 rounded-full bg-emerald-500/10 text-emerald-400"></span>
									<span class="text-white">-</span>
									<span id="budget2" class="px-4 py-1 rounded-full bg-emerald-500/10 text-emerald-400"></span>
								</div>
							</section>
							
							<!-- EXPERIENCE -->
							<section class="bg-[#020617] mt-3 border border-slate-800 rounded-2xl p-6">
								<h2 class="text-lg font-semibold text-white mb-4">Experience Level</h2>
							
								<div class="flex gap-3 text-sm">
									<span id="ex" class="px-4 py-1 rounded-full bg-sky-500/10 text-sky-400">
										
									</span>
								</div>
							</section>
							
							<!-- SKILLS -->
							<section class="bg-[#020617] mt-3 border border-slate-800 rounded-2xl p-6">
								<h2 class="text-lg font-semibold text-white mb-4">Required Skills</h2>
							
								<div class="flex flex-wrap gap-2">
									<span class="skill-tag" id="skills"></span>
								</div>
							</section>
							
							<!-- ACTIONS -->
							<section class="flex justify-end gap-4">
								<button command="close" commandfor="dialog2"
									class="btn-outline-sm text-white mt-5">
									Cancel
								</button>
							</section>
						</el-dialog-panel>
					</div>
				</dialog>
			</el-dialog>
			
		</main>
		<script src="scripts/edit.js"></script>
	</body>
</html>