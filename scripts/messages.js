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
			
			for (let i = 0; i < result.message2.length; i++) {
				const received = result.message?.[i]?.message ?? "";
				const sent = result.message2[i]?.message ?? "";
			
				meBox.insertAdjacentHTML("beforeend", `
					${received ? `<div class="message received">${received}</div>` : ""}
					${sent ? `<div class="message sent">${sent}</div>` : ""}
				`);
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

console.log("Loaded Messages JS");