<?php 
	
include_once __DIR__."/../../urls.php";	

$connection = new Connection();
$con   = $connection->cntodb(); /* Database Connection */
// $util  = new Utilites();		/* Basic Helper */
$modal = new Modal(); 			/* Queries */


$query = $modal->_fetch_friends_(
	[
		"value" => @$_SESSION["id"]
	]
);
// print_r($query);

$frnd_raw_data = $con->query($query);
// print_r($frnd_raw_data);
// exit();

// exit();

?>