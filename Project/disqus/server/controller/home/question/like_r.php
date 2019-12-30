<?php 
	
	include_once __DIR__."/../../../urls.php";	
	
	header('Content-Type: application/json'); /* Data must be in JSON formate */

	$connection = new Connection();
	$con   = $connection->cntodb(); /* Database Connection */
	$util  = new Utilites();		/* Basic Helper */
	$modal = new Modal(); 			/* Queries */

	$input  = file_get_contents('php://input'); /* Getting JSON Response */

	$data   = (array) json_decode($input, true); /* Decode in Assoc - Array */

	$query = $modal->_count_likes([
		"likes"	   => "likes",
		"question" => "question",
	],@$data["post_id"]);

	$rawdata  = $con->query($query);
	$response = $rawdata->fetch_object();
	

	if($rawdata->num_rows > 0){
		print_r(json_encode($util->__generate_response__(true,"data",$response)));
	}else{
		print_r(json_encode($util->__generate_response__(false,"data",$response)));
	}

?>