<?php 

	include_once __DIR__."/../../urls.php";	

	header('Content-Type: application/json'); /* Data must be in JSON formate */

	$connection = new Connection();
	$con   = $connection->cntodb(); /* Database Connection */

 	
 	$input  = file_get_contents("php://input"); /* Getting JSON Response */

	$data   = (array) json_decode($input, true); /* Decode in Assoc - Array */

	// print_r(json_encode($data));
	$email = $data['email'];
	
	if(preg_match('/^[a-zA-Z0-9. ]+@+(gmail|yahoo|rediffmail|GMAIL|YAHOO|REDIFFMAIL|Gmail|Yahoo|Rediffmail)+\.(com)$/', $email)){
		$select_same_user = "SELECT useremail FROM users WHERE useremail='$email'";
		
		$exe_same_user 	  = $con->query($select_same_user);
		$fetch_same_user  = $exe_same_user->fetch_object();
		if(@$fetch_same_user->useremail == $email)
		{
			$data["status"]  = true;
			$data["message"] = "verified user";

			setcookie("tempemail",$fetch_same_user->useremail);

			print_r(json_encode($data));
		}else{
			$data['invalidemail'] = "email not exist";
			print_r(json_encode($data));
		}
	}else{
		$data['invalidemail'] = "Pattern Invalid";
			print_r(json_encode($data));
	}
?>