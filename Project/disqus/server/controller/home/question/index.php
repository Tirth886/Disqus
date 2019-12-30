<?php 
	
	include_once __DIR__."/../../../urls.php";	
	
	header('Content-Type: application/json'); /* Data must be in JSON formate */

	$connection = new Connection();
	$con = $connection->cntodb(); /* Database Connection */
	$util  = new Utilites();		/* Basic Helper */
	$modal = new Modal(); 			/* Queries */
	

 	$input  = file_get_contents('php://input'); /* Getting JSON Response */

	$data   = (array) json_decode($input, true); /* Decode in Assoc - Array */
	
	# validation Required
	# Currently there is no server-side validation
	# No Validation for Quesiton if same user try to ask the same question which is already being asked


	$data["user_id"] = $_SESSION['id']; # Login User ID
	$data["date"] = date('Y-m-d H:i:s');
	$data["code"] = $util->_random_str(5);
	$query = $modal->__insertrec_("question",$data);
	if($con->query($query)){
		print_r(json_encode($util->__generate_response__(true,"message","Insert Sucessfully")));
	}else{
		print_r(json_encode($util->__generate_response__(false,"message","FAILED..!")));
	}

	 	

?>