<?php 
	include_once __DIR__."/../../../urls.php";	
	
	header('Content-Type: application/json'); /* Data must be in JSON formate */

	$connection = new Connection();
	$con   = $connection->cntodb(); /* Database Connection */
	$util  = new Utilites();		/* Basic Helper */
	$modal = new Modal(); 			/* Queries */

	$input  = file_get_contents('php://input'); /* Getting JSON Response */

	$data   = (array) json_decode($input, true); /* Decode in Assoc - Array */

	$query = $modal->delete_rec_(
		[
			"table" => "bookmark",
			"value" => $data["id"]
		]
	);

	if($con->query($query)){
		print_r(json_encode($util->__generate_response__(true,"message","Delete Succesfull")));
	}else{
		print_r(json_encode($util->__generate_response__(false,"message","Something Wrong")));
	}

?>