<?php  
require_once '../functions.php';













current_manager();

$categories=white_fetch_all('select * from categories;');
$parent_categories=white_fetch_all('select * from categories where parent_id=0;');

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
					<form class="form-horizontal">
						<h2>添加分类</h2>
						<!-- 验证失败信息 -->
						<!-- <div class="alert alert-danger" role="alert">请完善用户信息！</div> -->
						<div class="form-group">
							<label for="category_name" class="col-sm-3 control-label">分类：</label>
							<div class="col-sm-9">
								<input type="email" class="form-control" id="category_name" placeholder="请输入类名">
							</div>
						</div>
						<div class="form-group">
							<label for="parent_name" class="col-sm-3 control-label">父类：</label>
							<div class="col-sm-8">
								<select id="parent_name" class="form-control">
									<?php foreach ($parent_categories as $item): ?>
										<option><?php echo $item['name']; ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
						<div class="form-radio form-group ">
							<div class="radio">
								<label>
									<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
									actived
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
									wait
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
					<form class="form-inline">
						<span>选择分类：</span>
						<select class="form-control">
							<option>所有</option>
							<?php foreach ($parent_categories as $item): ?>
								<option><?php echo $item['name']; ?></option>
							<?php endforeach ?>
						</select>
						<button type="submit" class="btn btn-default">筛选</button>
					</form>
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
							<?php foreach ($categories as $item): ?>
								<tr>
									<td class="text-center"><input type="checkbox"></td>
									<td><?php echo $item['name']; ?></td>
									<td><?php echo $item['parent_id']==0? '' : 
									 $categories[array_search($item['parent_id'], array_column($categories,'id'))]['name'] ; ?></td>	
									<td><?php echo $item['status']; ?></td>
									<td class="text-center">
										<a class="btn btn-default btn-sm" href="javascript:;">编辑</a>
										<a class="btn btn-danger btn-sm" href="javascript:;">删除</a></td>
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
	</body>
	</html>