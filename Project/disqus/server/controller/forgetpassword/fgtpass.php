<?php 
	
include_once __DIR__."/../../urls.php";	

header('Content-Type: application/json'); /* Data must be in JSON formate */

$connection = new Connection();
$con   = $connection->cntodb(); /* Database Connection */

$input  = file_get_contents("php://input"); /* Getting JSON Response */

$data   = (array) json_decode($input, true); /* Decode in Assoc - Array */

if ($data['send']) {

	$email = $_COOKIE['tempemail'];
	$phone = $_COOKIE['tempphone'];
		
	if($email && $phone){
		$check_user = "SELECT id,useremail,userpassword,usercontact FROM users WHERE useremail='$email' AND usercontact='$phone'";
		$exe_check_user = $con->query($check_user);
		$fetch_rec      = $exe_check_user->fetch_object();
		if(@count($fetch_rec) == 1){
			// $data['data_true'] = "hi";
			require 'sendmail/PHPMailerAutoload.php';
			require 'sendmail/crendtial.php';
			$mail = new PHPMailer;
			// $mail->SMTPDebug = 4;                               // Enable verbose debug output
				
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = EMAIL;                 // SMTP username
			$mail->Password = PASS;                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to

			$mail->setFrom(EMAIL, 'Disqus-Pro');
			$mail->addAddress(@$fetch_rec->useremail);     // Add a recipient
			$mail->addReplyTo(EMAIL);
			$mail->isHTML(true);                                 // Set email format to HTML
			$mail->Subject = "Email and Password";
			$mail->Body    = "<table border='1' width='500px' cellpadding='20'>
								<tr>
									<th colspan='3' style='background-color: gray; font-size: 10px;'>User Information</th>
								</tr>
								<tr>
									<th style='border-style: dashed; background-color:rgb(228, 237, 166);'><b>Email</b></th>
									<th style='border-style: dashed; background-color:rgb(228, 237, 166);'><b>Phone</b></th>
									<th style='border-style: dashed; background-color:rgb(228, 237, 166);'><b>Password</b></th>
								</tr>
								<tr>
									<td style='border-style: dashed; background-color:rgb(228, 237, 166);'><b>".@$fetch_rec->useremail."</b></td>
									<td style='border-style: dashed; background-color:rgb(228, 237, 166);'><b>".@$fetch_rec->usercontact."</b></td>
									<td style='border-style: dashed; background-color:rgb(228, 237, 166);'><b>".@$fetch_rec->userpassword."</b></td>
								</tr>
							</table>";
			$mail->AltBody = "Email = ".$fetch_rec->useremail."<br>"."Phone = ".$fetch_rec->usercontact."<br>"."Password =".$fetch_rec->userpassword;
			// echo "<pre>";print_r($mail); exit;
			if(!$mail->send()) {
			    $data['failure'] = 'Check Internet Connectivity';
			    // echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
				$id = $fetch_rec->id;
				$sendquery = "INSERT INTO `mail_history` (`recipient`,`reason`) VALUES ('$id','FP')";
				$con->query($sendquery);
			    $data['sucess']  = 'Check Your Inbox !';
				unset($_COOKIE['tempemail'],$_COOKIE['tempphone']);
			}
		}else{
			$data['failure'] = "Invalid Detail";
		}
	}else{}
}
print_r(json_encode($data));
?>