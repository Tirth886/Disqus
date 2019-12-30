<?php 
	
	# Here Retrive Code will Come Here 
	# Simultaniously insert the Question and Retrive the question + get the total number of question 
		
	include_once __DIR__."/../../../urls.php";	
	
	header('Content-Type: application/json'); /* Data must be in JSON formate */

	$connection = new Connection();
	$con   = $connection->cntodb(); /* Database Connection */
	$util  = new Utilites();		/* Basic Helper */
	$modal = new Modal(); 			/* Queries */

	$input  = file_get_contents('php://input'); /* Getting JSON Response */

	$data   = (array) json_decode($input, true); /* Decode in Assoc - Array */

		
	// print_r(json_encode($data));
	// exit();

	$query    = $modal->replies([
		"replies" => "replies",
		"users"	   => "users"
	],$data['code']);
	$rawData  = $con->query($query);
	$response = array();

	while ($data = $rawData->fetch_object()) {
		// print_r(json_encode($data));
		array_push($response, $data);
	}
	if(@count($response) > 0){
		print_r(json_encode($util->__generate_response__(true,"data",$response)));
	}else{
		print_r(json_encode($util->__generate_response__(false,"data","NO Replies")));
	}
?>