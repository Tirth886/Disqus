
<?php
	
	include_once __DIR__."/../../urls.php";	


	$connection = new Connection();
	$util  = new Utilites();		/* Basic Helper */
	$modal = new Modal(); 			/* Queries */

	$con = $connection->cntodb(); /* Database Connection */


	header('Content-Type: application/json'); /* Data must be in JSON formate */
 	
 	$input  = file_get_contents("php://input"); /* Getting JSON Response */

	$data   = (array) json_decode($input, true); /* Decode in Assoc - Array */
	

	$existData = array(
		"useremail"   => strtolower(trim($data['useremail'])),
		"usercontact" => strtolower(trim($data['usercontact'])),
	);

	if($util->__isEmpty($data)){	
		$information = [];
		$error = [];
		foreach ($existData as $key => $value) {
			
			$query 		 = $modal->__select_indi_( "users",$existData[$key] , $key );
			$rawdata 	 = $con->query($query);
			$accoc_array = $rawdata->fetch_assoc();

			if( @count($accoc_array) == 0 ){   }
			else{ array_push($information,$accoc_array) ; }
		}

		// print_r($information);
		// print_r($error);
		if(count($information) > 0){
			try{
				foreach ($information as $key => $value) {
					foreach ($information[$key] as $field => $feildval) {
						if($information[$key][$field] != "" || $information[$key][$field] != null){
							array_push($error, $util->__generate_response__(false,$field,$field ." allready exist"));
						}
					}
				}
			}catch(Exception $e){  }

			print_r(json_encode($error));

		}else{
			$user   = $data; 
			array_pop($user);
			
			$query = $modal->__insertrec_("users",$user);	
			if($query){
				// 
				if($con->query($query)){
					$query = $modal->__insertrec_("profilepicture",["u_id" => $con->insert_id,"picture" => "profile.png"]);
					if($con->query($query)){
						print_r(json_encode($util->__generate_response__(true,"message","register success")));
					}else{
						print_r(json_encode($util->__generate_response__(false,"message","Failed")));
					}

				}else{
					print_r(json_encode($util->__generate_response__(false,"message","Failed")));
				}
			}else{  }
		}
	}else{
		// print_r($existData);
		print_r(json_encode($util->__isEmpty($data)));		
	}
	 
?>