<?php

session_start();
require_once 'db.php';

$postiid = $_SESSION['unique_id'];




// student add in class

if(isset($_POST['add_student_in_class'])){

    if($_POST['std_id']!=""){
  
      $stdid =$_POST['std_id'];
      $class_code =$_POST['class_code'];
      $std="SELECT * FROM all_student WHERE id='$stdid' AND unique_id='$postiid'";
      $stu=mysqli_query($con,$std);
      $stud=mysqli_fetch_assoc($stu);
      $std_id=$stud['std_id'];
      $std_name=$stud['std_name'];
      $phone=$stud['phone'];

    $con->query("INSERT INTO student_result(unique_id, std_id, std_name, class_code, std_phone) VALUES('$postiid','$std_id','$std_name','$class_code','$phone')") or die($con->error);

      echo "Student Added Successfully!";
  
    }else{
  
      echo "Sorry, Something Went Wrong! Try Again Please!";
  
    }
  
  
}
  



if(isset($_POST['updated_class_code'])){

  if($_POST['class_id']!=""){

    $class_id =$_POST['class_id'];
    $class_cod =$_POST['class'];

    $con->query("UPDATE make_exam SET class_code='$class_cod'  WHERE id='$class_id' AND unique_id='$postiid' ") or die($con->error);

    echo "Class Code UPDATED Successfully!";


  }else{

    echo "Sorry, Something Went Wrong! Try Again Please!";

  }


}






if(isset($_POST['out_student_from_class'])){

  if($_POST['std_id']!=""){

    $stdid =$_POST['std_id'];
    $class_code =$_POST['class_code'];

    $con->query("DELETE FROM student_result WHERE id='$stdid' AND unique_id='$postiid' ") or die($con->error);

    echo "Subject Deleted Successfully!";


  }else{

    echo "Sorry, Something Went Wrong! Try Again Please!";

  }


}






if(isset($_POST['students_for_class'])){

    $class_id=$_POST['class_id'];
    $selclass="SELECT * FROM class_section WHERE id='$class_id' AND unique_id='$postiid'";
    $clas=mysqli_query($con,$selclass);
    $cl=mysqli_fetch_assoc($clas);
    $p_of_class=$cl['p_of_class'];
    $class_codee=$cl['class_code'];

    ?>

      
            <thead class="table-dark">
                <tr>
    
                <th class=""><input type="checkbox" checked></th>
                <th>SN</th>
                <th>ID</th>
                <th>STD.NAME</th>
                <th>CLASS</th>
                <th>SEC</th>
                <th>ADD+</th>
                <th>REMOVE-</th>
                <th>ROLL</th>
                <th>PHONE</th>

    
    
                </tr>
            </thead>
        
                    
            <tbody class="table-striped" id="all_studenttt">






<?php

    


 
$stdquery="SELECT * FROM all_student WHERE unique_id='".$_SESSION["unique_id"]."' AND p_of_class='$p_of_class' ";
  
$selstd=mysqli_query($con,$stdquery);

$i=1;
$ii=1;
$colora='';
$act="";
$btnc='';

if(mysqli_num_rows($selstd) > 0){


  ?>



  <?php



  while( $st=mysqli_fetch_assoc($selstd)){
    ?>
                              
                              <tr>
            
            <td class=""><input type="checkbox" name="" id="<?=$st['id']?>" data-main="<?=$st['id']?>" data-idd="<?=$i++?>"  data-std_name="<?=$st['std_name']?>" data-class="<?=$st['class']?>" data-sec="<?=$st['sec']?>" data-roll="<?=$st['roll']?>" data-phone="<?=$st['phone']?>" class="stdudent_check_box"></td>
            <td><?=$ii++?></td>
            <td><?=$st['std_id']?></td>
            <td class="std_name" id="std_name_<?=$st["id"]?>"><?=$st['std_name']?></td>
            <td class="class" id="class_<?=$st["id"]?>"><?=$st['class']?></td>
            <td class="sec" id="sec_<?=$st["id"]?>"><?=$st['sec']?></td>

            <?php

                $stddId=$st['std_id'];
                $my="SELECT * FROM student_result WHERE std_id='$stddId' AND class_code='$class_codee'";
                $myy=mysqli_query($con,$my);
                $m=mysqli_num_rows($myy);

              if($m > 0){
                $btnc="dark";
                $hi='hi';
              }else{
                $btnc="danger";
                $hi='';
              }

            ?>
                        <?php
                 if($st['active']=='0'){
                     $colora="primary";
                     $act="ON";
                 }else{
                     $colora="dark";
                     $act="OFF";
                     $hi='hi';
                 }
               
            ?>
            <td class="" ><button class="badge btn btn-<?=$btnc?> <?=$hi?>add_student_in_class" id="<?=$st['id']?>" onclick="add_std_in_class('<?=$st['id']?>')">ADD+</button><input type="hidden" name="" id="class_code_<?=$st['id']?>" value="<?=$class_codee?>"><input type="hidden" name="" id="student_id_<?=$st['id']?>" value="<?=$st['std_id']?>"></td>

            <td class="" ><button class="badge btn btn-<?=$colora?>" id="<?=$st['id']?>" onclick="remove_std_from_class('<?=$st['id']?>')" ><?=$act?></button></td>

  
            <td class="roll" id="roll_<?=$st["id"]?>"><?=$st['roll']?></td>
            <td class="phone" id="phone_<?=$st["id"]?>"><?=$st['phone']?></td>

        </tr>
    <?php
  }
  
  ?>





  <?php


}else{
  echo "<tr><td colspan='4'><h3>Sorry! Student Not Found</h3></td></tr>";
}






?>



    
            </tbody>    
        
        
        <tfoot class="table-dark">
            <tr>
            <td align="left"></span>
            </td>
            <td> &copy;MF</td>
            <td><span class="btn btn-success"></span>
            </td>
    
            <td><span class='btn btn-primary'></span></td>
            <td colspan="3" align="right"><span class='btn btn-warning text-dark'></span></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        </tfoot>





    <?php

}


if(isset($_POST['students_of_class'])){



  
  $class_id=$_POST['class_id'];
  $selclass="SELECT * FROM class_section WHERE id='$class_id' AND unique_id='$postiid'";
  $clas=mysqli_query($con,$selclass);
  $cl=mysqli_fetch_assoc($clas);
  $p_of_class=$cl['p_of_class'];
  $class_codee=$cl['class_code'];

  ?>

    
          <thead class="table-dark">
              <tr>
  
              <th class=""><input type="checkbox" checked></th>
              <th>SN</th>
              <th>ID</th>
              <th>STD.NAME</th>
              <th>EXAM</th>
              <th>TOTAL:N</th>
              <th>OUT-</th>
              <th>POINT</th>
              <th>GPA</th>
              <th>POSITION</th>
              <th>SHOW</th>

              </tr>
          </thead>
      
                  
          <tbody class="table-striped" id="all_studenttt">






<?php

  



$stdquery="SELECT * FROM student_result WHERE unique_id='".$_SESSION["unique_id"]."' AND class_code='$class_codee' ";

$selstd=mysqli_query($con,$stdquery);

$i=1;
$ii=1;
$colora='';
$act="";

if(mysqli_num_rows($selstd) > 0){


?>



<?php



while( $st=mysqli_fetch_assoc($selstd)){
  ?>
                            
                            <tr>
          
          <td class=""><input type="checkbox" name="" id="<?=$st['id']?>" data-main="<?=$st['id']?>" data-idd="<?=$i++?>"  data-std_name="<?=$st['std_name']?>" data-class="<?=$st['class']?>" data-sec="<?=$st['sec']?>" data-roll="<?=$st['roll']?>" data-phone="<?=$st['phone']?>" class="class_std_check_box"></td>
          <td ><?=$ii++?></td>
          <td><?=$st['std_id']?></td>
          <td class="std_namee" id="std_name_name_<?=$st["id"]?>"><?=$st['std_name']?></td>
          <td class="ex_codee" id="ex_code_code_<?=$st["id"]?>"><?=$st['ex_code']?></td>
          <td class="sum_sub_num" id="sum_sub_num_<?=$st["id"]?>"><?=$st['sum_sub_num']?></td>
          <!-- <td class="" ><button class="badge btn btn-danger add_student_in_class" id="<?=$st['id']?>" onclick="add_std_in_class('<?=$st['id']?>')">repo+</button></td> -->
         <?php
              //  if($st['active']=='0'){
              //      $colora="primary";
              //      $act="ON";
              //  }else{
              //      $colora="dark";
              //      $act="OFF";
              //  }
        ?>

          <td class="" ><button class="badge btn btn-danger out_student_from_class" id="<?=$st['id']?>" onclick="out_std_from_class('<?=$st['id']?>')" > OUT- </button><input type="hidden" name="" id="class_out_code_<?=$st['id']?>" value="<?=$class_codee?>"><input type="hidden" name="" id="student_out_id_<?=$st['id']?>" value="<?=$st['std_id']?>"></td>
          <td class="sum_gpa" id="sum_gp_<?=$st["id"]?>"><?=$st['sum_gp']?></td>
          <td class="gpa" id="gpa_<?=$st["id"]?>"><?=$st['gpa']?></td>
          <td class="position" id="position_<?=$st["id"]?>"><?=$st['position']?></td>
          <td class="show_result" id="show_result_<?=$st["id"]?>"><?=$st['show_result']?></td>


      </tr>
  <?php
}

?>





<?php


}else{
echo "<tr><td colspan='4'><h3>Sorry! Student Not Found</h3></td></tr>";
}






?>



  
          </tbody>    
      
      
      <tfoot class="table-dark">
          <tr>
          <td align="left"></span>
          </td>
          <td> &copy;MF </td>
          <td><span class="btn btn-success"></span>
          </td>
  
          <td><span class='btn btn-primary'></span></td>
          <td colspan="3" align="right"><span class='btn btn-warning text-dark'></span></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
      </tr>
      </tfoot>





  <?php



    
}


// student of exam



if(isset($_POST['select_exam_students'])){
  // echo "farhad foysal";

  $exam_id=$_POST['exam_id'];
  $selclass="SELECT * FROM make_exam WHERE id='$exam_id' AND unique_id='$postiid'";
  $clas=mysqli_query($con,$selclass);
  $cl=mysqli_fetch_assoc($clas);
  $class_code=$cl['class_code'];
  $exam_code=$cl['ex_code'];

  ?>

    
          <thead class="table-dark">
              <tr>
  

              <th>SN</th>
              <th><input type="checkbox" checked></th>
              <th>ID</th>
              <th>STD.NAME</th>

              <th>ADD+</th>
              <th>REMOVE-</th>
              <th>MARKS</th>

              <th>PHONE</th>

  
  
              </tr>
          </thead>
      
                  
          <tbody class="table-striped" id="all_studenttt">






<?php

  



$stdquery="SELECT * FROM student_result WHERE unique_id='".$_SESSION["unique_id"]."' AND class_code='$class_code' ";

$selstd=mysqli_query($con,$stdquery);

$i=1;
$ii=1;
$colora='danger';
$act="";
$btnc='primary';
$hi="";

if(mysqli_num_rows($selstd) > 0){


?>



<?php



while( $st=mysqli_fetch_assoc($selstd)){
  ?>
                            
                            <tr>
          

          <td><?=$ii++?></td>
          <td><input type="checkbox" name="" id="<?=$st['id']?>" data-main="<?=$st['id']?>" class="std_ex_check_box"></td>
          <td><?=$st['std_id']?></td>
          <td class="std_name" id="std_ex_name_<?=$st["id"]?>"><?=$st['std_name']?></td>


          <?php

            //   $stddId=$st['std_id'];
            //   $my="SELECT * FROM student_result WHERE std_id='$stddId' AND class_code='$class_codee'";
            //   $myy=mysqli_query($con,$my);
            //   $m=mysqli_num_rows($myy);

            // if($m > 0){
            //   $btnc="dark";
            //   $hi='hi';
            // }else{
            //   $btnc="danger";
            //   $hi='';
            // }

          ?>
          <?php

              //  if($st['active']=='0'){
              //      $colora="primary";
              //      $act="ON";
              //  }else{
              //      $colora="dark";
              //      $act="OFF";
              //      $hi='hi';
              //  }
             
          ?>
          <td class="" ><button class="badge btn btn-<?=$btnc?> add_student_in_marksheet_btn" id="<?=$st['id']?>" onclick="add_std_in_exam('<?=$st['id']?>')">ADD+</button><input type="hidden" name="" id="examm_code_<?=$st['id']?>" value="<?=$exam_code?>"><input type="hidden" name="" id="exam_class_code_<?=$st['id']?>" value="<?=$class_code?>"><input type="hidden" name="" id="exam_ID_<?=$st['id']?>" value="<?=$exam_id?>"><input type="hidden" name="" id="examm_student_id_<?=$st['id']?>" value="<?=$st['std_id']?>"></td>

          <td class="" ><button class="badge btn btn-<?=$colora?> out_student_in_marksheet_btn" id="<?=$st['id']?>" onclick="remove_std_from_exam('<?=$st['id']?>')" >Out-</button></td>
          <td class="" ><button class="badge btn btn-info student_in_marksheet_btn" id="<?=$st['id']?>" data-bs-toggle="modal" data-bs-target="#std_sub_marks_<?=$st['std_id']?>">MARKS</button>
        
        

          
<div class="modal fade" id="std_sub_marks_<?=$st['std_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
<div class="modal-content bg-light text-dark">

<!-- <h5 class="modal-title" id="staticBackdropLabel">Contact Page</h5> -->
<!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->

<div class="modal-body">

<div class="container">
<h6 style="margin:0 auto; border: 2px solid; border-radius:6px;" class="text-center border-dotted text-danger" id="status_exam_sub_marks_up_<?=$st['id']?>"></h6>
        
<div class="container-fluid" id="marks_subject_<?=$st['id']?>">



</div>

</div>

</div>
<!-- <div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
<button type="button" class="btn btn-primary">Understood</button>
</div> -->
</div>
</div>
</div>


        
        
        </td>



          <td class="phone" id="phone_ex_<?=$st["id"]?>"><?=$st['std_phone']?></td>




      </tr>
  <?php
}

?>





<?php


}else{
echo "<tr><td colspan='4'><h3>Sorry! Student Not Found</h3></td></tr>";
}






?>



  
          </tbody>    
      
      
      <tfoot class="table-dark">
          <tr>
          <td align="left"></span>
          </td>
          <td> &copy;MF</td>
          <td><span class="btn btn-success"></span>
          </td>
  
          <td><span class='btn btn-primary'></span></td>
          <td align="right"><span class='btn btn-warning text-dark'></span></td>
          <td></td>
          <td></td>
          <td></td>

      </tr>
      </tfoot>





  <?php

}







if(isset($_POST['typeMarks'])){

  if($_POST['typeMarks'] =='subMarks'){




      $examId = $_POST['ex_id'];

      $selexam = "SELECT * FROM make_exam WHERE id='$examId' AND unique_id='$postiid'";
      $selexamq=mysqli_query($con,$selexam);
      $selrow=mysqli_fetch_assoc($selexamq);
      $examCode=$selrow['ex_code'];

      $sele="SELECT * FROM std_mark_distribution WHERE ex_code='$examCode' AND unique_id='$postiid'";
      $seleq=mysqli_query($con,$sele);
      $selenumrow=mysqli_num_rows($seleq);
      
      if($selenumrow > 0){


        while($rowe=mysqli_fetch_assoc($seleq)){


          ?>

              <div class="farhadfoysal1">
                    <div class="row">
                      <div style="border: 1px dotted; border-radius:5px" class="col-md-2 text-center" data-bs-toggle="collapse" data-bs-target="#marksheet_subj<?= $rowe['id'] ?>" aria-expanded="false" aria-controls="marksheet_subj<?= $rowe['id'] ?>">
                            <button class="badge btn btn-primary mb-2 subject_marksheet_details_btn sub_marks_another<?=$rowe['sub_code']?>" id="<?= $rowe['sub_code'] ?>" ><?= $rowe['sub_name'] ?></button>
                      </div>
                      <div class="col-md-10">

                      <div class="collapse multi-collapse" id="marksheet_subj<?= $rowe['id'] ?>">
                        <div class="card card-body text-dark" id="marksheet_details<?= $rowe['sub_code'] ?>">



                        </div>
                      </div>

                      </div>
                    </div>
              </div>


          <?php

        }


      }




  }


}







// attendence ........

if(isset($_POST['students_attendence_class'])){

  $class_Id = $_POST['C_id'];
  

  $today = $_POST['today_date'];

  $classq="SELECT * FROM class_section WHERE id='$class_Id' AND unique_id='$postiid'";

  $classqr=mysqli_query($con,$classq);
  $classr=mysqli_fetch_assoc($classqr);
  $class_Code=$classr['class_code'];

  $stud_all="SELECT * FROM student_result WHERE class_code='$class_Code' AND unique_id='$postiid' ";
  $stud_a=mysqli_query($con,$stud_all);


  ?>

        <div class="container-fluid text-center">
          <div class="row">

          </div>

          <div class="row">
            
        
<div style="border-radius:6px; border:1px solid black" class="table-responsive bg-light text-dark">

<h6 class="text-center text-warning" id="status_exam_sub_marks_up_all_<?=$class_Id?>" ></h6>
<table class="table w-100 m-auto table-light table-hover table-striped table-borderd border-dark all_std_tableeee_class_students_<?=$class_Id?>" id="students_all_of_class_<?=$class_Id?>">

<thead class="table-dark">
    <tr>
    <th><input type="checkbox" checked></th>
    <th>STD:NAME</th>
    <th class="">ATTENDENCE</th>
    <th class="">STD:ID</th>
    <th>DATE</th>     
    </tr>
</thead>

        
<tbody class="table-striped" id="all_studenttt">
<?php
  if(mysqli_num_rows($stud_a) > 0){

    while($crow=mysqli_fetch_assoc($stud_a)){

          $std_a_id=$crow['std_id'];
          $att="SELECT * FROM std_attendance WHERE class_code='$class_Code' AND std_id='$std_a_id' AND date='$today'";
          $attt=mysqli_query($con,$att);
      ?>

<tr>

  <th> <input type="checkbox" name="" class="" id="<?=$crow['std_id']?>"> </th>
  <th><?=$crow['std_name']?></th>


  <th>

  <?php
      if(mysqli_num_rows($attt) > 0){

         
        if($at=mysqli_fetch_assoc($attt)){

          if($at['attendance'] == 'p'){
            $colorbg='green';
            ?>

              <button style="background-color:red" class="badge btn btn-dange absent_up_btn absent_up_bttn_<?=$crow['std_id']?>" id="<?=$crow['std_id']?>">A</button>
              <button style="background-color:green;display:none" class="badge btn btn-dange a_to_p_up_btn a_to_p_up_bttn_<?=$crow['std_id']?>" id="<?=$crow['std_id']?>">P</button>
  
            <?php

          }else{ 
            $colorbg='red';
            ?>

              <button style="background-color:green" class="badge btn btn-primar present_up_btn present_up_bttn_<?=$crow['std_id']?>" id="<?=$crow['std_id']?>">P</button>
              <button style="background-color:red;display:none" class="badge btn btn-primar p_to_a_up_btn p_to_a_up_bttn_<?=$crow['std_id']?>" id="<?=$crow['std_id']?>">A</button>

            <?php
    
          }
        }


      }else{
        $colorbg='yellow';
        ?>

    <button style="background-color:green" class="badge btn btn-primar present_btn present_bttn_<?=$crow['std_id']?>" id="<?=$crow['std_id']?>">P</button>
    <button style="background-color:red" class="badge btn btn-dange absent_btn absent_bttn_<?=$crow['std_id']?>" id="<?=$crow['std_id']?>">A</button>
    <button style="background-color:green; display:none" class="badge btn btn-dange late_btn late_bttn_<?=$crow['std_id']?>" id="<?=$crow['std_id']?>">P</button>
    <button style="background-color:red; display:none" class="badge btn btn-dange late2_btn late2_bttn_<?=$crow['std_id']?>" id="<?=$crow['std_id']?>">A</button>


        <?php
      }
  ?>

  </th>

  <th style="background-color:<?=$colorbg?>;"><?=$crow['std_id']?><span class="present_status_std" id="present_status_std<?=$crow['std_id']?>"></span></th>

  <th><button class="badge btn btn-primary" id="<?=$crow['std_id']?>"> <?=$today ?></button> <input type="hidden" name="" class="" id="class_code_att_<?=$crow['std_id']?>" value="<?=$class_Code?>"> <input type="hidden" name="" class="" id="std_name_att_<?=$crow['std_id']?>" value="<?=$crow['std_name']?>"> <input type="hidden" name="" class="" id="today_date_id<?=$crow['std_id']?>" value="<?=$today?>"> </th>

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

        </tr>
      </tfoot>
</table>

</div>

          </div>


        </div>

  <?php
    
}


if(isset($_POST['students_attendence_p'])){

  $std_id=$_POST['id'];
  $date_for_a=$_POST['date'];
  $std_classCode=$_POST['classCode'];
  $std_name=$_POST['stdName'];

  if(isset($_SESSION['unique_id'])){
    $mentor=$_SESSION['unique_id'];
  }else{
    $mentor=$_SESSION['mentor_id'];
  }
  $attend='p';

  $time='00:00:00';

  $query = "INSERT INTO std_attendance(unique_id, std_id, std_name, attendance, class_code, date, time, mentor_id) VALUES('$postiid','$std_id','$std_name','$attend','$std_classCode','$date_for_a','$time','$mentor')";

  if(mysqli_query($con,$query)){
    echo "Present submitted!".' '.$std_id;
  }


}

// absent submit

if(isset($_POST['students_attendence_a'])){

  $std_id=$_POST['id'];
  $date_for_a=$_POST['date'];
  $std_classCode=$_POST['classCode'];
  $std_name=$_POST['stdName'];

  if(isset($_SESSION['unique_id'])){
    $mentor=$_SESSION['unique_id'];
  }else{
    $mentor=$_SESSION['mentor_id'];
  }
  $attend='a';

  $time='00:00:00';

  $query = "INSERT INTO std_attendance(unique_id, std_id, std_name, attendance, class_code, date, time, mentor_id) VALUES('$postiid','$std_id','$std_name','$attend','$std_classCode','$date_for_a','$time','$mentor')";

  if(mysqli_query($con,$query)){
    echo "Absent submitted!".' '.$std_id;
  }


}



// update present btn submit

if(isset($_POST['students_attendence_late'])){

  $std_id=$_POST['id'];
  $date_for_a=$_POST['date'];
  $std_classCode=$_POST['classCode'];
  $std_name=$_POST['stdName'];

  if(isset($_SESSION['unique_id'])){
    $mentor=$_SESSION['unique_id'];
  }else{
    $mentor=$_SESSION['mentor_id'];
  }
  $attend='p';

  $time='00:00:00';

  $query = "UPDATE std_attendance SET attendance='$attend' WHERE std_id='$std_id' AND date='$date_for_a' AND class_code='$std_classCode' ";

  if(mysqli_query($con,$query)){
    echo "Update-- Present!".' '.$std_id;
  }


}


// update absent btn submit

if(isset($_POST['students_attendence_late2'])){

  $std_id=$_POST['id'];
  $date_for_a=$_POST['date'];
  $std_classCode=$_POST['classCode'];
  $std_name=$_POST['stdName'];

  if(isset($_SESSION['unique_id'])){
    $mentor=$_SESSION['unique_id'];
  }else{
    $mentor=$_SESSION['mentor_id'];
  }
  $attend='a';

  $time='00:00:00';

  $query = "UPDATE std_attendance SET attendance='$attend' WHERE std_id='$std_id' AND date='$date_for_a' AND class_code='$std_classCode' ";

  if(mysqli_query($con,$query)){
    echo "Update-- Absent!".' '.$std_id;
  }


}


// update absent up btn submit

if(isset($_POST['students_attendence_a_up'])){

  $std_id=$_POST['id'];
  $date_for_a=$_POST['date'];
  $std_classCode=$_POST['classCode'];
  $std_name=$_POST['stdName'];

  if(isset($_SESSION['unique_id'])){
    $mentor=$_SESSION['unique_id'];
  }else{
    $mentor=$_SESSION['mentor_id'];
  }
  $attend='a';

  $time='00:00:00';

  $query = "UPDATE std_attendance SET attendance='$attend' WHERE std_id='$std_id' AND date='$date_for_a' AND class_code='$std_classCode' ";

  if(mysqli_query($con,$query)){
    echo "Update-- Absent!".' '.$std_id;
  }


}

if(isset($_POST['students_attendence_a_p_up'])){

  $std_id=$_POST['id'];
  $date_for_a=$_POST['date'];
  $std_classCode=$_POST['classCode'];
  $std_name=$_POST['stdName'];

  if(isset($_SESSION['unique_id'])){
    $mentor=$_SESSION['unique_id'];
  }else{
    $mentor=$_SESSION['mentor_id'];
  }
  $attend='p';

  $time='00:00:00';

  $query = "UPDATE std_attendance SET attendance='$attend' WHERE std_id='$std_id' AND date='$date_for_a' AND class_code='$std_classCode' ";

  if(mysqli_query($con,$query)){
    echo "Update-- Present!".' '.$std_id;
  }


}


// update absent up btn submit

if(isset($_POST['students_attendence_p_up'])){

  $std_id=$_POST['id'];
  $date_for_a=$_POST['date'];
  $std_classCode=$_POST['classCode'];
  $std_name=$_POST['stdName'];

  if(isset($_SESSION['unique_id'])){
    $mentor=$_SESSION['unique_id'];
  }else{
    $mentor=$_SESSION['mentor_id'];
  }
  $attend='p';

  $time='00:00:00';

  $query = "UPDATE std_attendance SET attendance='$attend' WHERE std_id='$std_id' AND date='$date_for_a' AND class_code='$std_classCode' ";

  if(mysqli_query($con,$query)){
    echo "Update-- Present!".' '.$std_id;
  }


}

if(isset($_POST['students_attendence_p_a_up'])){

  $std_id=$_POST['id'];
  $date_for_a=$_POST['date'];
  $std_classCode=$_POST['classCode'];
  $std_name=$_POST['stdName'];

  if(isset($_SESSION['unique_id'])){
    $mentor=$_SESSION['unique_id'];
  }else{
    $mentor=$_SESSION['mentor_id'];
  }
  $attend='a';

  $time='00:00:00';

  $query = "UPDATE std_attendance SET attendance='$attend' WHERE std_id='$std_id' AND date='$date_for_a' AND class_code='$std_classCode' ";

  if(mysqli_query($con,$query)){
    echo "Update-- Absent!".' '.$std_id;
  }


}


?>