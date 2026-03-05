let show3 = 0;
let id1 = 0;
function ajit2(){
	show1(show3, id1);
}
async function show1(btn, id) {
	try {
		show3 = btn;
		id1 = id;

		const response = await fetch("api/show.php", {
			method: "POST",
			headers: { "Content-Type": "application/json" },
			body: JSON.stringify({ show: show3, id: id1 })
		});

		const result = await response.json();

		if (result.status === "success") {
			document.getElementById("sh").style.display = "block";
			document.getElementById("name").innerHTML = result.data.name;
			
			const meBox = document.getElementById("me_box");
			meBox.innerHTML = ""; 

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
let id2 = 0;
function ajit(){
	show2(show, id2);
}


async function show2(btn, id) {
	try {
		//const show = btn.dataset.show;
		show = btn;
		id2 = id;
		const response = await fetch("api/show2.php", {
			method: "POST",
			headers: { "Content-Type": "application/json" },
			body: JSON.stringify({ show: show, id: id2 })
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