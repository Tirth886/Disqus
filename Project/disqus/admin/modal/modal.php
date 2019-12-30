<?php 

	# changes required here

	# 1. All argument must be in Assoc Array cuurently single--single arugument
	
	# 2. Modal Must be Extend currently There is Single Class Not extended using the concept of inheritnace
	
	# 3. Creating the Dynamic Helper of MOdal for all kinds of Query
	

	class Modal{
		
		public function __isAuthUser_($table, $feild ,$email, $password){
			return "SELECT ".implode(",",$feild)." FROM `{$table['user']}` WHERE {$feild[1]} = '{$email}' AND {$feild[2]} = '{$password}'";	
		}

		public function _fetch_total_user(){
			return "SELECT count(*) as `count` FROM `users`,`profilepicture` WHERE users.id = profilepicture.u_id";
		}

		public function _fetch_total_question(){
			return "SELECT count(*) as `count` FROM `question`";
		}

		public function _fetch_total_bookmark(){
			return "SELECT count(*) as `count` FROM `bookmark`";
		}
		
		public function _fetch_user($args){
			return "SELECT users.id,users.username,users.useremail,users.usercontact,users.userpassword,profilepicture.picture FROM `users`,`profilepicture` WHERE users.id = profilepicture.u_id LIMIT {$args['limit']} OFFSET {$args['offset']}";
		}

		public function _fetch_question($args){
			return "SELECT question.question,users.username,users.useremail,users.usercontact,question.catagory,question.code,question.id,question.date FROM `question`,`users` WHERE question.user_id = users.id AND question.user_id = users.id LIMIT {$args['limit']} OFFSET {$args['offset']}";
		}

		public function _fetch_bookmark($args){
			return "SELECT question.question,users.username,users.useremail,users.usercontact,question.catagory,question.code,question.id,question.date FROM `question`,`users`,`bookmark` WHERE bookmark.q_id = question.id AND bookmark.user_id = users.id LIMIT {$args['limit']} OFFSET {$args['offset']}";
		}
		public function _fetch_replies($args){
			return "SELECT replies.answers,users.username,replies.question_code,replies.id,replies.date FROM `{$_GET['page']}`JOIN `users` WHERE replies.question_code = '{$_GET['vid']}' AND replies.reply_user_id = users.id";
		}
		public function delete_re($args){
			return "DELETE FROM {$args['page']} WHERE id={$args['id']}";
		}
	}
?>