<?php  
require_once '../functions.php';

function edit_current_category(){
	global $edit_category;
	$id=$_GET['id'];

	$edit_category=white_fetch_one("select * from categories where id='{$id}'");
}

function update_current_category(){
	global $edit_category;
	if (!$_POST['category_name']) {
		$GLOBALS['message']='这里请输入完整信息！';
		return;
	}
	$id=$_GET['id'];
	$name=$_POST['category_name'];
	$parent_id=$_POST['category_parent'];
	$status=$_POST['status'];

	white_fetch_excute("update categories set name='{$name}',parent_id='{$parent_id}',status='{$status}' where id={$id}");

	$edit_category['name']=$name;
	$edit_category['parent_id']=$parent_id;
	$edit_category['status']=$status;

}





if($_GET['id']){
	edit_current_category();
	if($_SERVER['REQUEST_METHOD']=='POST'){
		update_current_category();
	}
}else{
	if ($_SERVER['REQUEST_METHOD']=="POST") {
		if(!$_POST['category_name']){
			$message="请输入完整信息！";
		}else{
			$category_name=$_POST['category_name'];
			$category_parent=$_POST['category_parent'];
			$status=$_POST['status'];
			white_fetch_excute("insert into categories (name,status,parent_id) values('{$category_name}','{$status}','{$category_parent}');");
			header('Location:/MrWhite/admin/categories.php');
		}
	}
}



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
					<?php if ($edit_category): ?>
						<form action="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $edit_category['id']; ?>" method="post" class="form-horizontal" novalidate autocomplete="off">
							<h2>编辑分类##<?php echo $edit_category['name']; ?>##</h2>
							<!-- 验证失败信息 -->
							<?php if ($message): ?>
								<div class="alert alert-danger" role="alert"><?php echo $message ?></div>
							<?php endif ?>
							<div class="form-group">
								<label for="category_name" class="col-sm-3 control-label">分类：</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="category_name" id="category_name" value="<?php echo $edit_category['name']; ?>" >
								</div>
							</div>
							<div class="form-group">
								<label for="category_parent" class="col-sm-3 control-label">父类：</label>
								<div class="col-sm-8">
									<select id="category_parent" name="category_parent" class="form-control">
										<option value="0">主类</option>
										<?php foreach ($parent_categories as $item): ?>
											<option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="form-radio form-group ">
								<div class="radio">
									<label>
										<input type="radio" name="status" id="optionsRadios1" value="actived" checked>
										actived
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="status" id="optionsRadios2" value="await">
										await
									</label>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10 ">
									<button type="submit" class="btn btn-default ">提交</button>
								</div>
							</div>
						</form>
						<?php else: ?>
							<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-horizontal" novalidate autocomplete="off">
								<h2>添加分类</h2>
								<!-- 验证失败信息 -->
								<?php if ($message): ?>
									<div class="alert alert-danger" role="alert"><?php echo $message ?></div>
								<?php endif ?>
								<div class="form-group">
									<label for="category_name" class="col-sm-3 control-label">分类：</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="category_name" id="category_name" placeholder="请输入类名">
									</div>
								</div>
								<div class="form-group">
									<label for="category_parent" class="col-sm-3 control-label">父类：</label>
									<div class="col-sm-8">
										<select id="category_parent" name="category_parent" class="form-control">
											<option value="0">主类</option>
											<?php foreach ($parent_categories as $item): ?>
												<option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>
								<div class="form-radio form-group ">
									<div class="radio">
										<label>
											<input type="radio" name="status" id="optionsRadios1" value="actived" checked>
											actived
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="status" id="optionsRadios2" value="await">
											await
										</label>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10 ">
										<button type="submit" class="btn btn-default ">添加</button>
									</div>
								</div>
							</form>
						<?php endif ?>
					</div>
					<div class="user-table col-md-8 col-lg-7">


						<form class="form-inline select-form">
							<span>选择分类：</span>
							<select class="form-control">
								<option data-id="0" selected>所有</option>
								<?php foreach ($parent_categories as $item): ?>
									<option data-id="<?php echo $item['id'] ?>"><?php echo $item['name']; ?></option>
								<?php endforeach ?>
							</select>
							<button type="button" class="btn btn-default select-btn">筛选</button>
						</form>
						<div class="fold-btn">	
							<a href="/MrWhite/admin/category-delete.php" class="btn btn-danger delete-btn" style="display: none;">批量删除</a>
						</div>
						<table class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>名称</th>
									<th>所属类别</th>
									<th>状态</th>
									<th class="text-center">操作</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($categories as $item): ?>
									<tr>
										<td><?php echo $item['name']; ?></td>
										<td><?php echo $item['parent_id']==0? '主类' : 
										$categories[array_search($item['parent_id'], array_column($categories,'id'))]['name'] ; ?></td>	
										<td><?php echo $item['status']; ?></td>
										<td class="text-center">
											<a class="btn btn-default btn-sm" href="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $item['id']; ?>">编辑</a>
											<a class="btn btn-danger btn-sm" href="/MrWhite/admin/category-delete.php?id=<?php echo $item['id']; ?>">删除</a></td>
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
					

					var $selectForm=$('.user-table .select-form');
					var $selectBtn=$('.user-table .select-form button');
					var $tbody=$('.user-table tbody');

					$selectBtn.on('click',function(){
						var id=$('.user-table .select-form option:selected').data('id');
						$.post('/MrWhite/admin/api/category-show-table.php', { id : id }, function(res) {
							$rows=JSON.parse(res);
							$tbody.html('');
							for (var i = 0; i < $rows.length; i++) {
								var parentName=$rows[i]['parent_name']? $rows[i]['parent_name']:'主类';
								$tbody.append("<tr><td>"+$rows[i]['name']+"</td><td>"+parentName+"</td><td>"+$rows[i]['status']+"</td><td class='text-center'><a class='btn btn-default btn-sm' href='/MrWhite/admin/categories.php?id="+$rows[i]['id']+"'>编辑</a> <a class='btn btn-danger btn-sm' href='/MrWhite/admin/category-delete.php?id="+$rows[i]['id']+"'>删除</a></td></tr>");

							}
							
						});

					});

				});
			</script>
		</body>
		</html>