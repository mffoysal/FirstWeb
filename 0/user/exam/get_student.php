<?php
include '../../db.php';
	
	$qry = $con->query("SELECT s.*,u.name,u.unique_id as uid,u.phone,u.pass from quiz_students s left join users u  on s.user_id = u.unique_id where s.id='".$_GET['id']."' ");
	if($qry){
		echo json_encode($qry->fetch_array());
	}
?>