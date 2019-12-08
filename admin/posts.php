<?php  
	require_once '../functions.php';

	











	current_manager();

	
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


	<?php require_once 'inc/aside.php'; ?>
	
	<script src="/MrWhite/static/assets/vendors/jquery/jquery.min.js"></script>
	<script src="/MrWhite/static/assets/vendors/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>