<?php 

	require_once('../functions.php');
	
	if (empty($_GET['id'])) {
		return;
	}

	white_fetch_excute("delete from manager where id='{$_GET['id']}'");

	header('Location:/MrWhite/admin/users.php');