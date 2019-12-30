<?php 
  require_once __DIR__.'/controller/login.php'; 
  if(@$_SESSION['admin_status']){
    header("Location: ./view/");
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="text/css" href="../static/img/letter-d.png">
	<link rel="stylesheet" type="text/css" href="../static/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../static/css/compiled-4.8.7.min.css">
	<link rel="stylesheet" type="text/css" href="../static/css/style.css">
	
	<title>ADMIN</title>
</head>

<body>
  <div class="cstm-container d-none d-sm-none d-lg-block">
    <div class="cstm_card"></div>
    <div class="cstm_card">
      <h1 class="title">Login</h1>
      <form class="login" method="post">
        <div class="input-container">
          <input type="text" id="loginUser" name="useremail" value="" />
          <label for="loginUser">Username</label>
          <div class="bar"></div>
        </div>
        <div class="input-container">
          <input type="password" id="loginPassword" name="userpassword" value="" />
          <label for="loginPassword">Password</label>
          <div class="bar"></div>
        </div>
        <div class="md-form text-center">
          <p id="loginerr"><?php echo @$msg_er; ?></p>
          <button id="login" name="login" class="btn btn-primary"><span>Login</span></button>
        </div>
      </form>
    </div>

</body>
</html>

