<?php 
	require '../../functions.php';
	current_manager();


	$id=$_POST['id'];


	
	if ($id=='0') {
		$rows=white_fetch_all("select 
						first.id as id,
						first.name as name,
						first.status as status,
						first.parent_id as parent_id,
						second.name as parent_name
							from 
						categories first left outer join categories second on (first.parent_id=second.id)
						;");
	}else{
		$rows=white_fetch_all("select 
						first.id as id,
						first.name as name,
						first.status as status,
						first.parent_id as parent_id,
						second.name as parent_name
							from 
						categories first left outer join categories second on (first.parent_id=second.id)
						where first.parent_id ='{$id}'
						;");
	}
	

	exit(json_encode($rows));