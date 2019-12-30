<?php 		
	include_once __DIR__."/../../urls.php";

	$connection = new Connection();
	$util   	= new Utilites();		/* Basic Helper */
	$modal = new Modal(); 			/* Queries */

	$con = $connection->cntodb(); /* Database Connection */

	header('Content-Type: application/json'); /* Data must be in JSON formate */
 	
 	$input  = file_get_contents("php://input"); /* Getting JSON Response */

	$data   = (array) json_decode($input, true); /* Decode in Assoc - Array */
	
	$query = "DELETE FROM friends WHERE sent_id = {$_SESSION['id']} AND receive_id = {$data['id']}";

	if($con->query($query)){
		print_r(json_encode($util->__generate_response__(true,"message","delete")));
	}else{
		print_r(json_encode($util->__generate_response__(true,"message","Not Delete")));
	}
?>