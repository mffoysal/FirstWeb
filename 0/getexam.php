

<?php
session_start();
require_once 'db.php';

$postiid = $_SESSION['unique_id'];

// if(isset($_POST["pk"]))
// {
// 	$query = "
// 	UPDATE all_student 
// 	SET ".$_POST['name']." = '".$_POST["value"]."' 
// 	WHERE id = '".$_POST["pk"]."'
// 	";

// 	$con->query($query);

// 	echo 'done';
// }


if(isset($_POST['postaexam'])){

  if($_POST['subjectName']!=""){
    $sub_name =$_POST['subjectName'];
    $sub_marks =$_POST['marks'];
    $sub_mcq =$_POST['mcq'];
    $sub_5l =$_POST['fivel'];
    $sub_5h =$_POST['fiveh'];
    $sub_4l =$_POST['fourl'];
    $sub_4h =$_POST['fourh'];
    $sub_3_5l =$_POST['threehalfl'];
    $sub_3_5h =$_POST['threehalfh'];
    $sub_3l =$_POST['threel'];
    $sub_3h =$_POST['threeh'];
    $sub_2l =$_POST['twol'];
    $sub_2h =$_POST['twoh'];
    $sub_1l =$_POST['onel'];
    $sub_1h =$_POST['oneh'];
    $sub_examId =$_POST['ex_id'];
    $sub_examCode =$_POST['ex_code'];

    
    $unique = strtoupper(bin2hex(random_bytes(3)));
    $ran_id = rand(time(), 100000000);

    $subCode = $sub_examId.''.$sub_examCode.'S'.$unique.''.$ran_id;
    

    $con->query("INSERT INTO std_mark_distribution(unique_id, marks, mcq, ex_code, sub_code, sub_name, 5h, 5l, 4h, 4l, 3_5h, 3_5l, 3h, 3l, 2h, 2l, 1h, 1l) VALUES('$postiid','$sub_marks','$sub_mcq','$sub_examCode','$subCode', '$sub_name', '$sub_5h', '$sub_5l', '$sub_4h', '$sub_4l', '$sub_3_5h', '$sub_3_5l', '$sub_3h', '$sub_3l', '$sub_2h', '$sub_2l', '$sub_1h', '$sub_1l')") or die($con->error);

    echo "Subject Added Successfully!";

  }else{

    echo "Sorry, Something Went Wrong! Try Again Please!";

  }


}

// subject update

if(isset($_POST['update_sub'])){

  if($_POST['postt_id']!=""){

    $subjid =$_POST['postt_id'];
    $sub_marks =$_POST['marks'];
    $sub_mcq =$_POST['mcq'];
    $sub_5l =$_POST['fivel'];
    $sub_5h =$_POST['fiveh'];
    $sub_4l =$_POST['fourl'];
    $sub_4h =$_POST['fourh'];
    $sub_3_5l =$_POST['threehalfl'];
    $sub_3_5h =$_POST['threehalfh'];
    $sub_3l =$_POST['threel'];
    $sub_3h =$_POST['threeh'];
    $sub_2l =$_POST['twol'];
    $sub_2h =$_POST['twoh'];
    $sub_1l =$_POST['onel'];
    $sub_1h =$_POST['oneh'];
    $sub_examId =$_POST['ex_id'];
    $sub_examCode =$_POST['ex_code'];

    
    // $unique = strtoupper(bin2hex(random_bytes(3)));
    // $ran_id = rand(time(), 100000000);

    // $subCode = $sub_examId.''.$sub_examCode.'S'.$unique.''.$ran_id;
    
    $con->query("UPDATE std_mark_distribution SET marks='$sub_marks', mcq='$sub_mcq', 5h='$sub_5h', 5l='$sub_5l', 4h='$sub_4h', 4l='$sub_4l', 3_5h='$sub_3_5h', 3_5l='$sub_3_5l', 3h='$sub_3h', 3l='$sub_3l', 2h='$sub_2h', 2l='$sub_2l', 1h='$sub_1h', 1l='$sub_1l' WHERE id='$subjid' AND unique_id='$postiid' AND ex_code='$sub_examCode' ") or die($con->error);

    echo "Subject Updated Successfully!";

  }else{

    echo "Sorry, Something Went Wrong! Try Again Please!";

  }


}

// subject delete

if(isset($_POST['delete_sub'])){

  if($_POST['posttt_id']!=""){

    $subjid =$_POST['posttt_id'];

    $sub_examId =$_POST['ex_id'];
    $sub_examCode =$_POST['ex_code'];

    
    // $unique = strtoupper(bin2hex(random_bytes(3)));
    // $ran_id = rand(time(), 100000000);

    // $subCode = $sub_examId.''.$sub_examCode.'S'.$unique.''.$ran_id;
    
    $con->query("DELETE FROM std_mark_distribution WHERE id='$subjid' AND unique_id='$postiid' AND ex_code='$sub_examCode' ") or die($con->error);

    echo "Subject Deleted Successfully!";

  }else{

    echo "Sorry, Something Went Wrong! Try Again Please!";

  }


}


// make exam insert

if(isset($_POST['type'])){
  if($_POST['type'] == 'addSub'){
    $examid=$_POST['ex_id'];

    $exs="SELECT * FROM make_exam WHERE unique_id='".$_SESSION["unique_id"]."' AND id='$examid' ";

    $exss=mysqli_query($con,$exs);
    $ex=mysqli_fetch_assoc($exss);

      $examcode=$ex['ex_code'];
    // echo "hey Add your Subject".$_POST['ex_id'];   


$select = "SELECT * FROM std_mark_distribution WHERE unique_id='$postiid' AND ex_code='$examcode'";
$query = mysqli_query($con, $select);

if(mysqli_num_rows($query) > 0){

    $im="SELECT * FROM users WHERE unique_id='".$_SESSION["unique_id"]."'";

    $imgs=mysqli_query($con,$im);
    $img=mysqli_fetch_assoc($imgs);

    while($datarow=mysqli_fetch_assoc($query)){
        ?>


<div class="rowwhi mt-2 mb-3 ">

<div class="hi">


              <div class="card bg-secondary text-dark">

                <div class="card-image">
                  <?php

                  ?>
                  
                <div class="card-text bg-primary">

<h6 class="text-dark  text-center sub_name" id="sub_name_<?=$datarow['id']?>" data-type="text" data-pk="<?=$datarow['id']?>" data-url="getexam.php" data-name="sub_name"><?=$datarow['sub_name']?></h6>

<div style="border-radius:5px; color:white" class="text-light text-center p-1 bg-dark shadow-lg text-justify text-start border-top" data-bs-toggle="modal" data-bs-target="#exampost<?=$datarow['id']?>"><span style="" class=""><?=$datarow['ex_code']; ?></span></div>

</div>
<hr>


                  <div class="row">
                  <input type="text" id="ex_id_<?=$datarow['id']?>" name="examId" value="<?=$datarow['id']?>" hidden>
              <input type="text" id="ex_code_<?=$datarow['id']?>" name="examCode" value="<?=$datarow['ex_code']?>" hidden>

                    <div class="col-md-6">
                          
                            <div class="">

                              <div class="row">
                                <div class="col-3">
                                  <button class="btn btn-warning">GP:5</button>
                                </div>
                                <div class="col-4">
                                  <input type="phone" class="form-control 5l"  placeholder="80" value="<?=$datarow['5l']?>" id="5l_<?=$datarow['id']?>" data-type="text" data-pk = "<?=$datarow['id']?>" data-url="getexam.php" data-name="5l">
                                </div>

                                <div class="col-4">
                                  <input type="phone" class="form-control 5h" id="5h_<?=$datarow['id']?>" data-type="text" data-pk = "<?=$datarow['id']?>" data-url="getexam.php" data-name="5h" placeholder="100" value="<?=$datarow['5h']?>">
                                </div>
                              </div>
                              <hr>

                              <div class="row">
                                <div class="col-3">
                                  <button class="btn btn-info">GP:4</button>
                                </div>
                                <div class="col-4">
                                  <input type="phone" class="form-control 4l" id="4l_<?=$datarow['id']?>" data-type="text" data-pk = "<?=$datarow['id']?>" data-url="getexam.php" data-name="4l" placeholder="70" value="<?=$datarow['4l']?>">
                                </div>

                                <div class="col-4">
                                  <input type="phone" class="form-control 4h" id="4h_<?=$datarow['id']?>" data-type="text" data-pk = "<?=$datarow['id']?>" data-url="getexam.php" data-name="4h" placeholder="79" value="<?=$datarow['4h']?>">
                                </div>
                              </div>
                              <hr>

                              <div class="row">
                                <div class="col-3">
                                  <button class="btn btn-primary">GP:3.5</button>
                                </div>
                                <div class="col-4">
                                  <input type="phone" class="form-control 3_5l" id="3_5l_<?=$datarow['id']?>" data-type="text" data-pk = "<?=$datarow['id']?>" data-url="getexam.php" data-name="3_5l" placeholder="60" value="<?=$datarow['3_5l']?>">
                                </div>

                                <div class="col-4">
                                  <input type="phone" class="form-control 3_5h" id="3_5h_<?=$datarow['id']?>" data-type="text" data-pk = "<?=$datarow['id']?>" data-url="getexam.php" data-name="3_5h" placeholder="69" value="<?=$datarow['3_5h']?>">
                                </div>
                              </div>
                              <hr>

                            </div>
                          
                    </div>

                    
                    <div class="col-md-6">
                          
                            <div class="">

                              <div class="row">
                                <div class="col-3">
                                  <button class="btn btn-dark">GP:3</button>
                                </div>
                                <div class="col-4">
                                  <input type="phone" class="form-control 3l" id="3l_<?=$datarow['id']?>" data-type="text" data-pk = "<?=$datarow['id']?>" data-url="getexam.php" data-name="3l" placeholder="50" value="<?=$datarow['3l']?>">
                                </div>

                                <div class="col-4">
                                  <input type="phone" class="form-control 3h" id="3h_<?=$datarow['id']?>" data-type="text" data-pk = "<?=$datarow['id']?>" data-url="getexam.php" data-name="3h" placeholder="59" value="<?=$datarow['3h']?>">
                                </div>
                              </div>
                              <hr>

                              <div class="row">
                                <div class="col-3">
                                  <button class="btn btn-primary">GP:2</button>
                                </div>
                                <div class="col-4">
                                  <input type="phone" class="form-control 2l" id="2l_<?=$datarow['id']?>" data-type="text" data-pk = "<?=$datarow['id']?>" data-url="getexam.php" data-name="2l" placeholder="40" value="<?=$datarow['2l']?>">
                                </div>

                                <div class="col-4">
                                  <input type="phone" class="form-control 2h" id="2h_<?=$datarow['id']?>" data-type="text" data-pk = "<?=$datarow['id']?>" data-url="getexam.php" data-name="2h" placeholder="49" value="<?=$datarow['2h']?>">
                                </div>
                              </div>
                              <hr>

                              <div class="row">
                                <div class="col-3">
                                  <button class="btn btn-danger">GP:1</button>
                                </div>
                                <div class="col-4">
                                  <input type="phone" class="form-control 1l" id="1l_<?=$datarow['id']?>" data-type="text" data-pk = "<?=$datarow['id']?>" data-url="getexam.php" data-name="1l" placeholder="33" value="<?=$datarow['1l']?>">
                                </div>

                                <div class="col-4">
                                  <input type="phone" class="form-control 1h" id="1h_<?=$datarow['id']?>" data-type="text" data-pk = "<?=$datarow['id']?>" data-url="getexam.php" data-name="1h" placeholder="39" value="<?=$datarow['1h']?>">
                                </div>
                              </div>
                              <hr>

                            </div>
                          
                    </div>

                                  

                  </div>
                    
                </div>
                <div class="row">
                      <div class="col-md-6">
                      <div class="row">
                          <div class="col-3">
                            <label for="" class="text-warning">Marks:</label>
                          </div>
                          <div class="col-9">
                        <input type="phone" class="form-control marks" id="marks_<?=$datarow['id']?>" data-type="text" data-pk = "<?=$datarow['id']?>" data-url="getexam.php" data-name="marks" placeholder="<?=$datarow['marks']?>" value="<?=$datarow['marks']?>">
                          </div>
                        </div>
                        <hr>
                      </div>
                     
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-3">
                            <label for="" class="text-warning">MCQ:</label>
                          </div>
                          <div class="col-9">
                          <input type="phone" class="form-control mcq" id="mcq_<?=$datarow['id']?>" data-type="text" data-pk = "<?=$datarow['id']?>" data-url="getexam.php" data-name="mcq" placeholder="30" value="<?=$datarow['mcq']?>"> 
                          </div>
                        </div>
                        <hr>
                      
                      </div>
                      
                  </div>

                <div class="row">
                    <div class="col-6 text-center">
                        <button class="badge btn btn-dark" id="<?=$datarow['id']?>" onclick="update_sub('<?=$datarow['id']?>')" data-bs-toggle="modal" data-bs-target="#update_sub<?=$datarow['id']?>">UPDATE</button>
                    </div>
                    <div class="col-6 text-center">
                        <button class="badge btn btn-dark" id="<?=$datarow['id']?>" onclick="delete_sub('<?=$datarow['id']?>')" data-bs-toggle="modal" data-bs-target="#delete_sub<?=$datarow['id']?>">DELETE</button>
                    </div>
                </div>


              </div> 
            


</div>
  
</div>



<!-- Modal -->
<div class="modal fade" id="update_sub<?=$datarow['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
<div class="modal-content bg-light text-dark">
<div class="modal-header">
<!-- <h5 class="modal-title" id="staticBackdropLabel">Update Sub Marks And GP</h5> -->
<!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
</div>
<div class="modal-body">

<div class="container-fluid" id="up_subject<?=$datarow['id']?>">

      <div class="container">
      <h6 style="margin:0 auto; border: 2px solid; border-radius:6px;" class="text-center border-dotted text-warning" id="status_sub_update_<?=$datarow['id']?>"></h6>
        <h5 style="margin:0 auto; border: 2px solid; border-radius:6px;" class="text-center border-dotted text-warning bg-info">Please, নিচের আপডেট বাটনে ক্লিক করে নিশ্চিত করুন</h5>
        <button style="margin:0 auto; border: 2px solid; border-radius:6px;" class="btn btn-warning text-center subject_marks_update_btn" id="<?=$datarow['id']?>">Update</button>
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

<div class="modal fade" id="delete_sub<?=$datarow['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
<div class="modal-content bg-light text-dark">
<div class="modal-header">
<!-- <h5 class="modal-title" id="staticBackdropLabel">Contact Page</h5> -->
<!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
</div>
<div class="modal-body">

<div class="container-fluid" id="de_subject<?=$datarow['id']?>">

<div class="container">
<h6 style="margin:0 auto; border: 2px solid; border-radius:6px;" class="text-center border-dotted text-danger" id="status_sub_delete_<?=$datarow['id']?>"></h6>
        <h5 style="margin:0 auto; border: 2px solid; border-radius:6px;" class="text-center border-dotted text-danger bg-info">Please, নিচের ডিলেট বাটনে ক্লিক করে নিশ্চিত করুন </h5>
        <button style="margin:0 auto; border: 2px solid; border-radius:6px;" class="btn btn-danger text-center subject_marks_delete_btn" id="<?=$datarow['id']?>">Delete</button>
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


<!-- Modal -->




        <?php
    }
  

}
else{
    

    echo "<tr><td colspan='4'><h1>Sorry Subject Not Found</h1></td></tr>";


}


  
  }
  
}

// exam post start



if(isset($_POST['ex_p'])){




        $select = "SELECT * FROM make_exam WHERE unique_id=$postiid";
        $query = mysqli_query($con, $select);
        
        if(mysqli_num_rows($query) > 0){

            $im="SELECT * FROM users WHERE unique_id='".$_SESSION["unique_id"]."'";
    
            $imgs=mysqli_query($con,$im);
            $img=mysqli_fetch_assoc($imgs);

            while($datarow=mysqli_fetch_assoc($query)){
                ?>


<div class="rowwhi mt-2 mb-3 ">

        <div class="hi">


                      <div class="card bg-light">

                        <div class="card-image">
                          
                        <div style="border-radius:6px; border:1px solid white" class="container content">
                          <h2><?=$datarow['ex_name']; ?></h2>
                          <h2><?=$datarow['ex_name']; ?></h2>
                        </div>                           
                        </div>

                        <div class="card-text text-center">

                          <p class="text-dark text-center mt-2"><?=$datarow['ex_name']; ?></p>
                          <code class="date text-center"><?=$datarow['ex_date']; ?></code>

                          <div style="border-radius:5px; color:white" class="text-light text-center p-1 bg-dark shadow-lg text-justify text-start border-top" data-bs-toggle="modal" data-bs-target="#exampost<?=$datarow['id']?>"><span style="" class=""><?=$datarow['ex_code']; ?></span></div>

                        </div>
                        <div class="row">
                            <div class="col-4 text-center">
                                <button class="badge btn btn-info" id="<?=$datarow['id']?>" onclick="add_sub('<?=$datarow['id']?>')" data-bs-toggle="modal" data-bs-target="#addsub<?=$datarow['id']?>">SUBJECT</button>
                            </div>
                            <div class="col-4 text-center">
                                <button class="badge btn btn-danger" id="<?=$datarow['id']?>" onclick="add_stuuu('<?=$datarow['id']?>')" data-bs-toggle="modal" data-bs-target="#subject<?=$datarow['id']?>">AddSUB</button>
                            </div>
                            <div class="col-4 text-center">
                                <button class="badge btn btn-warning students_of_this_exam_btn" id="<?=$datarow['id']?>" onclick="add_stu('<?=$datarow['id']?>')" data-bs-toggle="modal" data-bs-target="#exampost<?=$datarow['id']?>">STUDENT</button>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-4 text-center">
                                <button class="badge btn btn-info" id="<?=$datarow['id']?>" onclick="class_update('<?=$datarow['id']?>')" data-bs-toggle="modal" data-bs-target="#update_class_ex<?=$datarow['id']?>">CLASS</button>
                            </div>
                            <div class="col-4 text-center">
                                <button class="badge btn btn-danger" id="<?=$datarow['id']?>" onclick="std_result_marksheet('<?=$datarow['id']?>')" data-bs-toggle="modal" data-bs-target="#std_result<?=$datarow['id']?>">MARKS</button>
                            </div>
                            <div class="col-4 text-center">
                                <button class="badge btn btn-warning" id="<?=$datarow['id']?>" onclick="delte_exam('<?=$datarow['id']?>')" data-bs-toggle="modal" data-bs-target="#delete_exam<?=$datarow['id']?>">DELETE</button>
                            </div>

                        </div>


                      </div> 
                    
    

    </div>
          
</div>



<!-- Modal -->
<div class="modal fade" id="subject<?=$datarow['id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">ADD SUBJECT</h5>
        <p5 style="margin-left:5px" id="status_sub_add<?=$datarow['ex_code']?>" class="text-danger"></p5>

       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body sub_add_form bg-secondary" >

          <form action=""  id="sub_add_form<?$datarow['id']?>">

          <div class="container-fluid" id="subject<?=$datarow['id']?>">

<div class="card-image">
          <?php

              
          ?>
          <div class="row">
              <div class="col">
              <div class="row">
                  <div class="">

                    <label for="">Subject Name :</label>
                  </div>
                  <div class="">
                <input type="text" class="form-control sub_name" id="subject_name<?=$datarow['ex_code']?>" name="subject_name" placeholder="ADD Subject Name" required> 
                  </div>
                </div>
                <hr>
              </div>
              
              <input type="text" id="ex_id<?=$datarow['ex_code']?>" name="examId" value="<?=$datarow['id']?>" hidden>
              <input type="text" id="ex_code<?=$datarow['ex_code']?>" name="examCode" value="<?=$datarow['ex_code']?>" hidden>
                            
          </div>



          <div class="row">

            <div class="col-md-6">
                  
                    <div class="">

                      <div class="row">
                        <div class="col-3">
                          <button class="btn btn-warning">GP:5</button>
                        </div>
                        <div class="col-4">
                          <input type="phone" class="form-control text-danger" id="5l<?=$datarow['ex_code']?>" name="5l" placeholder="80" value="80">
                        </div>

                        <div class="col-4">
                          <input type="phone" class="form-control text-warning" id="5h<?=$datarow['ex_code']?>" name="5h" placeholder="100" value="100">
                        </div>
                      </div>
                      <hr>

                      <div class="row">
                        <div class="col-3">
                          <button class="btn btn-info">GP:4</button>
                        </div>
                        <div class="col-4">
                          <input type="phone" class="form-control text-danger" id="4l<?=$datarow['ex_code']?>" name="4l" placeholder="70" value="70">
                        </div>

                        <div class="col-4">
                          <input type="phone" class="form-control text-warning" id="4h<?=$datarow['ex_code']?>" name="4h" placeholder="79" value="79">
                        </div>
                      </div>
                      <hr>

                      <div class="row">
                        <div class="col-3">
                          <button class="btn btn-dark">GP:3.5</button>
                        </div>
                        <div class="col-4">
                          <input type="phone" class="form-control text-danger" id="3_5l<?=$datarow['ex_code']?>" name="3_5l" placeholder="60" value="60">
                        </div>

                        <div class="col-4">
                          <input type="phone" class="form-control text-warning" id="3_5h<?=$datarow['ex_code']?>" name="3_5h" placeholder="69" value="69">
                        </div>
                      </div>
                      <hr>

                    </div>
                  
            </div>

            
            <div class="col-md-6">
                  
                    <div class="">

                      <div class="row">
                        <div class="col-3">
                          <button class="btn btn-primary">GP:3</button>
                        </div>
                        <div class="col-4">
                          <input type="phone" class="form-control text-danger" id="3l<?=$datarow['ex_code']?>" name="3l" placeholder="50" value="50">
                        </div>

                        <div class="col-4">
                          <input type="phone" class="form-control text-warning" id="3h<?=$datarow['ex_code']?>" name="3h" placeholder="59" value="59">
                        </div>
                      </div>
                      <hr>

                      <div class="row">
                        <div class="col-3">
                          <button class="btn btn-dark">GP:2</button>
                        </div>
                        <div class="col-4">
                          <input type="phone" class="form-control text-danger" id="2l<?=$datarow['ex_code']?>" name="2l" placeholder="40" value="40">
                        </div>

                        <div class="col-4">
                          <input type="phone" class="form-control text-warning" id="2h<?=$datarow['ex_code']?>" name="2h" placeholder="49" value="49">
                        </div>
                      </div>
                      <hr>

                      <div class="row">
                        <div class="col-3">
                          <button class="btn btn-danger">GP:1</button>
                        </div>
                        <div class="col-4">
                          <input type="phone" class="form-control text-danger" id="1l<?=$datarow['ex_code']?>" name="1l" placeholder="33" value="33">
                        </div>

                        <div class="col-4">
                          <input type="phone" class="form-control text-warning" id="1h<?=$datarow['ex_code']?>" name="1h" placeholder="39" value="39">
                        </div>
                      </div>
                      <hr>

                    </div>
                  
            </div>

            <div class="row">
              <div class="col-md-6">
              <div class="row">
                  <div class="col-3">
                    <label for="">Marks:</label>
                  </div>
                  <div class="col-9">
                <input type="phone" class="form-control text-info" id="marks<?=$datarow['ex_code']?>" name="total_marks" placeholder="100" value="100">
                  </div>
                </div>
                <hr>
              </div>
             
              <div class="col-md-6">
                <div class="row">
                  <div class="col-3">
                      <label for="">MCQ:</label>
                  </div>
                  <div class="col-9">
                  <input type="phone" class="form-control" id="mcq<?=$datarow['ex_code']?>" name="mcq" placeholder="30"> 
                  </div>
                </div>
                <hr>
              
              </div>
              


          </div>


          </div>
            
        </div>


</div>
          </form>

      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
        <button type="button" class="btn btn-primary sub_add_btn1" id="<?=$datarow['ex_code']?>" onclick="sub_add_btn('<?=$datarow['ex_code']?>')">ADD</button>
       

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="addsub<?=$datarow['id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Subejcts of <?=$datarow['ex_name']?>-<?=$datarow['ex_code']?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="container-fluid" id="addsubject1<?=$datarow['id']?>">

        </div>

      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div> -->
    </div>
  </div>
</div>

<div class="modal fade" id="exampost<?=$datarow['id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">STUDENTS</h5>
        <h5 class="text-center text-warning" id="student_status_marksheet_<?=$datarow['ex_code']?>"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="container-fluid" id="addstudent1<?=$datarow['id']?>">

                
<div class="container-fluid">

    
    <div style="border-radius:6px; border:1px solid black" class="table-responsive bg-light text-dark">


    <table class="table w-100 m-auto table-light table-hover table-striped table-borderd border-dark all_students_of_this_exam_<?=$datarow['id']?>" id="all_students_of_this_exam<?=$datarow['id']?>">
    
    
        
    </table>

    </div>
    
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



<!-- Modal -->


<div class="modal fade" id="update_class_ex<?=$datarow['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
<div class="modal-content bg-light text-dark">
<div class="modal-header">
<!-- <h5 class="modal-title" id="staticBackdropLabel">Contact Page</h5> -->
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">

<div class="container-fluid" id="de_subject<?=$datarow['id']?>">

<div class="container">
<h6 style="margin:0 auto; border: 2px solid; border-radius:6px;" class="text-center border-dotted text-danger" id="status_class_update_<?=$datarow['id']?>"></h6>
                
                <div class="container">
                  <hr>
                  <div class="form-floating">
                        <input type="text" class="form-control" id="exam_class_code_updated_<?=$datarow['id']?>" >
                        <label for="" class="text-danger">INPUT A CLASS CODE</label>
                  </div>
                  <hr>
                  <div class="row text-center">
                    <div class="col">
                    <button type="button" class="badge btn btn-dark" data-bs-dismiss="modal">Close</button>
                    </div>
                    <div class="col">
                      <button type="button" class="badge btn btn-warning exam_class_code_update_btn" id="<?=$datarow['id']?>">UPDATE</button>
                    </div>
                  </div>
                </div>



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






<div class="modal fade" id="std_result<?=$datarow['id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Marksheet - <?=$datarow['ex_name']?>-<?=$datarow['ex_code']?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="container-fluid" id="exam_marksheet_main<?=$datarow['id']?>">

        </div>

      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div> -->
    </div>
  </div>
</div>









<div class="modal fade" id="delete_exam<?=$datarow['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
<div class="modal-content bg-light text-dark">
<div class="modal-header">
<!-- <h5 class="modal-title" id="staticBackdropLabel">Contact Page</h5> -->
<!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
</div>
<div class="modal-body">

<div class="container-fluid" id="de_subject<?=$datarow['id']?>">

<div class="container">
<h6 style="margin:0 auto; border: 2px solid; border-radius:6px;" class="text-center border-dotted text-danger" id="status_exam_delete_<?=$datarow['id']?>"></h6>
        
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








            <?php
            }
          

        }
        else{
            

            echo "<tr><td colspan='4'><h1>Sorry Exam Not Found</h1></td></tr>";


        }

}        




// student update

if(isset($_POST['hidden_id']))
{
  $name =$_POST['std_name'];
  $classs =$_POST['class'];
  $secc =$_POST['sec'];
  $rolll =$_POST['roll'];
  $phonese =$_POST['phone'];

 $id = $_POST['hidden_id'];

 for($count = 0; $count < count($id); $count++)
 {

  $std_name   = mysqli_real_escape_string($con, $name[$count]);
   $class  = mysqli_real_escape_string($con, $classs[$count]);
   $sec  = mysqli_real_escape_string($con, $secc[$count]);
   $roll = mysqli_real_escape_string($con, $rolll[$count]);
   $phones   = mysqli_real_escape_string($con, $phonese[$count]);
   $stdid   = mysqli_real_escape_string($con, $id[$count]);
  
   if($stdid != ''){
    $query = "UPDATE all_student SET std_name='$std_name', class='$class', sec='$sec', roll='$roll', phone='$phones' WHERE id='$stdid' AND unique_id='$postiid' ";

   }
   if($query != ''){

    if(mysqli_multi_query($con,$query)){
      echo "";
    }else {
      echo "Error";
    }

 }else {
   echo "Sorry!";
 }

 }

}




?>





  


