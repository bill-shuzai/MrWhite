<?php 

require_once 'config.php';


session_start();



/*验证是否登录*/

function current_manager(){
	if (empty($_SESSION['current_login_manager'])) {
		header('Location:/MrWhite/admin/login.php');
		exit();
	}

	return $_SESSION['current_login_manager'];
};

/*数据库查询功能*/

function white_fetch_all($sql){
	$conn=mysqli_connect(WHITE_DB_HOST,WHITE_DB_USER,WHITE_DB_PASS,WHITE_DB_NAME);

	if (!$conn) {
		exit('数据库连接失败');
	}

	$query=mysqli_query($conn,$sql);

	while ($row=mysqli_fetch_assoc($query)) {
		$result[]=$row;
	}

	mysqli_free_result($query);
	mysqli_close($conn);

	return $result;
}

/*从数据库查询一条数据*/

function white_fetch_one($sql){
	$row=white_fetch_all($sql)[0]?white_fetch_all($sql)[0]:null;
	return $row;
}

/*执行数据库执行语句*/
function white_fetch_excute($sql){
	$conn=mysqli_connect(WHITE_DB_HOST,WHITE_DB_USER,WHITE_DB_PASS,WHITE_DB_NAME);

	if (!$conn) {
		exit('数据库连接失败');
	}

	$query=mysqli_query($conn,$sql);

	if(!$query){
		return;
	}

	$rows=mysqli_affected_rows($conn);
	return $rows;
}