<?php
  session_start();


  $s="";
  if(isset($_REQUEST['success'])){
    $s=$_REQUEST['success'];
  }


 
  include('../db.php');
      // $search="BREAKFAT";
      if(isset($_REQUEST['search'])){
          $search = $_REQUEST['search'];
          // $search = preg_replace("#[^0-9a-z]#i","",$search);
         
      }


if(isset($_SESSION['unique_id'])){
  $muniq=$_SESSION['unique_id'];
  $mess="SELECT * FROM users WHERE unique_id='$muniq'";
  $messr=mysqli_query($con,$mess);
  $messrow=mysqli_fetch_assoc($messr);

  if($messrow['mess_id']!=''){
    $_SESSION['mess_id']=$messrow['mess_id'];
  }
  
}
     

  ?>
  
  
  
  <?php
  $per_page=12;
  $start=0;
  $current_page=1;
  if(isset($_GET['start'])){
      $start=$_GET['start'];
      if($start<=0){
          $start=0;
          $current_page=1;
      }else{
          $current_page=$start;
          $start--;
          $start=$start*$per_page;
      }
  }

$qq = "SELECT * FROM mess WHERE mess_id!='' ";
$record=mysqli_num_rows(mysqli_query($con,$qq));
  
  $pagi=ceil($record/$per_page);
  
  function user(){
      
          $per_page=12;
          $start=0;
          if(isset($_GET['start'])){
              $start=$_GET['start'];
      if($start<=0){
          $start=0;
          $current_page=1;
      }else{
          $current_page=$start;
          $start--;
          $start=$start*$per_page;
      }
          }

  
  include('../db.php');
      
  $qq = "SELECT * FROM mess WHERE mess_id!='' ";
  $record=mysqli_num_rows(mysqli_query($con,$qq));
    
    $pagi=ceil($record/$per_page);
  
          if(isset($_POST['search'])){
              $searchkey = $_POST['search'];
          }
          if(!empty($searchkey)){    
              $query = "SELECT * FROM mess WHERE name LIKE '%$searchkey%' OR mess_name LIKE '%$searchkey%' OR tutor_id LIKE '%$searchkey%' OR mess_id LIKE '%$searchkey%' limit $start, $per_page";
  
          }
          else{
              // if(){
  
              // }else{
                  
              // }
              $query = "SELECT * FROM mess WHERE mess_id!='' limit $start, $per_page";
              $searchkey = "";
          }
      
      $result=mysqli_query($con,$query);
      $num=mysqli_num_rows($result);
  
      
      
      
      if($num == 0){
                 
          echo '<script>location.replace("error.php")</script>';  
          
      }
      else{
          return $result;
      }
  
  
  }






?>
<?php
include('../db.php');

            
?>
<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>User List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../icon/bootstrap-icons.css">
    <!-- <link rel="stylesheet" href="stylesta.css"> -->
    <script src="../ck/ckeditor.js"></script>
    <!-- <script src="f/admin/ckeditor/ckeditor.js"></script> -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="bootstrap.min.css">

    <script src="//cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
    <script src="../jquery-3.5.1.min.js"></script>

    <link rel="stylesheet" href="../bootstrap.min.css">
    <!-- <script src="bootstrap.budle.js"></script> -->
    <style>
      *{
  padding: 0;
  margin: 0;
  text-decoration: none;
  list-style: none;
  box-sizing: border-box;
}
/* body{
  font-family: montserrat;
} */
.nav1{
  /* background: #0082e6; */
  background-color: #ffe53b;
   background-image: linear-gradient(147deg, #ffe53b 0%, #fd3838 74%);
  height: 80px;
  width: 100%;
}
label.logo{
  color: white;
  font-size: 35px;
  line-height: 80px;
  padding: 0 100px;
  font-weight: bold;
}
.nav1 ul{
  float: right;
  margin-right: 20px;
}
.nav1 ul li{
  display: inline-block;
  line-height: 80px;
  margin: 0 5px;
}
.nav1 ul li a{
  color: white;
  font-size: 17px;
  padding: 7px 13px;
  border-radius: 3px;
  text-decoration:none;
  text-transform: uppercase;
}
a.active,a:hover{
  background: #1b9bff;
  transition: .5s;
}
.checkbtn{
  font-size: 30px;
  color: white;
  float: right;
  line-height: 80px;
  margin-right: 40px;
  cursor: pointer;
  display: none;
}
#check{
  display: none;
}
@media (max-width: 952px){
  label.logo{
    font-size: 30px;
    padding: 0 0px;
    margin-left: 10px;
  }
  .nav1 ul li a{
    font-size: 16px;
  }
}
@media (max-width: 858px){
  .checkbtn{
    display: block;
  }
  .nav1 ul{
    position: fixed;
    width: 100%;
    height: 100vh;
    /* background: #2c3e50; */
    background-color: #ffe53b;
   background-image: linear-gradient(147deg, #ffe53b 0%, #fd3838 74%);
    top: 80px;
    left: -100%;
    text-align: center;
    transition: all .5s;
  }
  .nav1 ul li{
    display: block;
    margin: 50px 0;
    line-height: 30px;
  }
  .nav1 ul li a{
    font-size: 20px;
  }
  a:hover,a.active{
    background: none;
    color: #0082e6;
  }
  #check:checked ~ ul{
    left: 0;
  }
}
/* section{
  background: url(bg1.jpg) no-repeat;
  background-size: cover;
  height: calc(100vh - 80px);
} */



.notifi-item {
	display: flex;
	border-bottom: 1px solid #eee;
  border-radius: 10% ;
	padding: 15px 5px;
	margin-bottom: 15px;
	cursor: pointer;
  background-color: black;
  margin-top:5px;
  height:170px;

}
.notifi-item:hover {
	background-color: #eee;
}
.notifi-item img {
	display: block;
	width: 100px;
  /* height:100px; */
  /* margin:0 auto; */
  margin-right: 10px;

	border-radius: 50%;
}
.notifi-item .text h4 {
	color: #777;
	font-size: 16px;
	margin-top: 10px;
}
.notifi-item .text p {
	color: #aaa;
	font-size: 12px;
}
#seab{
        display:none;
        background: linear-gradient(to right, hsl(200, 100%, 50%), hsl(175, 100%, 50%));
        }
        #sea:hover #seab{
            display:inline;
        }  

        .msg{
        background: cyan;
        position: fixed;
        bottom: 5%;
        left:10px;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size:32px;
        color:#1f1f1f;
        opacity:1;
        transition:all 0.5s;
        /* transition:all 10s; */
        animation-name: mff;
        animation-duration: 10s;
        animation-fill-mode: forwards;
        animation-iteration-count: infinite;
    }
    #msg:hover{
        bottom:60px;
        pointer-events:auto;
        color: yellow;
        background-color: red;
        transform: rotate(-360deg);
        opacity: 0.8;

    }



    </style>
  </head>
  <body class="bg-light">
    
<!-- nav -->
<nav class="nav1">
      <input type="checkbox" id="check">
      <label style="margin-right:8px" for="check" class="checkbtn">
        <i class="bi bi-list"></i>
      </label>
      <label style="margin-left:-10px" class="logo">
      <span style="margin-right:-15px" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#allsetting" aria-controls="allsetting" aria-expanded="false" aria-label="Toggle navigation">
                          <img style="border-radius:50%; margin-top:-15px" src="<?php 
                          if(isset($_SESSION['img'])){
                            echo "../image/".$_SESSION['img'];
                          }else{
                            echo "img/avatar3.png";
                          }
                          ?>" width="50px" height="50px" alt="">
                       </span>EdUMess</label>
      <ul>
        <li><?php if(isset($_SESSION['name'])){
          echo '<a style="" class="active" href="../login.php">'.$_SESSION['name'].'</a>';
          // echo $_SESSION['name']; 
        }else{
          echo '<a style="" class="active" href="index.php">Home</a>';
        } ?></li>

        <li><a href="../login.php">Your Dashboard</a></li>
        <li><a href="#" ><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#yourpost">Your POST</button></a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="#">Feedback</a></li>
      </ul>
    </nav>
<!-- nav -->
                  <div class="collapse" id="allsetting">
                    <div class="bg-dark p-4">

                    <!-- <span class="text-muted">Student Part</span> -->

                   <?php
                   if(isset($_SESSION['role'])){
                    if($_SESSION['role']=='student'){
                        echo '<span class="text-muted">Hlw! dear Student..</span>';
                    }else if($_SESSION['role']=='mentor'){
                      echo '<span class="text-muted">Hlw! dear Teacher..</span>';
                    }else if($_SESSION['role']=='admin'){
                      echo '<span class="text-muted">Hlw! dear Admin..</span>';
                    }else {
                      echo '<span class="text-muted">Hlw! login please..</span>';
                    }
                  }else {
                    echo '<span class="text-muted">Login Please!..</span>';
                  }
                   ?>
                    
                    <div class="row">
                      <div class="col-md-3">
                          <a href="course.php"><button type="button" class="btn btn-outline-info mt-2 w-100">My Course</button></a>
                          <a href="tutor.php"><button type="button" class="btn btn-outline-info mt-2 w-100">ALL TuTor</button></a>
                          <a href="mentor.php"><button type="button" class="btn btn-outline-info mt-2 w-100">Tutor Post</button></a>     
                      </div>
                      <div class="col-md-3">
                        <a href="myrequest.php"><button type="button" class="btn btn-outline-warning mt-2 w-100">My Request</button></a>
                        <a href="allstudent.php"><button type="button" class="btn btn-outline-warning mt-2 w-100">ALL Student</button></a>
                        <a href="studentpost.php"><button type="button" class="btn btn-outline-warning mt-2 w-100">Student Post</button></a>

                      </div>
                      <div class="col-md-3">
                            <a href="mentorpost.php"><button type="button" class="btn btn-outline-danger mt-2 w-100">মেন্টর পোষ্ট</button></a>
                            <a href="tutoraccept.php"><button type="button" class="btn btn-outline-danger mt-2 w-100">স্টুডেন্ট রিকোয়েস্ট</button></a>
                            <a href="my_student.php"><button type="button" class="btn btn-outline-danger mt-2 w-100">ছাত্র-ছাত্রী</button></a>

                      </div>
                      <div class="col-md-3">
                            <?php
                              if(isset($_SESSION['unique_id'])){

                                echo '<a href="../login.php"><button type="button" class="btn btn-outline-light text-uppercase mt-2 w-100">Quiz</button></a>';
                              }else {
                                
                                echo '<a href="../login.php"><button type="button" class="btn btn-outline-light mt-2 w-100">এই বাটনে আপনার অনুমতি নেই!</button></a>';
                              }
                            ?>  <?php
                              if(isset($_SESSION['unique_id'])){

                                echo '<a href="../login.php"><button type="button" class="btn btn-outline-light text-uppercase mt-2 w-100">'.$_SESSION['name'].'</button></a>';
                              }else {
                                
                                echo '<a href="../login.php"><button type="button" class="btn btn-outline-light mt-2 w-100">A/C</button></a>';
                              }
                            ?>
                            <?php
                              if(isset($_SESSION['unique_id'])){

                                echo '<a href="../logout.php"><button type="button" class="btn btn-outline-light mt-2 w-100">Logout!</button></a>';
                              }else {
                                
                                echo '<a href="../login.php"><button type="button" class="btn btn-outline-light mt-2 w-100">Login Please!</button></a>';
                              }
                            ?>

                      
                      </div>
                    </div>

                      <!-- <span class="text-muted">Student & Teacher Part</span> -->
                    </div>
                    </div>




    <!-- <div class="container"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#post">MY POST</button></div> -->
    <div class="container text-center m-auto">
    <!-- <h6 style="margin:0 auto" class="bg-dark m-auto text-warning"><?=$s;?></h6> -->
    </div>
 
<div style="border: 0px solid black; border-radius:10px" class="container text-center mt-5 border-primary  rounded shadow-lg m-auto">

<div class="container">
<nav aria-label="Page nvigation">
    <ul class="pagination">
        <li class=""><a href="" class="page-link  prev" ><span aria-hidden="true">&laquo;</span></a></li>
        <?php for($i=1;$i<=$pagi;$i++){
            $class='';
            if($current_page==$i){
                ?>
            <li class="page-item active"><a href="javascript:void(0)" class="page-link"><?php echo $i?></a></li>
        <?php
        }else{
        ?>
        <li class="page-item"><a href="?start=<?php echo $i ?>" class="page-link"><?php echo $i?></a></li>
        <?php } ?>
        <?php }?>
        <li class=""><a href="" class="page-link  next" ><span aria-hidden="true">&raquo;</span></a></li>
    </ul>
</nav>
</div>

<h6 style="margin:0 auto" id="success" class="bg-dark m-auto text-warning"><?=$s;?></h6>

<div class="container text-center w-50">
        <form action="index.php" method="POST">
        <div style="border: 1px solid black; border-radius: 10px" id="sea" class="row text-center">
            <div style="display:inline" class="col text-center form-control d-inline">

                <input style="display:inline; color: brown;" id="" type="text" name="search" class="form-control d-inline form-floating" value="<?php  ?>" placeholder="সার্চ করুন">
            
                <!-- <label for="">Search</label> -->
            </div>    
            <div id="seab" style="background-color:" class="col form-control">
                <button style="display:inline; background-color:; text-align:center; width: 70px" type="submit" class="btn btn-outline-primary d-inline form-control" name="" ><span class="bi bi-search"></span></button>
            </div>    
            
        </div>
        </form>
    </div>

       <div class="row">
         <div style="border: 2px solid black; border-radius:10px" class="col-md-2 border-light">
               <div class="col mt-2">
                    <?php
                        if(isset($_SESSION['unique_id'])){

                            $sqli1="SELECT * FROM users WHERE unique_id='$_SESSION[unique_id]'";
                            $sqlir1=mysqli_query($con,$sqli1);
                            $rowmess=mysqli_fetch_assoc($sqlir1);
                            $messcount=mysqli_num_rows($sqlir1);
                            if($rowmess['mess_id']!=''){
                                echo '<a href="mess/admin/"><button type="button" class="btn btn-outline-primary mt-2 w-100">MY Mess</button></a>';
                            }

                            echo '<button type="button" class="btn btn-outline-success mt-2 w-100" data-bs-toggle="modal" data-bs-target="#createmesspost">Create Mess</button>';
                        }
                    ?>
                    

                  <nav style="border-radius:10%; border: 2px solid green" class="navbar navbar-dark bg-dark mt-2">
                    <div class="container">
                      <button style="border-radius:10%" class="btn btn-outline-warning navbar-toggler w-100" type="button" data-bs-toggle="collapse" data-bs-target="#allusersetting" aria-controls="allusersetting" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                    </div>
                  </nav>
                  <div class="collapse" id="allusersetting">
                    <div class="bg-dark p-4">

                    <a href="course.php"><button type="button" class="btn btn-outline-info mt-2 w-100">My Course</button></a>
                    <a href="tutor.php"><button type="button" class="btn btn-outline-info mt-2 w-100">ALL TuTor</button></a>
                    <a href="mentor.php"><button type="button" class="btn btn-outline-info mt-2 w-100">Tutor Post</button></a>
                    <span class="text-muted">Student Part</span>

                    <a href="myrequest.php"><button type="button" class="btn btn-outline-warning mt-2 w-100">My Request</button></a>
                    <a href="allstudent.php"><button type="button" class="btn btn-outline-warning mt-2 w-100">ALL Student</button></a>
                    <a href="studentpost.php"><button type="button" class="btn btn-outline-warning mt-2 w-100">Student Post</button></a>

                    <span class="text-muted">Teacher Part</span>

                    <a href="mentorpost.php"><button type="button" class="btn btn-outline-danger mt-2 w-100">মেন্টর পোষ্ট</button></a>
                    <a href="tutoraccept.php"><button type="button" class="btn btn-outline-danger mt-2 w-100">স্টুডেন্ট রিকোয়েস্ট</button></a>
                    <a href="my_student.php"><button type="button" class="btn btn-outline-danger mt-2 w-100">ছাত্র-ছাত্রী</button></a>

                      <span class="text-muted">Student & Teacher Part</span>
                    </div>
                    </div>


                </div>
         </div>
         <div style="border: 2px solid black; border-radius:10px" class="col border-light">
            <div class="row">
              <?php

    
                  $value = user();
                  while($row =mysqli_fetch_assoc($value)):
                    $from_id=$row['tutor_id'];
                    $mq="SELECT * FROM users WHERE unique_id='$from_id'";
                    $mqr=mysqli_query($con,$mq);
                    $rowu=mysqli_fetch_assoc($mqr);

                    ?>


  
                    

                    <div style="border: 1px solid black; border-radius:10px" class="col-md-6  bg-dark border-info">
                                
                    <div class="notifi-item">
                      <?php if($rowu['img']!=''){
                        echo '<img style="padding-top:0px" class="d-inline" src="../image/'.$rowu['img'].'" alt="img">';
                      }else{
                        echo '<img style="padding-top:0px" class="d-inline" src="img/avatar2.png" alt="img">';
                      } ?>
                      <div class="text">

                      <?php if($row['mess_name']!=''){
                        echo "<h4>".$row['mess_name']."</h4>";
                      }else{
                        echo "<h4>Mess name</h4>";
                      } ?>

                      <?php if($rowu['district']==''){
                        $row['district'] ="userDistrict";
                      } ?>
                      <?php if($rowu['upazila']==''){
                        $row['upazila'] ="Upazila";
                      } ?>
                      <?php if($rowu['unions']==''){
                        $row['unions'] ="Union";
                      } ?>
                       

                        <p>@<?= $rowu['district'].', '.$rowu['upazila'].', '.$rowu['unions']?></p>
                        <span class="text-center text-danger"><a style="text-decoration:none; color;red" class='text-warning' href="user.php?unique_id=<?=$rowu['unique_id']?>">PROFILE <span class="text-uppercase text-danger"><?=$rowu['actype']?></span></a></span>
                      </div>
                      <div class="text text-center m-auto">
                      <!-- <button type="button" class="btn btn-outline-info d-block w-100">PROFILE</button> -->
                      <form action="addfriend.php" method="POST" id="formBox" class="ajax" enctype="multipart/form-data">
                      <?php
                        if(isset($_SESSION['unique_id'])){
                          $ids=$_SESSION['unique_id'];
                          $qs = "SELECT * FROM users WHERE unique_id='$ids'";
                          $qsr=mysqli_query($con,$qs);
                          $rows=mysqli_fetch_assoc($qsr);
                        }
                      ?>
                      <input type="hidden" id="messid" name="messid" value="<?=$row['mess_id']?>">
                      <input type="hidden" name="me" value="<?php
                      if(isset($_SESSION['unique_id'])){
                        echo $_SESSION['unique_id'];
                      }?>">
                      <?php
                      if(isset($_SESSION['unique_id'])){
                        $messid=$_SESSION['mess_id'];

                        $sqli="SELECT * FROM users WHERE unique_id='$_SESSION[unique_id]'";
                        $sqlir=mysqli_query($con,$sqli);
                        $rowsq=mysqli_fetch_assoc($sqlir);

                        if($rowsq['mess_id']==$row['mess_id']){
                            echo '<button type="button" name="addmess" class="btn btn-outline-primary d-block w-100"><a style="text-decoration:none" href="mess/admin">Go to Mess</a></button>';   
                      
                        }else{
                            
                          echo '<button type="submit" name="addmess" class="btn btn-outline-primary d-block w-100">Join Now</button>';

                        }
                      }
                      ?>
                      </form>
                        
                      </div>
                    </div>    

                    </div>

                  <?php
                  endwhile;
                  ?>


            </div>
         </div>
       </div>
</div>


      <!-- post -->
<!-- <script type="text/javascript" src="jquery-3.1.1.min.js"></script> -->

      <!-- post -->
      <?php
      if(isset($_SESSION['unique_id'])):
$res_message=mysqli_query($con,"select users.name,messages.msg,messages.incoming_msg_id from messages,users where messages.status=0 and messages.outgoing_msg_id='$_SESSION[unique_id]' and users.unique_id=messages.incoming_msg_id");
$unread_count=mysqli_num_rows($res_message);

$sql_user="select unique_id,name from users order by name asc";
$res_user=mysqli_query($con,$sql_user);
?>

<div id="" class="text-center"> 
<button id="msg" class="msg" type="button" data-bs-toggle="modal" data-bs-target="#contactmsg">
    <span class="bi bi-messenger position-relative"></span>
    <span id="notifications_counter" style="width:20px; height:30px; padding-left:1px; padding-top:2px; text-align: center" class="position-absolute top-0 text-center start-100 translate-middle badge rounded-circle bg-danger"><?=$unread_count?></span>
<span class="visually-hidden">U</span></span>
</button>
</div>
<!-- Modal -->
<div class="modal fade" id="contactmsg" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Contact Page</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div style="border: 0px solid black; border-radius:10px" class="container text-center mt-2 border-primary  rounded shadow-lg m-auto">
                  <div class="row">

                         <img src="" class="card-img" alt="">
                         <?php if($unread_count>0){
                                while($row_message=mysqli_fetch_assoc($res_message)){?>
                    <div class="col-md-6">
                      <div class="card">
                                  <div class="card-header bg-warning"><strong><?php echo $row_message['name']?></strong></div>

                                  <div class="card-body"> <p><?php echo $row_message['msg']?></p></div>
                      </div>
                      <div class="card-footer bg-dark">
                                 <a style="text-decoration:none" href="../farhad/chat.php?user_id=<?=$row_message['incoming_msg_id']?>"><button class="btn btn-outline-info"><span class="bi bi-messenger"></span> Reply</button></a>
                      </div>
                    </div>
                              <?php } } ?>
                         

                  </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>
<script>
      $(document).ready(function () {
          $('#msg').click(function () {
              jQuery.ajax({
				url:'update_message_status.php',
				success:function(){
					$('#contactmsg').fadeToggle('fast', 'linear');
					$('#notifications_counter').fadeOut('slow');
				}
			  })
              return false;
          });
          $(document).click(function () {
              // $('#contactmsg').fadeIn('slow'); 
          });
      });
   </script>
<?php
endif;
?>
<!-- Modal -->




<!-- Modal -->
<div class="modal fade" id="createmesspost" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">নতুন mess create করুন...</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
                  <form action="addfriend.php" method="POST" enctype="multipart/form-data">
                  <div style="border: 0px solid black; border-radious:10px" class="container text-center border-primary  rounded shadow-lg m-auto">

                    <div class="row">
                        <div class="col-md-6">
                        <input type="hidden" name="me2" value="<?=$_SESSION['unique_id']?>">
                            <div class="form-floating">

                            <input type="text" class="form-control bg-secondary text-warning" name="mess" >
                            <label class="text-warning" for="">মেস এর নাম দিন...</label>
                            </div>
                            <!-- <div class="form-floating">
                            <input type="text" class="form-control bg-secondary text-warning" name="sub" >
                            <label class="text-warning" for="">বিষয় যোগ করুন(Bangla/Einglish/Any)</label>
                            </div>
                            <div class="form-floating">
                            <input type="text" class="form-control bg-secondary text-warning" name="address" value="">
                            <label class="text-warning" for="">ঠিকানা যোগ করুন</label>
                            </div> -->
                            
                        </div>

                        <div class="col-md-6">
                            <!-- <div class="form-floating">
                            <input type="text" class="form-control bg-secondary text-warning" name="phone" >
                            <label class="text-warning" for="">সেকেন্ডারি ফোন নম্বর(প্রয়োজন হলে দিন অন্যতায় পূর্বের নম্বর দেখাবে)</label>
                            </div> -->
                            
                            <!-- <div class="form-control">
                                    <button type="button" style="color:green" class="btn btn-outline-warning round shadow-lg"><label style="cursor:pointer" for="img"><span class="bi bi-file-image"></span> Upload Picture-<span style="width:20px; height:20px" class="bi bi-cloud-plus-fill"></span></label></button>
                                    <input style="display:none" type="file" onchange="getImage(this.value)" name="fimg" class="form-control" id="img">
                                    <div style="color:red" class="btn btn-outline-info" id="display-image"></div>
                                    </div>
                                    <script>
                                                                function getImage(imagename){
                                                                    var newimg = imagename.replace(/^.*\\/,"");
                                                                    $('#display-image').html(newimg);
                                                                }
                                                        </script> -->
                            
                            <div class="">
                            <input type="submit" class="btn btn-success form-control" name="createmess" value="CREATE">
                            <label for=""></label>
                            </div>
                            
                        </div>

                    </div>

                  </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="createmess" class="btn btn-primary">CREATE</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->


  </body>
</html>
