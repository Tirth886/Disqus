<?php 
	include_once __DIR__."/../../../urls.php";	

	header('Content-Type: application/json'); /* Data must be in JSON formate */

	$connection = new Connection();
	$con   = $connection->cntodb(); /* Database Connection */
	$util  = new Utilites();		/* Basic Helper */
	$modal = new Modal(); 			/* Queries */

	$query  = $modal->question([
		"question" => "question",
		"users"    => "users",
		"profilepicture" => "profilepicture",
		"condition"	     =>  $_SESSION["id"]
	]);
	// print_r(json_encode($query));
	// exit();

	$rawData  = $con->query($query);
	$response = array();

	while ($data = $rawData->fetch_object()) {
		array_push($response, $data);
	}
	if(@count($response) > 0){
		print_r(json_encode($util->__generate_response__(true,"data",$response)));
	}else{
		print_r(json_encode($util->__generate_response__(false,"data","NO Question")));
	}


?>