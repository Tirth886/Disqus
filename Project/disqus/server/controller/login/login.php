<?php  

	
	include_once __DIR__."/../../urls.php";

	$connection = new Connection();
	$util  = new Utilites();		/* Basic Helper */
	$modal = new Modal(); 			/* Queries */

	$con = $connection->cntodb(); /* Database Connection */
	// print_r($connection->cntodb());

	if(isset($_POST['login'])){

		$list = array(
			"useremail"		=> @$_POST['useremail'],
			"userpassword"  => @$_POST['userpassword'],
		);
		$error = false;
		$field = ["users.id","users.username","users.usercontact","users.userpassword","users.useremail","profilepicture.picture"];
		foreach($list as $key => $value) {
		  if (empty($_POST[$key])) {
		    $error = true;
		  }else{
		  	$error = false;
		  }
		}
		if($error){
			echo "required field is empty";
		}else{
			$query 	 = $modal->__isAuthUser_(["user" => "users","profile" => "profilepicture"],$field,$_POST['useremail'],$_POST['userpassword']);	
			// print_r($query);
			// exit();
			$rawdata = $con->query($query);
			$data 	 = $rawdata->fetch_object();
			// print_r($data);
			// exit();

			if(@count($data) === 1){

				$_SESSION['status'] 	  = true;
				$_SESSION['id']     	  = $data->id;
				$_SESSION['username']	  = $data->username;
				$_SESSION['useremail']	  = $data->useremail;
				$_SESSION['usercontact']  = $data->usercontact;
				$_SESSION['userpassword'] = $data->userpassword;
				$_SESSION['userprofile']  = 'server/utilites/profile/'.$data->picture;
							// print_r($_SESSION);
				// exit();
				if(@isset($_POST['remember_me'])){
					setcookie("useremail", $data->useremail);
					setcookie("userpassword", $data->userpassword);
				}

				header('Location: ./');
			}

		}
	}

?>