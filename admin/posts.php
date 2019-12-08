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
			<h3>查看帖子</h3>
			<div class="row">
				<div class="col-md-8">
					<form class="form-inline">
						<select class="form-control">
							<option>类型</option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
						</select>
						<select class="form-control">
							<option>职位</option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
						</select>
						<button type="submit" class="btn btn-default">筛选</button>

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
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
					<th>标题</th>
					<th>内容</th>
					<th>发布时间</th>
					<th>招聘职位</th>
					<th>发布方</th>
					<th>状态</th>
					<th>操作</th>
				</tr>
				</thead>
				<tbody>
					<tr>
					<td>海口软件园急聘软件研发工程师</td>
					<td>
						<button class="btn btn-default btn-sm">查看</button>
					</td>
					<td>2019-09-01</td>
					<td>java工程师</td>
					<td>海口软件园有限公司</td>
					<td>待审</td>
					<td>
						<button>发布</button>
						<button>删除</button>
					</td>
				</tr>
				<tr>
					<td>网易招聘前端工程师</td>
					<td>
						<button class="btn btn-default btn-sm">查看</button>
					</td>
					<td>2019-09-02</td>
					<td>前端工程师</td>
					<td>上海网易有限公司</td>
					<td>已发布</td>
					<td>
						<button>撤回</button>
						<button>删除</button>
					</td>
				</tr>
				<tr>
					<td>网易招聘后端工程师</td>
					<td>
						<button class="btn btn-default btn-sm">查看</button>
					</td>
					<td>2019-09-02</td>
					<td>后端工程师</td>
					<td>上海网易有限公司</td>
					<td>已发布</td>
					<td>
						<button>撤回</button>
						<button>删除</button>
					</td>
				</tr>
				</tbody>
				
			</table>
		</div>
	</div>


	<div class="aside">
		<div class="profile">
			<img class="avatar" src="../static/assets/imgs/default.png">
			<h3 class="name">用户名</h3>
		</div>
		<ul class="nav">
			<li><a href="index.html"><i class="fa fa-pencil-square-o"></i>首页</a></li>
			<li><a href="users.html"><i class="fa fa-users"></i>用户</a></li>
			<li class="active">
				<a data-toggle="collapse" class=" collapse " aria-expanded="true"  href="#menu-manage"><i class="fa fa-bars"></i>管理<i class="fa fa-angle-right"></i></a>
				<ul class="collapse in" id="menu-manage">
					<li ><a href="companies.html">企业用户</a></li>
					<li ><a href="customers.html">个人用户</a></li>
					<li ><a href="catergories.html">职位目录</a></li>
					<li class="active"><a href="posts.html">帖子</a></li>

				</ul>
			</li>
			<li>
				<a data-toggle="collapse" class="collapsed" aria-expanded="false" href="#menu-setting"><i class="fa fa-wrench"></i>设置<i class="fa fa-angle-right"></i></a>
				<ul class="collapse" id="menu-setting">
					<li><a href="companies.html">企业用户</a></li>
					<li><a href="customers.html">个人用户</a></li>
					<li><a href="catergories.html">分类</a></li>
					<li><a href="posts.html">帖子</a></li>
				</ul>
			</li>
		</ul>
	</div>
	<script src="../static/assets/vendors/jquery/jquery.min.js"></script>
	<script src="../static/assets/vendors/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>