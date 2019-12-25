<?php 
	// 接口我就使用相对路径
	require_once '../../functions.php';
	require_once '../../config.php';
	current_manager();

	$email=$_GET['email'];

	if(!$email){
		exit('没有接收到数据');
	}
	
	$conn=mysqli_connect(WHITE_DB_HOST,WHITE_DB_USER,WHITE_DB_PASS,WHITE_DB_NAME);

	if(!$conn){
		exit('数据库连接失败！');
	}


	$query=mysqli_query($conn,"select * from manager where email='{$email}' limit 1 ;");

	if(!$query){
		exit('为什么查询失败');
	}

	$row=mysqli_fetch_assoc($query);

	exit($row['avatar']);

	