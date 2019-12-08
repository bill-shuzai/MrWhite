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
		<div class="container">
			<div class="jumbotron">
				<h1>Hello, world!</h1>
				<p>...</p>
				<p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
			</div>
		</div>
	</div>


	<div class="aside">
		<div class="profile">
			<img class="avatar" src="../static/assets/imgs/default.png">
			<h3 class="name">用户名</h3>
		</div>
		<ul class="nav">
			<li class="active"><a href="index.html"><i class="fa fa-pencil-square-o"></i>首页</a></li>
			<li><a href="users.html"><i class="fa fa-users"></i>用户</a></li>
			<li>
				<a data-toggle="collapse" class="collapsed" aria-expanded="false"  href="#menu-manage"><i class="fa fa-bars"></i>管理<i class="fa fa-angle-right"></i></a>
				<ul class="collapse" id="menu-manage">
					<li><a href="companies.html">企业用户</a></li>
					<li><a href="customers.html">个人用户</a></li>
					<li><a href="catergories.html">职位目录</a></li>
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