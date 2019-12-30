<?php  
	require_once __DIR__.'/../urls.php';

	$connection = new Connection();

	$con   = $connection->cntodb(); /* Database Connection */
	
	$modal = new Modal(); 		    /* QUESRIES */

	// print_r($connection->cntodb());

	if(isset($_POST['login'])){
		$list = array(
			"useremail"		=> @$_POST['useremail'],
			"userpassword"  => @$_POST['userpassword'],
		);
		$error = false;
		$field = ["admin.id","admin.username","admin.password","admin.phone"];
		foreach($list as $key => $value) {
		  if (empty($_POST[$key])) {
		    $error = true;
		  }else{
		  	$error = false;
		  }
		}
		if($error){
			$msg_er = "required feild is empty";
		}else{
			$query 	 = $modal->__isAuthUser_(["user" => "admin",],$field,$_POST['useremail'],$_POST['userpassword']);	

			$rawdata = $con->query($query);
			$data 	 = @$rawdata->fetch_object();
			if(@count($data) === 1){

				$_SESSION['admin_status'] 	 	= true;
				$_SESSION['admin_id']     	  	= $data->id;
				$_SESSION['admin_username']	  	= $data->username;
				$_SESSION['admin_password'] 	= $data->password;
				$_SESSION['admin_usercontact']  = $data->phone;
							// print_r($_SESSION);
				// exit();
				if(@isset($_POST['remember_me'])){
					setcookie("useremail", $data->useremail);
					setcookie("userpassword", $data->userpassword);
				}

				header('Location: ./view/');
			}

		}
	}

?>