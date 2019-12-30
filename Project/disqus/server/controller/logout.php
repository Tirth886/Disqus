<?php 
	
	if(isset($_POST['logout'])){
		unset($_SESSION["id"],$_SESSION["status"],$_SESSION["username"],$_SESSION["useremail"],$_SESSION["usercontact"],$_SESSION["userpassword"],$_SESSION["userprofile"]);
	}
?>