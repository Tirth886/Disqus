<?php 
	include_once __DIR__."/urls.php";	
	header('Content-Type: application/json'); /* Data must be in JSON formate */
	print_r(json_encode($_SESSION));
?>