<?php 
include '../../db.php';
extract($_GET);
$get = $con->query("SELECT * FROM quizquestions where qid= ".$id)->fetch_array();
$delete = $con->query("DELETE FROM quiz_list where id= ".$id);
$delete1 = $con->query("DELETE FROM quizquestions where qid= ".$id);
$delete2 = $con->query("DELETE FROM question_opt where question_id=".$get['id']);
if($delete)
	echo true;
?>