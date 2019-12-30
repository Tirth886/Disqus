<?php 
	class Connection{
		public function cntodb(){
			try{
				$con = new mysqli($_SERVER['HTTP_HOST'],"root","","disquspro");
			}catch(Exception $e){
				print_r($e);
			}
			return $con;
		}
	}

?>