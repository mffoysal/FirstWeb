<?php
include('../db.php');
session_start();
$uid=$_SESSION['unique_id'];
$sqli = "UPDATE messages SET status=1 WHERE outgoing_msg_id='$_SESSION[unique_id]'";
mysqli_query($con,$sqli);
?>