	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>index</title>
		<link rel="stylesheet" type="text/css" href="../static/assets/vendors/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../static/assets/vendors/font-awesome/css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="../static/assets/css/admin.css">
		<link rel="stylesheet" type="text/css" href="../static/assets/css/style.css">
		<!-- [if lt IE 9] -->
		<script src="../static/assets/vendors/html5shiv/html5shiv.js"></script>
		<script src="../static/assets/vendors/respond/respond.min.js"></script>
		<!-- [endif] -->
		<style type="text/css">

		</style>
	</head>
	<body>
		<div class="main">
			<nav class="navbar">
				<button class="btn btn-default btn-navbar fa fa-bars"></button>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#"><i class="fa fa-user"></i>个人中心</a></li>
					<li><a href="#"><i class="fa fa-sign-out"></i>退出</a></li>
				</ul>
			</nav>

			<div class="container-fluid">
				<div class="row">
					<div class="user-form col-md-4 col-lg-5">
						<form class="form-horizontal">
							<h2>添加分类</h2>
							<!-- 验证失败信息 -->
							<!-- <div class="alert alert-danger" role="alert">请完善用户信息！</div> -->
							<div class="form-group">
								<label for="catergory_name" class="col-sm-3 control-label">邮箱：</label>
								<div class="col-sm-9">
									<input type="email" class="form-control" id="catergory_name" placeholder="请输入类名">
								</div>
							</div>
							<div class="form-group">
								<label for="parent_name" class="col-sm-3 control-label">父类：</label>
								<div class="col-sm-8">
									<select id="parent_name" class="form-control">
										<option>选择父类</option>
										<option>作为父类</option>
										<option>web开发</option>
										<option>运维</option>
									</select>
								</div>
							</div>
							<div class="form-radio form-group ">
								<div class="radio">
									<label>
										<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
										状态1
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
										状态2
									</label>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10 ">
									<button type="submit" class="btn btn-default ">注册</button>
								</div>
							</div>
						</form>
					</div>
					<div class="user-table col-md-8 col-lg-7">
						<div class="fold-btn">
							<a href="#" class="btn btn-danger" style="display: none;">批量删除</a>
						</div>
						<table class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center"><input type="checkbox"></th>
									<th>名称</th>
									<th>所属类别</th>
									<th>状态</th>
									<th class="text-center">操作</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="text-center"><input type="checkbox"></td>
									<td>web开发</td>
									<td></td>	
									<td>激活</td>
									<td class="text-center"><a class="btn btn-danger btn-sm" href="javascript:;">删除</a></td>
								</tr>
								<tr>
									<td class="text-center"><input type="checkbox"></td>
									<td>前端工程师</td>
									<td>web开发</td>	
									<td>激活</td>
									<td class="text-center"><a class="btn btn-danger btn-sm" href="javascript:;">删除</a></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>	
			</div>
		</div>


		<div class="aside">
			<div class="profile">
				<img class="avatar" src="../static/assets/imgs/default.png">
				<h3 class="name">用户名</h3>
			</div>
			<ul class="nav">
				<li><a href="index.html"><i class="fa fa-pencil-square-o"></i>首页</a></li>
				<li ><a href="users.html"><i class="fa fa-users"></i>用户</a></li>
				<li class="active">
					<a data-toggle="collapse" class="collapse" aria-expanded="true"  href="#menu-manage"><i class="fa fa-bars"></i>管理<i class="fa fa-angle-right"></i></a>
					<ul class="collapse in" id="menu-manage">
						<li><a href="companies.html">企业用户</a></li>
						<li><a href="customers.html">个人用户</a></li>
						<li class="active"><a href="catergories.html">职位目录</a></li>
						<li><a href="posts.html">帖子</a></li>

					</ul>
				</li>
				<li>
					<a data-toggle="collapse" class="collapsed" aria-expanded="false" href="#menu-setting"><i class="fa fa-wrench"></i>设置<i class="fa fa-angle-right"></i></a>
					<ul class="collapse" id="menu-setting">
						<li><a href="companies.html">企业用户</a></li>
						<li><a href="customers.html">个人用户</a></li>
						<li><a href="posts.html">帖子</a></li>
					</ul>
				</li>
			</ul>
		</div>
		<script src="../static/assets/vendors/jquery/jquery.min.js"></script>
		<script src="../static/assets/vendors/bootstrap/js/bootstrap.min.js"></script>
	</body>
	</html>