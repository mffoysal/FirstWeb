<?php 
session_start();

if(isset($_SESSION['unique_id']))
{
  $_SESSION['examineeSession'] = array(
  	 'exmne_id' => $_SESSION['unique_id'],
  	 'examineenakalogin' => true
  );

  $_SESSION['unique_id']=$_SESSION['unique_id'];

}

if(isset($_SESSION['examineeSession']['examineenakalogin']) == true) header("location:home.php");

 ?>

<?php 

include("login-ui/index.php");


 ?>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/sweetalert.js"></script>