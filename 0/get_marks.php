<?php

session_start();
require_once 'db.php';

$postiid = $_SESSION['unique_id'];

if(isset($_POST['add_marks'])){
    $examid=$_POST['exam_id'];
    $stdid_student_result=$_POST['std_id'];
    $std_code=$_POST['student_id'];
    $class_code=$_POST['class_code'];
    $exam_code=$_POST['exam_code'];

    if($exam_code !=''){
        $ex_sel="SELECT * FROM std_mark_distribution WHERE ex_code='$exam_code' AND unique_id='$postiid'";
        $ex_selq=mysqli_query($con,$ex_sel);
        
        
        if(mysqli_num_rows($ex_selq) > 0){

    

            $std_codee=$std_code;
            $postiidd=$postiid;
            $unique_id  = $postiidd;
            $std_id   = $std_codee;



            while($mar=mysqli_fetch_assoc($ex_selq))
            {
                
            if($std_id != ''){

               $query = "INSERT INTO marksheet(unique_id, std_id, sub_name, sub_code, ex_code) VALUES('$unique_id','$std_id','{$mar['sub_name']}','{$mar['sub_code']}','{$mar['ex_code']}')";

               if(mysqli_multi_query($con,$query)){
                // echo "Created!";
              }else {
                echo "Error";
              }
            }
           
            }
            if($query != ""){

                
                $con->query("UPDATE student_result SET ex_code='$exam_code' WHERE unique_id='$postiid' AND std_id='$std_code' AND class_code='$class_code' ") or die($con->error);


                echo "Successfully Added!";
            }


        }else{
            echo "Subject Not Found. Please add a subject..";
        }
    }else{
        echo "Something went wrong";
    }

}




// marksheet show

if(isset($_POST['show_marks'])){
    $examid=$_POST['exam_id'];
    $stdid_student_result=$_POST['std_id'];
    $std_code=$_POST['student_id'];
    $class_code=$_POST['class_code'];
    $exam_code=$_POST['exam_code'];

    if($exam_code !=''){
        $ex_sel="SELECT * FROM marksheet WHERE ex_code='$exam_code' AND std_id='$std_code' AND unique_id='$postiid'";
        $ex_selq=mysqli_query($con,$ex_sel);
        
        
        if(mysqli_num_rows($ex_selq) > 0){

            $std_codee=$std_code;
            $postiidd=$postiid;
            $unique_id  = $postiidd;
            $std_id   = $std_codee;
            $i=1;

            ?>

                <div style="border-radius:6px; border:1px solid black" class="table-responsive bg-light text-dark">


                <table class="table w-100 m-auto table-light table-hover table-striped table-borderd border-dark all_std_tableeee_class_students_<?=$sc['id']?>" id="students_all_of_class_<?=$sc['id']?>">

                <thead class="table-dark">
                    <tr>
                    <th><input type="checkbox" checked></th>
                    <th>SUBJECT</th>
                    <th class="">M.C.Q</th>
                    <th class="">WRITTEN</th>
                    <th>UPDATE</th>     
                    <th>TOTAL</th>
                    <th>GP</th>
           
                    </tr>
                </thead>

                        
                <tbody class="table-striped" id="all_studenttt">



            <?php
            while($m=mysqli_fetch_assoc($ex_selq)){


                // echo "succefully we found your marksheet!";
                ?>

                    <tr>
                        <td><?=$i++?></td>
                        <td> <button class="badge btn btn-info"><?=$m['sub_name']?></button></td>
                        <td><input type="text" class="form-control w-100" id="mcq_sub_marks_<?=$m['id']?>" value="<?=$m['mcq']?>"></td>
                        <td><input type="text" class="form-control w-100" id="written_sub_marks_<?=$m['id']?>" value="<?=$m['written']?>"></td>
                        <td><button class="badge btn btn-warning marks_sub_update_btn_" id="<?=$m['id']?>">UPDATE</button> <input type="hidden" class="" id="marks_std_id_<?=$m['id']?>" value="<?=$m['std_id']?>"><input type="hidden" class="" id="marks_sub_code_<?=$m['id']?>" value="<?=$m['sub_code']?>"><input type="hidden" class="" id="marks_ex_code_<?=$m['id']?>" value="<?=$m['ex_code']?>"> </td>
                        <td><?=$m['sub_mark']?></td>
                        <td><?=$m['gp']?></td>

                    </tr>

                <?php


            }

            ?>


</tbody>    
      
      
      <tfoot class="table-dark">
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </tfoot>
                            </table>

                            </div>


            <?php



        }else{
            echo "Subject Not Found. Please Add him in this exam..";
        }
    }else{
        echo "Something went wrong";
    }

}


// marks-1 update

if(isset($_POST['update_marks_1'])){

    if($_POST['this_id']!=''){

        $this_id=$_POST['this_id'];
        $subCode=$_POST['sub_code'];
        $exCode=$_POST['exam_code'];
        $studentId=$_POST['student_id'];
        $cq=$_POST['cq'];

        if($_POST['mcq']!=''){
            $mcq=$_POST['mcq'];
        }else{

            $mcq='0';

        }
        
        $totalMark=$cq+$mcq;          

        $con->query("UPDATE marksheet SET written='$cq', mcq='$mcq', sub_mark='$totalMark'  WHERE id='$this_id' AND unique_id='$postiid' AND sub_code='$subCode' AND ex_code='$exCode' ") or die($con->error);

        // echo "Marks UPDATED Successfully!";
    
        $selegp="SELECT * FROM std_mark_distribution WHERE ex_code='$exCode' AND sub_code='$subCode' AND unique_id='$postiid'";
        $hlw=mysqli_query($con,$selegp);
        $sub_row = mysqli_num_rows($hlw);

        if( $sub_row == '1'){
            // echo "hi";

            if($ma=mysqli_fetch_assoc($hlw)){


                $fiveh=$ma['5h'];
                $fivel=$ma['5l'];
                $fourh=$ma['4h'];
                $fourl=$ma['4l'];
                $three5h=$ma['3_5h'];
                $three5l=$ma['3_5l'];
                $threel=$ma['3l'];
                $threeh=$ma['3h'];
                $twoh=$ma['2h'];
                $twol=$ma['2l'];
                $oneh=$ma['1h'];
                $onel=$ma['1l'];

                $mcqm=$ma['mcq'];

                if($mcqm != '0'){


                    if($mcq < $mcqm){



                        $gp = "0";

                        $con->query("UPDATE marksheet SET gp='$gp' WHERE id='$this_id' AND unique_id='$postiid' AND sub_code='$subCode' AND ex_code='$exCode' ") or die($con->error);


                        $re1 = "SELECT SUM(gp) AS Totalgp FROM marksheet WHERE unique_id='$postiid' AND std_id='$studentId' AND ex_code='$exCode'";
                        $re2 = "SELECT AVG(gp) AS Avggp FROM marksheet WHERE unique_id='$postiid' AND std_id='$studentId' AND ex_code='$exCode'";
                        $re3 = "SELECT SUM(sub_mark) AS submarkTotal FROM marksheet WHERE unique_id='$postiid' AND std_id='$studentId' AND ex_code='$exCode'";
    
                        $res1=mysqli_query($con,$re1);
                        $res2=mysqli_query($con,$re2);
                        $res3=mysqli_query($con,$re3);
    
                            $rowresult1 = mysqli_fetch_assoc($res1);
                            $rowresult2 = mysqli_fetch_assoc($res2);
                            $rowresult3 = mysqli_fetch_assoc($res3);
    
                            $out1 = $rowresult1['Totalgp'];
                            $out2 = $rowresult2['Avggp'];
                            $out3 = $rowresult3['submarkTotal'];
    
    
                        $con->query("UPDATE student_result SET sum_gp='$out1', sum_sub_num='$out3', gpa='$out2' WHERE unique_id='$postiid' AND std_id='$studentId' AND ex_code='$exCode' ") or die($con->error);
    
    
                        echo "Marks UPDATED Successfully!";



                    }else {
                        

                                            
                                        if($totalMark >= $fivel && $totalMark <= $fiveh ){

                                            $gp = "5";

                                        }else if($totalMark >= $fourl && $totalMark <= $fourh ){

                                            $gp = "4";

                                        }else if($totalMark >= $three5l && $totalMark <= $three5h ){

                                            $gp = 3.5;

                                        }else if($totalMark >= $threel && $totalMark <= $threeh ){

                                            $gp = "3";

                                        }else if($totalMark >= $twol && $totalMark <= $twoh ){

                                            $gp = "2";

                                        }else if($totalMark >= $onel && $totalMark <= $oneh ){

                                            $gp = "1";

                                        }else {
                                            $gp = "0";
                                        }


                                        $con->query("UPDATE marksheet SET gp='$gp' WHERE id='$this_id' AND unique_id='$postiid' AND sub_code='$subCode' AND ex_code='$exCode' ") or die($con->error);


                                        $re1 = "SELECT SUM(gp) AS Totalgp FROM marksheet WHERE unique_id='$postiid' AND std_id='$studentId' AND ex_code='$exCode'";
                                        $re2 = "SELECT AVG(gp) AS Avggp FROM marksheet WHERE unique_id='$postiid' AND std_id='$studentId' AND ex_code='$exCode'";
                                        $re3 = "SELECT SUM(sub_mark) AS submarkTotal FROM marksheet WHERE unique_id='$postiid' AND std_id='$studentId' AND ex_code='$exCode'";
                    
                                        $res1=mysqli_query($con,$re1);
                                        $res2=mysqli_query($con,$re2);
                                        $res3=mysqli_query($con,$re3);
                    
                                            $rowresult1 = mysqli_fetch_assoc($res1);
                                            $rowresult2 = mysqli_fetch_assoc($res2);
                                            $rowresult3 = mysqli_fetch_assoc($res3);
                    
                                            $out1 = $rowresult1['Totalgp'];
                                            $out2 = $rowresult2['Avggp'];
                                            $out3 = $rowresult3['submarkTotal'];
                    
                    
                                        $con->query("UPDATE student_result SET sum_gp='$out1', sum_sub_num='$out3', gpa='$out2' WHERE unique_id='$postiid' AND std_id='$studentId' AND ex_code='$exCode' ") or die($con->error);
                    
                    
                                        echo "Marks UPDATED Successfully!";




                    }




                }else {
                    



                    
                    if($totalMark >= $fivel && $totalMark <= $fiveh ){

                        $gp = "5";

                    }else if($totalMark >= $fourl && $totalMark <= $fourh ){

                        $gp = "4";

                    }else if($totalMark >= $three5l && $totalMark <= $three5h ){

                        $gp = 3.5;

                    }else if($totalMark >= $threel && $totalMark <= $threeh ){

                        $gp = "3";

                    }else if($totalMark >= $twol && $totalMark <= $twoh ){

                        $gp = "2";

                    }else if($totalMark >= $onel && $totalMark <= $oneh ){

                        $gp = "1";

                    }else {
                        $gp = "0";
                    }



                    $con->query("UPDATE marksheet SET gp='$gp' WHERE id='$this_id' AND unique_id='$postiid' AND sub_code='$subCode' AND ex_code='$exCode' ") or die($con->error);


                    $re1 = "SELECT SUM(gp) AS Totalgp FROM marksheet WHERE unique_id='$postiid' AND std_id='$studentId' AND ex_code='$exCode'";
                    $re2 = "SELECT AVG(gp) AS Avggp FROM marksheet WHERE unique_id='$postiid' AND std_id='$studentId' AND ex_code='$exCode'";
                    $re3 = "SELECT SUM(sub_mark) AS submarkTotal FROM marksheet WHERE unique_id='$postiid' AND std_id='$studentId' AND ex_code='$exCode'";

                    $res1=mysqli_query($con,$re1);
                    $res2=mysqli_query($con,$re2);
                    $res3=mysqli_query($con,$re3);

                        $rowresult1 = mysqli_fetch_assoc($res1);
                        $rowresult2 = mysqli_fetch_assoc($res2);
                        $rowresult3 = mysqli_fetch_assoc($res3);

                        $out1 = $rowresult1['Totalgp'];
                        $out2 = $rowresult2['Avggp'];
                        $out3 = $rowresult3['submarkTotal'];


                    $con->query("UPDATE student_result SET sum_gp='$out1', sum_sub_num='$out3', gpa='$out2' WHERE unique_id='$postiid' AND std_id='$studentId' AND ex_code='$exCode' ") or die($con->error);


                    echo "Marks UPDATED Successfully!";



                }




            }


        }





    }else {
        echo "Something went wrong!";
    }

}



if(isset($_POST['marks_sub_details'])){
    $sub_Code=$_POST['sub_id'];

    ?>

        
<div style="border-radius:6px; border:1px solid black" class="table-responsive bg-light text-dark">

<h6 class="text-center text-warning" id="status_exam_sub_marks_up_all_<?=$sub_Code?>" ></h6>
<table class="table w-100 m-auto table-light table-hover table-striped table-borderd border-dark all_std_tableeee_class_students_<?=$sc['id']?>" id="students_all_of_class_<?=$sc['id']?>">

<thead class="table-dark">
    <tr>
    <th><input type="checkbox" checked></th>
    <th>S:NAME:</th>
    <th class="">M.C.Q</th>
    <th class="">WRITTEN</th>
    <th>UPDATE</th>     
    <th>ID</th>
    <th>TOTAL</th>
    <th>GP</th>


    </tr>
</thead>

        
<tbody class="table-striped" id="all_studenttt">


    <?php

        $selectmm="SELECT * FROM marksheet WHERE sub_code='$sub_Code' AND unique_id='$postiid'";
        $selectm=mysqli_query($con,$selectmm);
        $smark=mysqli_num_rows($selectm);
        $im='1';

        if($smark > 0){

            while($mark = mysqli_fetch_assoc($selectm)){

                $stdIdd=$mark['std_id'];
                $sname="SELECT * FROM all_student WHERE std_id='$stdIdd'";
                $snamee=mysqli_query($con,$sname);
                $na=mysqli_fetch_assoc($snamee);

                ?>

                        <tr>
                            <td><?=$im++?></td>
                            <td><?=$na['std_name']?></td>
                            <td><input type="text" class="form-control" id="mcq_sub_marks_all_<?=$mark['id']?>" value="<?=$mark['mcq']?>"></td>
                            <td><input type="text" class="form-control" id="written_sub_marks_all_<?=$mark['id']?>" value="<?=$mark['written']?>"></td>
                            <td>
                                
                            <button class="badge btn btn-info marks_details_up_all_btn" id="<?=$mark['id']?>">SEND</button>

                            <input type="hidden" name="" id="marks_sub_code_all_<?=$mark['id']?>" value="<?=$mark['sub_code']?>">
                            <input type="hidden" name="" id="marks_std_id_all_<?=$mark['id']?>" value="<?=$mark['std_id']?>">
                            <input type="hidden" name="" id="marks_ex_code_all_<?=$mark['id']?>" value="<?=$mark['ex_code']?>">

                            </td>
                            <td><?=$mark['std_id']?></td>
                            <td><?=$mark['sub_mark']?></td>
                            <td><?=$mark['gp']?></td>

                        </tr>


                <?php

            }

        }else{
            echo "<tr><td colspan='4'><h3>Sorry! Student Not Found</h3></td></tr>";
        }

    ?>



</tbody>    
      
      
      <tfoot class="table-dark">
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </tfoot>
</table>

</div>


    <?php

}




?>