<?php 
session_start();
 include("../conn.php");
 
if(isset($_POST['login'])){
extract($_POST);

// $selAcc = $conn->query("SELECT * FROM users WHERE phone='$username' AND pass='$pass'  ");
// $selAccRow = $selAcc->fetch(PDO::FETCH_ASSOC);

$username=$_POST['username'];
$pass=$_POST['pass'];
$course=$_POST['course'];

$ran_id = rand(time(), 100000000);
$_SESSION['unique_id']=$username;

if(isset($_SESSION['unique_id']))
{
  $_SESSION['examineeSession'] = array(
  	 'exmne_id' => $_SESSION['unique_id'],
  	 'examineenakalogin' => true
  );

  $_SESSION['unique_id']=$_SESSION['unique_id'];

}
$_SESSION['name']=$pass.'~'.$username;
$_SESSION['course_id']=$course;

  $res = array("res" => "success");





 echo json_encode($res);

header("location:../home.php");

}
 ?>