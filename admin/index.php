<?php
	require_once"../authorization/config.php";
	session_start();
	
	if(!isset($_SESSION['admin'])){
		header("Location: login.php");
	}
	$admin = $_SESSION['admin'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Tailwind CSS Admin Dashboard</title>
		<script src="https://cdn.tailwindcss.com"></script>
		<style>
			/* Hide scrollbars */
			::-webkit-scrollbar { display:none; }
			* { scrollbar-width:none; -ms-overflow-style:none; }
			
			/* Animated bars */
			@keyframes grow {
				0% { height: 0; }
				100% { height: var(--bar-height); }
			}
			.bar {
				animation: grow 1.2s ease-out forwards;
			}
		</style>
	</head>
	<body class="bg-black text-white min-h-screen font-sans overflow-x-hidden">
	
		<div class="flex min-h-screen">
		
			<!-- Sidebar -->
			<aside id="sidebar" class="fixed inset-y-0 left-0 w-64 bg-gray-900 p-6 space-y-6 z-40">
				<h2 class="text-2xl font-bold mb-6">Admin Panel</h2>
				<nav class="space-y-3">
					<a href="dashboard.php" class="block py-2 px-4 rounded bg-gray-800 hover:bg-gray-700 transition">Dashboard</a>
					<a href="freelancer.php" class="block py-2 px-4 rounded hover:bg-gray-800 transition">Freelancer</a>
					<a href="clients.php" class="block py-2 px-4 rounded hover:bg-gray-800 transition">Clients</a>
					<a href="logout.php" class="block py-2 px-4 rounded text-red-400 hover:bg-gray-800 transition">Logout</a>
				</nav>
			</aside>
			
			<!-- Main Content -->
			<div class="flex-1 flex flex-col ml-64">
			
				<!-- Header -->
				<header class="bg-gray-900 p-4 flex justify-between items-center">
					<h1 class="text-xl md:text-2xl font-bold">Dashboard Overview</h1>
					<div class="flex items-center gap-4">
						<button class="bg-gray-700 px-3 py-1 rounded transition hover:bg-gray-600">🌙</button>
						<div class="relative">
							<button class="bg-gray-700 px-3 py-1 rounded transition hover:bg-gray-600">🔔</button>
							<div class="hidden absolute right-0 mt-2 w-64 bg-gray-800 rounded shadow-lg p-4 text-sm">
								<p class="mb-2">New user registered</p>
								<p class="mb-2">Order #123 completed</p>
								<p>Server updated successfully</p>
							</div>
						</div>
					</div>
				</header>
			
				<!-- Dashboard Main -->
				<main class="p-6 space-y-6 overflow-auto">
			
					<!-- Stats Cards -->
					<?php
						$session_id = $_COOKIE[session_name()];
					
						$cookie_string = session_name() . '=' . $session_id;
						
						$url = "http://localhost:8000/workzo/api/count.php";
						
						$ch = curl_init(); 
						
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
						
						curl_setopt($ch, CURLOPT_URL, $url);
						
						curl_setopt($ch, CURLOPT_COOKIE, $cookie_string);
						
						session_write_close();
						
						
						$result = curl_exec($ch);
						
						if($result === false){
							echo "false";
						}else{
							$result = json_decode($result);
							$total = $result->total;
							$active = $result->active;
							$url = $result->url;
					?>
						<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
						
								<div class="bg-gray-900 p-6 rounded-xl shadow hover:scale-105 transform transition"> 
									<h3 class="text-gray-400 text-sm">Total Users</h3>
									<p class="text-3xl font-bold mt-2"><?php echo $total;?></p>
								</div>
								<div class="bg-gray-900 p-6 rounded-xl shadow hover:scale-105 transform transition"> 
									<h3 class="text-gray-400 text-sm">Active Users</h3>
									<p class="text-3xl font-bold mt-2 text-green-500"><?php echo $active; ?></p>
								</div>
								<!--<div class="bg-gray-900 p-6 rounded-xl shadow hover:scale-105 transform transition"> 
									<h3 class="text-gray-400 text-sm">Orders</h3>
									<p class="text-3xl font-bold mt-2 text-blue-500">320</p>
								</div>
								<div class="bg-gray-900 p-6 rounded-xl shadow hover:scale-105 transform transition"> 
									<h3 class="text-gray-400 text-sm">Revenue</h3>
									<p class="text-3xl font-bold mt-2 text-yellow-500">$12,450</p>
								</div>-->
						</div>
						<!-- Tailwind Animated Chart -->
						<div class="bg-gray-900 p-6 rounded-xl">
							<h2 class="text-xl font-semibold mb-4">User Growth</h2>
							<div class="flex items-end gap-4 h-40">
								<div class="w-6 bg-blue-500 rounded-t bar" style="--bar-height:60%; height:0;"></div>
								<div class="w-6 bg-blue-500 rounded-t bar" style="--bar-height:45%; height:0;"></div>
								<div class="w-6 bg-blue-500 rounded-t bar" style="--bar-height:30%; height:0;"></div>
								<div class="w-6 bg-blue-500 rounded-t bar" style="--bar-height:50%; height:0;"></div>
								<div class="w-6 bg-blue-500 rounded-t bar" style="--bar-height:70%; height:0;"></div>
								<div class="w-6 bg-blue-500 rounded-t bar" style="--bar-height:85%; height:0;"></div>
							</div>
							<div class="flex justify-between mt-2 text-gray-400 text-xs">
								<span>Jan</span>
								<span>Feb</span>
								<span>Mar</span>
								<span>Apr</span>
								<span>May</span>
								<span>Jun</span>
							</div>
						</div>					
						
						<div class="bg-gray-900 p-6 rounded-xl">
							<h2 class="text-xl font-semibold mb-4">Visited Pages</h2>
							<div class="flex-wrap">
								<table class="min-w-full text-sm text-left text-gray-300">
									<thead class="bg-gray-800 text-gray-400 uppercase text-xs">
										<tr>
											<th class="px-6 py-4">Page</th>
										</tr>
									</thead>
				
									<tbody id="userTable" class="divide-y divide-gray-800">
										<?php
											foreach($url as $d){
										?>
											<tr class="hover:bg-gray-800 transition">
												<td class="px-6 py-4"><?php echo $d->url;?></td>
											</tr>
										<?php
											}
										?>
									</tbody>
								</table>
							</div>
						</div>
					<?php
						}
						curl_close($ch);
					?>
				</main>
			</div>
		</div>
		
		<script>
			// Animate bars on load
			document.querySelectorAll('.bar').forEach(bar=>{
			bar.style.height = bar.style.getPropertyValue('--bar-height');
			});
		</script>
	
	</body>
</html>