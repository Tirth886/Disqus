<?php 
	include_once __DIR__."/../../../urls.php";	
	
	header('Content-Type: application/json'); /* Data must be in JSON formate */

	$connection = new Connection();
	$con   = $connection->cntodb(); /* Database Connection */
	$util  = new Utilites();		/* Basic Helper */
	$modal = new Modal(); 			/* Queries */

	$input  = file_get_contents('php://input'); /* Getting JSON Response */

	$data   = (array) json_decode($input, true); /* Decode in Assoc - Array */

	$data["user_id"] = $_SESSION["id"];

	$query = $modal->listbookmark(
		[
			"bookmark" => "bookmark",
			"qus" => "question",
		], 
		[
			"1" => ["field" => "bookmark.user_id","value" => $data['user_id']]
		]
	);
	// print_r(json_encode($query));
	$response = array();
	if($rawData = $con->query($query)){
		while ($data = $rawData->fetch_object()) {
			array_push($response, $data);
		}
		if(@count($response) > 0){
			print_r(json_encode($util->__generate_response__(true,"data",$response)));
		}else{
			print_r(json_encode($util->__generate_response__(false,"data","NO bookmark")));
		}
	}else{
			print_r(json_encode($util->__generate_response__(false,"data","Someting Weng Wrong")));
	}
?>