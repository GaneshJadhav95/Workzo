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

async function show(btn) {
	try {
		const show = btn.dataset.show;

		const response = await fetch("api/show.php", {
			method: "POST",
			headers: { "Content-Type": "application/json" },
			body: JSON.stringify({ show })
		});

		const result = await response.json();
		
		if (result.status === "success") {
			document.getElementById("sh").style.display = "block";
			document.getElementById("name").innerHTML = result.data.name;
			
			const meBox = document.getElementById("me_box");
			meBox.innerHTML = ""; 
			console.log(result);

			for (let i = 0; i < result.message.length; i++) {
				const message = result.message?.[i]?.message ?? "";
				
				if(result.message[i].sender_type === "Client"){
					meBox.insertAdjacentHTML("beforeend", `
						${message ? `<div class="message received float-left w-full">${message}</div>` : ""}
					`);
				}else{
					meBox.insertAdjacentHTML("beforeend", `
						${message ? `<div class="message sent float-right w-full">${message}</div>` : ""}
					`);
				}
			}

			document.getElementById("im").src = 
				`public/assets/client/${result.data.profile_p}`;
		} else {
			console.log(result);
		}
	} catch (error) {
		console.error(error);
	}
}

async function send(btn){
	try{
		let sender = btn.dataset.sender;
		let message = document.getElementById("message").value;
		let type = "Freelancer";
		
		const url = await fetch(`api/messages2.php`, {
			method: "POST",
			headers: {
				'Content-type' : 'application/json'
			},
			body: JSON.stringify({
				reciver_id: sender,
				message: message,
				type: type
			})
		});
		
		const result = await url.json();
		if(result.status == "success"){
			console.log(result);
			document.getElementById("me_box").innerHTML += `<div class="message sent">${message}</div>`;
		}else{
			console.log(result);
		}
	} catch(error){
		console.log(error);
	}
}


async function client(btn){
	try{
		let sender = btn.dataset.sender;
		let message = document.getElementById("message").value;
		let type = "Client";
		
		const url = await fetch(`api/messages3.php`, {
			method: "POST",
			headers: {
				'Content-type' : 'application/json'
			},
			body: JSON.stringify({
				reciver_id: sender,
				message: message,
				type: type
			})
		});
		
		const result = await url.json();
		if(result.status == "success"){
			console.log(result);
			document.getElementById("me_box").innerHTML += `<div class="message sent">${message}</div>`;
		}else{
			console.log(result);
		}
	} catch(error){
		console.log(error);
	}
}
//const c = document.getElementById('c');
//c.addEventListener("keydown", function (event) {
//	let key = event.key;
//	
//	if(key === "Enter"){
//		client(event,btn);
//	}
//});

async function show2(btn) {
	try {
		const show = btn.dataset.show;

		const response = await fetch("api/show2.php", {
			method: "POST",
			headers: { "Content-Type": "application/json" },
			body: JSON.stringify({ show })
		});

		const result = await response.json();

		if (result.status === "success") {
			document.getElementById("sh").style.display = "block";
			document.getElementById("name").innerHTML = result.data.name;
			
			const meBox = document.getElementById("me_box");
			meBox.innerHTML = ""; 
			
			for (let i = 0; i < result.message.length; i++) {
				const message = result.message?.[i]?.message ?? "";
				
				if(result.message[i].sender_type === "Freelancer"){
					meBox.insertAdjacentHTML("beforeend", `
						${message ? `<div class="message received w-full float-left">${message}</div>` : ""}
					`);
				}else{
					meBox.insertAdjacentHTML("beforeend", `
						${message ? `<div class="message sent float-right w-full">${message}</div>` : ""}
					`);
				}
			}
			
			document.getElementById("im").src =
				`public/assets/freelancer/${result.data.profile_p}`;
		} else {
			console.log(result);
		}
	} catch (error) {
		console.error(error);
	}
}

console.log("Loaded Messages JS");