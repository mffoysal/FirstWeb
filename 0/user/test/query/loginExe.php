<?php 
session_start();
 include("../conn.php");
 

extract($_POST);

$selAcc = $conn->query("SELECT * FROM users WHERE phone='$username' AND pass='$pass'  ");
$selAccRow = $selAcc->fetch(PDO::FETCH_ASSOC);


if($selAcc->rowCount() > 0)
{
  $_SESSION['examineeSession'] = array(
  	 'exmne_id' => $selAccRow['unique_id'],
  	 'examineenakalogin' => true
  );
  $res = array("res" => "success");

}
else
{
  $res = array("res" => "invalid");
}




 echo json_encode($res);
 ?>