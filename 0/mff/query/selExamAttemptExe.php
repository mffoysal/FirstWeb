<?php 
 session_start();
 include("../conn.php");

 if(isset($_SESSION['unique_id']))
 {
   $_SESSION['examineeSession'] = array(
		'exmne_id' => $_SESSION['unique_id'],
		'examineenakalogin' => true
   );
 
   $_SESSION['unique_id']=$_SESSION['unique_id'];
 
 }

$exmneId = $_SESSION['examineeSession']['exmne_id'];
 

extract($_POST);

 $selExamAttmpt = $conn->query("SELECT * FROM exam_attempt WHERE exmne_id='$exmneId' AND exam_id='$thisId' ");

 if($selExamAttmpt->rowCount() > 0)
 {
 	$res = array("res" => "alreadyExam", "msg" => $thisId);
 }
 else
 {
 	$res = array("res" => "takeNow");
 }


 echo json_encode($res);
 ?>