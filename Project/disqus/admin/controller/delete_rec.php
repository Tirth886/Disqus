<?php 
	require_once __DIR__.'/../urls.php';

	function delete($args){
		$connection = new Connection();
		$con   = $connection->cntodb(); /* Database Connection */
		$modal = new Modal(); 		    /* QUESRIES */

		$query = $modal->delete_re($args);
		if($con->query($query)){
			echo "<script>alert('Sucessfully Delete')</script>";
			unset($_GET['id']);
		}

	}

	delete(["page" => @$_GET['page'],"id" => @$_GET['id']]);
?>