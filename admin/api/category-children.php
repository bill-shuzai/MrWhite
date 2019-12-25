<?php 
	// 接口我就使用相对路径
	require_once '../../functions.php';
	current_manager();

	if (!$_GET['id']) {
		return;
	}

	$id=$_GET['id'];

	$rows=white_fetch_all("select * from categories where parent_id='{$id}'");

	exit(json_encode($rows));