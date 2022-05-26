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

$selExamineeFullname = $conn->query("SELECT * FROM users WHERE name='$fullname' ");
$selExamineeEmail = $conn->query("SELECT * FROM users WHERE phone='$email' ");


if($gender == "0")
{
	$res = array("res" => "noGender");
}
else if($course == "0")
{
	$res = array("res" => "noCourse");
}
else if($year_level == "0")
{
	$res = array("res" => "noLevel");
}
else if($selExamineeFullname->rowCount() > 0)
{
	$res = array("res" => "fullnameExist", "msg" => $fullname);
}
else if($selExamineeEmail->rowCount() > 0)
{
	$res = array("res" => "emailExist", "msg" => $email);
}
else
{
	$uid = rand(time(), 100000000);
	$actype='student';
	$insData = $conn->query("INSERT INTO users(unique_id,name,exmne_course,division,district,upazila,phone,pass,actype) VALUES('$uid','$fullname','$course','$gender','$bdate','$year_level','$email','$password','$actype')  ");
	if($insData)
	{
		$res = array("res" => "success", "msg" => $email);
	}
	else
	{
		$res = array("res" => "failed");
	}
}


echo json_encode($res);
 ?>