<?php 
	
	if(isset($_POST['admin_logout'])){
		unset($_SESSION["admin_id"],$_SESSION["admin_status"],$_SESSION["admin_username"],$_SESSION["admin_usercontact"],$_SESSION["admin_password"]);
	}
?>



