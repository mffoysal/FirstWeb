<?php 
include '../../db.php';
extract($_GET);
$delete = $con->query("DELETE FROM quizquestions where  id=".$id);
if($delete)
	echo true;
?>