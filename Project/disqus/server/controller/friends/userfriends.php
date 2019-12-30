<?php 
	
include_once __DIR__."/../../urls.php";	

$connection = new Connection();
$con   = $connection->cntodb(); /* Database Connection */
// $util  = new Utilites();		/* Basic Helper */
$modal = new Modal(); 			/* Queries */


$query = $modal->_fetch_user_friends_(
	[
		"value" => @$_SESSION["id"]
	]
);
// print_r($frnd_raw_data);

$userfrnd_raw_data = $con->query($query);

// exit();

?>