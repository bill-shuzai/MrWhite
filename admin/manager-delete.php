<?php 

	require_once('../functions.php');
	
	if (empty($_GET['id'])) {
		return;
	}

	$id=$_GET['id'];

	white_fetch_excute('delete from manager where id in ('.$id.');');

	header('Location:/MrWhite/admin/users.php');