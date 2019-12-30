<?php 

	# Changes May Required 
	# Create one File Which Contain all the file route after complition the project

	require_once __DIR__.'/config/connection.php'; 
	require_once __DIR__.'/config/session.php'; 

	require_once __DIR__.'/modal/modal.php'; 

	// require_once __DIR__.'/utilites/utilities.php';
	require_once __DIR__.'/controller/delete_rec.php';
	require_once __DIR__.'/controller/logout.php';

	
	
	switch (@$_GET["page"]) {

		case 'users':
			require_once __DIR__.'/controller/list_user.php';
			break;

		case 'question':
			require_once __DIR__.'/controller/list_question.php';
			break;

		case 'bookmark':
			require_once __DIR__.'/controller/list_bookmark.php';
			break;

		case 'replies':
			require_once __DIR__.'/controller/replies.php';
			break;

		default:
			require_once __DIR__.'/controller/total_info.php';
			break;
	
	}
?>