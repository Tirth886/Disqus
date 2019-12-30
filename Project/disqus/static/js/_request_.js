const uri = new Urls();
class Request{
	_api_(argu_,calback){
		// console.log(argu_);
		$.ajax({
	        url: uri.getHost_(argu_.type), /* Setting Up the Apis URL */
			contentType: "application/json", /*  */		
	        method: argu_.method,
	        data: JSON.stringify(argu_.data),   
	        success: function(response){
	       	  calback(response);
	        },
	        error: function (err) {
	        	calback(err);
	        }
	    });		
	}

}