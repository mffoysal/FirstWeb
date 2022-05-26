<?php
 include("../../../conn.php");
 extract($_POST);


$updCourse = $conn->query("UPDATE users SET name='$exFullname', exmne_course='$exCourse', division='$exGender', district='$exBdate', upazila='$exYrlvl', phone='$exEmail', pass='$exPass' WHERE unique_id='$exmne_id' ");
if($updCourse)
{
	   $res = array("res" => "success", "exFullname" => $exFullname);
}
else
{
	   $res = array("res" => "failed");
}



 echo json_encode($res);	
?>