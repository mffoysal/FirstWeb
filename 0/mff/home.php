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

if(!isset($_SESSION['examineeSession']['examineenakalogin']) == true) header("location:index.php");

$s="";
if(isset($_REQUEST['success'])){
  $s=$_REQUEST['success'];
}



 ?>
<?php include("conn.php"); ?>
<!-- MAO NI ANG HEADER -->
<?php include("includes/header.php"); ?>      

<!-- UI THEME DIRI -->
<?php include("includes/ui-theme.php"); ?>

<div class="app-main">
<!-- sidebar diri  -->
<?php include("includes/sidebar.php"); ?>



<!-- Condition If unza nga page gi click -->



<?php 
   @$page = $_GET['page'];


   if($page != '')
   {
     if($page == "exam")
     {
       include("pages/exam.php");
     }
     else if($page == "result")
     {
       include("pages/result.php");
     }
     else if($page == "myscores")
     {
       include("pages/myscores.php");
     }
     
   }
   // Else ang home nga page mo display
   else
   {
     include("pages/home.php"); 
   }


 ?> 

<div class="container text-center">
<h6 style="margin:0 auto" class="bg-dark m-auto text-warning"><?=$s;?></h6>
</div>

<!-- MAO NI IYA FOOTER -->
<?php include("includes/footer.php"); ?>

<?php include("includes/modals.php"); ?>


