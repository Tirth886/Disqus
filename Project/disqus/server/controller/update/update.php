<?php
	
	# Validation Required From the Server Side

	include_once __DIR__."/../../urls.php";	


	$connection = new Connection();
	$util  = new Utilites();		/* Basic Helper */
	$modal = new Modal(); 			/* Queries */

	$con = $connection->cntodb(); /* Database Connection */


	header('Content-Type: application/json'); /* Data must be in JSON formate */
 	
 	$input  = file_get_contents("php://input"); /* Getting JSON Response */

	$data   = (array) json_decode($input, true); /* Decode in Assoc - Array */ 


	// print_r(json_encode($data));
	// exit();

	if($util->__isEmpty($data)){
			$query 		 = $modal->_fetch_all_ex_1( "users", [ 
				"1" => ["field" => "usercontact",
					   "value" => $data["usercontact"], 
					],
				"2"	=> ["field" => "id",
					   "value" => @$_SESSION["id"], 
					],
			]);

			// print_r(json_encode($query));
			// exit();
			$rawdata 	 = $con->query($query);
			$accoc_array = $rawdata->fetch_object();
			// print_r(json_encode($accoc_array));
			// exit();
			if( @$accoc_array->count == 0 ){
				$query = $modal->_update_([
					"table"=>"users",
					"feild" => [
						"username" 	  => @$data["username"],
						"userpassword"=> @$data["userpassword"],
						"usercontact" => @$data["usercontact"],
					],
					"condition" => "id",
					"value"		=> $_SESSION["id"]
				]);	
				// print_r(json_encode($query));
				// exit();
				if($query){
					if($con->query($query)){
						print_r(json_encode($util->__generate_response__(true,"message","Succesfully Update")));
						$_SESSION['username']	  = @$data["username"]; 
						$_SESSION['usercontact']  = @$data["usercontact"];
						$_SESSION['userpassword'] = @$data["userpassword"];
					}else{
						print_r(json_encode($util->__generate_response__(false,"message","Failed")));
					}
				}else{  }
			}else{
				print_r(json_encode($util->__generate_response__(false,"message","Contact Already Exist")));
			}

	}
?>