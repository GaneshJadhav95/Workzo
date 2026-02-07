	function modal(btn){
		let id = btn.dataset.ac;
		document.getElementById("h_id").value = id;
	}
	
	let h_id = document.getElementById("h_id").value;
	let update = document.getElementById("update");
	update.addEventListener("submit", async function(event){
		event.preventDefault();
		let formdata = new FormData(update);
		
		try{
			const response = await fetch(`api/job-edit.php`, {
				method: "POST",
				body: formdata			
			});
			
			const result = await response.json();

			if(result.status == "success"){
				//throw new Error(result.errors);
				console.log(result);
			}else{
				console.log(result);
			}
			
			console.log("Success:", result);
			update.reset();
		}catch(error){
			console.log(error);
		}
	});
	
	async function view(btn){
		try{
			let job_id = btn.dataset.see;
			
			const responce = await fetch(`api/view.php`, {
				method: "POST",
				headers: {
					'Content-type' : 'application/json'
				},
				body: JSON.stringify({
					job_id: job_id
				}) 
			});
			
			const result = await responce.json();
			
			if(result.status == "success"){
				console.log(result);
			}else{
				console.log(result);
			}
			
			document.getElementById("name").innerHTML = result.data.title;
			document.getElementById("des").innerHTML = result.data.detail;
			document.getElementById("type").innerHTML = result.data.job_type;
			document.getElementById("budget").innerHTML = "₹" + result.data.min_budget;
			document.getElementById("budget2").innerHTML = "₹" + result.data.max_budget;
			document.getElementById("ex").innerHTML = result.data.experience;
			document.getElementById("skills").innerHTML = result.data.skills;
		}catch(error){
			console.log(error);
		}
	}