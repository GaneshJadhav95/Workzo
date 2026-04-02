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
		<title>Admin Dashboard</title>
		
		<!-- Tailwind CSS CDN -->
		<script src="https://cdn.tailwindcss.com"></script>
		
		<style>
			/* Hide Scrollbar */
			::-webkit-scrollbar { display: none; }
			* { -ms-overflow-style: none; scrollbar-width: none; }
		</style>
	
	</head>
	<body class="bg-black text-white min-h-screen">
	
		<div class="flex h-screen overflow-hidden">
		
			<!-- Sidebar -->
			<aside id="sidebar" class="fixed md:relative z-50 md:z-0 w-64 bg-gray-900 p-6 space-y-6 transform -translate-x-full md:translate-x-0 transition duration-300">
				<h2 class="text-2xl font-bold">Admin Panel</h2>
		
				<nav class="space-y-3">
					<a href="dashboard.php" class="block py-2 px-4 rounded bg-gray-800">Dashboard</a>
					<a href="freelancer.php" class="block py-2 px-4 rounded hover:bg-gray-800">Freelancer</a>
					<a href="clients.php" class="block py-2 px-4 rounded hover:bg-gray-800">Clients</a>
					<a href="logout.php" class="block py-2 px-4 rounded text-red-400 hover:bg-gray-800 transition">Logout</a>
				</nav>
			</aside>
		
			<!-- Main Content -->
			<div class="flex-1 flex flex-col overflow-hidden">
		
				<!-- Topbar -->
				<header class="bg-gray-900 p-4 flex justify-between items-center">
		
					<div class="flex items-center gap-3">
						<button onclick="toggleSidebar()" class="md:hidden text-white text-2xl">
							☰
						</button>
						<h1 class="text-xl font-bold">Clients Management</h1>
					</div>
		
					<input type="text" id="searchInput"
						placeholder="Search client..."
						class="px-4 py-2 rounded bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-600">
				</header>
		
				<!-- Table -->
				<main class="flex-1 p-4 overflow-auto">
		
					<div class="bg-gray-900 rounded-xl shadow overflow-auto">
		
						<table class="min-w-full text-sm text-left text-gray-300">
							<thead class="bg-gray-800 text-gray-400 uppercase text-xs">
								<tr>
									<th class="px-6 py-4">Profile</th>
									<th class="px-6 py-4">Name</th>
									<th class="px-6 py-4">Email</th>
									<th class="px-6 py-4">Contact</th>
									<th class="px-6 py-4">City</th>
									<th class="px-6 py-4">Company</th>
									<th class="px-6 py-4">Servises</th>
								</tr>
							</thead>
		
							<tbody id="userTable" class="divide-y divide-gray-800">
		
								<?php
									$session_id = $_COOKIE[session_name()];
					
									$cookie_string = session_name() . '=' . $session_id;
									
									$url = "http://localhost:8000/workzo/api/users-fetch.php";
									
									$ch = curl_init(); 
									
									curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
									
									curl_setopt($ch, CURLOPT_URL, $url);
									
									curl_setopt($ch, CURLOPT_COOKIE, $cookie_string);
									
									session_write_close();
									
									
									$result = curl_exec($ch);
									
									if($result === false){
										echo "false";
									}else{	
										$data = json_decode($result)->data2;
										
										foreach($data as $d){
								?>
									<tr class="hover:bg-gray-800 transition">
										<td class="px-6 py-4">
											<img src="../public/assets/client/<?php echo $d->profile_p;?>" class="w-10 h-10 rounded-full">
										</td>
										<td class="px-6 py-4"><?php echo $d->name;?></td>
										<td class="px-6 py-4"><?php echo $d->email;?></td>
										<td class="px-6 py-4"><?php echo $d->contact;?></td>
										<td class="px-6 py-4"><?php echo $d->city;?></td>
										<td class="px-6 py-4"><?php echo $d->company;?></td>
										<td class="px-6 py-4"><?php echo $d->servises;?></td>
									</tr>
								<?php
										}
									}
									curl_close($ch);
								?>
		
							</tbody>
						</table>
		
					</div>
		
				</main>
			</div>
		</div>
		
		<script>
			function element(data){
				let row = document.createElement("tr");
					row.className = "hover:bg-gray-800 transition";
				
				// column 1	
				let	column1 = document.createElement("td");
					column1.className = "px-6 py-4";
				
				let img = document.createElement("img");
					img.className = "w-10 h-10 rounded-full";
					img.setAttribute("src", `../public/assets/client/${data.profile_p}`);
					
					column1.appendChild(img);
					row.appendChild(column1);
				
				// column 2
				let column2 = document.createElement("td");
					column2.className = "px-6 py-4";
					column2.innerText = data.name;
					row.appendChild(column2);
				
				// column 3
				let column3 = document.createElement("td");
					column3.className = "px-6 py-4";
					column3.innerText = data.email;
					row.appendChild(column3);
					
				// column 4
				let column4 = document.createElement("td");
					column4.className = "px-6 py-4";
					column4.innerText = data.contact;
					row.appendChild(column4);
					
				// column 5
				let column5 = document.createElement("td");
					column5.className = "px-6 py-4";
					column5.innerText = data.city;
					row.appendChild(column5);
					
				// column 6
				let column6 = document.createElement("td");
					column6.className = "px-6 py-4";
					column6.innerText = data.company;
					row.appendChild(column6);
				
				// column 7
				let column7 = document.createElement("td");
					column7.className = "px-6 py-4";
					column7.innerText = data.servises;
					row.appendChild(column7);
					
				// final 
				
				document.getElementById("userTable").appendChild(row);
			}
			

			let a = [];
			async function search(){
				try{
					let input = document.getElementById("searchInput").value;
					
					const url = await fetch (`../api/users-search.php`, {
						method: 'POST',
						headers: {
							'Content-Type': 'application/json'
						}, 
						body: JSON.stringify({
							input2: input
						})
					});
					
					const result = await url.json();
					a.push(result.data[0]);
					document.getElementById("userTable").innerHTML = "";
					
					element(a[0]);
					
				}catch(error){
					console.log(error);
				}
			}
			
			document.getElementById("searchInput").addEventListener("keydown", function (event){
				let key = event.key;
				
				if(key.match(/^[a-z ]$/)){
					search();
				} if(key === "Backspace"){
					a.pop();
					document.getElementById("userTable").innerHTML = "";
					element(a[0]);
				}
			});
			
			function toggleSidebar() {
				document.getElementById("sidebar").classList.toggle("-translate-x-full");
			}
		</script>
	
	</body>
</html>