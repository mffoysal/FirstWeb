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

$course_name = strtoupper($course_name);
 $selCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_name='$course_name' ");

 if($selCourse->rowCount() > 0)
 {
	$res = array("res" => "exist", "course_name" => $course_name);
 }
 else
 {
    
	$insCourse = $conn->query("INSERT INTO course_tbl(cou_name,mentor_id) VALUES('$course_name','$courseId') ");
	if($insCourse)
	{
		$res = array("res" => "success", "course_name" => $course_name);
	}
	else
	{
		$res = array("res" => "failed", "course_name" => $course_name);
	}


 }




 echo json_encode($res);
 ?>