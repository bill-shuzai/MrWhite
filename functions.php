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
