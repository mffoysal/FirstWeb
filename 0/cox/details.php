<?php
include('../db.php');
// $con = new mysqli("localhost","root","","foysal");


if(isset($_REQUEST['action_id'])){
    $exmneid=$_REQUEST['action_id'];
    $examid=$_REQUEST['exam'];
}
else{
    header('location:result.php');
}

$resultexn="SELECT * FROM exam_tbl WHERE ex_id='$examid'";
$resultsqn=mysqli_query($con,$resultexn);
$rown=mysqli_fetch_assoc($resultsqn);


?>

<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EdUResult | <?=$exmneid?> ~<?=$rown['ex_title']?>~ Result</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">

<!-- @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css"); -->

</head>
<body>
    


<div class="container-fluid mt-5">

<div style="border: 2px solid red; border-radius:5px" class="container">
<div class="row text-center">
<div class="col-md-6 text-center">
    <h4 class="text-danger">ExamneePhone: <span class="text-warning" ><?=$exmneid?></span> </h4>
</div>
<div class="col-md-6 text-center">
    <h4 class="text-danger">ExamName: <span class="text-warning"><?=$rown['ex_title']?></span></h4>
</div>
</div>
</div>
    
<div class="table-responsive">
<table id="resulttbl" class="table w-100 m-auto table-dark table-hover table-borderd border-danger">
    <thead class="table-info">
        <tr>
        <th>S.N</th>
        <th>Question</th>
        <th>StudentAns</th>
        <th>RightAns</th>
        <th>Score</th>
        <th>Opt-1</th>
        <th>Opt-2</th>
        <th>Opt-3</th>
        <th>Opt-4</th>
       
       
        </tr>
    </thead>
        <?php 
        $i="1";

            $result = "SELECT * FROM exam_answers WHERE axmne_id='$exmneid' AND exam_id='$examid'";
            $resultsql=mysqli_query($con,$result);
            // $rowre=mysqli_fetch_assoc($resultsql);
            $count=mysqli_num_rows($resultsql);
        ?>
    <tbody class="table-striped">
    <?php 
    
    while($rowre=mysqli_fetch_assoc($resultsql)):
        
    ?>
    

<?php
$resultex="SELECT * FROM exam_question_tbl WHERE eqt_id='$rowre[quest_id]' AND exam_id='$examid' ";
$resultsq=mysqli_query($con,$resultex);
$rowe=mysqli_fetch_assoc($resultsq);

// $resultexs="SELECT * FROM exam_answers WHERE ex_id='$rowre[exam_id]'";
// $resultsqs=mysqli_query($con,$resultexs);
// $rowes=mysqli_fetch_assoc($resultsqs);

?>


        <tr>
        <td class="text-warning bg-secondary">
                    <?= $i++ ?>
        </td>
        <td class="text-info bg-dark"><?=$rowe['exam_question']?></td>
        <?php
            $resultexs="SELECT * FROM exam_question_tbl WHERE eqt_id='$rowre[quest_id]' AND exam_answer='$rowre[exans_answer]'";
            $resultsqs=mysqli_query($con,$resultexs);
            $rowes=mysqli_fetch_assoc($resultsqs);
            $counts=mysqli_num_rows($resultsqs);
            $total="0";
                if($counts=='0'){
                    $color='red';
                    $mark="0";
                    $v="Wrong!";
                    $c="danger";
                    $cc="warning";
                  $ccc="warning";
                }else{
                    $color='green';
                    $mark="1";
                    $v="Right!";
                    $c="success";
                    $cc="light";
                  $ccc="success";
                }
                $total=$total+$mark;
                
               
                
            
        ?>
        <td class="text-<?=$cc?>" style="background:<?=$color?>"><?=$rowre['exans_answer']?></td>

        <td style="background:ghostwhite" class="text-<?=$ccc?>"><?=$rowe['exam_answer']?></td>
        <td style="backgrounde:<?=$color?>" class="bg-light text-<?=$c?>"><?=$mark?>  [<span class="bg-"><?=$v?></span>] </td>
        <td><?=$rowe['exam_ch1'] ?></td>
        <td class="bg-secondary"><?=$rowe['exam_ch2'] ?></td>
        <td><?=$rowe['exam_ch3'] ?></td>
        <td class="bg-secondary"><?=$rowe['exam_ch4'] ?></td>

        </tr>
        <!-- <?=$total?> -->


    <?php
    endwhile;
    ?>

    </tbody>    
            
    <tfoot class="table-dark">
        <tr>
        <td align="left">Q:<span class='btn btn-danger'><?php echo $count ?></span>
        </td>
        <td> &copy;FarhadFoysal: <span class="btn btn-info"><?php  ?></span></td>
        <td>TOTAL : <span class="btn btn-success"><?php  ?></span>
        </td>
        <?php ?>
        <?php ?>
        <td>মোটঃ <span class='btn btn-primary'><?php ?></span></td>
        <td colspan="3" align="right">Total Q: <span class='btn btn-warning text-dark'><?php echo $count; ?></span></td>
        <td></td>
        <td></td>
        <!-- <td></td> -->
        <!-- <td></td> -->
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