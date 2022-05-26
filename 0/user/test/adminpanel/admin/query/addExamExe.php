<?php 

 include("../../../conn.php");


 if(isset($_SESSION['unique_id']))
{
  $_SESSION['admin'] = array(
  	 'admin_id' => $_SESSION['unique_id'],
  	 'adminnakalogin' => true
  );


  $_SESSION['unique_id']=$_SESSION['unique_id'];

}



 extract($_POST);

 $selCourse = $conn->query("SELECT * FROM exam_tbl WHERE ex_title='$examTitle' ");

 if($courseSelected == "0")
 {
 	$res = array("res" => "noSelectedCourse");
 }
 else if($timeLimit == "0")
 {
 	$res = array("res" => "noSelectedTime");
 }
 else if($examQuestDipLimit == "" && $examQuestDipLimit == null)
 {
 	$res = array("res" => "noDisplayLimit");
 }
 else if($selCourse->rowCount() > 0)
 {
	$res = array("res" => "exist", "examTitle" => $examTitle);
 }
 else
 {
	// $examIdd= $_POST['examId'];
    
	$insExam = $conn->query("INSERT INTO exam_tbl(cou_id,ex_title,ex_time_limit,ex_questlimit_display,ex_description, mentor_id) VALUES('$courseSelected','$examTitle','$timeLimit','$examQuestDipLimit','$examDesc','$examId') ");
	if($insExam)
	{
		$res = array("res" => "success", "examTitle" => $examTitle);
	}
	else
	{
		$res = array("res" => "failed", "examTitle" => $examTitle);
	}


 }




 echo json_encode($res);
 ?>