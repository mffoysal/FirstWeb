<?php 
include '../../db.php';
extract($_GET);
$delete = $con->query("DELETE FROM quiz_student_list where  id=".$qid);
if($delete)
	echo true;
?>