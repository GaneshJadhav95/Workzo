	let job = document.getElementById("job");
	job.addEventListener("submit", async function(event){
		event.preventDefault();
		
		let formdata = new FormData(job);
		
		try{
			const response = await fetch(`api/jobs.php`, {
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
			job.reset();
		}catch(error){
			console.log(error);
		}
	});