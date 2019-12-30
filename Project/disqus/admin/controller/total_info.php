<?php  
	require_once __DIR__.'/../urls.php';

	$connection = new Connection();

	$con   = $connection->cntodb(); /* Database Connection */
	
	$modal = new Modal(); 		    /* QUESRIES */

	$table  = ["users" => [ $modal->_fetch_total_user() ],"question" => [ $modal->_fetch_total_question() ] ,"bookmark" => [ $modal->_fetch_total_bookmark() ] ];

	$result = [];
	foreach ($table as $key => $value) {
		$rawData = $con->query($value[0]);
		$data 	 = $rawData->fetch_object();
		$count   = $data->count;
		$result[$key] = $count; 		
	}
?>
