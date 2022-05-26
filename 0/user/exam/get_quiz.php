<?php
include '../../db.php';
	
	$qry = $con->query("SELECT * from quiz_list where id='".$_GET['id']."' ");
	if($qry){
		echo json_encode($qry->fetch_array());
	}
?>