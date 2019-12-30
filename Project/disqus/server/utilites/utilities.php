<?php 
	
	class Utilites{

		var  $response = [];

		public function __isEmpty($data){
			
			$status   = true;
			$response = [];
			foreach ($data as $key => $value) {
				if ($data[$key] == "" || $data[$key] == "undefiend") {
					$status = false;
					$response["status"]  = $status;
					$response["message"] = "Required Feild is Empty..";
				}
			}
			if ($status) {
				return json_encode($response); 
			}

		}

		public function __generate_response__( $status,$key,$data ) { 
		# Changes is Required : $key and  $data Must be in Assoc Array 
			$this->response = [];
			$this->response['status']  = $status;
			$this->response[$key] = $data;
			// print_r($this->response);	
			return $this->response;

 		}

 		public function _random_str($length){
		
			$string = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			// print_r(strlen($string));exit();
			$str_length = strlen($string) - 1;
			$uniqe_code = '';
			
			for ($i=0; $i < $length; $i++) {
				$uniqe_code = $uniqe_code.$string[mt_rand(0,$str_length)];
			}
				return $uniqe_code;
		}

	}

?>