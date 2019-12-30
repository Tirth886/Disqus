<?php 
	require_once __DIR__.'/../urls.php';

?>
<!DOCTYPE html>
<html>
<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <link rel="icon" type="text/css" href="../../static/img/letter-d.png">
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="../../static/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../static/css/compiled-4.8.7.min.css">
	<link rel="stylesheet" type="text/css" href="../../static/css/style.css">
	
</head>
<body>
	<form method="post">
		<?php include __DIR__.'/nav.php'; ?>
		<?php 
			if(!$_SESSION['admin_status']){
			 	header("Location: ./../");
			}else{	
				switch (@$_GET['page']) {
					case 'users':
						include_once __DIR__.'/user.php';
						break;
					case 'question':
						include_once __DIR__.'/question.php'; 
						break;
					case 'bookmark':
						include_once __DIR__.'/bookmark.php'; 
						break;
					case 'replies':
						include_once __DIR__.'/reply.php'; 
						break;
					default:
						include_once __DIR__.'/home.php'; 
						break;
				}
			}
		?>
	</form>
    <script type="text/javascript" src="../../static/js/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript" src="../../static/js/popper.min.js"></script>
    <script type="text/javascript" src="../../static/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../static/js/compiled.0.min.js"></script>
</body>
</html>