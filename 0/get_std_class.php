<?php

session_start();
require_once 'db.php';

$postiid = $_SESSION['unique_id'];




// all student select

if(isset($_POST['all_students'])){

  
  $stdquery="SELECT * FROM all_student WHERE unique_id='".$_SESSION["unique_id"]."' ";
  
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
              
              <td class=""><input type="checkbox" name="" id="<?=$st['id']?>" data-main="<?=$st['id']?>" data-idd="<?=$i++?>"  data-std_name="<?=$st['std_name']?>" data-class="<?=$st['class']?>" data-sec="<?=$st['sec']?>" data-roll="<?=$st['roll']?>" data-phone="<?=$st['phone']?>" class="std_check_box"></td>
              <td><?=$ii++?></td>
              <td><?=$st['std_id']?></td>
              <td class="std_name" id="std_name_<?=$st["id"]?>"><?=$st['std_name']?></td>
              <td class="class" id="class_<?=$st["id"]?>"><?=$st['class']?></td>
              <td class="sec" id="sec_<?=$st["id"]?>"><?=$st['sec']?></td>
              <td class="roll" id="roll_<?=$st["id"]?>"><?=$st['roll']?></td>
              <td class="phone" id="phone_<?=$st["id"]?>"><?=$st['phone']?></td>
              <td class="" ><button class="badge btn btn-danger" id="<?=$st['id']?>" onclick="del_std('<?=$st['id']?>')">DEL</button></td>
              <?php
                   if($st['active']=='0'){
                       $colora="primary";
                       $act="ON";
                   }else{
                       $colora="dark";
                       $act="OFF";
                   }
              ?>
              <td class="" ><button class="badge btn btn-<?=$colora?>" id="<?=$st['id']?>" onclick="act_std('<?=$st['id']?>')" ><?=$act?></button></td>
  
    
          </tr>
      <?php
    }
    
    ?>





    <?php


  }else{
    echo "<tr><td colspan='4'><h3>Sorry! Student Not Found</h3></td></tr>";
  }


}








  
  // all classsection select
  
  if(isset($_POST['all_sections'])){
  
    
    $allcc="SELECT * FROM class_section WHERE unique_id='".$_SESSION["unique_id"]."' ";
  
    $allc=mysqli_query($con,$allcc);
  
    $ic=1;
    $iiic=1;
  
    if(mysqli_num_rows($allc) > 0){
  
      while($sc=mysqli_fetch_assoc($allc)){
        ?>

                  

<div class="rowwhi mt-2 mb-3 ">

        <div class="hi">


                      <div class="card bg-light">

                        <div class="card-image">
                          
                        <div style="border-radius:6px; border:1px solid white" class="container content">
                          <h2><?=$sc['class_name']; ?></h2>
                          <h2><?=$sc['class_name']; ?></h2>
                        </div>                           
                        </div>

                        <div class="card-text text-center">

                          <p class="text-dark text-center mt-2"><?=$sc['class_name']; ?></p>
                        
                          <div style="border-radius:5px; color:white" class="text-light text-center p-1 bg-dark shadow-lg text-justify text-start border-top" data-bs-toggle="modal" data-bs-target="#class_student<?=$sc['id']?>"><span style="" class=""><?=$sc['class_code']; ?></span></div>

                        </div>
                        <div class="row">
                            <div class="col-4 text-center">
                                <button class="badge btn btn-info add_std_in_class_btn" id="<?=$sc['id']?>" onclick="add_std_to_class('<?=$sc['id']?>')" data-bs-toggle="modal" data-bs-target="#add_std_class<?=$sc['id']?>">ADD+</button>
                            </div>
                            <div class="col-4 text-center">
                        <button class="badge btn btn-danger students_of_classes_btn" id="<?=$sc['id']?>" onclick="std_of_class('<?=$sc['id']?>')" data-bs-toggle="modal" data-bs-target="#std_of_class<?=$sc['id']?>">STUDENTS</button>
                    </div>
                            <div class="col-4 text-center">
                                <button class="badge btn btn-warning attendence_classes_btn" id="<?=$sc['id']?>" onclick="attendence_class('<?=$sc['id']?>')" data-bs-toggle="modal" data-bs-target="#attendence_class<?=$sc['id']?>">ATTEN: <input type="date" name="" class="" id="attendence_today_date1<?=$sc['id']?>" value="<?php echo isset($doc) ? date('Y-m-d',strtotime($doc)) :date('Y-m-d') ?>" hidden> </button>
                            </div>

                        </div>


                      </div> 
                    
    

    </div>
          
</div>




<div class="modal fade" id="add_std_class<?=$sc['id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">ADD STUDENT</h5>
        <p5 style="margin-left:5px" id="status_sub_add<?=$sc['class_code']?>" class="text-danger"></p5>

       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body sub_add_form bg-secondary" >

  
              <input type="text" id="class_id<?=$sc['class_code']?>" name="examId" value="<?=$sc['id']?>" hidden>
              <input type="text" id="class_code<?=$sc['class_code']?>" name="classCode" value="<?=$sc['class_code']?>" hidden>


          <div class="container-fluid" id="studentss_all_for_class_<?=$sc['id']?>">



          

<div class="container-fluid">
    
    <div style="border-radius:6px; border:1px solid black" class="table-responsive bg-light text-dark">


    <table class="table w-100 m-auto table-light table-hover table-striped table-borderd border-dark all_std_tableee_class_students_<?=$sc['id']?>" id="students_all_for_class_<?=$sc['id']?>">
    
    
        
    </table>

    </div>
    
</div>
    





          </div>                  


      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-primary sub_add_btn1" id="<?=$sc['class_code']?>" onclick="std_add_class_btn('<?=$sc['class_code']?>')">ADD</button>
       

      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="std_of_class<?=$sc['id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">STUDENTS OF <?=$sc['class_name']?>-<?=$sc['class_code']?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="container-fluid" id="studentss_all_of_class_<?=$sc['id']?>">



        
<div class="container-fluid">
    
    <div style="border-radius:6px; border:1px solid black" class="table-responsive bg-light text-dark">


    <table class="table w-100 m-auto table-light table-hover table-striped table-borderd border-dark all_std_tableeee_class_students_<?=$sc['id']?>" id="students_all_of_class_<?=$sc['id']?>">
    
    
        
    </table>

    </div>
    
</div>
    



        </div>

      </div>

    </div>
  </div>
</div>



<div class="modal fade" id="attendence_class<?=$sc['id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        


      <div class="container-fluid text-center">
          <div class="row">
            <div class="col-8">
							<input type="date" name="doc" value="<?php echo isset($doc) ? date('Y-m-d',strtotime($doc)) :date('Y-m-d') ?>" id="attendence_today_date2<?=$sc['id']?>" class="form-control">
						</div>
            <div class="col-1">
              <button class="btn btn-secondary get_attn_sheet_btn" id="<?=$sc['id']?>">A:SHEET</button>
            </div>
          </div>
        </div>


        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="container-fluid" id="class_attendence_sheet_all_std<?=$sc['id']?>">

        </div>

      </div>

    </div>
  </div>
</div>



        <?php
      }

    }else{
      echo "<tr><td colspan='4'><h3>Sorry! Class Not Found</h3></td></tr>";
    }
  
  }
   

?>







<?php
  


// student delete

if(isset($_POST['type'])){

  if($_POST['type']=="delStd"){

    $stdid =$_POST['std_id'];
    
    $con->query("DELETE FROM all_student WHERE id='$stdid' AND unique_id='$postiid' ") or die($con->error);

    echo "Student Deleted Successfully!";

  }else if ($_POST['type']=="upStd") {
      
    
    $stdid =$_POST['std_id'];

    $select="SELECT * FROM all_student WHERE id='$stdid' AND unique_id='$postiid'";
    $selectq = mysqli_query($con,$select);

    if($r = mysqli_fetch_assoc($selectq)){


             
    $ac = $r['active'];

    if($ac == '0'){
      $con->query("UPDATE all_student SET active='1'  WHERE id='$stdid' AND unique_id='$postiid' ") or die($con->error);

      echo "Student Updated Successfully!";
    }else{
      $con->query("UPDATE all_student SET active='0'  WHERE id='$stdid' AND unique_id='$postiid' ") or die($con->error);

      echo "Student Updated Successfully!";
    }




    }


  }
  else{

    echo "Sorry, Something Went Wrong! Try Again Please!";

  }


}


?>





<?php




?>