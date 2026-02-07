async function submit(){
	try{
		const checked = document.querySelectorAll('input[name="job_type"]:checked');
		const checked2 = document.querySelectorAll('input[name="experience"]:checked');
		let job_type = [];
		let experience = [];
		for(let i = 0; i < checked.length; i++){
			job_type.push(checked[i].value);
		}

		for(let i = 0; i < checked2.length; i++){
			experience.push(checked2[i].value);
		}
		
		
		const url = await fetch(`api/find.php`, {
			method: "POST",
			headers: {
				'Content-type' : 'application/json'
			},
			body: JSON.stringify({
				job_type: job_type,
				experience: experience
			})
		});
		
		const result = await url.json();
		if(result.status == "success"){
			console.log(result);
		}else{
			console.log(result);
		}
		
		let data = result.data;
		let pri = document.getElementById("print");
		if(data != ""){
			pri.innerHTML = "";
		}else{
			pri.innerHTML = "data not found";
		}
		for(let i = 0; i < data.length; i++){
			pri.innerHTML += jobcard(data[i]);
		}
	}catch(error){
		console.log(error);
	}
}

function jobcard(data) {
	const ajit = (!data.job_id)
		? `<button id="ab${data.id}" data-job="${data.id}" onclick="apply(this)" class="btn-apply">Apply Now</button>`
		: `<button class="btn-apply" disabled>Applied</button>`;
	
	return `
		<div class="job-card mt-5">
			<div class="flex justify-between">
				<h3 class="text-white font-semibold">
					${data.title}
				</h3>
			</div>

			<p class="text-sm text-slate-400 mt-1">
				${data.detail}
			</p>

			<div class="flex gap-3 text-xs mt-3 text-slate-400">
				<span>${data.job_type}</span>
				<span>•</span>
				<span>₹${data.min_budget}</span> – <span>₹${data.max_budget}</span>
				<span>•</span>
				<span>${data.experience}</span>
			</div>

			<div class="flex flex-wrap gap-2 mt-3">
				<span class="skill">${data.skills}</span>
			</div>

			<div class="flex justify-between items-center mt-4">
				<span class="text-xs text-slate-500">
					Posted <span>${data.created_at}</span> hours ago
				</span>
				${ajit}
			</div>
		</div>
	`;
}


async function apply(btn){
	try{
		let job_id = btn.dataset.job;
		const url = await fetch(`api/apply.php`, {
			method: "POST",
			headers: {
				'Content-type' : 'application/json'
			},
			body: JSON.stringify({
				job_id: job_id
			})
		});
		
		let result = await url.json();
		console.log(result);
		if (result.status === "success") {
			document.getElementById("ab" + job_id).innerHTML = "Applied";
			document.getElementById("ab" + job_id).disabled = true;
		}
	}catch(error){
		console.log(error);
	}
}