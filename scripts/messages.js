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

async function show(btn){
	try{
		let show = btn.dataset.show;
		
		const url = await fetch(`api/show.php`, {
			method: "POST",
			headers: {
				'Content-type' : 'application/json'
			},
			body: JSON.stringify({
				show: show
			})
		});
		
		const result = await url.json();
		if(result.status == "success"){
			console.log(result);
			document.getElementById("sh").style.display = "block";
			document.getElementById("name").innerHTML = result.data.name;
			document.getElementById("me_box").innerHTML += `<div class="message received">${result.message.message}</div>`;
			const profileImg = result.data.profile_p;
			document.getElementById("im").src =	`public/assets/client/${profileImg}`;
		}else{
			console.log(result);
		}
	} catch(error){
		console.log(error);
	}
}

async function send(){
	try{
		let message = document.getElementById("message").value;
		let type = "Freelancer";
		
		const url = await fetch(`api/messages.php`, {
			method: "POST",
			headers: {
				'Content-type' : 'application/json'
			},
			body: JSON.stringify({
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