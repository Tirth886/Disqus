	<?php 
	include_once __DIR__."/../../../urls.php";	
	
	$connection = new Connection();
	$util  = new Utilites();		/* Basic Helper */
	$modal = new Modal(); 			/* Queries */

	$con = $connection->cntodb(); /* Database Connection */

	$query 	  = $modal->__fetchAll_rec_("catagory");
	$rawData  = $con->query($query);
	$catagory = array(); 
	if($rawData->num_rows > 0){
		while ($data = $rawData->fetch_object()) {
			array_push($catagory, $data);		
		}
		print_r(json_encode($util->__generate_response__(true,"catagory",$catagory)));
	}else{	
		print_r(json_encode($util->__generate_response__(false,"message","NO catagory")));
	}	
?>