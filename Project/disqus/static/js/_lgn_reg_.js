"use strict"
$(document).ready(() => {
	// console.log(_uti_);
	const _uti_ = new Utilites();
	const _req_ = new Request();

	/*
		Register Toggle Button
	*/

	$('.toggle').on('click', () =>  {
	  $('.cstm-container').addClass('active');
	  $(".toggle").data("bs.tooltip")._isEnabled = false;
	});

	$('.close_').on('click', () =>  {
	  $('.cstm-container').removeClass('active');
	  $(".toggle").data("bs.tooltip")._isEnabled = true;	
	});

	/*
		Register Toggle Button END
 	*/


 	/*
		Registering User to Database
 	*/

 		$("button#register").on("click",(event) => {
 			event.preventDefault();
 			let user = $("form.register").find("input[type=text],input[type=password]");
 			let tempuser = [...user];
 			user = _uti_.getInputdetail(user)
 			console.log(user);
 			if(user.status){
	 			if(regex.usercontact().test(user.data.usercontact) && regex.username().test(user.data.username) && regex.email().test(user.data.useremail)){
	 				if (user.data.userpassword === user.data.userpasswordrepeat) {
		 				let argu_ = {
		 					"type": "r",
		 					"method": "POST",
		 					"data": user.data
		 				}
		 				_req_._api_(argu_, (response) => {
		 					if(response.status){
		 						if(_uti_.cleanUp(tempuser)){
			 						alert("Register Success");
		 						}

		 					}else{
		 						alert("User already exist");
		 					}
		 				});
	 				}else{
	 					alert("password not match");
	 				}
	 			}else{
	 				alert("Invalid Input[ *Email *Phone *username ]");
	 			}
 			}else{
 				alert("required feild is empty");
 			}

 		});
 		$("button#login").on("click",(event) => {
 			let user = $("form.login").find("input[type=text],input[type=password]");
 			user = _uti_.getInputdetail(user)
 			console.log(user.status);
 			if(user.status){
	 			window.location.href = "/?login";
	 			return true;
 			}else{
 				$("#loginerr").html("Invalid Input");
 				$("#loginerr").css({
 					"color" : "red",
 				});
 				return false;
 			}
 		});

 	/*
		Registering User to Database END
 	*/

 	/*
		Forget Password
 	*/

 	$("input#fpemail-").on("change",function(e){
 		// $("input#fgcontact").val("").addClass("d-none");
 		let value 	  = $(this).val();
 		if(regex.email().test(value)){
 			$(this).parent("div").find("div.bar").css({
 				"background":"#757575",
 			});
			let argu_ = {
				"type": "email_check",
				"method": "POST",
				"data": {"email" : value}
			}
			_req_._api_(argu_, (response) => {
				console.log(response);
				// console.log(response.status);
				if(response.status == true){
					$("input#fgcontact-").parent("div").removeClass("d-none");
					$("input#fgcontact-").focus();
				}else{
					$("#error").html(response.invalidemail);
					$("#error").css({
						"color" : "red",
					});
					 $(this).val("");
					$(this).parent("div").find("div.bar").css({
		 				"background":"red",
		 			});
				}
			});
 		}else{
 			$(this).parent("div").find("div.bar").css({
 				"background":"red",
 			});
 		}
 	});

 	$("input#fgcontact-").on("change",function(e){
 		e.preventDefault();
 		let value 	  = $(this).val();
 		if(regex.usercontact().test(value)){
 			$(this).parent("div").find("div.bar").css({
 				"background":"#757575",
 			});
			let argu_ = {
				"type": "phone_check",
				"method": "POST",
				"data": {"phone" : value}
			}
			_req_._api_(argu_, (response) => {
				console.log(response);
				if(response.status == true){
					
				}else{
					$("#error").html(response.invalidemail);
					$("#error").css({
						"color" : "red",
					});
					$(this).parent("div").find("div.bar").css({
		 				"background":"red",
		 			});
					$("input#fpemail-").focus();
				}
			});
 		}else{
 			$(this).parent("div").find("div.bar").css({
 				"background":"red",
 			});
 		}
 	});

 	$("button#forget-password").on("click", function(e){
 		e.preventDefault();
 		$(this).prop("disabled",true);
 		let argu_ = {
			"type": "fgtpswd",
			"method": "POST",
			"data": {"send" : true}
		}
		_req_._api_(argu_, (response) => {
			if(response.send){
				$("#error").html(response.sucess);
				$("#error").css({
					"color" : "green",
				});
		 		$(this).prop("disabled",false);
		 		$("input#fgcontact-").val("");
		 		$("input#fgcontact-").removeClass("d-none").addClass("d-none");
				$("input#fpemail-").val("");
			}else{
				$("#error").html(response.failure);
				$("#error").css({
					"color" : "red",
				});
			}		
		});
 	});

 	/* End Password */
});