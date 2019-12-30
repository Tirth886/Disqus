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
	$query = $modal->__select_indi_con("likes", [ 
		"1" => ["field" => "user_id",
			   "value" => $data["user_id"], 
			],
		"2"	=> ["field" => "q_code",
			   "value" => @$data["q_code"], 
			],
	]);
	print_r(json_encode($query));
	$rawData = $con->query($query);
	if($rawData->fetch_assoc()['count'] == 0){
		$query = $modal->__insertrec_("likes",$data);

		if($con->query($query)){
			print_r(json_encode($util->__generate_response__(true,"message","Insert Succesfull")));
		}else{
			print_r(json_encode($util->__generate_response__(false,"message","Something Wrong")));
		}
	}else{
		print_r(json_encode($util->__generate_response__(false,"message","Already user like")));
	}	
?>