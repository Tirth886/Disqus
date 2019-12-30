$(document).ready(() => {
	
	const _uti_ = new Utilites();
	const _req_ = new Request();

	try{
		$.ajax({
		        url: `http://127.0.0.1:8000/spiders/henil.json`, /* Setting Up the Apis URL */
		        method: "GET",
		        success: function(response){
		        	$.each(response,function(ix,value){
		        		_function.set_blog(value);
		        	});
		        },
		        error: function (err) {
		        	console.log(err);
		        }
		    });	
	}catch(e){}
});