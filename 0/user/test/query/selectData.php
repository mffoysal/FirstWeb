<?php 

if(isset($_SESSION['unique_id']))
{
  $_SESSION['examineeSession'] = array(
  	 'exmne_id' => $_SESSION['unique_id'],
  	 'examineenakalogin' => true
  );

  $_SESSION['unique_id']=$_SESSION['unique_id'];

}

$exmneId = $_SESSION['examineeSession']['exmne_id'];

// Select Data sa nilogin nga examinee
$selExmneeData = $conn->query("SELECT * FROM users WHERE unique_id='$exmneId' ")->fetch(PDO::FETCH_ASSOC);
$exmneCourse =  $selExmneeData['exmne_course'];


        
// Select and tanang exam depende sa course nga ni login 
$selExam = $conn->query("SELECT * FROM exam_tbl WHERE cou_id='$exmneCourse' ORDER BY ex_id DESC ");


//

 ?>