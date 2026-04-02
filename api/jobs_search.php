<?php
	require_once "../authorization/config.php";
	header('Content-Type: application/json');
	$json_input = file_get_contents('php://input');
	$data = json_decode($json_input, true);
	
	session_start();
	if(!isset($_SESSION['freelancer'])){
		echo json_encode(
			[
				"status" => "error",
				"message" => "Session Error"
			]
		);
		exit;
	}
	
	$email = $_SESSION['freelancer'];
	
	if(isset($data['input'])){
		$input = validation($data['input']);
		$input = esc($conn, $input);

		//$sql = mysqli_query($conn, "SELECT jobs.*, proposals.job_id FROM `jobs` LEFT JOIN proposals ON ((SELECT id FROM freelancer WHERE email = '$email') = proposals.freelancer_id AND jobs.id = proposals.job_id) WHERE jobs.title LIKE '%$input%'");
		$sql = $conn->prepare("SELECT jobs.*, proposals.job_id FROM `jobs` LEFT JOIN proposals ON ((SELECT id FROM freelancer WHERE email = ?) = proposals.freelancer_id AND jobs.id = proposals.job_id) WHERE jobs.title LIKE '%$input%'");
		$sql->bind_param("s", $email);
		$sql->execute();
		$result = $sql->get_result();
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
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
	}else{
		echo json_encode(
			[
				"status" => "error",
				"message" => "Invalid Input"
			]
		);
	}
?>