<?php 
session_start();
 include("../../../conn.php");
 

extract($_POST);

$selAcc = $conn->query("SELECT * FROM users WHERE phone='$username' AND pass='$pass' AND actype='mentor' ");
$selAccRow = $selAcc->fetch(PDO::FETCH_ASSOC);


if($selAcc->rowCount() > 0)
{
  $_SESSION['admin'] = array(
  	 'admin_id' => $selAccRow['unique_id'],
  	 'adminnakalogin' => true
  );
  $res = array("res" => "success");

  $_SESSION['unique_id']=$selAccRow['unique_id'];

}
else
{
  $res = array("res" => "invalid");
}




 echo json_encode($res);
 ?>