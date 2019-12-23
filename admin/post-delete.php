<?php 
	require_once '../functions.php';
	current_manager();

	if(!$_GET['id']){
		return;
	}

	$id=$_GET['id'];

	white_fetch_excute("delete from posts where id ='{$id}'; ");

	header('Location:/MrWhite/admin/posts.php');