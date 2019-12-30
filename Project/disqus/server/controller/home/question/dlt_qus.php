<?php 


	# Changes is Required if you are working with Foregin Key than deleting from the parent table will must delete from the child table according to the reference
		
	include_once __DIR__."/../../../urls.php";	
	
	header('Content-Type: application/json'); /* Data must be in JSON formate */

	$connection = new Connection();
	$con   = $connection->cntodb(); /* Database Connection */
	$util  = new Utilites();		/* Basic Helper */
	$modal = new Modal(); 			/* Queries */

	$input  = file_get_contents('php://input'); /* Getting JSON Response */

	$data   = (array) json_decode($input, true); /* Decode in Assoc - Array */


	$query = $modal->_delete_([
		"table" => "replies",
		"key"	=> "question_code",
		"value" => $data["qcode"],
	]);
	if ($con->query($query)) {
		$query = $modal->_delete_([
			"table" => "question",
			"key"	=> "code",
			"value" => $data["qcode"],
		]);

		if ($con->query($query)) {
			$query = $modal->_delete_([
				"table" => "likes",
				"key"	=> "post_id",
				"value" => $data["code"],
			]);
			if ($con->query($query)) {
				$query = $modal->_delete_([
					"table" => "bookmark",
					"key"	=> "q_id",
					"value" => $data["code"],
				]);
				if($con->query($query)){
					print_r(json_encode($util->__generate_response__(true,"message","Sucessfully Delete")));
				}else{
					print_r(json_encode($util->__generate_response__(false,"message","Something Went Wrong")));
				}
			}else{
				print_r(json_encode($util->__generate_response__(false,"message","Something Went Wrong")));
			}
		}else{
			print_r(json_encode($util->__generate_response__(false,"message","Something Went Wrong")));
		}

	}else{
			print_r(json_encode($util->__generate_response__(false,"message","Something Went Wrong")));
	}



?>