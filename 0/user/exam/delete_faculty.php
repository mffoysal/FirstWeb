<?php 
include '../../db.php';
extract($_GET);
$get = $con->query("SELECT * FROM faculty where id=$id ")->fetch_array();
$qry = $con->query("DELETE FROM faculty where id = $id ");
$qry2 = $con->query("DELETE FROM users where unique_id = '".$get['user_id']."' ");
if($qry && $qry2)
	echo true;
?>