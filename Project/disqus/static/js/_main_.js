let _uti_ = new Utilites();
let _req_ = new Request();

_uti_.initMaterialD();

const regex = {
	email : function () {
		return /^[a-zA-Z0-9. ]+@+(gmail|yahoo|rediffmail|GMAIL|YAHOO|REDIFFMAIL|Gmail|Yahoo|Rediffmail)+\.(com)$/;
	},
	username : function () {
		return /^[a-zA-Z ]{3,15}$/;
	},
	usercontact : function () {
		return /^[0-9]{10}$/;
	}
};
const _function = {
	set_blog : function (args) {
		console.log(args);
		let uq = _uti_.randomString();

		$("div#my_blog").append(`
			<div class="cstm_card_home">
	          <div class="media mt-3 p-2 bg-white pb-0 pt-4 pl-3 pr-3">
	            <div class="media-body">
	              <div class="form-group text-left basic-textarea rounded-corners">
	                <p class="font-size-blog" style="color:#222 !important;">${args.title}</p>
	                <p class="font-size-blog-author float-right" style="font-weight:bold !important;" ><b>&minus; ${args.author}</b></p>
	                <div id="suggested_tag-${uq}">
	                	
	                </div>
	              </div>
	            </div>
	          </div>
	        </div>
		`);
		$.each(args.tag,function(ix,val){
			$(`#suggested_tag-${uq}`).append(`<span class="badge badge-primary p-2 ml-3" id="tag">${val}</span>`);
		});
	},
	mng_qus_user  : function(args){
		$(`#manage_qus_container`).append(` 
			<div class="col-md-12 p-0" id=deleteblock-${args.code}>
                <div class="cstm_card_home" id=${args.code}>
    <div class="media bg-white p-3 mt-2 ">
          <div class="media-body">
              <p class="mt-0" id=mngqus-${args.question}>${args.question}</p>
              <div class="container d-none d-xl-block d-md-block">
                  <div class="row">
                      <div class="col-md-3"> 
                      <img src="static/img/comment-blue.svg" class = 'cursor_pointer view_comment' data-replyblock=replyblockview-${args.code} data-code=${args.code} height="25" width="25"> </div>
                      <div class="media-body" id=replyblockview-${args.code}> </div>
                      <div>
                      <button class="btn-sm btn-outline-danger float-right btn_setting-hover delete_question" data-dltblock=deleteblock-${args.code} data-code=${args.id} data-qcode=${args.code} id=delete-${args.id}>Delete</button>
                      </div>
              </div>
            </div>
          </div>
        </div>
            </div>
        </div>`);
	},
	set_user_frnds : function (args) {
		$(`#view_profile_container`).append(`<div class="row">
            
            <div class="col-md-12 p-0">
                <div class="cstm_card_home" id=${args.code}>
    <div class="media bg-white p-3 mt-2 ">
          <div class="media-body">
              <p class="mt-0">${args.question}</p>
              <div class="container d-none d-xl-block d-md-block">
                  <div class="row">
                      <div class="col-md-3"> 
                      <img src="static/img/comment-blue.svg" class = 'cursor_pointer view_comment' data-replyblock=replyblockview-${args.code} data-code=${args.code} height="25" width="25"> </div>
                      <div class="media-body" id=replyblockview-${args.code}> </div>
              </div>
            </div>
          </div>
        </div>
            </div>
        </div>`);
	},
	set_catagory : function (args) {
		$("#catagory_list").append(`<li><a href="" class="choose_catagory" data-catagoryid=${args["catagory_id"]} data-appendblock='append_question'>${args["catagory_name"]}</a></li>`);
	},
	set_bookmark : function (args) {

		$(`#${args.resultbookmark}`).append(`
			<div id=${args.result.id}>
				<div class='container'>
					<div class='row'>
		              <div class="py-2 col-md-10 px-3">
		                <a href=#${args.result.code} class='d-flex'>
		                <span>${args.result.question}</span>
		                </a>
		              </div>
		              <div data-id=remove-${args.result.id} title="&minus; Remove Bookmark" class='col-md-2 py-2 px-3 toogle cursor_pointer'>
		              	<span class='remove_bookmark'>&times;</span>
		              </div>
					</div>
	          	</div>
            </div>
			`)

			/* Re-init of Data-toogle recheck why material init is not initing the toogl */
	},
	set_reply: function(args)  {
		user_id  	   = args.user_id;
		username 	   = args.username;
		date  		   = args.date;
		code 		   = args.code;
		reply_input    = args.answers;
		reply_id       = args.reply_id;
		append_block   = $(`#${args.append_block}`);

		append_block.append(`<div class='reply_view container' id=${code}><p class="mt-0 font-weight-bold blue-text">${username}</p> <p class="mb-2">${reply_input}</p></div>`)		
	},
	set_like : function(args){
		let totallikes = args.totallikes;
		let resultlike = args.resultlike;

		if (totallikes > 0) {
			$(`#${resultlike}`).html(totallikes);
		}
	},
	set_question: function(args)  {
		user_id  	   = args.user_id;
		username 	   = args.username; 
		date  		   = args.date;
		code 		   = args.code;
		catagory 	   = args.catagory;
		question_input = args.question;
		question_id    = args.question_id;
		picture		   = args.picture;
		
		/* Append Block ID */
		question 	   = $("#append_question");
		
		question.append(`
			<div class="cstm_card_home" id=${code} data-likeblock=resultlike-${code} data-qid=${question_id} data-replyblock=replyblock-${code}>
    <div class="media bg-white p-3 mt-2 "> <img class="d-flex rounded-circle mr-3" src="server/utilites/profile/${picture}" alt="Avatar" height="50" width="50">
	        <div class="media-body">
	            <p class="mt-0 font-weight-bold">${username.toUpperCase()}</p>
	            <p class="mt-0">${question_input}</p>
	            <div class="container-fluid d-inline-flex d-none d-xl-none d-md-none">
	                <div class="container text-left pl-0 ml-0">
	                    <div class="d-inline-flex"> <span>1</span> <img src="static/img/like.svg" height="25" width="25"> <img src="static/img/comment-blue.svg" class="ml-3" height="25" width="25"> </div>
	                </div>
	                <div class="container"> <img src="static/img/website.svg" height="25" width="25"> <img src="static/img/share.svg" class="ml-3" height="25" width="25"> </div>
	            </div>
	            <div class="container d-none d-xl-block d-md-block">
	                <div class="row">
	                    <div class="col-md-3"> <img src="static/img/like.svg" class = 'cursor_pointer like_system' data-resultlike=resultlike-${code} id=like-${code} data-qid=${question_id} data-code=${code} height="25" width="25"><span id=resultlike-${code}></span></div>
	                    <div class="col-md-3"> <img src="static/img/comment-blue.svg" class = 'cursor_pointer' height="25" width="25"> </div>
	                    <div class="col-md-3"> <img src="static/img/website.svg" data-resultbookmark='append_bookmark' id=bookmark-${code} data-qid=${question_id} data-code=${code}  class = 'cursor_pointer bk_sys' height="25" width="25"> </div>
	                    <div class="col-md-3"> <img src="static/img/share.svg" class = 'cursor_pointer share_sys' id=share-${code} data-qid=${question_id} data-code=${code} height="25" width="25"> </div>
	                </div>
	            </div>
	            <div class="media mt-3 d-block">
	                <div class="media-body" id=replyblock-${code}> </div>
	                <div class="form-group basic-textarea">
	                    <textarea class="form-control" name='answers' rows="3" placeholder="Write your answer..." id=replyarea-${code}></textarea>
	                </div>
	                <button class="btn-sm btn-outline-primary float-right btn_setting-hover reply_question" data-replyarea=replyarea-${code} data-replyblock=replyblock-${code} data-code=${code} id=reply-${code}>Answer</button>
	            </div>
	        </div>
	        <div class='detach_parent' data-blockdelete=${code} id=close-${code}><img src="static/img/cross-symbol.svg" height="10" width="10" class='detach_parent cursor_pointer' data-blockdelete=${code} id=close-${code}></div>
	    	</div>
	</div>
`);

	},

	whichKeywords: (args) => {
		input_list = args.input_list;
		keywords   = args.keywords;
		suggested_keywords ;

		function  preventDuplicate(keyword,list) {
			
			for (var i = 0; i < list.length; i++) {
				if(list[i] == keyword){
					return false
				}
			}
			return true;
		}

		// console.log(keywords);
		for (let i = 0; i < input_list.length; i++) {
			if(input_list[i] != ""){
				$.each(keywords,(i_x,value)=>{
					for (let j = 0; j < value.length; j++) {
						if(input_list[i].toLowerCase() == value[j].toLowerCase()){
								suggested_keywords = i_x;
						}
					}
				});
			}
		}
		return {"status": true,"keywords":suggested_keywords};
	}
}

/* Input File Custom JS */

function readURL(input) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});

/* End Of Input File */