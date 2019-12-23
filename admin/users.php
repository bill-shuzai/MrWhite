<?php  
require_once '../functions.php';

function add_manager(){
	if (empty($_POST['email'])){
		$GLOBALS['message']='请输入邮箱!';
		return;
	}
	if (empty($_POST['password'])) {
		$GLOBALS['message']='请输入密码！';
		return;
	}
	if (empty($_POST['nickName'])) {
		$GLOBALS['message']='请输入昵称！';
		return;
	}

	date_default_timezone_set("Asia/Shanghai");
	$created_time=date("y-m-d H:m:s");

	$email=$_POST['email'];
	$password=$_POST['password'];
	$nickname=$_POST['nickName'];



	$sql="insert into manager (email,password,nickname,created,status,avatar) values ('{$email}','{$password}','{$nickname}','{$created_time}','actived','null');";

	$rows=white_fetch_excute($sql);

	if($rows){
		$GLOBALS['success']="添加成功";
	}
}

function edit_manager(){
	global $current_edit_manager;
	if (empty($_POST['email'])) {
		$GLOBALS['message']='请输入邮箱！';
		return;
	}
	if (empty($_POST['password'])) {
		$GLOBALS['message']='请输入密码！';
		return;
	}
	if (empty($_POST['nickName'])) {
		$GLOBALS['message']='请输入昵称！';
		return;
	}

	$id=$_GET['id'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$nickname=$_POST['nickName'];

	$sql="update manager set email='{$email}',password='{$password}',nickname='{$nickname}' where id='{$id}';";
	$row=white_fetch_excute($sql);
	if (!$row) {
		$GLOBALS['message']='修改失败！';
	}
	$GLOBALS['success']='修改成功！';

	$current_edit_manager['email']=$email;
	$current_edit_manager['password']=$password;
	$current_edit_manager['nickname']=$nickname;

}








if (isset($_GET['id'])) {
	$current_edit_manager=white_fetch_one("select * from manager where id='{$_GET['id']}'");
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		edit_manager();
	}
}else{
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		add_manager();
	}
}




$managers=white_fetch_all('select * from manager;');

current_manager();

// date_default_timezone_set("Asia/Shanghai");
// echo(date("y-m-d h:m:s"));

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>index</title>
	<link rel="stylesheet" type="text/css" href="/MrWhite/static/assets/vendors/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/MrWhite/static/assets/vendors/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="/MrWhite/static/assets/css/admin.css">
	<link rel="stylesheet" type="text/css" href="/MrWhite/static/assets/css/style.css">
	<!-- [if lt IE 9] -->
	<script src="/MrWhite/static/assets/vendors/html5shiv/html5shiv.js"></script>
	<script src="/MrWhite/static/assets/vendors/respond/respond.min.js"></script>
	<!-- [endif] -->
	<style type="text/css">
		
	</style>
</head>
<body>
	<div class="main">
		<?php require_once 'inc/nav.php'; ?>

		<div class="container-fluid">
			<div class="row">
				<div class="user-form col-md-4 col-lg-5">
					<?php if (empty($current_edit_manager)): ?>
						<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>"  
							method="post"	autocomplete="off" novalidate >
							<h2>注册管理员用户</h2>
							<!-- 验证失败信息 -->
							<?php if ($message): ?>
								<div class="alert alert-danger" role="alert"><?php echo $message; ?></div>
							<?php endif ?>
							<?php if ($success): ?>
								<div class="alert alert-success" role="alert"><?php echo $success; ?></div>
							<?php endif ?>
							<div class="form-group">
								<label for="email" class="col-sm-3 control-label">邮箱：</label>
								<div class="col-sm-9">
									<input type="email" class="form-control" name="email" id="email" placeholder="请输入邮箱账号">
								</div>
							</div>
							<div class="form-group">
								<label for="password" class="col-sm-3 control-label">密码：</label>
								<div class="col-sm-9">
									<input type="password" class="form-control" name="password" id="password" placeholder="请输入密码">
								</div>
							</div>
							<div class="form-group">
								<label for="nickName" class="col-sm-3 control-label">昵称：</label>
								<div class="col-sm-9">
									<input type="password" class="form-control" name="nickName" id="nickName" placeholder="请输入昵称">
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10 ">
									<button type="submit" class="btn btn-default ">注册</button>
								</div>
							</div>
						</form>
						<?php else: ?>
							<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $current_edit_manager['id'];?>"  
								method="post"	autocomplete="off" novalidate >
								<h2>编辑管理员##<?php echo $current_edit_manager['nickname']; ?>##</h2>
								<!-- 验证失败信息 -->
								<?php if ($message): ?>
									<div class="alert alert-danger" role="alert"><?php echo $message; ?></div>
								<?php endif ?>
								<?php if ($success): ?>
									<div class="alert alert-success" role="alert"><?php echo $success; ?></div>
								<?php endif ?>
								<div class="form-group">
									<label for="email" class="col-sm-3 control-label">邮箱：</label>
									<div class="col-sm-9">
										<input type="email" class="form-control" name="email" id="email" value=<?php echo $current_edit_manager['email']; ?>>
									</div>
								</div>
								<div class="form-group">
									<label for="password" class="col-sm-3 control-label">密码：</label>
									<div class="col-sm-9">
										<input type="password" class="form-control" name="password" id="password" placeholder="请输入密码">
									</div>
								</div>
								<div class="form-group">
									<label for="nickName" class="col-sm-3 control-label">昵称：</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="nickName" id="nickName" value=<?php echo $current_edit_manager['nickname']; ?>>
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10 ">
										<button type="submit" class="btn btn-default ">修改</button>
									</div>
								</div>
							</form>
						<?php endif ?>
					</div>
					<div class="user-table col-md-8 col-lg-7">
						<div class="fold-btn">
							<a href="/MrWhite/admin/manager-delete.php" class="btn btn-danger delete-btn" style="display: none;">批量删除</a>
						</div>
						<table class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center"><input type="checkbox"></th>
									<th>邮箱</th>
									<th>昵称</th>
									<th>注册时间</th>
									<th>状态</th>
									<th class="text-center">操作</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($managers as $item): ?>
									<tr>
										<td class="text-center"><input data-id="<?php echo $item[id] ?>" type="checkbox"></td>
										<td><?php echo $item['email'] ?></td>
										<td><?php echo $item['nickname']; ?></td>
										<td><?php echo $item['created']; ?></td>
										<td><?php echo $item['status']; ?></td>
										<td class="text-center">
											<a href="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $item['id']; ?>" class="btn btn-default btn-sm">编辑</a>
											<a href="/MrWhite/admin/manager-delete.php?id=<?php echo $item['id'] ?>" class="btn btn-danger btn-sm">删除</a>
										</td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>


		<?php require_once 'inc/aside.php'; ?>

		<script src="/MrWhite/static/assets/vendors/jquery/jquery.min.js"></script>
		<script src="/MrWhite/static/assets/vendors/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript">
			$(function($){
				var checkArr=[];
				var $checkBox=$('tbody input');
				var $checkAll=$('thead input');
				var $deleteBtn=$('.delete-btn');

				$checkBox.on('change',function(){
					var id=$(this).data('id');
					if($(this).prop('checked')){
						checkArr.indexOf(id)!== -1 || checkArr.push(id);
					}else{
						checkArr.splice(checkArr.indexOf(id),1);
					}
					checkArr.length ? $deleteBtn.fadeIn():$deleteBtn.fadeOut();

					$deleteBtn.prop('search','?id='+checkArr);
				});

				

				$checkAll.on('change',function(){
					var checked=$(this).prop('checked');
					$checkBox.prop('checked',checked).trigger('change');
				})

			});
		</script>
	</body>
	</html>