<?php 
require_once '../config.php';

session_start();

function login(){
	if (empty($_POST['email'])) {
		$GLOBALS['message']='请输入邮箱账号！';
		return;
	}

	if (empty($_POST['password'])) {
		$GLOBALS['message']='请输入密码！';
		return;
	}

	$email=$_POST['email'];
	$password=$_POST['password'];

	$conn=mysqli_connect(WHITE_DB_HOST,WHITE_DB_USER,WHITE_DB_PASS,WHITE_DB_NAME);
	if (!$conn) {
		 exit('数据库连接失败');
	}

	$query=mysqli_query($conn,"select * from manager where email ='{$email}' limit 1;");

	if (!$query) {
		$GLOBALS['message']='查询失败请重试！';
		return;
	}



	$manager=mysqli_fetch_assoc($query);


	if(!$manager){
		$GLOBALS['message']='邮箱匹配失败';
		return;
	}

	if($manager['password']!=$password){
		$GLOBALS['message']="密码不匹配！";
		return;
	}

	$_SESSION['current_login_manager']=$manager;

	header('Location:/MrWhite/admin/');

}








if ($_SERVER['REQUEST_METHOD']=="POST") {
	login();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="/MrWhite/static/assets/vendors/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/MrWhite/static/assets/css/admin.css">
	<link rel="stylesheet" type="text/css" href="/MrWhite/static/assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="/MrWhite/static/assets/vendors/animate/animate.css">
	<!-- [if lt IE 9] -->
	<script src="/MrWhite/static/assets/vendors/html5shiv/html5shiv.js"></script>
	<script src="/MrWhite/static/assets/vendors/respond/respond.min.js"></script>
	<!-- [endif] -->
	<style type="text/css">
		
	</style>
</head>
<body>
	<div class="login">
		<form class="login-wrap <?php echo isset($message)? 'animated shake' : '' ?>" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" novalidate autocomplete="off" >
			<img class="avatar" src="/MrWhite/static/assets/imgs/default.png"></img>
			<?php if (isset($message)): ?>
				<div class="alert alert-danger" role="alert">
					<b>ERROR！</b><span><?php echo $message; ?></span>
				</div>
			<?php endif ?>
			<div class="form-group">
				<label for="email" class="sr-only">邮箱</label>
				<input type="text" class="form-control" id="email" name="email" placeholder="邮箱" />
			</div>
			<div class="form-group">
				<label for="password" class="sr-only">密码</label>
				<input type="password" class="form-control" name="password" id="password" placeholder="密码" />
			</div>
			<button href="index.php" class="btn btn-primary btn-block ">登录</a>
			</form>
		</div>
	</body>
	<script type="text/javascript" src="/MrWhite/static/assets/vendors/jquery/jquery.js"></script>
	<script type="text/javascript">
		$(function(){
			var $email=$('#email');
			var reg=/[0-9a-zA-Z_.-]+[@][0-9a-zA-Z_.-]+([.][a-zA-z]+){1,2}/;
			var $avatar=$('.login>.avatar');

			$email.on('blur',function(){
				var value=$(this).val();
				// 如果为空就返回或者字符串不是邮箱格式返回，有一个满足就返回
				if(!value.trim()||!reg.test(value)){
					if($avatar.attr('src')!='/MrWhite/static/assets/imgs/default.png'){
						$avatar.fadeOut(function(){
							$(this).attr('src',value).on('load',function(){
								$(this).fadeIn();
							});
						})
					}
					return;
				}


				// 使用ajax把邮箱账号传递过去然后获取头像地址
				$.get('api/avatar.php',{email : value},function(res){
					if(!res){
						return;
					}
					$avatar.fadeOut(function() {
						$(this).attr('src',res).on('load',function(){
							$(this).fadeIn();
						})
					});
				});
				
				
			});



		});
	</script>
	</html>