<?php  
require_once '../functions.php';













current_manager();

if (!$_POST['username']) {
	$personal_users=white_fetch_all('select * from personal_users;');
}else{
	$username=$_POST['username'];
	$personal_users=white_fetch_all("select * from personal_users where nickname like '%"."$username"."%' ;");
}



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
			<h3>个人用户</h3>
			<div class="row">
				<div class="col-md-8">
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post' class="form-inline" autocomplete="off" novalidate >
						<div class="form-group">
							<label for="username" class="col-sm-3 control-label sr-only">用户名：</label>

							<input type="text" class="form-control" name="username" id="username" placeholder="输入用户名">

						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-default ">搜索</button>
						</div>
					</form>
				</div>
				<div class="col-md-4">
					<nav class="posts-pagination text-right inline" aria-label="Page navigation">
						<ul class="pagination">
							<li>
								<a href="#" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
								</a>
							</li>
							<li><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li>
								<a href="#" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>	
			<table class="table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th>邮箱</th>
						<th>联系电话</th>
						<th>昵称</th>
						<th class="text-center">简介</th>
						<th class="text-center">创建时间</th>
						<th>状态</th>
						<th class="text-center">操作</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($personal_users as $item): ?>
						<tr>
							<td><?php echo $item['email']; ?></td>
							<td><?php echo $item['number']; ?></td>
							<td><?php echo $item['nickname']; ?></td>
							<td class="text-center">
								<!-- Button trigger modal -->
								<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal<?php echo $item['id']; ?>">
									查看
								</button>
								<div class="modal fade" id="myModal<?php echo $item['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title" id="myModalLabel"><?php echo $item['nickname']; ?>的个人简介</h4>
											</div>
											<div class="modal-body">
												<?php echo $item['info']; ?>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
											</div>
										</div>
									</div>
								</div>
							</td>
							<td class="text-center"><?php echo $item['created']; ?></td>
							<td><?php echo $item['status']; ?></td>
							<td class="text-center">
								<a href="/MrWhite/admin/customer-change-status.php?id=<?php echo $item['id']; ?>&status=<?php echo $item['status']; ?>" class="btn <?php echo $item['status']=='actived' ?'btn-danger' : 'btn-success' ?> btn-sm"><?php echo $item['status']=='actived'? '审核': '通过' ?></a>
								<a href="/MrWhite/admin/customer-delete.php?id=<?php echo $item['id']; ?>" class="btn btn-danger btn-sm">删除</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>	
		</div>
	</div>


	<?php require_once 'inc/aside.php'; ?>
	<script src="/MrWhite/static/assets/vendors/jquery/jquery.min.js"></script>
	<script src="/MrWhite/static/assets/vendors/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>