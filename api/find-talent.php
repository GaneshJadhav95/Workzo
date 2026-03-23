<?php
	require_once"../authorization/config.php";
	session_start();
	header('Content-Type: application/json');
	$json_input = file_get_contents('php://input');
	$data = json_decode($json_input, true);
	
	if(!isset($_SESSION['client'])){
		echo json_encode(
			[
				"status" => "error",
				"message" => "Session Error"
			]
		);
		exit;
	}
	$email = $_SESSION['client'];
	
	if(isset($data['input'])){
		$input = validation($data['input']);
		$input = esc($conn, $input);
		$sql = mysqli_query($conn, "SELECT * FROM `freelancer` WHERE `name` LIKE '%$input%'");
		if(mysqli_num_rows($sql) > 0){
			while($row = mysqli_fetch_assoc($sql)){
?>
				<div class="freelancer-card mt-5">
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
							<button class="btn-primary"><a href="get.php?id=<?php echo $row['id']; ?>">View Profile</a></button>
						</div>
					</div>
				</div>
<?php
			}
		}
	}
?>