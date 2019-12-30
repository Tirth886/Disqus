class Utilites{
	/* RegExp Logic Will be Here */
	protocol;
	host;
	initMaterialD() {
		  $('[data-toggle="tooltip"]').tooltip({
      html : true,
    });		
      $('.mdb-select').materialSelect();
    	$("#user_profile").on("click", () => {
			if(!$('.cstm_modal_').hasClass("active")){
				$('.cstm_modal_').addClass("active")
			}else{
				$('.cstm_modal_').removeClass("active")
			}
		});
		console.log("Method Calling....")
    }

    getUserId(){
        this.id = $("#user_id").val();
        return this.id;
    }

    getKeyword(){
        this.keywords = {
            "technology" : [
                "tech",
                "technology",
                "science",
                "mobile",
                "tech-news",
                "computer",
                "hardware",
                "software",
                "language"
            ],
            "programming": [
                "php",
                "python",
                "flutter",
                "ruby",
                "c",
                "data-structure",
                "c++",
                "language"
            ],
            "social": [
                "people",
                "food",
                "home",
                "discussion",
                "happy",
                "sad",
                "etc",
                "#",
                "baby",
                "location",
                "city",
                "country",
                "gr8",
            ],

        };
        return this.keywords; 
    }
    getInputdetail(data){
      console.log(data);
  		let __response__  = {};
  		let __dict__ = {}
  		for (let i = 0; i < data.length; i++) {
      		let input = $(`#${data[i].id}`).val();
      		if(input == "" || input == undefined){
      			__response__['message'] = "required feild is empty";
      			__response__['status']  = false;
      		}else{
      			__dict__[data[i].name] = input;
  	 			__response__['message'] = "Get Detail Sucessfully";
      			__response__['status']  = true;
      		}
      	}
      	if ( __response__.status ) { 
  	    	__response__["data"] = __dict__;
      		return __response__;
      	} else {
      		return __response__;
      	}   	
    }
    isValid(data){
    	return true;	
    }
    cleanUp(data){
      for (let i = 0; i < data.length; i++) {
        $(`#${data[i].id}`).val("");
      }
      return true;
    }
    randomString(){
       let result           = '';
       let characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
       let charactersLength = characters.length;
       for ( let i = 0; i < 5; i++ ) {
          result += characters.charAt(Math.floor(Math.random() * charactersLength));
       }
       return result;
    }
    convertJSON(value){
      let finalJson = {};
      for (var key in value) {
          if (/^\d+$/.test(value[key])) {
              finalJson[key] = +value[key];
          } else {
              finalJson[key] = value[key];
          }
      }
      console.log(finalJson);
      // return finalJson;
    }
} 