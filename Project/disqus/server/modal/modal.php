<?php 

	# changes required here

	# 1. All argument must be in Assoc Array cuurently single--single arugument
	
	# 2. Modal Must be Extend currently There is Single Class Not extended using the concept of inheritnace
	
	# 3. Creating the Dynamic Helper of MOdal for all kinds of Query
	

	class Modal{

		public function __insertrec_( $table, $data ){
			$keys  = array_keys($data);
			$value = array_values($data);
		
			return "INSERT INTO `{$table}` (". implode(",",$keys) .") VALUES ('". implode("','",$value) ."') ";
		}
		public function __fetchAll_rec_($table){
			return "SELECT * FROM `${table}`";
		}

		public function __select_indi_($table, $value, $feild){ 
			return "SELECT `{$feild}` FROM `{$table}` WHERE `{$feild}` = '{$value}'";	
		}

		public function _fetch_all_ex_1($table,$feild){ 
			return "SELECT count(*) AS `count` FROM `{$table}` WHERE `{$feild["1"]["field"]}` = '{$feild["1"]["value"]}' AND `{$feild["2"]["field"]}` != '{$feild["2"]["value"]}'";	
		}

		public function __select_indi_con($table, $feild){ 
			return "SELECT count(*) AS `count` FROM `{$table}` WHERE `{$feild["1"]["field"]}` = '{$feild["1"]["value"]}' AND `{$feild["2"]["field"]}` = '{$feild["2"]["value"]}'";	
		}

		public function replies($table,$value){
			return "SELECT replies.answers,users.username,replies.question_code,replies.id,replies.date FROM `{$table['replies']}`JOIN {$table['users']} WHERE replies.question_code = '{$value}' AND replies.reply_user_id = users.id";
		}

		public function question($table){
			return "SELECT 	question.question,users.username,question.code,question.id,question.date,profilepicture.picture FROM `{$table['question']}`,`{$table['users']}`,`{$table['profilepicture']}` WHERE question.user_id = {$table['condition']} AND question.user_id = users.id AND users.id = profilepicture.u_id GROUP BY question.id ORDER BY question.id DESC";	
		}

		public function _count_likes($table,$value) {
			return "SELECT count(*) AS `count` FROM `{$table['likes']}` JOIN `{$table['question']}` WHERE question.id = {$value} AND question.code = likes.q_code";
		}

		public function listbookmark($table,$feild){
			return "SELECT bookmark.id,question.question,question.code FROM `{$table['bookmark']}` JOIN `{$table['qus']}` WHERE question.id = bookmark.q_id AND {$feild["1"]["field"]} = '{$feild["1"]["value"]}'"; 
		}

		public function __isAuthUser_($table, $feild ,$email, $password){
			return "SELECT ".implode(",",$feild)." FROM `{$table['user']}`,`{$table['profile']}` WHERE users.id = profilepicture.u_id AND {$feild[4]} = '{$email}' AND {$feild[3]} = '{$password}'";	
		}

		public function delete_rec_($args) {
			return "DELETE FROM `{$args["table"]}` WHERE id={$args['value']}";
		}

		public function _fetch_friends_($aurgs) {
			return "SELECT users.id,users.username,users.useremail,profilepicture.picture FROM `users`,`profilepicture` WHERE `users`.`id` NOT IN ( SELECT friends.receive_id FROM friends,users WHERE friends.sent_id = '{$aurgs["value"]}' ) AND users.id != '{$aurgs["value"]}' AND users.id = profilepicture.u_id";
		}
		public function _fetch_user_friends_($aurgs) {
			return "SELECT users.id,users.username,users.useremail,users.usercontact,profilepicture.picture FROM users,profilepicture WHERE users.id IN ( SELECT friends.receive_id FROM friends WHERE friends.sent_id =  {$aurgs['value']}) AND users.id!={$aurgs['value']} AND users.id = profilepicture.u_id";
		}
		public function _friend_exist_($aurgs){
			return "SELECT {$aurgs["col"]} FROM `{$aurgs["table"]}` WHERE `{$aurgs["cond"]["f1"]}` = '{$aurgs["cond"]["v1"]}' AND `{$aurgs["cond"]["f2"]}` = '{$aurgs["cond"]["v2"]}'";
		}

		public function _mng_question_($args){
			return "SELECT 	question.question,users.username,question.code,question.id,question.date FROM `question`,`users` WHERE question.user_id = '{$args["value"]}' GROUP BY question.code ORDER BY question.id DESC";
		}

		public function _mng_answer_($args){
			return "SELECT users.username,users.useremail,replies.question_code,replies.answers,replies.date FROM replies JOIN users WHERE replies.question_code = '{$args['value']}' AND replies.reply_user_id = users.id ORDER by `date` DESC";
		}

		public function _update_($args){
			$query = "UPDATE `${args['table']}` SET";
			$comma = " ";
			foreach($args['feild'] as $key => $val) {
			    if(!empty($val)) {
			        $query .= $comma . $key . " = '" .trim($val). "'";
			        $comma = ", ";
			    }
			}
			return $query." WHERE {$args['condition']} = {$args['value']}";
		}

		public function _delete_($args){
			return "DELETE FROM `${args['table']}` WHERE `${args['key']}` = '${args['value']}'";
		}
	}
?>