<?php
	require_once"../authorization/config.php";
	session_start();
	header('Content-Type: application/json');
	$json_input = file_get_contents('php://input');
	$data = json_decode($json_input, true);
	
	if(!isset($_SESSION['freelancer'])){
		echo json_encode(
			[
				"status" => "error",
				"message" => "Session Error"
			]
		);
		exit;
	}
	
	if(isset($data['h']) && isset($data['price']) && isset($data['en']) && isset($data['inte']) && isset($data['ex'])){
		$h = $data['h'];
		$price = $data['price'];
		$en = $data['en'];
		$inte = $data['inte'];
		$ex = $data['ex'];
		$job_type = $data['job_type'];
		
		if(!empty($job_type)){
			
		}
		
		if($h){
			$sql = mysqli_query($conn, "SELECT * FROM `jobs` WHERE `job_type` = '$h'");
			if(mysqli_num_rows($sql) > 0){
				while($row = mysqli_fetch_assoc($sql)){
					
?>
					<div class="job-card mt-5">
						<div class="flex justify-between">
							<h3 class="text-white font-semibold">
								<?php echo $row['title'];?>
							</h3>
							<button class="text-slate-400 hover:text-white">☆</button>
						</div>
			
						<p class="text-sm text-slate-400 mt-1">
							<?php echo $row['detail'];?>
						</p>
			
						<div class="flex gap-3 text-xs mt-3 text-slate-400">
							<span><?php echo $row['job_type'];?></span>
							<span>•</span>
							<span>₹<?php echo $row['min_budget'];?> – ₹<?php echo $row['max_budget'];?></span>
							<span>•</span>
							<span><?php echo $row['experience'];?></span>
						</div>
			
						<div class="flex flex-wrap gap-2 mt-3">
							<span class="skill"><?php echo $row['skills'];?></span>
						</div>
			
						<div class="flex justify-between items-center mt-4">
							<span class="text-xs text-slate-500">
								Posted <?php echo $row['created_at'];?> hours ago
							</span>
							<button class="btn-apply">Apply Now</button>
						</div>
					</div>
<?php
						
				}
			}
		}if($price){
			$sql = mysqli_query($conn, "SELECT * FROM `jobs` WHERE `job_type` = '$price'");
			if(mysqli_num_rows($sql) > 0){
				while($row = mysqli_fetch_assoc($sql)){
					
?>
					<div class="job-card mt-5">
						<div class="flex justify-between">
							<h3 class="text-white font-semibold">
								<?php echo $row['title'];?>
							</h3>
							<button class="text-slate-400 hover:text-white">☆</button>
						</div>
			
						<p class="text-sm text-slate-400 mt-1">
							<?php echo $row['detail'];?>
						</p>
			
						<div class="flex gap-3 text-xs mt-3 text-slate-400">
							<span><?php echo $row['job_type'];?></span>
							<span>•</span>
							<span>₹<?php echo $row['min_budget'];?> – ₹<?php echo $row['max_budget'];?></span>
							<span>•</span>
							<span><?php echo $row['experience'];?></span>
						</div>
			
						<div class="flex flex-wrap gap-2 mt-3">
							<span class="skill"><?php echo $row['skills'];?></span>
						</div>
			
						<div class="flex justify-between items-center mt-4">
							<span class="text-xs text-slate-500">
								Posted <?php echo $row['created_at'];?> hours ago
							</span>
							<button class="btn-apply">Apply Now</button>
						</div>
					</div>
<?php
						
				}
			}
		}if($en){
			$sql = mysqli_query($conn, "SELECT * FROM `jobs` WHERE `experience` = '$en'");
			if(mysqli_num_rows($sql) > 0){
				while($row = mysqli_fetch_assoc($sql)){
					
?>
					<div class="job-card mt-5">
						<div class="flex justify-between">
							<h3 class="text-white font-semibold">
								<?php echo $row['title'];?>
							</h3>
							<button class="text-slate-400 hover:text-white">☆</button>
						</div>
			
						<p class="text-sm text-slate-400 mt-1">
							<?php echo $row['detail'];?>
						</p>
			
						<div class="flex gap-3 text-xs mt-3 text-slate-400">
							<span><?php echo $row['job_type'];?></span>
							<span>•</span>
							<span>₹<?php echo $row['min_budget'];?> – ₹<?php echo $row['max_budget'];?></span>
							<span>•</span>
							<span><?php echo $row['experience'];?></span>
						</div>
			
						<div class="flex flex-wrap gap-2 mt-3">
							<span class="skill"><?php echo $row['skills'];?></span>
						</div>
			
						<div class="flex justify-between items-center mt-4">
							<span class="text-xs text-slate-500">
								Posted <?php echo $row['created_at'];?> hours ago
							</span>
							<button class="btn-apply">Apply Now</button>
						</div>
					</div>
<?php
						
				}
			}
		}if($inte){
			$sql = mysqli_query($conn, "SELECT * FROM `jobs` WHERE `experience` = '$inte'");
			if(mysqli_num_rows($sql) > 0){
				while($row = mysqli_fetch_assoc($sql)){
					
?>
					<div class="job-card mt-5">
						<div class="flex justify-between">
							<h3 class="text-white font-semibold">
								<?php echo $row['title'];?>
							</h3>
							<button class="text-slate-400 hover:text-white">☆</button>
						</div>
			
						<p class="text-sm text-slate-400 mt-1">
							<?php echo $row['detail'];?>
						</p>
			
						<div class="flex gap-3 text-xs mt-3 text-slate-400">
							<span><?php echo $row['job_type'];?></span>
							<span>•</span>
							<span>₹<?php echo $row['min_budget'];?> – ₹<?php echo $row['max_budget'];?></span>
							<span>•</span>
							<span><?php echo $row['experience'];?></span>
						</div>
			
						<div class="flex flex-wrap gap-2 mt-3">
							<span class="skill"><?php echo $row['skills'];?></span>
						</div>
			
						<div class="flex justify-between items-center mt-4">
							<span class="text-xs text-slate-500">
								Posted <?php echo $row['created_at'];?> hours ago
							</span>
							<button class="btn-apply">Apply Now</button>
						</div>
					</div>
<?php
						
				}
			}
		}if($ex){
			$sql = mysqli_query($conn, "SELECT * FROM `jobs` WHERE `experience` = '$ex'");
			if(mysqli_num_rows($sql) > 0){
				while($row = mysqli_fetch_assoc($sql)){
					
?>
					<div class="job-card mt-5">
						<div class="flex justify-between">
							<h3 class="text-white font-semibold">
								<?php echo $row['title'];?>
							</h3>
							<button class="text-slate-400 hover:text-white">☆</button>
						</div>
			
						<p class="text-sm text-slate-400 mt-1">
							<?php echo $row['detail'];?>
						</p>
			
						<div class="flex gap-3 text-xs mt-3 text-slate-400">
							<span><?php echo $row['job_type'];?></span>
							<span>•</span>
							<span>₹<?php echo $row['min_budget'];?> – ₹<?php echo $row['max_budget'];?></span>
							<span>•</span>
							<span><?php echo $row['experience'];?></span>
						</div>
			
						<div class="flex flex-wrap gap-2 mt-3">
							<span class="skill"><?php echo $row['skills'];?></span>
						</div>
			
						<div class="flex justify-between items-center mt-4">
							<span class="text-xs text-slate-500">
								Posted <?php echo $row['created_at'];?> hours ago
							</span>
							<button class="btn-apply">Apply Now</button>
						</div>
					</div>
<?php
						
				}
			}
		}
	}
?>