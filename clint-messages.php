<?php
	require_once('core/layout/layout.php');
	require_once'authorization/config.php';
	session_start();
	
	if(!isset($_SESSION['client'])){
		header("Location: index.php");
	}	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Messages | Workzo</title>
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
			.conversation {
				display: flex;
				gap: 0.75rem;
				padding: 1rem;
				cursor: pointer;
			}
			.conversation:hover {
				background: #020617;
			}
			.conversation.active {
				background: rgba(34,197,94,.1);
			}
			.avatar {
				width: 40px;
				height: 40px;
				border-radius: 9999px;
			}
			.message {
				max-width: 60%;
				padding: 0.6rem 1rem;
				border-radius: 1rem;
				font-size: .9rem;
			}
			.message.received {
				background: #020617;
				border: 1px solid #334155;
				align-self: flex-start;
			}
			.message.sent {
				background: #22C55E;
				color: #052E16;
				align-self: flex-end;
			}
			.chat-input {
				flex: 1;
				background: #020617;
				border: 1px solid #334155;
				border-radius: 9999px;
				padding: 0.6rem 1rem;
				color: white;
				font-size: .9rem;
			}
			.chat-input:focus {
				outline: none;
				border-color: #22C55E;
			}
			.btn-primary {
				background: #22C55E;
				color: #052E16;
				padding: 0.6rem 1.5rem;
				border-radius: 9999px;
				font-weight: 600;
			}
		</style>
	</head>
	
	<body class="bg-[#0F172A] text-slate-200 min-h-screen flex">
	
		<?php clint(); ?>
	
		<!-- CHAT LAYOUT -->
		<div class="flex flex-1">
	
			<!-- CONVERSATION LIST -->
			<div class="w-80 bg-[#020617] border-r border-slate-800 hidden md:block">
				<div class="p-4 border-b border-slate-800 font-semibold">
					Conversations
				</div>
	
				<div class="divide-y divide-slate-800">
					<div class="conversation active">
						<img src="" class="avatar">
						<div>
							<p class="font-medium text-white">Ashish</p>
							<p class="text-xs text-slate-400 truncate">
								Can we discuss the timeline?
							</p>
						</div>
					</div>
				</div>
			</div>
	
			<!-- CHAT WINDOW -->
			<div class="flex flex-col flex-1">
	
				<!-- CHAT HEADER -->
				<div class="border-b border-slate-800 p-4 flex items-center gap-3">
					<img src="" class="w-10 h-10 rounded-full">
					<div>
						<p class="font-semibold text-white">Ashish</p>
					</div>
				</div>
	
				<!-- MESSAGES -->
				<div class="flex-1 p-6 space-y-4 overflow-y-auto">
	
					<div class="message received">
						Hi, can we discuss the project timeline?
					</div>
	
					<div class="message sent">
						Sure, I’d like to finish it within 3 weeks.
					</div>
	
					<div class="message received">
						That works for me 👍
					</div>
	
				</div>
	
				<!-- INPUT -->
				<div class="border-t border-slate-800 p-4 flex gap-2">
					<input type="text" class="chat-input" id="message" placeholder="Type a message...">
					<button class="btn-primary">Send</button>
				</div>
	
			</div>
		</div>
		<script src="scripts/messages.js"></script>
	</body>
</html>