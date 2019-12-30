<?php 

	include_once __DIR__."/../../urls.php";	

	header('Content-Type: application/json'); /* Data must be in JSON formate */

	$connection = new Connection();
	$con   = $connection->cntodb(); /* Database Connection */

 	
 	$input  = file_get_contents("php://input"); /* Getting JSON Response */

	$data   = (array) json_decode($input, true); /* Decode in Assoc - Array */

	// print_r(json_encode($data));
	// exit();
	$useremail = $_COOKIE['tempemail'];
	$phone = $data['phone'];

	if(preg_match('/^[0-9]{10}$/', $phone)){
		$check_user = "SELECT useremail,usercontact FROM users WHERE useremail='$useremail' AND usercontact = '$phone'";
		$exe_check_user = $con->query( $check_user);
		$fetch_rec      = $exe_check_user->fetch_object();
		if(@count($fetch_rec) == 1){
			$data['status']  = true;
			$data['message'] = "verified user";

			setcookie("tempphone",@$fetch_rec->usercontact);
			print_r(json_encode($data));
		}else{
			$select_phone = "SELECT usercontact FROM users WHERE useremail='$useremail'";
			$exe_user_phone = $con->query($select_phone);
			$fetch_user_phone = $exe_user_phone->fetch_object();
			if(@count($fetch_user_phone) == 1){
				$phone = $fetch_user_phone->usercontact;
				$check_user_  = "SELECT useremail,usercontact FROM users WHERE useremail='$useremail' AND usercontact NOT LIKE '$phone'";
				$exe_check_user_ = $con->query($check_user_);
				$fetch_rec_      = $exe_check_user_->fetch_object();
				$data['invalid'] = "number not match";
				print_r(json_encode($data));
			}else{
				
			}
		}
	}else{
		$data['invalid'] = "Input Pattern Invalid";
			print_r(json_encode($data));
	}
?>