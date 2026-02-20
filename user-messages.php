<?php
	require_once('core/layout/layout.php');
	require_once'authorization/config.php';
	session_start();
	
	if(!isset($_SESSION['freelancer'])){
		header("Location: index.php");
	} 
	$id = $_SESSION['freelancer_id'];
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
				width: fit-content;
			}
			
			.message.received {
				background: #020617;
				border: 1px solid #334155;
				color: #e2e8f0;
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
	
		<?php aside(); ?>
	
		<!-- CHAT LAYOUT -->
		<div class="flex flex-1">
	
			<!-- CONVERSATION LIST -->
			<div class="w-80 bg-[#020617] border-r border-slate-800 hidden md:block">
				<div class="p-4 border-b border-slate-800 font-semibold">
					Conversations
				</div>
	
				<div class="divide-y divide-slate-800">
					<?php					
						$user = mysqli_query($conn, "SELECT DISTINCT 
															messages.message_id,
															client.id,
															client.name,
															client.profile_p
														FROM messages
														JOIN client 
															ON messages.sender_id = client.id
														WHERE messages.reciever_id = '$id'
													");
						
						if(mysqli_num_rows($user) > 0){
							while($row = mysqli_fetch_assoc($user)){
					?>
						<button onclick="show1(<?php echo $row['message_id'];?>), setInterval(ajit2, 1000);" data-show="<?php echo $row['message_id'];?>" class="conversation active w-full">
							<img src="public/assets/client/<?php echo $row['profile_p'];?>" class="avatar">
							<div>
								<p class="font-medium text-white"><?php echo $row['name'];?></p>
							</div>
						</button>
					<?php
							}
						}
					?>
				</div>
			</div>
	
			<!-- CHAT WINDOW -->
			<div class="flex flex-col flex-1 hidden" id="sh">
	
				<!-- CHAT HEADER -->
				<div class="border-b border-slate-800 p-4 flex items-center gap-3">
					<img id="im" src="" class="w-10 h-10 rounded-full">
					<div>
						<p class="font-semibold text-white" id="name"></p>
					</div>
				</div>
	
				<!-- MESSAGES -->
				<div id="me_box" class="flex flex-col p-6 space-y-4 h-[79%] overflow-y-auto"></div>
	
				<!-- INPUT -->
				<div class="border-t border-slate-800 p-4 flex gap-2">
					<input type="text" data-sender="<?php echo $id;?>" id="message" class="chat-input" placeholder="Type a message...">
				</div>
	
			</div>
	
		</div>
		<script src="scripts/messages.js"></script>
		<script>
			async function send(sender) {
				try {
					const input = document.getElementById("message");
					let message = input.value.trim();
					if (!message) return;
			
					const response = await fetch("api/messages2.php", {
						method: "POST",
						headers: {
							"Content-Type": "application/json"
						},
						body: JSON.stringify({
							reciver_id: sender,
							message: message,
							type: "Freelancer"
						})
					});
			
					const result = await response.json();
			
					if (result.status === "success") {
						const meBox = document.getElementById("me_box");
						meBox.innerHTML = "";
			
						result.message.forEach(item => {
							const msgText = item?.message ?? "";
			
							if (!msgText) return;
			
							const messageHTML =
								item.sender_type === "Client"
									? `<div class="message received">${msgText}</div>`
									: `<div class="message sent">${msgText}</div>`;
			
							meBox.insertAdjacentHTML("beforeend", messageHTML);
						});
			
						input.value = "";
					} else {
						console.log(result);
					}
			
				} catch (error) {
					console.error(error);
				}
			}
			
			document.getElementById("message").addEventListener("keydown", function (event) {
				if (event.key === "Enter") {
					let sender = this.dataset.sender;
					send(sender);
				}
			});	
		</script>
	</body>
</html>