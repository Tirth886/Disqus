$(document).ready(() => {
	
	const $uti = new Utilites();
	const $req = new Request();


	/* Function */

	const getLikes = (args) => {
		_dict = {
			"type"   : "lke_r",
			"method" : "post",
			"data"	 : args.data_	
		}
		console.log(_dict);
		$req._api_(_dict,(response) => {
			try{
				setlikes({"totallikes" : response.data.count,"resultlike" : args.resultlike});
			}catch(e){}
		});
	};
	const getbookmark = (args) => {
		_dict = {
			"type"  : "bk_r",
			"method": "POST",
			"data"	: args.data_ 
		}
		$req._api_(_dict,(response) => {
			console.log(response);
			$(`#${args.resultbookmark}`).html("");
			if(response.status){
					try{
				for (var i = 1; i <= response.data.length; i++) {
						setbookmarks({"result" : {"id":response.data[(i-1)].id,"question":response.data[(i-1)].question,"code":response.data[(i-1)].code,"srno":i},"resultbookmark" : args.resultbookmark});
				}
					}catch(e){}
			}else{
				$(`#${args.resultbookmark}`).html(`<div id="frnd_container-<?php echo @$data->id; ?>">
              <div class='container' >
                 <div class='row position-relative'>
                    <div class="col-md-12 p-3 d-flex">
                      NO Bookmark 😑
                    </div>
                  </div>
                </div>
              </div>`)
			}
		});
	};
	const fetchQuestion = () => {
		// if (status) {
			$req._api_(
			{
				"type":"gt_q",
				"method":"get",
				"data": ""
			},(response) => {
				if(response.status){
					let data = response.data;
					for (var i = 0; i < data.length; i++) {
						// console.log(data[i]);
						dict = {
							"code"	   : data[i].code,
							"question" : data[i].question,
							"username" : data[i].username,
							"date" 	   : data[i].date,
							"catagory" : data[i].catagory,
							"question_id" : data[i].id,
							"user_id" : data[i].user_id,
							"picture" : data[i].picture,

						}
						_function.set_question(dict);
					}
				}else{
					$("#append_question").html(`
						<div id="frnd_container cstm_card_home media bg-white p-3 mt-2" style="background:#fff;">
              <div class='container'>
                 <div class='row position-relative'>
                    <div class="col-md-12 p-3 d-flex justify-content-center">
                      NO Question 😑
                    </div>
                  </div>
                </div>
              </div>`)
				}
			});
		// }
	};
	const fetch_refresh = () => {
		const _list_q_r_code = $(".cstm_card_home");
		// console.log(_list_q_r_code);
		try{
			for (var i = 1; i < _list_q_r_code.length; i++) {
				let code  = _list_q_r_code[i].id; 
				let block = $(_list_q_r_code[i])[0].dataset.replyblock;
				let resultlike = $(_list_q_r_code[i])[0].dataset.likeblock;
				// let resultbookmark = $(_list_q_r_code[i])[0].dataset.bookmarkblock;

				let post_id = $(_list_q_r_code[i])[0].dataset.qid;
				fetchreply({
					"code":code,
					"replyblock":block
				});
				getLikes({ 
					"data_" : {
						"post_id" : post_id
					},
					"resultlike" : resultlike
				});
				getbookmark({
				 "data_" : {
				 	"post_id" : post_id
				 },
				 "resultbookmark" : "append_bookmark"
				})
			}
		}catch(e){}
	};

	const fetchreply = (args) => {
		let code  = args.code;
		let block = args.replyblock;
		
		$req._api_(
		{
			"type":"gt_rpl",
			"method":"post",
			"data": {'code':code}
		},(response) => {
			console.log(response);
			if(response.status){
				let data = response.data;	
				for (var i = 0; i < data.length; i++) {
					dict = {
						"code"	   : data[i].question_code,
						"answers"  : data[i].answers,
						"date" 	   : data[i].date,
						"username" : data[i].username,
						"reply_id" : data[i].id,
						"user_id"  : data[i].reply_user_id,
						"append_block" : block,
					}
					_function.set_reply(dict);
				}
			}else{
				console.log(response);
			}
		});

	};

	const setlikes = (args) => {
		console.log(args);
		let totallikes = args.totallikes;
		let resultlike = args.resultlike;

		_function.set_like({"totallikes" : totallikes,"resultlike" : resultlike});
	};

	const setbookmarks = (args) => {
		_function.set_bookmark(args);
	}

	fetchQuestion()
	setTimeout(() => {
		fetch_refresh();
	},100);
	/* END Function */
	



	const keywords = $uti.getKeyword();
	let $question 		= $("#question_input");
	let $question_click = $("#ask_question");
	let $badges 		= $("#suggested_keywords");
 


	/* Ask Question */
	$question.on("keypress",(e) => {
		let input_list = "";
		let input = $("#question_input").val();
		input_list = input.split(/\s/g);
		keywords_list = _function.whichKeywords({"input_list":input_list,"keywords":keywords});
		// console.log(keywords_list);
		if(input == ""){
			$badges.html("");
		}
		if(typeof keywords_list.keywords == "string"){
			$badges.html(`<span class="badge badge-primary suggested_keywords" id="catagory">${keywords_list.keywords}</span>`)
		}
	});
	$question_click.on("click", () => {
		let question = $uti.getInputdetail($question);
		let user_id	 = $uti.getUserId();
		let catagory = $("#catagory").html() == undefined ? "other" : $("#catagory").html().trim();

		if (question.status) {
			// console.log("hello")
			_dict = {
				"type": "q",
				"method": "POST",
				"data": question.data
			}
			_dict["data"]["catagory"] = catagory;
			// _dict["data"]["user_id"]  = user_id;


			/* URL issue (not taking dynamic url) checking is required */

			$req._api_(_dict,(response) => {
				if(response.status){
					$("#append_question").html("");
					$question.val("");
					$("#suggested_keywords").html("");
					fetchQuestion();
				}else{
					console.log(response);
				}
			});

		}else{
			console.log(question);
		}
	});

	/* End Asking Question */

	/* Start Replying */

	$(document).on("click", "button.reply_question",function(event) {
		let id  		= event.target.id;
		let code 		= $(`#${id}`).data("code");
		let reply_area 	 = $(`#${id}`).data("replyarea");
		let append_reply_block = $(`#${id}`).data("replyblock");
		let reply 		= $uti.getInputdetail($(`#${reply_area}`));

		// console.log(id,reply_area,code);
		// console.log(reply);

		_dict = {
			"type": "rpl",
			"method": "POST",
			"data": reply.data
		}
		_dict["data"]["question_code"] = code;
		// console.log(_dict);
		// return false;
		$req._api_(_dict,(response) => {
			$(`#${reply_area}`).val("");
			$(`#${append_reply_block}`).html("");
			if (response.status) {
				fetchreply({"code":code,"replyblock":append_reply_block});
			}
		});

	});

	/* End Replying */


	/* Detaching */

	$(document).on("click",".detach_parent",(event)=>{
		let id = event.target.id;
		let block = $(`#${id}`).data("blockdelete");

		$(`#${block}`).detach();
	});

	/* end detaching */

	/* Like System */

	$(document).on("click","img.like_system", (event) => {

		let id = event.target.id;
		let resultlike 	= $(`#${id}`).data("resultlike");
		let q_id 		= $(`#${id}`).data("qid");
		let code 		= $(`#${id}`).data("code");
		let status 		= true;

		console.log(id,resultlike,q_id,code);
		_dict = {
			"type"   : "lke_q",
			"method" : "post",
			"data"	 : { "post_id" : q_id,"q_code" : code,"status" : status}	
		}
		$req._api_(_dict,(response) => {
			if (response.status){
				console.log(response)
				getLikes({ "data_" : {"post_id" : q_id},"resultlike" : resultlike});
				// let totallikes = response.totallikes.count;
				// setlikes({"totallikes" : totallikes,"resultlike" : resultlike});
			}
		});
	});

	/* End of Like System */

	/* Bookmark System */

	$(document).on("click", "img.bk_sys", function(event){
		let id 	 = event.target.id;
		let code = $(`#${id}`).data("code"); 
		let resultbookmark = $(`#${id}`).data("resultbookmark");
		let post_id = $(`#${id}`).data("qid");

		_dict = {
			"type"   : "bk_q",
			"method" : "post",
			"data"	 : { "q_id" : post_id,"q_code" : code}	
		}
		// console.log(_dict);
		$req._api_(_dict,(response) => {
				console.log(response);
			if (response.status){
				getbookmark({ "data_" : {"post_id" : post_id},"resultbookmark" : resultbookmark});
			}
		});
	});

		/* delete bookmark */
		$(document).on("click","span.remove_bookmark" ,function(event) {
			if (confirm("Sure To Delete ?")) {
				let id = $($($(this).parent('div'))[0]).data("id");
				_dict = {
				"type"   : "bk_del",
				"method" : "post",
				"data"	 : { "id" :id.split("-")[1]}	
				}
				console.log(_dict);
				$req._api_(_dict,(response) => {
					if (response.status){
						$(`#${id.split("-")[1]}`).detach();
					}else{
						console.log(response);
					}
				});
			}else {
				return false;
			}
		});
		/* End delete bookmark */

	/* End Bookmark System */

	/* Share Qus Link */
		$("#remove_share_block").on("click", function() {
				$(this).parent().parent().addClass("d-none");
		});
		$(document).on("click","img.share_sys" ,function(event) {	
			let id 	 = event.target.id;
			let code = $(`#${id}`).data("code");
			let locaton = window.location.origin;
			let url = `${locaton}/disqus/#${code}`;

			$("#share_link").parent("div").removeClass("d-none");
			$("#share_link").html(url);
			setTimeout(() => {
				$("#share_link").parent("div").addClass("d-none");
			},10000)
		});

	/* End Share Qus Link */

	/* Follow Request for friend */
		$(document).on("click", "button.follow_friend" , function (event) {	
			event.preventDefault();
			let id 	  = $(this).data("code");
			let block = $(this).data("frndblock");
			_dict = {
				"type"   : "flw_frnd",
				"method" : "post",
				"data"	 : { "receive_id":id }	
			}
			$req._api_(_dict,(response) => {
					console.log(response);
				if (response.status){
					// $(`#${id.split("-")[1]}`).detach();
					$(`#${block}`).remove();
				}else{
					console.log(response);
				}
			});
		});

		$(document).on("click","button.cancle_block", function (event) {	
			event.preventDefault();
			$(`#${$(this).data("frndcontainer")}`).detach();
		});

		$(document).on("click", "button.unfollow_friend", function(event) {
			event.preventDefault();

			let code  = $(this).data("code");
			let block = $(this).data("frndblock");

			_dict = {
				"type"   : "unflw_frnd",
				"method" : "post",
				"data"	 : { "id":code }	
			}
			$req._api_(_dict,(response) => {
				if (response.status){
					$(`#view_profile_container`).html("");
					$(`#${block}`).detach();
				}else{
					console.log(response);
				}
			});
		});

	/* End Follow Request */


	/* Update Profile */

	/* Pending Right of NOw */

		$(`#imageUpload`).on("change", function(event){
			event.preventDefault();
			console.log("hello");
			let fd   = new FormData();
			let file = typeof $("#imageUpload")[0].files[0] == "undefined" ? $("#profile_").val():"";
			if(file == ""){
				try{
					file = $("#imageUpload")[0].files[0];
					console.log(file);
				}catch(e){}
			}
			fd.append("file",file);

			$.ajax({
				url: "http://localhost/disqus/server/controller/update/profile_picture.php", 
				type: "POST",             
				data: fd,
				contentType: false,       
				cache: false,             
				processData:false,      	  
				success: function(response)   
				{
					console.log(response);
				},
				error: function (err) {
	        		console.log(err);
	        	}
			});

		});
	
		$("button#update_profile").on("click", function(e){
			e.preventDefault();
			let updateform    = $("div#updateform").find("input[id=user],input[id=phone],input[type=password]");
			let data 	   	  = $uti.getInputdetail(updateform);
			
			if(data.status){
				// if(regex.usercontact().test(data.data.usercontact) && regex.username().test(data.data.username) && regex.email().test(data.data.useremail)){
					_dict = {
						"type"   : "upd_pr",
						"method" : "post",
						"data"	 : 	data.data
					}
					$req._api_(_dict,(response) => {
						console.log(response);
						if (response.status){
							alert("Update Sucessfully !");
						}else{
							console.log(response);
						}
					});
				// }else{
				// 	alert("Invalid Input[ *Phone *username ]");
				// }
			}else{
				alert("required feild is empty");
			}		
		});


	/* End Update Profile */

	/* Manage Question Individual */
		$("li.mng_qus").on("click", function(){
			_dict = {
				"type"   : "mng_qs",
				"method" : "get",
				"data"	 : 	"",
			}
			$req._api_(_dict,(response) => {
				if(response.status){
					$(`#manage_qus_container`).html("");
					response.data.map(value => _function.mng_qus_user(value));
				}else{
					$(`#manage_qus_container`).html(`<div id="frnd_container-<?php echo @$data->id; ?>">
              <div class='container' >
                 <div class='row position-relative'>
                    <div class="col-md-12 p-3 d-flex">
                      NO Question 😑
                    </div>
                  </div>
                </div>
              </div>`)
				}
			});
		});

		$(document).on("click","button.delete_question",function(e){

			if (confirm("Sure To Delete ?")) {
				e.preventDefault();
				let code = $(this).data("code");
				let block= $(this).data("dltblock");
				let qcode= $(this).data("qcode");
				
				_dict = {
					"type"   : "dlt_qus",
					"method" : "post",
					"data"	 : 	{"code" : code,"qcode":qcode},
				}
				$req._api_(_dict,(response) => {
					console.log(response);
					if (response.status) {
						$(`#${block}`).detach();
					}else{
						console.log("Issue while deleting Qus");
					}
				});
			}else {
				return false;
			}

		});
	/* end Manage Question */


	/* Users Friends profile*/

	$(document).on("click", "button.view_profile", function(e) {
		e.preventDefault();
		let id = $(this).data("code");
		_dict = {
			"type"   : "gt_q",
			"method" : "post",
			"data"	 : 	{"id" : id},
		}
		try{
			$req._api_(_dict,(response) => {
				$(`#view_profile_container`).html("");
				response.data.map(value => _function.set_user_frnds(value) );
			});
		}catch(e){
		}
	});

	$(document).on("click","img.view_comment", function (e) {
		e.preventDefault();
		let code 	   = $(this).data("code");
		let replyblock = $(this).data("replyblock");

		_dict = {
			"type": "gt_rpl",
			"method": "POST",
			"data": {"code" : code}
		}
		$req._api_(_dict,(response) => {
			$(`#${replyblock}`).html("");
			response.data.map(value => $(`#${replyblock}`).append(`
				<div class='reply_view container' id=${value.question_code}><p class="mt-0 font-weight-bold blue-text">${value.username}</p> <p class="mb-2">${value.answers}</p></div>`));
		});
	});

	/* end Users friends profile*/
});