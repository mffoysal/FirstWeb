<?php
  session_start();


  $s="";
  if(isset($_REQUEST['success'])){
    $s=$_REQUEST['success'];
  }

  if(isset($_SESSION['unique_id'])){
    $_SESSION['unique_id']=$_SESSION['unique_id'];
  }

  include('../db.php');
      // $search="BREAKFAT";
      if(isset($_REQUEST['search'])){
          $search = $_REQUEST['search'];
          // $search = preg_replace("#[^0-9a-z]#i","",$search);
         
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

$qq = "SELECT * FROM users WHERE unique_id!='' AND actype='student' ";
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
      
  $qq = "SELECT * FROM users WHERE unique_id!='' AND actype='student' ";
  $record=mysqli_num_rows(mysqli_query($con,$qq));
    
    $pagi=ceil($record/$per_page);
  
          if(isset($_POST['search'])){
              $searchkey = $_POST['search'];
          }
          if(!empty($searchkey)){    
              $query = "SELECT * FROM users WHERE name LIKE '%$searchkey%' AND actype='student' OR phone LIKE '%$searchkey%' AND actype='student' OR email LIKE '%$searchkey%' AND actype='student' OR district LIKE '%$searchkey%' AND actype='student' OR upazila LIKE '%$searchkey%' AND actype='student' OR unions LIKE '%$searchkey%' AND actype='student' limit $start,  $per_page";
  
          }
          else{
              // if(){
  
              // }else{
                  
              // }
              $query = "SELECT * FROM users WHERE unique_id!='' AND actype='student' limit $start, $per_page";
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
  <body class="bg-dark">
    
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
                       </span>EdUFriend</label>
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
<!-- nav -->



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

<h6 style="margin:0 auto" class="bg-dark m-auto text-warning"><?=$s;?></h6>

<div class="container text-center w-50">
        <form action="tutor.php" method="POST">
        <div style="border: 1px solid black; border-radius: 5px" id="sea" class="row text-center">
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
                    <a href="friend.php"><button type="button" class="btn btn-outline-primary mt-2 w-100">Friends</button></a>
                    <a href="request.php"><button type="button" class="btn btn-outline-success mt-2 w-100">Request</button></a>

                    <nav class="navbar navbar-dark bg-dark">
                    <div class="container-fluid">
                      <button class="btn btn-outline-danger navbar-toggler w-100" type="button" data-bs-toggle="collapse" data-bs-target="#allusersetting" aria-controls="allusersetting" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                    </div>
                  </nav>
                  <div class="collapse" id="allusersetting">
                    <div class="bg-dark p-4">

                    <a href="mess.php"><button type="button" class="btn btn-outline-info mt-2 w-100"> Mess</button></a>
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
                    ?>

                    <?php
                      $tp="SELECT * FROM student_request_post WHERE unique_id='$row[unique_id]'";
                      $tpr=mysqli_query($con,$tp);
                      $countt=mysqli_num_rows($tpr);
                      if($countt>0){
                        $cont=$countt;
                      }else{
                        $cont="0";
                      }
                    ?>

                    <div style="border: 1px solid black; border-radious:10px" class="col-md-6 border-info">
                                
                    <div class="notifi-item">
                      <?php if($row['img']!=''){
                        echo '<img style="padding-top:0px" class="d-inline" src="../image/'.$row['img'].'" alt="img">';
                      }else{
                        echo '<img style="padding-top:0px" class="d-inline" src="img/avatar2.png" alt="img">';
                      } ?>
                      <div class="text">

                      <?php if($row['name']!=''){
                        echo "<h4>".$row['name']."</h4>";
                      }else{
                        echo "<h4>Username</h4>";
                      } ?>

                      <?php if($row['district']==''){
                        $row['district'] ="userDistrict";
                      } ?>
                      <?php if($row['upazila']==''){
                        $row['upazila'] ="Upazila";
                      } ?>
                      <?php if($row['unions']==''){
                        $row['unions'] ="Union";
                      } ?>
                       

                        <p>@<?= $row['district'].', '.$row['upazila'].', '.$row['unions']?></p>
                        <span class="text-center text-danger"><a style="text-decoration:none; color;red" class='text-warning' href="user.php?unique_id=<?=$row['unique_id']?>">PROFILE <span class="text-uppercase text-danger"><?=$row['actype']?></span></a></span>
                      </div>
                      <div class="text text-center m-auto">
                      <button type="button" class="btn btn-outline-info d-block w-100" data-bs-toggle="modal" data-bs-target="#post<?=$row['unique_id']?>"><span class="text-danger" ><?=$cont?></span> পোষ্ট</button>
                      <form action="addfriend.php" method="POST" enctype="multipart/form-data">
                      <?php
                        if(isset($_SESSION['unique_id'])){
                          $ids=$_SESSION['unique_id'];
                          $qs = "SELECT * FROM users WHERE unique_id='$ids'";
                          $qsr=mysqli_query($con,$qs);
                          $rows=mysqli_fetch_assoc($qsr);
                        }
                      ?>
                      <input type="hidden" name="tofriend" value="<?=$row['unique_id']?>">
                      <input type="hidden" name="image" value="<?=$rows['img']?>">
                      <input type="hidden" name="name" value="<?=$rows['name']?>">
                      <input type="hidden" name="address" value="<?=$rows['district'].', '.$rows['upazila'].', '.$rows['unions']?>">
                      <input type="hidden" name="fromfriend" value="<?php
                      if(isset($_SESSION['unique_id'])){
                        echo $_SESSION['unique_id'];
                      }?>">
                      <?php
                      if(isset($_SESSION['unique_id'])){
                        $idf=$_SESSION['unique_id'];
                        $qf="SELECT * FROM friends WHERE from_id='$idf' AND to_id='$row[unique_id]' AND status='Confirm' OR to_id='$idf' AND from_id='$row[unique_id]' AND status='Confirm'";
                        $qfr=mysqli_query($con,$qf);
                        $conf=mysqli_num_rows($qfr);

                        $qff="SELECT * FROM friends WHERE from_id='$idf' AND to_id='$row[unique_id]' AND status='Pending' OR to_id='$idf' AND from_id='$row[unique_id]' AND status='Confirm'";
                        $qffr=mysqli_query($con,$qff);
                        $conff=mysqli_num_rows($qffr);

                        $qffa="SELECT * FROM friends WHERE  to_id='$idf' AND status='Pending' AND from_id='$row[unique_id]'";
                        $qffra=mysqli_query($con,$qffa);
                        $conffa=mysqli_num_rows($qffra);

                        if($conf>0){
                          echo '<button type="button" name="addfriend" class="btn btn-outline-primary d-block w-100"><a style="text-decoration:none" href="friend.php">Friend</a></button>';   
                        }
                        else if($conff>0){
                          echo '<button type="button" name="addfriend" class="btn btn-outline-primary d-block w-100">Pending</button>';   
                        }
                        else if($conffa>0){
                          echo '<button type="button" name="addfriend" class="btn btn-outline-primary d-block w-100"><a style="text-decoration:none" href="request.php">Accept</a></button>';   
                        }
                        else{
                          echo '<button type="submit" name="addfriend" class="btn btn-outline-primary d-block w-100">ADD</button>';
                        }


                      }
                      ?>
                      </form>
                        
                      </div>
                    </div>    

                    </div>


                      <!-- Modal -->
                      <div class="modal fade" id="post<?=$row['unique_id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-scrollable">
                          <div class="modal-content">
                            <div class="modal-header text-center m-auto">
                              <h5 class="modal-title" id="staticBackdropLabel"><?=$row['name']?>'s- Student Request POST..</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="container">
                                <div class="row">
                                  <?php
                                    $tpost="SELECT * FROM student_request_post WHERE unique_id='$row[unique_id]'";
                                    $tpostr=mysqli_query($con,$tpost);

                                    while($rowt=mysqli_fetch_assoc($tpostr)):
                                  ?>


                                          <div class="col-md-4 mt-2 mb-2">
                                              <div class="card bg-transparent border-info text-white h-100">
                                                  <div style="background-color: #ffe53b;
                                                   background-image: linear-gradient(147deg, #ffe53b 0%, #fd3838 74%);" class="card-header bg-danger"><?=$rowt['class']?></div>
                                                  <img style="height: 225px;" src="<?php 
                                                  if($rowt['img']!=''){
                                                    echo '../image/'.$rowt['img'];
                                                  }else if($row['img']!=''){
                                                    echo '../image/'.$row['img'];
                                                  }else{
                                                    echo 'img/avatar3.png';
                                                  }
                                                  ?>" class='card-img text-dark' alt="MFPIc">
                                                  <div style="background-color:red" class="card-body bg-dark">
                                                  <h4 class="card-title bg-danger rounded-pill"><?=$rowt['sub']?></h4>
                                                  <p><?php
                                                    if($rowt['address']!=''){
                                                      echo $rowt['address'];
                                                    }else{
                                                      echo '@'.$row['district'].', '.$row['upazila'].', '.$row['unions'];
                                                    }
                                                  ?></p>
                                                  <div class="form-floating">
                                                  <input type="text" class="form-control" value="<?php if($row['education']!=''){
                                                      echo $row['education'];
                                                  }else {
                                                    echo 'TuTor Experience is hidden by Tutor';
                                                  }
                                                  ?>" readonly>
                                                  <label class="text-danger" for="">Education|Experiece</label>
                                                  </div>
                                                  <?php
                                                  if(isset($_SESSION['unique_id'])){
                                                  ?>  

                                                  
                                                  <p class="text-muted"><span class="bi bi-telephone-fill"></span> <?php
                                                  if($rowt['phone']!=''){
                                                    echo $rowt['phone'];
                                                  }else {
                                                    echo $row['phone'];
                                                  }
                                                  ?></p>

                                                  <form action="tutorsubmit.php" method="POST" enctype="multipart/form-data">
                                                  <input type="hidden" name="stdid" value="<?php if(isset($_SESSION['unique_id'])){
                                                   echo $_SESSION['unique_id']; 
                                                  }?>">
                                                  <input type="hidden" name="tutorid" value="<?=$rowt['unique_id']?>">
                                                  <input type="hidden" name="postid" value="<?=$rowt['post_id']?>">

                                                  <?php
                                                  }
                                                  else{
                                                    echo "Please login for Student Contact Number...";
                                                  }
                                                  ?>
                                                  
                                                  <a href="user.php?unique_id=<?=$row['unique_id']?>"><button type="button" class="btn btn-outline-success w-100">Student Profile</button></a>
                                                  <?php

                                                  if(isset($_SESSION['unique_id'])){


                                                    $msquery="SELECT * FROM student_request_post WHERE unique_id='$_SESSION[unique_id]' AND post_id='$rowt[post_id]' AND status='Pending'";
                                                    $msqueryr=mysqli_query($con,$msquery);
                                                    $countms=mysqli_num_rows($msqueryr);
                                                    $msquery2="SELECT * FROM student_request_post WHERE unique_id='$_SESSION[unique_id]' AND post_id='$rowt[post_id]' AND status='Confirm'";
                                                    $msqueryr2=mysqli_query($con,$msquery2);
                                                    $countms2=mysqli_num_rows($msqueryr2);
                                                    

                                                    if($countms>0){
                                                        echo '<button type="submit" name="addmentor" class="btn btn-outline-info w-100" >Pending</button>';    
                                                    }else if($countms2>0){
                                                        echo '<a href="activated.php?unique_id='.$rowt['unique_id'].'"><button type="submit" name="addmentor" class="btn btn-outline-info w-100" >Confirmed</button></a>';
                                                    }else {
                                                        echo '<button type="submit" name="addmentor" class="btn btn-outline-info w-100" >You may contact with student</button>';
                                                    }

                                                    // echo '<button type="submit" name="addtutor" class="btn btn-outline-info w-100" >ADD Tutor</button>';

                                                  }

                                                  ?>
                                                  
                                                  </form>

                                                  </div>
                                                  <div style="background-color: #ffe53b;
                                                   background-image: linear-gradient(147deg, #ffe53b 0%, #fd3838 74%);" class="card-footer bg-info ">&copy; <?=$row['name']?> <span class="bg-success">S.P.ID: <?=$rowt['post_id']?></span>

                                                  <button type="button" class="btn btn-outline-dark d-inline w-100 position-relative" data-bs-toggle="modal" data-bs-target="#details<?=$row['unique_id']?>">
                                                  <?php
                                                  if($rowt['status']=='Available'){
                                                    echo 'Student Available';
                                                    $color='success';
                                                  }else if($rowt['status']=='Pending'){
                                                    echo 'Student Pending';
                                                    $color='light';
                                                  }else if($rowt['status']=='Not-available'){
                                                    echo 'Student Confirm';
                                                    $color='danger';
                                                  }else {
                                                    echo "Student Waiting...";
                                                    $color='warning';
                                                  }
                                                  ?>
                                                  <!-- Available -->

                                                  <span class="position-absolute top-0 start-100 translate-middle p-2 border border-warning rounded-circle bg-<?=$color?>"></span>
                                                                  <span class="visually-hidden">New Alert</span>
                                                  </button>
                                                  
                                                  </div>

                                              </div>
                                          </div>


                                  <?php
                                    endwhile;
                                  ?>



                                 




                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <!-- <button type="button" class="btn btn-primary">Understood</button> -->
                            </div>
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


  </body>
</html>
