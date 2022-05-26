<?php
include('../db.php');
// $con = new mysqli("localhost","root","","foysal");

if(isset($_REQUEST['success'])){
    $s=$_REQUEST['success'];
}
else{
    $s='';
}

?>

<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EdUResult | Student Result</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<!-- @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css"); -->

</head>
<body>
    


<div class="container-fluid mt-5">
<h3 class="bg-dark text-center text-warning"><?=$s?></h3>
    
<div class="table-responsive">
<table id="resulttbl" class="table w-100 m-auto table-light table-hover table-striped table-borderd border-danger">
    <thead class="table-info">
        <tr>
        <th>ID|Phone</th>
        <th>Course</th>
        <th>Exam Name</th>
        <th>Qst:</th>
        <th>Score</th>
        
        <th>Details</th>
        <th>Time</th>  
        <th>Teacher</th>
        </tr>
    </thead>
        <?php 
            $result = "SELECT * FROM exam_attempt";
            $resultsql=mysqli_query($con,$result);
            // $rowre=mysqli_fetch_assoc($resultsql);
            $count=mysqli_num_rows($resultsql);
        ?>
    <tbody class="table-striped">
    <?php 
    
    while($rowre=mysqli_fetch_assoc($resultsql)):
    ?>

<?php
$resultex="SELECT * FROM exam_tbl WHERE ex_id='$rowre[exam_id]'";
$resultsq=mysqli_query($con,$resultex);
$rowe=mysqli_fetch_assoc($resultsq);

$resultexs="SELECT * FROM exam_answers WHERE exam_id='$rowre[exam_id]' AND axmne_id='$rowre[exmne_id]'";
$resultsqs=mysqli_query($con,$resultexs);
$rowes=mysqli_fetch_assoc($resultsqs);
      
$resultc="SELECT * FROM exam_answers s, exam_question_tbl q  WHERE s.exam_id='$rowre[exam_id]' AND s.axmne_id='$rowre[exmne_id]' AND s.quest_id=q.eqt_id AND s.exans_answer=q.exam_answer";
$resultcr=mysqli_query($con,$resultc);
$countrow=mysqli_num_rows($resultcr);   
?>


        <tr>
        <td class="text-danger">
                    <?= $rowre['exmne_id'] ?>
        </td>
        <td><?=$rowe['cou_id']?></td>
        <td><?=$rowe['ex_title']?></td>
        <td><?=$rowe['ex_questlimit_display']?></td>
        <td class="text-warning"><?=$countrow?></td>
        
        <!-- <td></td> -->
        <!-- <td><a href="delete.php?delete_id=<?=$rowre['exmne_id']?>&exam=<?=$rowre['exam_id']?>"><span id="dlt" onclick="dlt()" class="btn btn-danger">Delete</span></a></td> -->
        <td><a href="details.php?action_id=<?=$rowre['exmne_id']?>&exam=<?=$rowre['exam_id']?>"><span id="dlt" onclick="dlt()" class="btn btn-info">ViewAns</span></a></td>
        <td><?=$rowes['exans_created']?></td>
        <!-- <td><?php ?></td> -->
        <td><?=$rowe['mentor_id'] ?></td>
        </tr>


    <?php
    endwhile;
    ?>

    </tbody>    
            
    <tfoot class="table-dark">
        <tr>
        <td align="left">নির্বাচিতঃ <span class='btn btn-danger'><?php ?></span>
        </td>
        <td> &copy;MFF: <span class="btn btn-info"><?php  ?></span></td>
        <td>TOTAL : <span class="btn btn-success"><?php  ?></span>
        </td>
        <?php ?>
        <?php ?>
        <td>মোটঃ <span class='btn btn-primary'><?php ?></span></td>
        <td colspan="3" align="right">মোটঃ<span class='btn btn-warning text-dark'><?php ?></span></td>
        <td></td>
    </tr>
    </tfoot>
</table>
</div>


</div>




<script>
$(document).ready( function () {
    $('#resulttbl').DataTable();
} );
</script>
</body>
</html>