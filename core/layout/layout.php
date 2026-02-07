<?php
	function nav(){
?>
	<nav class="bg-[#0F172A] border-b border-slate-800 sticky top-0 z-50">
		<div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
	
			<!-- LOGO -->
			<a href="index.php" class="text-2xl font-bold text-white tracking-wide">
				Workzo
			</a>
	
			<!-- DESKTOP LINKS -->
			<div class="hidden md:flex items-center gap-8 text-sm text-slate-300">
				<a href="find-work.php" class="hover:text-white transition">Find Work</a>
			</div>
	
			<!-- SEARCH -->
			<div class="hidden lg:block">
				<input type="text"
					placeholder="Search jobs or freelancers"
					class="bg-[#020617] border border-slate-700 rounded-full
					px-5 py-2 text-sm w-80 text-slate-200
					focus:outline-none focus:ring-2 focus:ring-green-500">
			</div>
	
			<!-- RIGHT ACTIONS -->
			<div class="flex items-center gap-4 relative">
	
				<!-- PROFILE DROPDOWN -->
				<div class="relative group">
					<img src="public/assets/freelancer/<?php echo $_SESSION['profile'];?>"
						class="w-9 h-9 rounded-full border border-slate-700 cursor-pointer">
	
					<!-- DROPDOWN -->
					<div class="absolute right-0 mt-3 w-48 bg-[#020617]
						border border-slate-800 rounded-xl shadow-xl
						opacity-0 invisible group-hover:opacity-100 group-hover:visible
						transition-all duration-200">
	
						<a href="user-profile.php"
							class="block px-4 py-3 text-sm text-slate-300 hover:bg-slate-800 hover:text-white">
							Profile
						</a>
	
						<a href="dashboard.php"
							class="block px-4 py-3 text-sm text-slate-300 hover:bg-slate-800 hover:text-white">
							Dashboard
						</a>
	
						<hr class="border-slate-800">
	
						<a href="logout.php"
							class="block px-4 py-3 text-sm text-red-400 hover:bg-slate-800">
							Logout
						</a>
					</div>
				</div>
	
				<!-- MOBILE MENU BUTTON -->
				<button class="md:hidden text-slate-300 focus:outline-none" onclick="toggleMenu()">
					<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
						viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round"
							d="M4 6h16M4 12h16M4 18h16" />
					</svg>
				</button>
	
			</div>
		</div>
	
		<!-- MOBILE MENU -->
		<div id="mobileMenu" class="hidden md:hidden bg-[#020617] border-t border-slate-800">
			<div class="px-6 py-4 space-y-4 text-slate-300 text-sm">
				<a href="find-work.php" class="block hover:text-white">Find Work</a>
				<a href="find-talent.php" class="block hover:text-white">Find Freelancers</a>
				<a href="about.php" class="block hover:text-white">About Us</a>
			</div>
		</div>
	</nav>
	
	<script>
		function toggleMenu() {
			document.getElementById("mobileMenu").classList.toggle("hidden");
		}
	</script>

<?php
	}
?>

<?php
	function indexnav(){
?>
	<nav class="bg-[#0F172A] border-b border-slate-800 sticky top-0 z-50">
		<div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
	
			<!-- LOGO -->
			<a href="index.php" class="text-2xl font-bold text-white tracking-wide">
				Workzo
			</a>
	
			<!-- DESKTOP LINKS -->
			<div class="hidden md:flex items-center gap-8 text-sm text-slate-300">
				<a href="about.php" class="hover:text-white transition">About Us</a>
			</div>
	
			<!-- SEARCH -->
			<div class="hidden lg:block">
				<input type="text"
					placeholder="Search jobs or freelancers"
					class="bg-[#020617] border border-slate-700 rounded-full
					px-5 py-2 text-sm w-80 text-slate-200
					focus:outline-none focus:ring-2 focus:ring-green-500">
			</div>
	
			<!-- RIGHT ACTIONS -->
			<div class="flex items-center gap-4 relative">
	
				<!-- PROFILE DROPDOWN -->
				<div class="relative group">
					<img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"
						class="w-9 h-9 rounded-full border border-slate-700 cursor-pointer">
				</div>
	
				<!-- MOBILE MENU BUTTON -->
				<button class="md:hidden text-slate-300 focus:outline-none" onclick="toggleMenu()">
					<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
						viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round"
							d="M4 6h16M4 12h16M4 18h16" />
					</svg>
				</button>
	
			</div>
		</div>
	
		<!-- MOBILE MENU -->
		<div id="mobileMenu" class="hidden md:hidden bg-[#020617] border-t border-slate-800">
			<div class="px-6 py-4 space-y-4 text-slate-300 text-sm">
				<a href="find-work.php" class="block hover:text-white">Find Work</a>
				<a href="find-talent.php" class="block hover:text-white">Find Freelancers</a>
				<a href="about.php" class="block hover:text-white">About Us</a>
			</div>
		</div>
	</nav>
	
	<script>
		function toggleMenu() {
			document.getElementById("mobileMenu").classList.toggle("hidden");
		}
	</script>

<?php
	}
?>

<?php
	function clintnav(){
?>
	<nav class="bg-[#0F172A] border-b border-slate-800 sticky top-0 z-50">
		<div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
	
			<!-- LOGO -->
			<a href="index.php" class="text-2xl font-bold text-white tracking-wide">
				Workzo
			</a>
	
			<!-- DESKTOP LINKS -->
			<div class="hidden md:flex items-center gap-8 text-sm text-slate-300">
				<a href="find-talent.php" class="hover:text-white transition">Find Freelancers</a>
			</div>
	
			<!-- SEARCH -->
			<div class="hidden lg:block">
				<input type="text"
					placeholder="Search jobs or freelancers"
					class="bg-[#020617] border border-slate-700 rounded-full
					px-5 py-2 text-sm w-80 text-slate-200
					focus:outline-none focus:ring-2 focus:ring-green-500">
			</div>
	
			<!-- RIGHT ACTIONS -->
			<div class="flex items-center gap-4 relative">
	
				<!-- PROFILE DROPDOWN -->
				<div class="relative group">
					<img src="public/assets/client/<?php echo $_SESSION['c_profile']; ?>"
						class="w-9 h-9 rounded-full border border-slate-700 cursor-pointer">
	
					<!-- DROPDOWN -->
					<div class="absolute right-0 mt-3 w-48 bg-[#020617]
						border border-slate-800 rounded-xl shadow-xl
						opacity-0 invisible group-hover:opacity-100 group-hover:visible
						transition-all duration-200">
	
						<a href="clint-profile.php"
							class="block px-4 py-3 text-sm text-slate-300 hover:bg-slate-800 hover:text-white">
							Profile
						</a>
	
						<a href="clint-dashboard.php"
							class="block px-4 py-3 text-sm text-slate-300 hover:bg-slate-800 hover:text-white">
							Dashboard
						</a>
	
						<hr class="border-slate-800">
	
						<a href="logout.php"
							class="block px-4 py-3 text-sm text-red-400 hover:bg-slate-800">
							Logout
						</a>
					</div>
				</div>
	
				<!-- MOBILE MENU BUTTON -->
				<button class="md:hidden text-slate-300 focus:outline-none" onclick="toggleMenu()">
					<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
						viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round"
							d="M4 6h16M4 12h16M4 18h16" />
					</svg>
				</button>
	
			</div>
		</div>
	
		<!-- MOBILE MENU -->
		<div id="mobileMenu" class="hidden md:hidden bg-[#020617] border-t border-slate-800">
			<div class="px-6 py-4 space-y-4 text-slate-300 text-sm">
				<a href="find-talent.php" class="block hover:text-white">Find Freelancers</a>
				<a href="about.php" class="block hover:text-white">About Us</a>
			</div>
		</div>
	</nav>
	
	<script>
		function toggleMenu() {
			document.getElementById("mobileMenu").classList.toggle("hidden");
		}
	</script>

<?php
	}
?>

<?php
	function footer(){
?>
	<footer class="bg-[#020617] border-t border-slate-800 mt-20">
		<div class="max-w-7xl mx-auto px-6 py-14 grid gap-10 md:grid-cols-4">
	
			<!-- BRAND -->
			<div>
				<h2 class="text-2xl font-bold text-white mb-3">Workzo</h2>
				<p class="text-sm text-slate-400 leading-relaxed">
					Workzo is a freelancing platform that connects businesses
					with skilled professionals across the globe.
				</p>
			</div>
	
			<!-- FOR CLIENTS -->
			<div>
				<h3 class="text-white font-semibold mb-4">For Clients</h3>
				<ul class="space-y-2 text-sm text-slate-400">
					<li><a href="#" class="hover:text-white">How to Hire</a></li>
					<li><a href="#" class="hover:text-white">Find Freelancers</a></li>
					<li><a href="#" class="hover:text-white">Post a Job</a></li>
					<li><a href="#" class="hover:text-white">Payment Protection</a></li>
				</ul>
			</div>
	
			<!-- FOR FREELANCERS -->
			<div>
				<h3 class="text-white font-semibold mb-4">For Freelancers</h3>
				<ul class="space-y-2 text-sm text-slate-400">
					<li><a href="#" class="hover:text-white">Find Work</a></li>
					<li><a href="#" class="hover:text-white">Create Profile</a></li>
					<li><a href="#" class="hover:text-white">Success Stories</a></li>
					<li><a href="#" class="hover:text-white">Freelancer Resources</a></li>
				</ul>
			</div>
	
			<!-- COMPANY -->
			<div>
				<h3 class="text-white font-semibold mb-4">Company</h3>
				<ul class="space-y-2 text-sm text-slate-400">
					<li><a href="#" class="hover:text-white">About Us</a></li>
					<li><a href="#" class="hover:text-white">Contact Us</a></li>
					<li><a href="#" class="hover:text-white">Careers</a></li>
					<li><a href="#" class="hover:text-white">Terms & Privacy</a></li>
				</ul>
			</div>
	
		</div>
	
		<!-- BOTTOM BAR -->
		<div class="border-t border-slate-800">
			<div class="max-w-7xl mx-auto px-6 py-6 flex flex-col md:flex-row
				items-center justify-between gap-4">
	
				<p class="text-sm text-slate-500">
					© 2026 Workzo. All rights reserved.
				</p>
	
				<div class="flex gap-4 text-slate-400">
					<a href="#" class="hover:text-white">Facebook</a>
					<a href="#" class="hover:text-white">Twitter</a>
					<a href="#" class="hover:text-white">LinkedIn</a>
				</div>
			</div>
		</div>
	</footer>
<?php
	}
?>

<?php
	function aside(){
?>
		<div class="flex h-screen bg-[#0F172A]">
		
		<!-- Mobile menu button -->
		<div class="md:hidden flex items-center justify-between w-full p-4 bg-[#020617] border-b border-slate-800">
			<button id="menu-btn" class="text-white focus:outline-none">
			<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
				viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
				<path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
			</svg>
			</button>
		</div>
		
		<!-- Sidebar -->
		<aside id="sidebar" class="fixed inset-y-0 left-0 w-64 bg-[#020617] border-r border-slate-800 transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out flex flex-col z-20">
			<div class="p-6 text-2xl font-bold text-white tracking-wide">Workzo</div>
		
			<nav class="flex-1 px-4 py-2 space-y-1 text-sm">
			<a href="dashboard.php" class="nav-link block px-4 py-2 rounded hover:bg-slate-700 hover:text-white bg-slate-800 text-white font-medium">Dashboard</a>
			<a href="setting.php" class="nav-link block px-4 py-2 rounded hover:bg-slate-700 hover:text-white text-slate-300">Setting</a>
			<a href="user-messages.php" class="nav-link block px-4 py-2 rounded hover:bg-slate-700 hover:text-white text-slate-300">Messages</a>
			<a href="user-profile.php" class="nav-link block px-4 py-2 rounded hover:bg-slate-700 hover:text-white text-slate-300">Profile</a>
			</nav>
		
			<button class="p-4 border-t border-slate-800 text-red-400 text-sm font-bold">
				<a href="logout.php">Logout</a>
			</button>
		</aside>
		
		<!-- Main content -->
		<div class="flex-1 md:ml-64">
			
		</div>
	</div>
	
	<!-- Script to toggle mobile menu -->
	<script>
		const btn = document.getElementById('menu-btn');
		const sidebar = document.getElementById('sidebar');
		
		btn.addEventListener('click', () => {
			sidebar.classList.toggle('-translate-x-full');
		});
	</script>
<?php } ?>

<?php
	function clint(){
?>
	<div class="flex h-screen bg-[#0F172A]">
		
		<!-- Mobile menu button -->
		<div class="md:hidden flex items-center justify-between w-full p-4 bg-[#020617] border-b border-slate-800">
			<button id="menu-btn" class="text-white focus:outline-none">
			<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
				viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
				<path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
			</svg>
			</button>
		</div>
		
		<!-- Sidebar -->
		<aside id="sidebar" class="fixed inset-y-0 left-0 w-64 bg-[#020617] border-r border-slate-800 transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out flex flex-col z-20">
			<div class="p-6 text-2xl font-bold text-white tracking-wide">Workzo</div>
		
			<nav class="flex-1 px-4 py-2 space-y-1 text-sm">
			<a href="clint-dashboard.php" class="nav-link block px-4 py-2 rounded hover:bg-slate-700 hover:text-white bg-slate-800 text-white font-medium">Dashboard</a>
			<a href="job-post.php" class="nav-link block px-4 py-2 rounded hover:bg-slate-700 hover:text-white text-slate-300">Post a Job</a>
			<a href="myjobs.php" class="nav-link block px-4 py-2 rounded hover:bg-slate-700 hover:text-white text-slate-300">My Jobs</a>
			<a href="clint-proposal.php" class="nav-link block px-4 py-2 rounded hover:bg-slate-700 hover:text-white text-slate-300">Proposals</a>
			<a href="clint-messages.php" class="nav-link block px-4 py-2 rounded hover:bg-slate-700 hover:text-white text-slate-300">Messages</a>
			<a href="clint-setting.php" class="nav-link block px-4 py-2 rounded hover:bg-slate-700 hover:text-white text-slate-300">Settings</a>
			</nav>
		
			<div class="p-4 border-t border-slate-800 text-sm text-slate-400">
				<a href="clint-profile.php"> Client Account</a>
			</div>
		</aside>
		
		<!-- Main content -->
		<div class="flex-1 md:ml-64">
			
		</div>
	</div>
	
	<!-- Script to toggle mobile menu -->
	<script>
		const btn = document.getElementById('menu-btn');
		const sidebar = document.getElementById('sidebar');
		
		btn.addEventListener('click', () => {
			sidebar.classList.toggle('-translate-x-full');
		});
	</script>
<?php
	}
?>