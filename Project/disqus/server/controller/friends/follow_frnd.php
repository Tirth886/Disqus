<?php 		
	include_once __DIR__."/../../urls.php";

	$connection = new Connection();
	$util   	= new Utilites();		/* Basic Helper */
	$modal = new Modal(); 			/* Queries */

	$con = $connection->cntodb(); /* Database Connection */

	header('Content-Type: application/json'); /* Data must be in JSON formate */
 	
 	$input  = file_get_contents("php://input"); /* Getting JSON Response */

	$data   = (array) json_decode($input, true); /* Decode in Assoc - Array */
	
	// print_r(json_encode($data));
	$data["sent_id"] = $_SESSION["id"];
		// exit();
	$exist = $modal->_friend_exist_([
		"col" 	=> "sent_id,receive_id",
		"table" => "friends",
		"cond"  => [
			"f1" => "sent_id",
			"v1" => $data["sent_id"],
			"f2" => "receive_id",
			"v2" => $data["receive_id"]
		]
	]);
	$exist = $con->query($exist)->num_rows > 0 ? true : false;
	if(!$exist){

		$query = $modal->__insertrec_("friends",$data);
		$con->query($query);

		print_r(json_encode($util->__generate_response__(true,"message","Followed Up Successfully")));
	}  else {
		print_r(json_encode($util->__generate_response__(false,"message","Already Follow")));
	}
	// print_r(json_encode($query));
?>