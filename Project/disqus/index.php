<!DOCTYPE html>
<?php require_once __DIR__.'/server/controller/login/login.php'; ?>
<html>
<head>
	<?php include __DIR__.'/static/view/header/css.php'; ?>
	<title>DISQUS</title>
</head>
<body>

<?php 
include_once 'static/view/navbar/navbar.php'; 

if(@!$_SESSION['status']){	
	include_once __DIR__.'/static/view/auth/login-register.php'; 
}else{	
	include_once __DIR__.'/static/view/home/modal.php'; 
	switch (@$_GET['page']) {
		case 'blog':
			include_once __DIR__.'/static/view/home/blog/blog.php'; 
			break;
		case 'home':
			include_once __DIR__.'/static/view/home/home.php'; 
			break;
		default:
			include_once __DIR__.'/static/view/home/home.php'; 
			break;
	}
}
/*<?php  include_once 'static/view/footer/footer.php'; ?>*/
include __DIR__.'/static/view/footer/script.php';
?> 

</body>
</html>