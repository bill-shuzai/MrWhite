<?php 
	require_once '../functions.php';


	current_manager();
	
	if (!$_GET['id']) {
		return;
	}
	if (!$_GET['status']) {
		return;
	}

	$id=$_GET['id'];
	$status=$_GET['status'];

	if ($status=='actived') {
		white_fetch_excute("update posts set status='await' where id='{$id}';");
	}else{
		white_fetch_excute("update posts set status='actived' where id='{$id}';");
	}

	header('Location:/MrWhite/admin/posts.php');
	