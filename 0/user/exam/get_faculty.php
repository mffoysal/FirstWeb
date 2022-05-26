<?php
include '../../db.php';
	
	$qry = $con->query("SELECT f.*,u.name,u.unique_id as uid,u.phone,u.pass from faculty f left join users u  on f.user_id = u.unique_id where f.id='".$_GET['id']."' ");
	if($qry){
		echo json_encode($qry->fetch_array());
	}
?>