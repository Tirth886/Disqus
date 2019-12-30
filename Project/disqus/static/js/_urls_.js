class Urls{
	getHost_(type) {
		let protocol = window.location.protocol;
		let host 	 = window.location.host;
		switch(type){
			
			case "r":
				return	`${protocol}//${host}/disqus/server/controller/register/`;

			case "email_check":
				return	`${protocol}//${host}/disqus/server/controller/forgetpassword/rtrmail.php`;

			case "phone_check":
				return	`${protocol}//${host}/disqus/server/controller/forgetpassword/rtphnchk.php`;
			
			case "fgtpswd":
				return	`${protocol}//${host}/disqus/server/controller/forgetpassword/fgtpass.php`;	
			
			case "gt_ct":
				return	`${protocol}//${host}/disqus/server/controller/home/catagory`;
			
			case "gt_ses":
				return	`${protocol}//${host}/disqus/server/session.php`;

			case "q":
				// return	`${protocol}//${host}/disqus/server/controller/home/question/`;
				return	`http://localhost/disqus/server/controller/home/question/`;

			case "rpl":
				return `${protocol}//${host}/disqus/server/controller/home/question/reply.php`
			
			case "gt_rpl":
				return `${protocol}//${host}/disqus/server/controller/home/question/retrive_r.php`

			case "gt_q":
				return 	`${protocol}//${host}/disqus/server/controller/home/question/retrive_q.php`
			

			case "dlt_qus":
				return 	`${protocol}//${host}/disqus/server/controller/home/question/dlt_qus.php`
			
			case "lke_q":
				return 	`${protocol}//${host}/disqus/server/controller/home/question/likemngsys.php`

			case "lke_r":
				return 	`${protocol}//${host}/disqus/server/controller/home/question/like_r.php`

			case "bk_q":
				return 	`${protocol}//${host}/disqus/server/controller/home/question/bookmark.php`

			case "bk_r":
				return 	`${protocol}//${host}/disqus/server/controller/home/question/bookmark_r.php`

			case "bk_del":
				return `${protocol}//${host}/disqus/server/controller/home/question/bookmark_del.php`

			case "ctr_qus":
				return `${protocol}//${host}/disqus/server/controller/home/catagory/catagory_wise_qus.php`;

			case "flw_frnd":
				return `${protocol}//${host}/disqus/server/controller/friends/follow_frnd.php`;

			case "unflw_frnd":
				return 	`${protocol}//${host}/disqus/server/controller/friends/unfollow_frnd.php`;
			
			case "upd_pr":
				return `${protocol}//${host}/disqus/server/controller/update/update.php`;

			case "mng_qs":
				return `${protocol}//${host}/disqus/server/controller/home/question/manage_qus.php`;

			case "gt_blg":
				return `http://192.168.43.44:8000/spiders/henil.json`
				
			default:
				console.log("No Urls...");	
		}
    }
}