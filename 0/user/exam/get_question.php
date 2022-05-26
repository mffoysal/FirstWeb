<?php
include '../../db.php';
$data = array();
$qry = $con->query("SELECT * FROM quizquestions where id =  ".$_GET['id']);

foreach($qry->fetch_array() as $k => $v){
	$data['qdata'][$k] = $v;
}
$qry2 = $con->query("SELECT * FROM question_opt where question_id =  ".$_GET['id']);
while($row = $qry2->fetch_assoc()){
	$data['odata'][] = $row;
}
echo json_encode($data);

