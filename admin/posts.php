<?php  
require_once '../functions.php';













current_manager();

if ($_SERVER['REQUEST_METHOD']=="POST" && $_POST['category-children']!=0) {
	$child=$_POST['category-children'];
	$posts=white_fetch_all("select 
	posts.id,
	posts.created,
	posts.contents,
	posts.contact_email,
	posts.contact_number,
	posts.status,
	posts.headline,
	categories.id as category_id,
	categories.name as category_name,
	company_users.name as company_name
	from posts
	inner join categories on categories_id = categories.id
	inner join company_users on posts.id = company_users.id
	where categories.id = '{$child}'
	;");

}else{
	$posts=white_fetch_all('select 
	posts.id,
	posts.created,
	posts.contents,
	posts.contact_email,
	posts.contact_number,
	posts.status,
	posts.headline,
	categories.name as category_name,
	company_users.name as company_name
	from posts
	inner join categories on posts.id = categories.id
	inner join company_users on posts.id = company_users.id
	;');
}



$category_parents=white_fetch_all('select * from categories where parent_id=0');

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
	<link rel="stylesheet" type="text/css" href="/MrWhite/static/assets/vendors/nprogress/nprogress.css">
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
			<h3>查看帖子<span class="tips"></span></h3>
			<div class="row">
				<div class="col-md-8">
					<form action="<?php echo $_SERVER['PHP_FILE']; ?>" method="post" class="form-inline select-form">
						<select class="form-control category-parents" name="category-parents">
							<option value="0">所有</option>
							<?php foreach ($category_parents as $item): ?>
								<option value="<?php echo $item['id']; ?>" ><?php echo $item['name']; ?></option>	
							<?php endforeach ?>
						</select>
						<select class="form-control category-children" name="category-children">
							<option value="0" >职位</option>
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
					<tr >
						<th>标题</th>
						<th class="text-center">内容</th>
						<th>发布时间</th>
						<th>招聘职位</th>
						<th>发布方</th>
						<th>状态</th>
						<th class="text-center">操作</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($posts as $item): ?>
						<tr>
							<td><?php echo $item['headline']; ?></td>
							<td class="text-center">
								<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal<?php echo $item['id']; ?>">
									查看
								</button>
								<div class="modal fade" id="myModal<?php echo $item['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title" id="myModalLabel">"<?php echo $item['headline']; ?>"帖子内容</h4>
											</div>
											<div class="modal-body">
												<p><?php echo $item['contents']; ?></p>
												<p>联系电话：<?php echo $item['contact_number']; ?></p>
												<p>联系邮箱：<?php echo $item['contact_email']; ?></p>
												
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
											</div>
										</div>
									</div>
								</div>
							</td>
							<td><?php echo $item['created']; ?></td>
							<td><?php echo $item['category_name']; ?></td>
							<td><?php echo $item['company_name']; ?></td>
							<td><?php echo $item['status']; ?></td>
							<td class="text-center">
								<a href="/MrWhite/admin/post-change-status.php?id=<?php echo $item['id']; ?>&status=<?php echo $item['status']; ?>" class="btn <?php echo $item['status']=='actived' ?'btn-danger' : 'btn-success' ?> btn-sm"><?php echo $item['status']=='actived'? '审核': '通过' ?></a>
								<a href="/MrWhite/admin/post-delete.php?id=<?php echo $item['id']; ?>" class="btn btn-danger btn-sm">删除</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
				
			</table>
		</div>
	</div>


	<?php require_once 'inc/aside.php'; ?>
	
	<script src="/MrWhite/static/assets/vendors/jquery/jquery.js"></script>
	<script src="/MrWhite/static/assets/vendors/bootstrap/js/bootstrap.min.js"></script>
	<script src="/MrWhite/static/assets/vendors/nprogress/nprogress.js"></script>
	<script type="text/javascript">
		$(function($){
			var $select_category_parent=$('.category-parents');
			var $select_category_children=$('.category-children');
			

			$select_category_parent.on('change', function() {
				var selected=$('.category-parents option:selected');
				var id=selected.attr('value');

				if (id!='0') {
					$.get('/MrWhite/admin/api/category-children.php',{ id:id }, function(res) {
						var $rows=JSON.parse(res);
						$select_category_children.html('<option value="0" >职位</option>');
						for (var i = 0; i < $rows.length; i++) {
							$select_category_children.append(
								"<option value="+$rows[i]['id']+" >"+$rows[i]['name']+"</option>"
								);
						}
					});
				}else {
					$select_category_children.html('<option value="0" >职位</option>');
				}
			});

			// var $selectParents=$('.select-form .category-parents');
			// var $selectChildren=$('.select-form .category-children');
			// var $selectBtn=$('.select-form button');
			
			// $selectParents.on('change',function(){
			// 	var $selectPa=$('.select-form .category-parents option:selected');
			// 	$selectPa.attr('selected','').siblings('selector','false');

			// });	


			// $selectBtn.on('click',function(){
			// 	var $selectChildren=$('.select-form .category-children option:selected');
			// 	var childId=$selectChildren.val();
				
			// });
			
		});
	</script>
</body>
</html>