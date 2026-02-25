<?php
	require_once'core/layout/layout.php';
	require_once"authorization/config.php";
	session_start();
	
	if(!isset($_SESSION['client'])){
		header("Location: index.php");
	}
	$e = $_SESSION['client'];
	$client_id = $_SESSION['client_id'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Proposals | Workzo</title>
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
			.proposal-card {
				display: flex;
				flex-direction: column;
				gap: 1rem;
				background: #020617;
				border: 1px solid #334155;
				border-radius: 1.25rem;
				padding: 1.2rem;
			}
			@media (min-width: 768px) {
				.proposal-card {
					flex-direction: row;
					justify-content: space-between;
					align-items: center;
				}
			}
			.btn-primary-sm {
				background: #22C55E;
				color: #052E16;
				padding: 0.4rem 1.1rem;
				border-radius: 9999px;
				font-size: .85rem;
				font-weight: 600;
			}
			.btn-primary-sm:hover { background: #16A34A; }
			.btn-outline-sm {
				border: 1px solid #334155;
				padding: 0.4rem 1.1rem;
				border-radius: 9999px;
				font-size: .85rem;
			}
		</style>
		<script>
			async function m(btn){
				try{
					let reciver_id = btn.dataset.reciver;
					let message = "Hi";
					let type = "Client";
					
					const url = await fetch(`api/messages.php`, {
						method: "POST",
						headers: {
							'Content-type' : 'application/json'
						},
						body: JSON.stringify({
							reciver_id: reciver_id,
							message: message,
							type: type
						})
					});
					
					const result = await url.json();
					if(result.status == "success"){
						document.getElementById("ab" + reciver_id).innerHTML = "Sent";
						document.getElementById("ab" + reciver_id).disabled = true;
						console.log(result);
					}else{
						console.log(result);
					}
					
				} catch(error){
					console.log(error);
				}
			}
		</script>
	</head>
	
	<body class="bg-[#0F172A] text-slate-200 min-h-screen flex">
	
		<!-- SIDEBAR -->
		<?php clint(); ?>
	
		<!-- MAIN -->
		<main class="flex-1">
	
			<!-- HEADER -->
			<header class="border-b border-slate-800 px-6 py-4">
				<h1 class="text-xl font-semibold text-white">Proposals</h1>
			</header>
	
			<!-- JOB INFO -->
			
			<section class="px-6 py-4 border-b border-slate-800">
				<h2 class="text-lg font-semibold text-white">
					Full Stack Developer (PHP + React)
				</h2>
				<p class="text-sm text-slate-400">
					8 proposals • Budget ₹50,000 – ₹80,000
				</p>
			</section>
	
			<!-- PROPOSALS LIST -->
			<div class="p-6 max-w-full space-y-6">
				<?php
					$session_id = $_COOKIE[session_name()];
					
					$cookie_string = session_name() . '=' . $session_id;
					
					$url = "http://localhost:8000/project/workzo/api/proposals.php";
					
					$ch = curl_init(); 
					
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					
					curl_setopt($ch, CURLOPT_URL, $url);
					
					curl_setopt($ch, CURLOPT_COOKIE, $cookie_string);
					
					session_write_close();
					
					
					$result = curl_exec($ch);
					
					if($result === false){
						echo "false";
					}else{	
						$data = json_decode($result)->data;
						$data2 = json_decode($result)->check;
						$ids = array_column($data2, 'reciever_id');
						
						foreach($data as $d){
				?>
				<div class="proposal-card">
					<div class="flex items-start gap-4">
						<img src="public/assets/freelancer/<?php echo $d->profile_p;?>" class="w-14 h-14 rounded-full">
						<div>
							<h3 class="font-semibold text-white">
								<?php echo $d->name;?>
							</h3>
							<p class="text-sm text-slate-400">
								<?php echo $d->skills;?>⭐
							</p>
							<p class="text-sm mt-2 text-slate-300 line-clamp-3">
								<?php echo $d->about;?>
							</p>
						</div>
					</div>
	
					<div class="flex items-center gap-4 mt-4 md:mt-0">
						<?php
							//if(in_array($d->id, $data2)){
							
							if (in_array($d->id, $ids)) {
						?>
							<button id="ab<?php echo $d->id;?>;?>" class="btn-primary-sm">Sent</button>
						<?php
							}else{
						?>
							<button id="ab<?php echo $d->id;?>" class="btn-primary-sm" data-reciver="<?php echo $d->id;?>" onclick="m(this)">Message</button>
						<?php
							}
						?>
					</div>
				</div>
				<?php
					}
				?>
			</div>
			<?php
				}
				curl_close($ch);
				exit;					
			?>
		</main>
	</body>
</html>