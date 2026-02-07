	let setting = document.getElementById("setting");
	setting.addEventListener("submit", async function(event){
		event.preventDefault();
		
		let formdata = new FormData(setting);
		
		try{
			const response = await fetch(`api/freelancer-setting.php`, {
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
			setting.reset();
		}catch(error){
			console.log(error);
		}
	});