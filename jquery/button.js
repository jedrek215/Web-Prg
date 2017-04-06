function btnOver(btn){
	if(btn.innerText == 'Follow'){
		btn.style.background = '#efefef';
	}
	else{
		btn.style.background = '#efefef';
		btn.style.color = '#f9a825';
		btn.innerText = 'Unfollow'
	}	
};

function btnOut(btn){
	if(btn.innerText == 'Follow'){
		btn.style.background = 'white';
		btn.style.color = '#f9a825';

		var url = "Home_Cont/getUserInfo";

	}
	else{
		btn.style.background = '#f9a825';
		btn.style.color = 'white';
		btn.innerText = 'Following'
	}	
};

base_url = '<?=base_url()?>';

function threadBtnClick(btn, thread_id, email){
	if(btn.innerText == 'Follow'){
		btn.style.background = '#f9a825';
		btn.style.color = 'white';
		btn.innerText = 'Following'
		
		console.log(thread_id);
		console.log(email);

		 $.ajax({
		    type: "POST",
		    url: base_url + "Follow_Cont/follow_thread",
		    data: {thread_id: thread_id, 
		           email: email               
				},

		    success: function(data){
		    /*This will be changed using a Ajax function on a later date so that the data is updated without page refresh*/ 
		    	console.log("Data sent to server");
   			}
   			error: function (jqXHR, textStatus, errorThrown){
            	alert('Error get data from ajax');
        	}
		});

	}
}


