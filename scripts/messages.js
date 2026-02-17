let show3 = 0;
function ajit2(){
	show1(show3);
	console.log("ok");
}
async function show1(btn) {
	try {
		//const show = btn.dataset.show;
		show3 = btn;
		const response = await fetch("api/show.php", {
			method: "POST",
			headers: { "Content-Type": "application/json" },
			body: JSON.stringify({ show: show3 })
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
						${message ? `<div class="message received">${message}</div>` : ""}
					`);
				}else{
					meBox.insertAdjacentHTML("beforeend", `
						${message ? `<div class="message sent">${message}</div>` : ""}
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

let show = 0;
function ajit(){
	
	show2(show);
	console.log("ok");
}


async function show2(btn) {
	try {
		//const show = btn.dataset.show;
		show = btn;
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
						${message ? `<div class="message received">${message}</div>` : ""}
					`);
				}else{
					meBox.insertAdjacentHTML("beforeend", `
						${message ? `<div class="message sent">${message}</div>` : ""}
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