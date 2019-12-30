<?php 

	include_once __DIR__."/../../urls.php";	

	$connection = new Connection();
	$util  = new Utilites();		/* Basic Helper */
	$modal = new Modal(); 			/* Queries */

	$con = $connection->cntodb(); /* Database Connection */

	$filename = $_FILES['file']['name'];
	$location = __DIR__."/../../utilites/profile/";
	$arrayfilename = explode(".",$filename);
	$fileextention = end($arrayfilename);

	if(strtolower(explode("/", $_SESSION['userprofile'])[3]) !== strtolower($filename)){
		
		if(strtoupper($fileextention) == "JPG"){

			$movefile = move_uploaded_file($_FILES['file']['tmp_name'],$location.$filename);
			if($movefile){
				if($filename!="profile.png"){
					unlink("../../utilites/profile/".explode("/", $_SESSION['userprofile'])[3]);
				}else{}				
				$query = $modal->_update_([
					"table" => "profilepicture",
					"feild" => [
						"picture" => $filename,
					],
					"condition" => "u_id",
					"value"		=> $_SESSION["id"]
				]);

				if($con->query($query)){
					print_r(json_encode($util->__generate_response__(true,"message","Files Upload Sucessfully")));
					$_SESSION["userprofile"] = 'server/utilites/profile/'.$filename;
				}else{
					print_r(json_encode($util->__generate_response__(false,"message","Fail To 	Upload")));
				}

			}else{
				print_r(json_encode($util->__generate_response__(false,"message","Fail To Upload")));
			}
			
		}else{
			print_r(json_encode($util->__generate_response__(false,"message","JPG")));
		}
	}else{
		print_r(json_encode($util->__generate_response__(false,"message","Already There")));
	}
?>