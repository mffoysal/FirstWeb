


<?php
session_start();
include('db.php');
if(!isset($_SESSION['phone']) || $_SESSION['role']!="student"){
  header("location:login.php");
 }

 if(isset($_REQUEST['successmsg'])){
   $msgsuccess= $_REQUEST['successmsg'];
 }else{
   $msgsuccess="";
 }



?>


<!-- setting start -->

<?php
                  $query = "SELECT * FROM users WHERE `phone` ='$_SESSION[phone]'  ";
                  $result = mysqli_query($con,$query);
                  $row1 = mysqli_fetch_assoc($result);

                  $_SESSION['unique_id']=$row1["unique_id"];
                  $_SESSION['name']=$row1["name"];
                  $_SESSION['img']=$row1["img"];
                  $_SESSION['mess_id']=$row1["mess_id"];
                  $_SESSION['actype']=$row1["actype"];
    ?>

<?php
// include('db.php');
          $iddd=$_SESSION['unique_id'];
            $querypost = "SELECT * FROM post WHERE unique_id='$iddd' ";
            $resultp = mysqli_query($con,$querypost);
            // $countpost = mysqli_num_rows($resultpost);
            
          ?>
<!-- cove photo  -->
<?php
// include('db.php');
          $iddd=$_SESSION['unique_id'];
            $queryphoto = "SELECT * FROM image WHERE unique_id='$iddd' ";
            $resultph = mysqli_query($con,$queryphoto);
            // $countpost = mysqli_num_rows($resultpost);
            
          ?>
<!-- cove photo  -->


<!-- setting end -->

<?php


if(isset($_SESSION['unique_id'])){
  $_SESSION['visitor_id']=$_SESSION['unique_id'];
}else{
  $_SESSION['visitor_id'] = '787579833';
}


if(isset($_SESSION['unique_id'])){
// if(isset($_REQUEST['unique_id'])){
  // $idu=$_REQUEST['unique_id'];
  $idu=$_SESSION['unique_id'];

  $usqli= "SELECT * FROM users WHERE unique_id='$idu'";
  $usql=mysqli_query($con,$usqli);
  $unum=mysqli_num_rows($usql);
  $urow=mysqli_fetch_assoc($usql);
  
  if($unum<1){
    header('location:index.php');
  }
}

?>

<input type="text" id="farhadf" value="<?=$idu?>" hidden>

<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?=$urow['name']?>-Student Dashboard-</title>
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <!-- <script src="../jquery-3.4.1.js"></script> -->
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->
    <link rel="stylesheet" href="icon/bootstrap-icons.css">
 
    <!-- <script src="ck/ckeditor.js"></script> -->
    <!-- <script src="f/admin/ckeditor/ckeditor.js"></script> -->

    <!-- <script src="//cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script> -->
    <script src="jquery-3.5.1.min.js"></script>
    <!-- swap -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.css">
  <!-- <link rel="stylesheet" href="stylec.css" /> -->
  <link rel="stylesheet" href="user.css">
    <!-- swap -->


    <!-- <script src="f/admin/ckeditor/ckeditor.js"></script> -->
    <script src="ck/ckeditor.js"></script>


    <link rel="stylesheet" href="bootstrap.min.css">
    <!-- <script src="../bootstrap.budle.min.js"></script> -->

    <style>
      #msg-2{
    display: none;
}
#msg-3{
    display: none;
}
#msg-4{
    display: none;
}
#msg-5{
    display: none;
}

#mg-2{
    display: none;
}
#mg-3{
    display: none;
}
#mg-4{
    display: none;
}
#mg-5{
    display: none;
}

#mssg-2{
    display: none;
}
#mssg-3{
    display: none;
}
#mssg-4{
    display: none;
}
#mssg-5{
    display: none;
}

#msssg-2{
    display: none;
}
#msssg-3{
    display: none;
}
#msssg-4{
    display: none;
}
#msssg-5{
    display: none;
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
/* nav profile setting */
    
.msgfar{
        background: cyan;
        position: fixed;
        top: 2%;
        right:10px;
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
    #msgfar:hover{
        bottom:60px;
        pointer-events:auto;
        color: yellow;
        background-color: red;
        transform: rotate(-360deg);
        opacity: 0.8;

    }





    </style>
    
  </head>
  <body class="bg-dark" style="background-color: #e40046">
  <!-- <body style="background-color: #e40046"> -->
  <!-- <body style="background-color: rgba(288, 0, 70, .9)"> -->

 
<!-- nav picture start -->

<div class="collapse fixed-top" id="allsetting">
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
                            <?php
                              if(isset($_SESSION['unique_id'])){

                                echo '<a href="user/exam/login.php"><button type="button" class="btn btn-outline-light text-uppercase mt-2 w-100">Quiz</button></a>';
                              }else {
                                
                                echo '<a href="../login.php"><button type="button" class="btn btn-outline-light mt-2 w-100">এই বাটনে আপনার অনুমতি নেই!</button></a>';
                              }
                            ?>  <?php
                              if(isset($_SESSION['unique_id'])){

                                echo '<a href="user/test/adminpanel/admin"><button type="button" class="btn btn-outline-light text-uppercase mt-2 w-100">Exam 2</button></a>';
                                echo '<a href="user/mess/admin"><button type="button" class="btn btn-outline-light text-uppercase mt-2 w-100">Mess</button></a>';
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


                      <div class="col-md-3">

                          <a href="user/course.php"><button type="button" class="btn btn-outline-info mt-2 w-100">My Course</button></a>
                          <a href="user/tutor.php"><button type="button" class="btn btn-outline-info mt-2 w-100">ALL TuTor</button></a>
                          <a href="user/mentor.php"><button type="button" class="btn btn-outline-info mt-2 w-100">Tutor Post</button></a>     
                      </div>
                      <div class="col-md-3">
                        <a href="user/myrequest.php"><button type="button" class="btn btn-outline-warning mt-2 w-100">My Request</button></a>
                        <a href="user/allstudent.php"><button type="button" class="btn btn-outline-warning mt-2 w-100">ALL Student</button></a>
                        <a href="user/studentpost.php"><button type="button" class="btn btn-outline-warning mt-2 w-100">Student Post</button></a>

                      </div>
                      <div class="col-md-3">
                            <a href="user/mentorpost.php"><button type="button" class="btn btn-outline-danger mt-2 w-100">মেন্টর পোষ্ট</button></a>
                            <a href="user/tutoraccept.php"><button type="button" class="btn btn-outline-danger mt-2 w-100">স্টুডেন্ট রিকোয়েস্ট</button></a>
                            <a href="user/my_student.php"><button type="button" class="btn btn-outline-danger mt-2 w-100">ছাত্র-ছাত্রী</button></a>

                      </div>

                    </div>

                      <!-- <span class="text-muted">Student & Teacher Part</span> -->
                    </div>
                    </div>


<!-- nav picture end  -->



      <!-- post -->
<?php
$res_message=mysqli_query($con,"select users.name,messages.msg,messages.incoming_msg_id from messages,users where messages.status=0 and messages.outgoing_msg_id='$_SESSION[unique_id]' and users.unique_id=messages.incoming_msg_id");
$unread_count=mysqli_num_rows($res_message);

$sql_user="select unique_id,name from users order by name asc";
$res_user=mysqli_query($con,$sql_user);
?>
<!--  -->

<div id="" class="text-center fixed-top"> 
<button id="msgfar" class="msgfar" type="button" data-bs-toggle="modal" data-bs-target="#contactmsgfar">
    <span class="position-relative" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#allsetting" aria-controls="allsetting" aria-expanded="false" aria-label="Toggle navigation"><img style="width:50px; height:50px; border-radius:50%" src="image/<?=$urow['img']?>" alt=""></span>
    <span id="notifications_counterfar" style="width:20px; height:30px; padding-left:1px; padding-top:2px; text-align: center" class="position-absolute top-0 text-center start-100 translate-middle badge rounded-circle bg-danger"><?=$unread_count?></span>
<span class="visually-hidden">U</span></span>
</button>
</div>


<!--  -->
<div id="" class="text-center"> 
<button id="msg" class="msg" type="button" data-bs-toggle="modal" data-bs-target="#contactmsg">
    <span class="bi bi-messenger position-relative"></span>
    <span id="notifications_counter" style="width:20px; height:30px; padding-left:1px; padding-top:2px; text-align: center" class="position-absolute top-0 text-center start-100 translate-middle badge rounded-circle bg-danger"><?=$unread_count?></span>
<span class="visually-hidden">U</span></span>
</button>
</div>








<div class="container">
<div class="count">
      <div class="count-down">
          <div class="box">
            <h3 id="day">000</h3>
            <span>Day</span>
          </div>
          <div class="box">
            <h3 id="hour">00</h3>
            <span>Hour</span>
          </div>
          <div class="box">
            <h3 id="minute">00</h3>
            <span>Minute</span>
          </div>
          <div class="box">
            <h3 id="second">00</h3>
            <span>Second</span>
          </div>
      </div>
    </div>
</div>

<div class="container content">
  <h2><?=$urow['name']; ?></h2>
  <h2><?=$urow['name']; ?></h2>
</div>


<div class="container"> 
  <div class="profile-header">
    <div class="profile-img" data-bs-toggle="modal" data-bs-target="#drop22">
      <img src="image/<?=$urow['img']?>" width="200" alt="">
    </div>
    <div class="profile-nav-info">
      <h3 class="user-name"><?=$urow['name']; ?></h3>
      <div class="address">
        <p class="state">#<?= $urow['division'].', '.$urow['district'].', '.$urow['upazila'].', '.$urow['unions'] ?></p>
        <span class="country">BD</span>
      </div>
    </div>
    <div class="profile-option">
      <div class="notification">
        <i class="bi bi-bell-fill
"></i>
        <span class="alert-message"><?=$unread_count?></span>
      </div>
    </div>
  </div>
  <div class="main-bd">



    <div class="left-side">
      <div class="profile-side">
        <p class="mobile-number"><i class="bi bi-telephone-plus-fill">
          <?= $urow['phone'] ?>
        </i></p>
        <p class="user-mail"><i class="bi bi-envelope">
        <?= $urow['email'] ?>
        </i></p>
        <h3 data-bs-toggle="modal" data-bs-target="#dropbio">Bio<div class="spinner-grow text-info" role="status">
  <span class="visually-hidden">Loading...</span>
</div></h3>
        <div id="textintro" class="user-bio bio text-center"> <?= $urow['bio'] ?>  <br><br></div>
     
     

        <div class="profile-btn">
            <a href="#"><button class="chatbtn"><i class="bi bi-chat-dots-fill">Chat</i></button></a>
            <button class="createbtn"><i class="bi bi-person-plus-fill">+Add</i></button>
          </div>
          <div class="user-rating">4.5
          
          <div class="rate">
            <div class="stars">
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-half"></i>

            </div>
            <span class="no-user"><span><?=$urow['referral_point'] ?></span>&nbsp;&nbsp;reviews/referral point</span>
          </div>
          </div>

     
      </div>
          
      <div class="container mt-2 bg-light text-dark">
        <div class="row">
          <div class="col-md">

                                     <div class="accordion-item">
                                        <h2 style="" class="accordion-header" id="flush-headingOne">
                                        <button style="color: red" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                            Friend List<span>......</span><h6 class="text-center" id="total1" ></h6>
                                        </button>
                                        </h2>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">

                                          <div class="accordion-body">

                                                <!--  -->
                                                      <div class="accordion-item">
                                                          <h2 class="accordion-header" id="flush-headingThree">
                                                          <button style="color: red" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                                              Friend List<span>......</span><h6 class="text-center" id="total2" ></h6>
                                                          </button>
                                                          </h2>
                                                          <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">

                                                            <div class="accordion-body">

                                                                  <!--  -->
                                                                  
                                                                  <!--  -->

                                                            </div>
                                                          </div>
                                                      </div>
                                                <!--  -->

                                          </div>
                                        </div>
                                     </div>





          </div>
        </div>
      </div>


    </div>




    <div class="right-side">
      <div class="nav">
        <ul>
          <li onclick="tabs(0)" class="user-post active">POsTs</li>
          <li onclick="tabs(1)" id="u_about" class="user-review">AbOuT</li>
          <li onclick="tabs(2)" class="user-setting">S & T</li>
          <li onclick="tabs(3)" id="video1btn" class="user-video">EdULearn</li>
        </ul>
      </div>
      <div class="profile-body bg-secondary text-light">

        <div class="profile-posts tab">

        <header style="width:100%" class="header2">
              <nav class="navbar">
                      <a class="btttn-1" href="#home" id="getdisplaydata1"><i class="bi bi-house-fill">.<span class="sp1">Home</span></i></a>
                      <a class="btttn-2" href="#about" id="qutebtn"><i class="bi bi-chat-right-quote-fill">.<span class="sp2">Qute</span></i></a>
                      <a class="btttn-3" href="#gallery" id="gallerybtn"><i class="bi bi-grid-3x3-gap-fill">.<span class="sp3">Gallery</span></i></a>
                      <a class="btttn-4" href="#portfolio"><i class="bi bi-play-btn-fill">.<span class="sp4">Videos</span></i></a>
                      <a class="btttn-5" href="#contact"><i class="bi bi-phone">.<span class="sp5">User</span></i></a>
              </nav>
          </header>

          <div id="msssg-1" class="containe msssg-1">

                <div class="container text-center shadow-lg">
                  <h6 class="text-info sticky-top" id="error_status_up"></h6>
                  
                  <button class="btn btn-dark text-secondary w-100" data-bs-toggle="modal" data-bs-target="#p-1"><i class="bi bi-plus"></i> Add Post</button>

                </div>


              <div id="response1" class="container-fluid">

 
              </div>

                <!-- <section class="container4 mt-2 mb-3 position-relative">
                      <div class="card">
                        <div class="card-image">
                            <img src="../image/<?=$urow['img']?>" class="cardimg" width="100%" height="100%" alt="">
                        </div>
                        <div class="card-text">
                        <h2 class="text-dark"><?=$urow['name']; ?></h2>
                          <span class="date">4 days ago</span>

                          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit esse pariatur repudiandae neque sapiente optio quaerat nemo eum odit earum! Lorem ipsum dolor sit amet consectetur, Ducimus, repudiandae temporibus omnis illum maxime quod deserunt eligendi dolor</p>
                        </div>
                        <div class="card-stats">
                          <div class="stat"> 
                            <div class="value">4<sup>m</sup></div>
                            <div class="type">read</div>
                          </div>
                          <div class="stat border">
                            <div class="value">5123</div>
                            <div class="type">views</div>
                          </div>
                          <div class="stat">
                            <div class="value">32</div>
                            <div class="type">comments</div>
                          </div>
                        </div>
                      </div> 
                      
                           <img style="top: -10px; right: -10px; border:3px solid #fff; border-radius: 50%;" src="../image/<?=$urow['img']?>"  width="100px" height="100px" class="position-absolute" id="profile-post-img" alt="">
                      </span>
          
                </section> -->




<!-- 
                <section class="container3">
                  <div class="testimonial">
                    <div class="avatar">
                      <img src="image/<?=$urow['img']?>" alt="">
                    </div>
                    <div class="body">
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, dolor! Pariatur optio ipsa saepe quo repudiandae ut eligendi asperiores delectus.</p>
                    </div>
                    <div class="footer">
                      <h1>MF Foysal</h1>
                      <p>CEO EdULearn</p>
                    
                    </div>
                  </div>
                </section> -->






          </div>
          <div id="msssg-2" class="container msssg-2">
         
         
                <div class="container text-center shadow-lg">
                  <h6 class="text-info sticky-top" id="error_status_up2"></h6>
                  
                  <button class="btn btn-dark text-secondary w-100" data-bs-toggle="modal" data-bs-target="#p-2"><i class="bi bi-plus"></i> Add Qute</button>

                </div>


                <div id="gallery_data">

                </div>

                  
                <!-- <section class="container3">
                  <div class="testimonial">
                    <div class="avatar">
                      <img src="image/<?=$urow['img']?>" alt="">
                    </div>
                    <div class="body">
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, dolor! Pariatur optio ipsa saepe quo repudiandae ut eligendi asperiores delectus.</p>
                    </div>
                    <div class="footer">
                      <h1>MF Foysal</h1>
                      <p>CEO EdULearn</p>
                    
                    </div>
                  </div>
                </section> -->

          </div>
          <div id="msssg-3" class="container msssg-3">
                <h1>GALLERY</h1>
                         
                <div class="container text-center shadow-lg">
                  <h6 class="text-info sticky-top" id="error_status_up3"></h6>
                  
                  <button class="btn btn-dark text-secondary w-100" data-bs-toggle="modal" data-bs-target="#p-3"><i class="bi bi-plus"></i> Add Cover Photo</button>

                </div>



                <div class="container vid">
                        <div class="row">
                          <div class="col-md-8 mb-3">
                            <div class="feature-img">
                            <img src="image/logo.png" alt="">
                            <p class="titleimg">ASSalamualaikum</p>
                            </div>
                            
                          </div>
                          <div  class="col-md-4 picvid">
                                                                    
                                          <?php
                                            include('db.php');


                                            $data="SELECT * FROM image WHERE image!='' AND status='Enable' AND img='1' AND unique_id='$idu' ORDER BY id DESC";
                                            $im="SELECT * FROM users WHERE unique_id='$idu'";
                                            

                                            $sqldata=mysqli_query($con,$data);

                                            $imgs=mysqli_query($con,$im);
                                            $img=mysqli_fetch_assoc($imgs);
                                          


                                            if(mysqli_num_rows($sqldata)>0){
                                                while  ($datarow=mysqli_fetch_assoc($sqldata)){
                                                    ?>
                                              
                                                                    <div class="small-img-row">
                                                                      <div class="small-img smallimg <?=$datarow['active']?>">

                                                                      <img src="image/<?=$datarow['image']?>" alt="">
                                                                      <p class="titleimg"><?=$datarow['img_title']?></p>
                                                                      </div>

                                                                    </div>
                                                                    
                                        <?php
                                                }
                                            }

                                        ?>
                          </div>

                        </div>
                </div>
  

<!-- 
                <div class="container vid">
                        <div class="row">
                          <div class="col-md-8 mb-3">
                            <div class="feature-img">
                            <img src="image/logo.png" alt="">
                            <p class="titleimg">ASSalamualaikum</p>
                            </div>
                            
                          </div>
                          <div class="col-md-4 picvid">
                            <div class="small-img-row">
                              <div class="small-img smallimg active">

                              <img src="image/ImagePic.jpg" alt="">
                              <p class="titleimg">Title Lorem ipsum dolorfff sit amet consectetur</p>
                              </div>
                              
                            </div>
                            <div class="small-img-row">
                              <div class="small-img smallimg">

                              <img src="image/ImagePic.jpg" alt="">
                              <p class="titleimg">Title Loremsdfas dfasf afadsf ipsum dolor sit amet consectetur !</p>
                              </div>

                            </div>
                            <div class="small-img-row">
                              <div class="small-img smallimg">

                              <img src="image/ImagePic.jpg" alt="">
                              <p class="titleimg">Title Loremsdfas dfasf afadsf ipsum dolor sit amet consectetur !</p>
                              </div>

                            </div>
                            <div class="small-img-row">
                              <div class="small-img smallimg">

                              <img src="image/ImagePic.jpg" alt="">
                              <p class="titleimg">Title Loremsdfas dfasf afadsf ipsum dolor sit amet consectetur !</p>
                              </div>

                            </div>
                            <div class="small-img-row">
                              <div class="small-img smallimg">

                              <img src="image/ImagePic.jpg" alt="">
                              <p class="titleimg">Title Loremsdfas dfasf afadsf ipsum dolor sit amet consectetur !</p>
                              </div>

                            </div>

 
                          </div>
                        </div>
                </div>
 -->


          </div>
          <div id="msssg-4" class="container msssg-4">
                <h1>Videos</h1>
                         
                <div class="container text-center shadow-lg">
                  <h6 class="text-info sticky-top" id="error_status_up4"></h6>
                  
                  <button class="btn btn-dark text-secondary w-100" data-bs-toggle="modal" data-bs-target="#p-4"><i class="bi bi-plus"></i> Add video link 1</button>

                </div>





                <div class="vlist mt-2">
                     <div class="containerac">

                        <div class="main-video34">
                              <div class="video">
                                    <iframe width="100%" class="vide"  height="100%" id="video_id" src="https://www.youtube.com/embed/_08Q2hq3U9Q?rel=0"
                                    frameborder="0" controls muted autoplay allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                                    <h3 class="title">video 1 Assalamualaikum</h3>
                              </div>
                        </div>

                        <div id="video1_dat" class="video-list34">
                          
<?php
    include('db.php');


    $data34="SELECT * FROM videos_demo WHERE album='P' AND secure='S' AND unique_id='$idu' ORDER BY id DESC";
    $im34="SELECT * FROM users WHERE unique_id='$idu'";
    

    $sqldata34=mysqli_query($con,$data34);

    $imgs34=mysqli_query($con,$im34);
    $img34=mysqli_fetch_assoc($imgs34);
  
    if(mysqli_num_rows($sqldata34)>0){
        while  ($datarow34=mysqli_fetch_assoc($sqldata34)){
            ?>
                 
                            <div class="vid34 <?=$datarow3['img']?>">
                                    <iframe width="100%" class="vide"  height="100%" id="video_id" src="https://www.youtube.com/embed/<?=$datarow34['link']?>?rel=0"
                                    frameborder="0" muted allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                                    <h3 class="title"><code class=""><?=$datarow34['std_show']?>views <?=$datarow34['time']?></code> <?=$datarow34['v_name']?>  </h3>    
                            </div>
                            
<?php
        }
    }


?>

                    
                        </div>

                      

                     </div>                                                     
                    </div>
            






          </div>
          <div id="msssg-5" class="container msssg-5">
                <h1>User</h1>


                         
                <div class="container text-center shadow-lg">
                  <h6 class="text-info sticky-top" id="error_status_up5"></h6>
                  
                  <button class="btn btn-dark text-secondary w-100" data-bs-toggle="modal" data-bs-target="#p-5"><i class="bi bi-plus"></i> Add user setting</button>

                </div>
                <div class="container">
                  

        <p class="text-center bg-dark text-warning shadow-lg rounded m-2">Your Profile & Details</p>
              <h3 class="text-center text-warning bg-dark"><?=$msgsuccess;?></h3>
              <div class="row form-floating">
                    <input type="text" class="form-control bg-secondary text-lowercase text-warning" value="http://mffoysal.xyz/refer.php?refer=<?php echo $row1['referral_code'];?>" readonly>
                      <label class="text-light" for=""><span class="bi bi-share-fill"></span> Your Referral Link</label>
              </div>
              <div class="row form-floating">
                    <input type="text" class="form-control bg-info text-dark" value="<?php echo $row1['education'];?>" readonly>
                      <label class="text-danger" for=""><span class="bi bi-book"></span> Your Educational Achievement & Experience</label>
              </div>
              <div style="border:2px solid white;" class="row rounded">
                <div class="col-md-6 text bg-info m-auto text-light">
                    <h5 style="color:color;" class="m-auto" ><span class="bi bi-share"></span> YOUR REFERRAL CODE: <span style="color:black"><?= $row1['referral_code'] ?></span> </h5>
                </div>
                <div class="col-md-6 text bg-primary m-auto text-light">
                    <h5 class="m-auto"><span class="bi bi-trophy-fill"></span> REWARD POINT: <span class="text-warning m-auto"><?= $row1['referral_point'] ?></span> </h5>
                </div>
              </div>
              
              <div style="border:2px solid white;" class="row rounded">
                <div class="col-md-6 text bg-info m-auto text-light">
                    <h5 style="color:color;" class="m-auto" ><span class="bi bi-app"></span> YOUR ID: <span style="color:black"><?= $row1['user'] ?></span> </h5>
                </div>
                <div class="col-md-6 text bg-primary m-auto text-light">
                    <h5 class="m-auto"><span class="bi bi-person-check"></span> A/C TYPE: <span class="text-warning m-auto"><?= $row1['actype'] ?></span> </h5>
                </div>
              </div>
              <div style="border:2px solid white;" class="row rounded">
                <div class="col-md-6 text bg-info m-auto text-light">
                    <h5 style="color:color;" class="m-auto" ><span class="bi bi-person-circle"></span> YOUR NAME: <span style="color:black"><?= $row1['name'] ?></span> </h5>
                </div>
                <div class="col-md-6 text bg-primary m-auto text-light">
                    <h5 class="m-auto"><span class="bi bi-telephone"></span> YOUR PHONE: <span class="text-warning m-auto"><?= $row1['phone'] ?></span> </h5>
                </div>
              </div>
              <div style="border:2px solid white;" class="row rounded">
                <div class="col-md-6 text bg-info m-auto text-light">
                    <h5 style="color:color;" class="m-auto" ><span class="bi bi-envelope"></span> YOUR EMAIL: <span style="color:black"><?= $row1['email'] ?></span> </h5>
                </div>
                <div class="col-md-6 text bg-primary m-auto text-light">
                    <h5 class="m-auto"><span class="bi bi-house-fill"></span> YOUR ADDRESS: <span class="text-warning m-auto"><?= $row1['division'].', '.$row1['district'].', '.$row1['upazila'].', '.$row1['unions'].', '.$row1['word'].', '.$row1['village']; ?></span> </h5>
                </div>
              </div>
              <div style="border:2px solid white;" class="row rounded">
                <div class="col-md-6 text bg-info m-auto text-light">
                    <h5 style="color:color;" class="m-auto" ><span class="bi bi-file-play"></span> ACTIVE STATUS: <span style="color:black"><?= $row1['status'] ?></span> </h5>
                </div>
                <div class="col-md-6 text bg-primary m-auto text-light">
                    <h5 class="m-auto"><span class="bi bi-cloud-upload"></span> UPDATE YOUR: <span class="text-warning m-auto"> <button type="button" class="badge btn btn-dark rounded" data-bs-toggle="modal" data-bs-target="#drop2"><span class="bi bi-file-image"></span> Picture</button> | <button type="button" class="badge btn btn-outline-warning rounded" data-bs-toggle="modal" data-bs-target="#drop3"><span class="bi bi-person-badge-fill"></span> Details</button> |Messege</span> </h5>
                </div>
              </div>              
            </div>

                </div>



          </div>
            
        </div>
        
<!-- Modal -->
<div class="modal fade" id="drop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update Your Profile Picture</h5>
        <h6 style="border-radius:6px; margin-left:5px" class="modal-title text-center text-warning bg-secondary border border-rounded " id="error_status_pic1"></h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="update.php" id="upformpic" method="POST" enctype="multipart/form-data">
        <div class="field image form-control">
                        <button type="button" style="color:green" class="btn btn-outline-warning round shadow-lg"><label style="cursor:pointer" for="imgup22"><span class="bi bi-file-image"></span> Upload Picture-<span style="width:20px; height:20px" class="bi bi-cloud-plus-fill"></span></label></button>
                        <input style="display:none" type="file" onchange="getImageup(this.value)" name="updateimage" class="form-control" id="imgup22" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
                        <div style="color:red" class="btn btn-outline-info" id="display-imageup"></div>
                        </div>
                        <div class="form-floating">
                          <input class="form-control w-100 bg-secondary text-warning" type="hidden" name="upproidpic" value="<?=$row1['unique_id']?>" placeholder="">
                          <label for=""></label>
                        </div>
                        <br>
                        <div class="field button">
                        <!-- <input type="submit" class="btn btn-info submittwo" name="updatepic" value="Update"> -->
                        </div>
                                                       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" name="updatepic" class="btn btn-primary uppicBtn1">Update</button>
        </form>
        <script>
                                                                function getImageup(imagenameup){
                                                                    var newimgup = imagenameup.replace(/^.*\\/,"");
                                                                    $('#display-imageup').html(newimgup);
                                                                }
                                                        </script>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="dropbio" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update Your Bio</h5>
        <h6 style="border-radius:6px; margin-left:5px" class="modal-title text-center text-warning bg-secondary border border-rounded " id="error_status_bio"></h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="update.php" id="formbio" method="POST" enctype="multipart/form-data">
        

                        <div class="form-floating">
                          <textarea class="form-control w-100 bg-secondary text-warning" type="text" name="upbio" id="biotext" placeholder=""></textarea>
                          <label for="">Edit Bio</label>
                        </div>
                        <div class="form-floating">
                          <input class="form-control w-100 bg-secondary text-warning" type="hidden" name="upproidbio" value="<?=$row1['unique_id']?>" placeholder="">
                          <label for=""></label>
                        </div>
                        <br>
                        <div class="field button">
                        <!-- <input type="submit" class="btn btn-info submittwo" name="updatepic" value="Update"> -->
                        </div>
                                                       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" name="updatebio" class="btn btn-primary upbioBtn">Update</button>
        </form>

      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="drop22" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update Your Profile Picture</h5>
        <h6 style="border-radius:6px; margin-left:5px" class="modal-title text-center text-warning bg-secondary border border-rounded " id="error_status_pic2"></h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="update.php" id="upformpic2" method="POST" enctype="multipart/form-data">
        <div class="field image form-control">
                        <button type="button" style="color:green" class="btn btn-outline-warning round shadow-lg"><label style="cursor:pointer" for="imgup222"><span class="bi bi-file-image"></span> Upload Picture-<span style="width:20px; height:20px" class="bi bi-cloud-plus-fill"></span></label></button>
                        <input style="display:none" type="file" onchange="getImageup2(this.value)" name="updateimage" class="form-control" id="imgup222" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
                        <div style="color:red" class="btn btn-outline-info" id="display-imageup2"></div>
                        </div>
                        <div class="form-floating">
                          <input class="form-control w-100 bg-secondary text-warning" type="hidden" name="upproidpic" value="<?=$row1['unique_id']?>" placeholder="">
                          <label for=""></label>
                        </div>
                        <br>
                        <div class="field button">
                        <!-- <input type="submit" class="btn btn-info submittwo" name="updatepic" value="Update"> -->
                        </div>
                                                       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" name="updatepic2" class="btn btn-primary uppicBtn2">Update</button>
        </form>
        <script>
                                                                function getImageup2(imagenameup2){
                                                                    var newimgup2 = imagenameup2.replace(/^.*\\/,"");
                                                                    $('#display-imageup2').html(newimgup2);
                                                                }
                                                        </script>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="drop3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update Your Profile Data</h5>
        <h6 style="border-radius:6px; margin-left:5px" class="modal-title text-center text-warning bg-secondary border border-rounded " id="error_status_details"></h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">

        <form action="updatepro.php" id="profileform" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-6">
                        <div class="form-floating">
                          <input class="form-control w-100 bg-secondary text-warning" type="text" name="upproname" value="<?=$row1['name']?>" placeholder="">
                          <label for="">Name</label>
                        </div>
                        <div class="form-floating">
                          <input class="form-control w-100 bg-secondary text-warning" type="text" name="upprophone" value="<?=$row1['phone']?>" placeholder="">
                          <label for="">Phone</label>
                        </div>
                        <div class="form-floating">
                          <input class="form-control w-100 bg-secondary text-warning" type="text" name="upprodivision" value="<?=$row1['division']?>" placeholder="">
                          <label for="">Division</label>
                        </div>
                        <div class="form-floating">
                          <input class="form-control w-100 bg-secondary text-warning" type="text" name="upprodistrict" value="<?=$row1['district']?>" placeholder="">
                          <label for="">District</label>
                        </div>
                        <div class="form-floating">
                          <input class="form-control w-100 bg-secondary text-warning" type="text" name="upproupazila" value="<?=$row1['upazila']?>" placeholder="">
                          <label for="">Upazila</label>
                        </div>
                        
                </div>
                <div class="col-md-6">
                <div class="form-floating">
                          <input class="form-control w-100 bg-secondary text-warning" type="text" name="upprounion" value="<?=$row1['unions']?>" placeholder="">
                          <label for="">Union</label>
                        </div>
                <div class="form-floating">
                          <input class="form-control w-100 bg-secondary text-warning" type="text" name="upproword" value="<?=$row1['word']?>" placeholder="">
                          <label for="">Word</label>
                        </div>
                        <div class="form-floating">
                          <input class="form-control w-100 bg-secondary text-warning" type="text" name="upprovillage" value="<?=$row1['village']?>" placeholder="">
                          <label for="">Village</label>
                        </div>
                        <div class="form-floating">
                          <input class="form-control w-100 bg-secondary text-warning" type="email" name="upproemail" value="<?=$row1['email']?>" placeholder="">
                          <label for="">Email</label>
                        </div>
                        <div class="form-floating">
                          <input class="form-control w-100 bg-secondary text-warning" type="hidden" name="upproid" value="<?=$row1['unique_id']?>" placeholder="">
                          <label for=""></label>
                        </div>
                        <input type="button" name="upprosave" class="btn btn-outline-warning m-auto text-center" value="Update" disabled>
                </div>
              </div>
        

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="upprosave" class="btn btn-warning">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>





        <div class="profile-review tab">
        <header class="header2">
              <nav class="navbar">
                      <a class="bttn-1" href="#home"><i class="bi bi-file-earmark-person-fill">.<span class="sp1">#CV</span></i></a>
                      <a class="bttn-2" href="#about"><i class="bi bi-person-check-fill">.<span class="sp2">#Friends</span></i></a>
                      <a class="bttn-3" href="#gallery"><i class="bi bi-bag-plus">.<span class="sp3">#Courses</span></i></a>
                      <a class="bttn-4" href="#portfolio"><i class="bi bi-question-circle-fill">.<span class="sp4">#Q&A</span></i></a>
                      <a class="bttn-5" href="#contact"><i class="bi bi-telephone">.<span class="sp5">#Contact</span></i></a>
              </nav>
          </header>

          <div id="mg-1" class="container mg-1">
                <h1>#CV</h1>

                         
                <div class="container text-center shadow-lg">
                  <h6 class="text-info sticky-top" id="error_status_up6"></h6>
                  
                  <button class="btn btn-dark text-secondary w-100" data-bs-toggle="modal" data-bs-target="#p-6"><i class="bi bi-plus"></i> CV setting</button>

                </div>


                <div class="container-fluid bg-light">
                  <div class="row bg-light text-dark">
                    <div class="col-md-8 mt-2 mb-1 pt-3">
                          <div class="container">
                            <h5>CURRICULUM VITAE</h5>
                            <h4 style="text-transform:capitalize"><?=$urow['name']?></h4>
                            <h6> <span style="font-weight:bolder" class="">Contact NO</span> <code style="margin-left:1px; margin-right:7px">:</code>   +88<?=$urow['phone'] ?></h6>
                            <h6>  <span style="font-weight:bolder" class="">E-mail</span>   <code style="margin-left:40px;margin-right:7px">:</code>   <?=$urow['email'] ?></h6>
                            <!-- <h6> <span style="font-weight:bolder;" class="">Address</span>   <code style="margin-left:28px">:</code> Madrasha Pada, W-1, Islampur Union, Napitkhali, Sadar, Cox'sBazar</h6> -->
                            <div style="" class="row"><div style="font-weight:bolder" class="col-3">Address<code style="margin-left:32px; margin-right: ;">:</code></div><div class="col"><?=$urow['village'].', '.$urow['word'].', '.$urow['unions'].', '.$urow['upazila'].', '.$urow['district'].', '.$urow['division'] ?></div></div>
                          </div>
                    </div>
                    <div class="col-md-4 mt-2 mb-1">
                          <img style="border:2px solid black; border-radius:4px" src="image/ImagePic.jpg" width="180px" height="200px" alt="">
                    </div>
                  </div>

                  <div class="row bg-light shadow-lg text-dark mt-2">
                    <div  class="col-md mt-2 mb-1">
                      <div style="border:1px solid" class="border-primary">
                        <h5 class="bg-primary text-light"># CAREER OBJECTIVE</h5>
                        <div style="margin-left:3px; margin-right: 3px; text-align:justify" class="text-cente p-2">
                          <div class="div"><?=$urow['c_objective']?></div>
                        </div>
                      </div>
                      
                    </div>
                  </div>

                  <div class="row bg-light shadow-lg text-dark mt-2">
                    <div  class="col-md mt-2 mb-1">
                      <div style="border:1px solid" class="border-success">
                        <h5 class="bg-success text-light"># CAREER SUMMARY</h5>
                        <div style="margin-left:3px; margin-right: 3px; text-align:justify" class="text-cente p-2">
                          <div class="div"><?=$urow['c_summary']?></div>
                        </div>
                      </div>
                      
                    </div>
                  </div>

                  <div class="row bg-light shadow-lg text-dark mt-2">
                    <div  class="col-md mt-2 mb-1">
                      <div style="border:1px solid" class="border-secondary">
                        <h5 class="bg-secondary text-light"># EXPERIENCE</h5>
                        <div id="u_exp" style="margin-left:3px; margin-right: 3px;" class="text-cente">
                              <div class="container mb-2 mt-2">

                                <h4 style="border-bottom:2px solid #42f551" class="">1. COMPANY ONE</h4>
                                <div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-2">Position<code style="margin-left:31px; margin-right: ;">:</code></div><div class="col-md-10">Deauty sales Manger</div></div>
                                <div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-2">Location<code style="margin-left:27px; margin-right: ;">:</code></div><div class="col-md-10">Deauty sales Manger, Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, repellat!</div></div>
                                <div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-2">Duration<code style="margin-left:25px; margin-right: ;">:</code></div><div class="col-md-10">Deauty sales Manger</div></div></br>
                                <h5 style="margin-left:15px" class="">Achievement:</h5>
                                <div style="border:2px solid #42f551; margin-left:15px; font-weight:bolder" class="p-2">
                                  farha;d Lorem, ipsum dolor. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quia ex quas ut soluta, est mollitia quaerat nesciunt tempore excepturi minima rerum perspiciatis illum beatae sint? Voluptate illo eius facere dicta?
                                </div>


                              </div>

                              <div class="container mb-2 mt-2">

                                <h4 style="border-bottom:2px solid #42f551" class="">2. COMPANY ONE</h4>
                                <div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-2">Position<code style="margin-left:31px; margin-right: ;">:</code></div><div class="col-md-10">Deauty sales Manger</div></div>
                                <div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-2">Location<code style="margin-left:27px; margin-right: ;">:</code></div><div class="col-md-10">Deauty sales Manger, Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, repellat!</div></div>
                                <div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-2">Duration<code style="margin-left:25px; margin-right: ;">:</code></div><div class="col-md-10">Deauty sales Manger</div></div></br>
                                <h5 style="margin-left:15px" class="">Achievement:</h5>
                                <div style="border:2px solid #42f551; margin-left:15px; font-weight:bolder" class="p-2">
                                  farha;d Lorem, ipsum dolor. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quia ex quas ut soluta, est mollitia quaerat nesciunt tempore excepturi minima rerum perspiciatis illum beatae sint? Voluptate illo eius facere dicta?
                                </div>


                              </div>

                              <div class="container mb-2 mt-2">

                                <h4 style="border-bottom:2px solid #42f551" class="">3. COMPANY ONE</h4>
                                <div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-2">Position<code style="margin-left:31px; margin-right: ;">:</code></div><div class="col-md-10">Deauty sales Manger</div></div>
                                <div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-2">Location<code style="margin-left:27px; margin-right: ;">:</code></div><div class="col-md-10">Deauty sales Manger, Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, repellat!</div></div>
                                <div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-2">Duration<code style="margin-left:25px; margin-right: ;">:</code></div><div class="col-md-10">Deauty sales Manger</div></div></br>
                                <h5 style="margin-left:15px" class="">Achievement:</h5>
                                <div style="border:2px solid #42f551; margin-left:15px; font-weight:bolder" class="p-2">
                                  farha;d Lorem, ipsum dolor. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quia ex quas ut soluta, est mollitia quaerat nesciunt tempore excepturi minima rerum perspiciatis illum beatae sint? Voluptate illo eius facere dicta?
                                </div>


                              </div>
                          
                        </div>
                      </div>
                      
                    </div>
                  </div>

                  <div class="row bg-light shadow-lg text-dark mt-2">
                    <div  class="col-md mt-2 mb-1">
                      <div style="border:1px solid #42f551" class="border-primar">
                        <h5 style="background:#42f551" class="bg-primar text-light"># EDUCATIONAL QUALIFICATION</h5>
                        <div id="u_edu" style="margin-left:3px; margin-right: 3px;" class="text-cente">
                          

                            <div class="container mb-2 mt-2">

                              <h4 style="border:2px solid #42f551" class="text-center">2. COMPANY ONE</h4>
                              <div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-3">University<code style="margin-left:34px; margin-right: ;">:</code></div><div style="font-weight:bolder"  class="col-md-9">East Delta University</div></div>
                              <div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-3">Subject<code style="margin-left:53px; margin-right: ;">:</code></div><div style="font-weight:bolder"  class="col-md-9">Deauty sales Manger, Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, repellat!</div></div>
                              <div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-3">Board<code style="margin-left:62px; margin-right: ;">:</code></div><div style="font-weight:bolder"  class="col-md-9">Deauty sales Manger</div></div>
                              <div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-3">Passing Year<code style="margin-left:15px; margin-right: ;">:</code></div><div style="font-weight:bolder"  class="col-md-9">Deauty sales Manger</div></div>
                              <div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-3">Result<code style="margin-left:61px; margin-right: ;">:</code></div><div style="font-weight:bolder"  class="col-md-9">Deauty sales Manger</div></div></br>
                              


                            </div>

                          

                        </div>
                      </div>
                      
                    </div>
                  </div>

                  <div class="row bg-light shadow-lg text-dark mt-2">
                    <div  class="col-md mt-2 mb-1">
                      <div style="border:1px solid" class="border-primary">
                        <h5 class="bg-primary text-light"># SPECIAL QUALIFICATION EXPERIENCE</h5>
                        <div style="margin-left:3px; margin-right: 3px;  text-align:justify" class="text-cente p-2">
                          <div class="div"><?=$urow['s_q']?></div>
                        </div>
                      </div>
                      
                    </div>
                  </div>

                  <div class="row bg-light shadow-lg text-dark mt-2">
                    <div  class="col-md mt-2 mb-1">
                      <div style="border:1px solid #e40046" class="border-primar">
                        <h5 style="background:#e40046" class="bg-primar text-light"># PERSONAL INFORMATION</h5>
                        <div style="margin-left:3px; margin-right: 3px;" class="text-cente p-2">
                          
                        

                                                    
                            
                        <div class="containe mb-2 mt-2">


                          <div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-4">Father's Name<code style="margin-left:62px; margin-right: ;">:</code></div><div style="font-weight:bolder"  class="col-md-8"><?=$urow['f_name']?></div></div>
                          <div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-4">Mother's Name<code style="margin-left:53px; margin-right: ;">:</code></div><div style="font-weight:bolder"  class="col-md-8"><?=$urow['m_name']?></div></div>
                          <div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-4">Date Of Birth<code style="margin-left:70px; margin-right: ;">:</code></div><div style="font-weight:bolder"  class="col-md-8"><?=$urow['dob']?></div></div>
                          <div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-4">Marital Status<code style="margin-left:64px; margin-right: ;">:</code></div><div style="font-weight:bolder"  class="col-md-8"><?=$urow['m_status']?></div></div>
                          <div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-4">Religion<code style="margin-left:106px; margin-right: ;">:</code></div><div style="font-weight:bolder"  class="col-md-8"><?=$urow['religion']?></div></div>
                          <div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-4">Parmanent Address<code style="margin-left:22px; margin-right: ;">:</code></div><div style="font-weight:bolder"  class="col-md-8"><?=$urow['p_address']?></div></div></br>



                        </div>




                        </div>
                      </div>
                      
                    </div>
                  </div>

                  <div class="row bg-light shadow-lg text-dark mt-2">
                    <div  class="col-md mt-2 mb-1">
                      <div style="border:1px solid" class="border-success">
                        <h5 class="bg-success text-light"># COMPUTER SKILL</h5>
                        <div style="margin-left:3px; margin-right: 3px;" class="text-cente p-2">
                          <div class="div">
                          <?=$urow['com_skill']?>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                  </div>

                  <div class="row bg-light shadow-lg text-dark mt-2">
                    <div  class="col-md mt-2 mb-1">
                      <div style="border:1px solid #42f551" class="border-primar">
                        <h5 style="background:#42f551" class="bg-primar text-light"># LANGUAGE PROFICIANCE</h5>
                        <div style="margin-left:3px; margin-right: 3px;" class="text-cente p-2">
                          <div class="div"><?=$urow['lang_skill']?></div>
                        </div>
                      </div>
                      
                    </div>
                  </div>

                  <div class="row bg-light shadow-lg text-dark mt-2">
                    <div  class="col-md mt-2 mb-1">
                      <div style="border:1px solid" class="border-primary">
                        <h5 class="bg-primary text-light"># HOBBIES & INTEREST</h5>
                        <div style="margin-left:3px; margin-right: 3px;" class="text-cente p-2">
                          <div class="div"><?=$urow['h_int']?></div>
                        </div>
                      </div>
                      
                    </div>
                  </div>

                  <div class="row bg-light shadow-lg text-dark mt-2">
                    <div  class="col-md mt-2 mb-1">
                      <div style="border:1px solid" class="border-secondary">
                        <h5 class="bg-secondary text-light"># REFERENCE</h5>
                        <div style="margin-left:3px; margin-right: 3px;" class="text-cente p-2">
                          <div class="container">

                            <div id="u_ref" class="row">

                              <div style="border-right:1px solid black" class="col-md text-center">
                                <?=$urow['ref1']?>
                                <h5 style="font-weight:bolder">#Farhad Foysal</h5>
                                <h6>Lorem ipsum dolor sit amet.</h6>
                                <h6>Lorem ipsum dolor sit amet.</h6>
                                <h6>Lorem ipsum dolor sit amet.</h6>
                                <h6>Lorem ipsum dolor sit amet.</h6>
                              </div>
                              <div style="border-left:1px solid black" class="col-md text-center">
                              <?=$urow['ref2']?>
                                <h5 style="font-weight:bolder">#Farhad Foysal</h5>
                                <h6>Lorem ipsum dolor sit amet.</h6>
                                <h6>Lorem ipsum dolor sit amet.</h6>
                                <h6>Lorem ipsum dolor sit amet.</h6>
                                <h6>Lorem ipsum dolor sit amet.</h6>
                              </div>

                            </div>

                          </div>
                        </div>
                      </div>
                      
                    </div>
                  </div>

                  <div class="row bg-light shadow-lg text-dark mt-2">
                    <div  class="col-md mt-2 mb-3">
                      <div style="border:1px solid #42f551" class="border-primar">
                        <h5 style="background:#42f551" class="bg-primar text-light"># DECLARATION & SIGNATURE</h5>
                        <div style="margin-left:3px; margin-right: 3px;" class="text-cente p-2">
                          <h6>I am <span style="text-transform:capitalize" class=""><?=$urow['name']?></span> here declared that all the above information about me is true.</h6>
                          <br>
                          <br>
                          <br>
                          <br>
                            <div class="row">
                              <div class="col-4 text-center">
                                <img src="image/ImagePic.jpg<?=$urow['signature']?>" width="220px" height="80px" alt="">  
                              <h5 style="border-top:3px solid black">Signature</h5></div>
                              <div class="col-6"></div>
                            </div>

                        </div>
                      </div>
                      
                    </div>
                  </div>
                  <!-- <div class="row"></div>
                  <div class="row"></div>
                  <div class="row"></div>
                  <div class="row"></div> -->
                </div>



          </div>
          <div id="mg-2" class="container mg-2">
                <h1>#Friends</h1>





          </div>
          <div id="mg-3" class="container mg-3">
                <h1>#Courses</h1>




          </div>
          <div id="mg-4" class="container mg-4">
                <h1>#Q&A</h1>




          </div>
          <div id="mg-5" class="container mg-5">
                <h1>#Contact</h1>





          </div>



       
        </div>
        
        <div class="profile-settings tab">

        <header class="header2">
              <nav class="navbar">
                      <a class="bn-1" href="#home"><i class="bi bi-signpost">.<span class="sp1">#T~POST</span></i></a>
                      <a class="bn-2" href="#about"><i class="bi bi-signpost-2">.<span class="sp2">#S~POST</span></i></a>
                      <a class="bn-3" href="#gallery"><i class="bi bi-pen">.<span class="sp3">Student</span></i></a>
                      <a class="bn-4" href="#portfolio"><i class="bi bi-pencil-fill">.<span class="sp4">Mentor</span></i></a>
                      <a class="bn-5" href="#contact"><i class="bi bi-folder2-open">.<span class="sp5">Contact</span></i></a>
              </nav>
          </header>

          <div id="mssg-1" class="container mssg-1">
                <h1>#TUTOR POST</h1>


                         
                <div class="container text-center shadow-lg">
                  <h6 class="text-info sticky-top" id="error_status_up7"></h6>
                  
                  <button class="btn btn-dark text-secondary w-100" data-bs-toggle="modal" data-bs-target="#p-7"><i class="bi bi-plus"></i> Add Tutor Post</button>

                </div>




          </div>
          <div id="mssg-2" class="container mssg-2">
                <h1>#Student Post</h1>


                         
                <div class="container text-center shadow-lg">
                  <h6 class="text-info sticky-top" id="error_status_up8"></h6>
                  
                  <button class="btn btn-dark text-secondary w-100" data-bs-toggle="modal" data-bs-target="#p-8"><i class="bi bi-plus"></i> Add Student post</button>

                </div>





          </div>
          <div id="mssg-3" class="container mssg-3">
                <h1>Student</h1>
          </div>
          <div id="mssg-4" class="container mssg-4">
                <h1>Mentor</h1>
          </div>
          <div id="mssg-5" class="container mssg-5">
                <h1>Contact</h1>




          </div>

        <h1>S&T</h1>





            
        </div>

        <div class="profile-videos tab">
          <header class="header2">
              <nav class="navbar">
                      <a class="btn-1" href="#home"><i class="bi bi-pause-circle-fill">.<span class="sp1">#A</span></i></a>
                      <a class="btn-2" href="#about"><i class="bi bi-play-fill">.<span class="sp2">#B</span></i></a>
                      <a class="btn-3" href="#gallery"><i class="bi bi-play-circle">.<span class="sp3">#C</span></i></a>
                      <a class="btn-4" href="#portfolio"><i class="bi bi-bell-fill">.<span class="sp4">#Notice</span></i></a>
                      <a class="btn-5" href="#contact"><i class="bi bi-cloud-download-fill">.<span class="sp5">#Download</span></i></a>
              </nav>
          </header>

          <div id="msg-1" class="container msg-1">

                   
          <div class="container text-center shadow-lg">
                  <h6 class="text-info sticky-top" id="error_status_up9"></h6>
                  
                  <button class="btn btn-dark text-secondary w-100" data-bs-toggle="modal" data-bs-target="#p-9"><i class="bi bi-plus"></i> Add Video A</button>

                </div>

 


                    <div class="vlist mt-2">
                     <div class="container2">

                 
                      

                        <!-- <iframe width="100%" height="100%" id="video_id" src="https://www.youtube.com/embed/_08Q2hq3U9Q?rel=0"
                        frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe> -->

                        <div class="main-video">
                              <div class="video">
                                    <iframe width="100%" class="vide"  height="100%" id="video_id" src="https://www.youtube.com/embed/_08Q2hq3U9Q?rel=0"
                                    frameborder="0" controls muted autoplay allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                                    <h3 class="title">video 1 Assalamualaikum</h3>
                              </div>
                        </div>

                        <div id="video1_dat" class="video-list">
                          
<?php
    include('db.php');


    $data2="SELECT * FROM videos_demo WHERE album='SA' AND secure='S' AND unique_id='$idu' ORDER BY id DESC";
    $im2="SELECT * FROM users WHERE unique_id='$idu'";
    

    $sqldata2=mysqli_query($con,$data2);

    $imgs2=mysqli_query($con,$im2);
    $img2=mysqli_fetch_assoc($imgs2);
  
    if(mysqli_num_rows($sqldata2)>0){
        while  ($datarow2=mysqli_fetch_assoc($sqldata2)){
            ?>
                 
                            <div class="vid2 <?=$datarow2['img']?>">
                                    <iframe width="100%" class="vide"  height="100%" id="video_id" src="https://www.youtube.com/embed/<?=$datarow2['link']?>?rel=0"
                                    frameborder="0" muted allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                                    <h3 class="title"><code class=""><?=$datarow2['std_show']?>views <?=$datarow2['time']?></code> <?=$datarow2['v_name']?>  </h3>    
                            </div>
                            
<?php
        }
    }


?>

                          <!-- <div class="vid2 active">
                                    <iframe width="100%" class="vide"  height="100%" id="video_id" src="https://www.youtube.com/embed/_08Q2hq3U9Q?rel=0"
                                    frameborder="0" muted allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                                    <h3 class="title">video 1 Assalamualaikum</h3>    
                          </div> -->
                          <!-- <div class="vid2">
                                    <iframe width="100%" class="vide"  class="vide"  height="100%" id="video_id" src="https://www.youtube.com/embed/xP09I3LKjQU?rel=0"
                                    frameborder="0" muted allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                                    <h3 class="title">video 2 Assalamualaikum</h3>    
                          </div>
                          <div class="vid2">
                                    <iframe width="100%" class="vide"  height="100%" id="video_id" src="https://www.youtube.com/embed/_08Q2hq3U9Q?rel=0"
                                    frameborder="0" muted allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                                    <h3 class="title">video 3 Assalamualaikum</h3>    
                          </div>
                          <div class="vid2">
                                    <iframe width="100%" class="vide"  height="100%" id="video_id" src="https://www.youtube.com/embed/chaGhpMN980?rel=0"
                                    frameborder="0" muted allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                                    <h3 class="title">video 4 Assalamualaikum</h3>    
                          </div>
                          <div class="vid2">
                                    <iframe width="100%" class="vide"  height="100%" id="video_id" src="https://www.youtube.com/embed/_08Q2hq3U9Q?rel=0"
                                    frameborder="0" muted allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                                    <h3 class="title">video 5 Assalamualaikum</h3>    
                          </div>
                          <div class="vid2">
                                    <iframe width="100%" class="vide"  height="100%" id="video_id" src="https://www.youtube.com/embed/pQeHyom613Q?rel=0"
                                    frameborder="0" muted allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                                    <h3 class="title">video 6 Assalamualaikum</h3>    
                          </div>
                          <div class="vid2">
                                    <iframe width="100%" class="vide"  height="100%" id="video_id" src="https://www.youtube.com/embed/_08Q2hq3U9Q?rel=0"
                                    frameborder="0" muted allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                                    <h3 class="title">video 7 Assalamualaikum</h3>    
                          </div>
                          <div class="vid2">
                                    <iframe width="100%" class="vide"  height="100%" id="video_id" src="https://www.youtube.com/embed/pQeHyom613Q?rel=0"
                                    frameborder="0" muted allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                                    <h3 class="title">video 8 Assalamualaikum</h3>    
                          </div> -->
                        </div>

                      

                     </div>                                                     
                    </div>
            



          </div>
          <div id="msg-2" class="container msg-2">
                <h1>B</h1>

                         
                <div class="container text-center shadow-lg">
                  <h6 class="text-info sticky-top" id="error_status_up10"></h6>
                  
                  <button class="btn btn-dark text-secondary w-100" data-bs-toggle="modal" data-bs-target="#p-10"><i class="bi bi-plus"></i> Add Video B</button>

                </div>


                                      
 


                    <div class="vlist mt-2">
                     <div class="containera">

                        <div class="main-video3">
                              <div class="video">
                                    <iframe width="100%" class="vide"  height="100%" id="video_id" src="https://www.youtube.com/embed/_08Q2hq3U9Q?rel=0"
                                    frameborder="0" controls muted autoplay allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                                    <h3 class="title">video 1 Assalamualaikum</h3>
                              </div>
                        </div>

                        <div id="video1_dat" class="video-list3">
                          
<?php
    include('db.php');


    $data3="SELECT * FROM videos_demo WHERE album='SB' AND secure='S' AND unique_id='$idu' ORDER BY id DESC";
    $im3="SELECT * FROM users WHERE unique_id='$idu'";
    

    $sqldata3=mysqli_query($con,$data3);

    $imgs3=mysqli_query($con,$im3);
    $img3=mysqli_fetch_assoc($imgs3);
  
    if(mysqli_num_rows($sqldata3)>0){
        while  ($datarow3=mysqli_fetch_assoc($sqldata3)){
            ?>
                 
                            <div class="vid3 <?=$datarow3['img']?>">
                                    <iframe width="100%" class="vide"  height="100%" id="video_id" src="https://www.youtube.com/embed/<?=$datarow3['link']?>?rel=0"
                                    frameborder="0" muted allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                                    <h3 class="title"><code class=""><?=$datarow3['std_show']?>views <?=$datarow3['time']?></code> <?=$datarow3['v_name']?>  </h3>    
                            </div>
                            
<?php
        }
    }


?>

                    
                        </div>

                      

                     </div>                                                     
                    </div>
            



          </div>
          <div id="msg-3" class="container msg-3">
                <h1>C</h1>

                         
                <div class="container text-center shadow-lg">
                  <h6 class="text-info sticky-top" id="error_status_up11"></h6>
                  
                  <button class="btn btn-dark text-secondary w-100" data-bs-toggle="modal" data-bs-target="#p-11"><i class="bi bi-plus"></i> Add video C</button>

                </div>




                <div class="vlist mt-2">
                     <div class="containerab">

                        <div class="main-video33">
                              <div class="video">
                                    <iframe width="100%" class="vide"  height="100%" id="video_id" src="https://www.youtube.com/embed/_08Q2hq3U9Q?rel=0"
                                    frameborder="0" controls muted autoplay allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                                    <h3 class="title">video 1 Assalamualaikum</h3>
                              </div>
                        </div>

                        <div id="video1_dat" class="video-list33">
                          
<?php
    include('db.php');


    $data33="SELECT * FROM videos_demo WHERE album='SC' AND secure='S' AND unique_id='$idu' ORDER BY id DESC";
    $im33="SELECT * FROM users WHERE unique_id='$idu'";
    

    $sqldata33=mysqli_query($con,$data33);

    $imgs33=mysqli_query($con,$im33);
    $img33=mysqli_fetch_assoc($imgs33);
  
    if(mysqli_num_rows($sqldata33)>0){
        while  ($datarow33=mysqli_fetch_assoc($sqldata33)){
            ?>
                 
                            <div class="vid33 <?=$datarow3['img']?>">
                                    <iframe width="100%" class="vide"  height="100%" id="video_id" src="https://www.youtube.com/embed/<?=$datarow33['link']?>?rel=0"
                                    frameborder="0" muted allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                                    <h3 class="title"><code class=""><?=$datarow33['std_show']?>views <?=$datarow33['time']?></code> <?=$datarow33['v_name']?>  </h3>    
                            </div>
                            
<?php
        }
    }


?>

                    
                        </div>

                      

                     </div>                                                     
                    </div>
            




          </div>
          <div id="msg-4" class="container msg-4">
                <h1>Notice</h1>

                         
                <div class="container text-center shadow-lg">
                  <h6 class="text-info sticky-top" id="error_status_up12"></h6>
                  
                  <button class="btn btn-dark text-secondary w-100" data-bs-toggle="modal" data-bs-target="#p-12"><i class="bi bi-plus"></i> Add Notice</button>

                </div>




          </div>
          <div id="msg-5" class="container msg-5">
                <h1>Download</h1>

                         
                <div class="container text-center shadow-lg">
                  <h6 class="text-info sticky-top" id="error_status_up13"></h6>
                  
                  <button class="btn btn-dark text-secondary w-100" data-bs-toggle="modal" data-bs-target="#p-13"><i class="bi bi-plus"></i> Add Download Link</button>

                </div>


          </div>
          <!-- <div class="container">
            <section id="home" class="section">Home</section>
            <section id="about" class="section">About</section>
            <section id="gallery" class="section">Gallery</section>
            <section id="portfolio" class="section">Portfolio</section>
            <section id="contact" class="section">Contact</section>
          </div> -->
        
        </div>

      </div>
    </div>
  </div>
</div>







  <div class="container mt-3">

<div class="row">
<div class="col-md-6">
          <div class="container-fluid  bg-light">

          </div>
      </div>
      <div class="col-md-3">

      </div>
      <div class="col-md-3">

      </div>

</div>
    

  </div>






<!-- top and bottom notification -->




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

                         <img  class="card-img" alt="">
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
        <button type="button" class="btn btn-primary">hi!</button>
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



<!--  -->

<!-- Modal v1-->
<div class="modal fade" id="p-11" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Create a New video(C)</h5>
        <h6 style="border-radius:6px; margin-left:5px" class="modal-title text-center text-warning bg-secondary border border-rounded" id="error_status_vcp4"></h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body ">
      
      <div style="width:100%" class="w-100">
        <form action="po_action.php"  method="POST" id="formdatavcc" enctype="multipart/form-data">
          <input type="hidden" name="unidvcc" id="po_idvcc" value="<?= $row1['unique_id']?>">
          

    <div style="width:100%" class="form-floating">
      <input id="po_linkvcc" name="linkvcc" class="form-control w-100"  contentwirteble="true"  placeholder="What's on your mind, Edulearner?"  required>
    <label for="">Add a youtube link like  ( _08Q2hq3U9Q )</label>  
    </div>
    <hr>

                                                            <br>
                                                            <div class="field button">


      <div style="width:100%" class="form-floating">
      <input id="po_textvcc" name="crpostvcc" class="form-control w-100"  contentwirteble="true"  placeholder="What's on your mind, Edulearner?"  required>
    <label for="">What's on your mind! for this video</label>  
    </div>
    <hr>


                                                            <input type="submit" id="" class="btn btn-info subvideo1 w-100" name="v4save" value="Save" disabled>
      </div>      
      

      </div>
    
    </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="<?= $_SESSION['unique_id']?>" name="v4save" class="btn btn-primary add_videoc_btn add_videoc_btn1">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>



<!-- Modal v1-->
<div class="modal fade" id="p-10" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Create a New video(B)</h5>
        <h6 style="border-radius:6px; margin-left:5px" class="modal-title text-center text-warning bg-secondary border border-rounded" id="error_status_vbp4"></h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body ">
      
      <div style="width:100%" class="w-100">
        <form action="po_action.php"  method="POST" id="formdatavbc" enctype="multipart/form-data">
          <input type="hidden" name="unidvbc" id="po_idvbc" value="<?= $row1['unique_id']?>">
          

    <div style="width:100%" class="form-floating">
      <input id="po_linkvbc" name="linkvbc" class="form-control w-100"  contentwirteble="true"  placeholder="What's on your mind, Edulearner?"  required>
    <label for="">Add a youtube link like  ( _08Q2hq3U9Q )</label>  
    </div>
    <hr>

                                                            <br>
                                                            <div class="field button">


      <div style="width:100%" class="form-floating">
      <input id="po_textvbc" name="crpostvbc" class="form-control w-100"  contentwirteble="true"  placeholder="What's on your mind, Edulearner?"  required>
    <label for="">What's on your mind! for this video</label>  
    </div>
    <hr>


                                                            <input type="submit" id="" class="btn btn-info subvideo1 w-100" name="v3save" value="Save" disabled>
      </div>      
      

      </div>
    
    </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="<?= $_SESSION['unique_id']?>" name="v3save" class="btn btn-primary add_videob_btn add_videob_btn1">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="p-9" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Create a New video(A)</h5>
        <h6 style="border-radius:6px; margin-left:5px" class="modal-title text-center text-warning bg-secondary border border-rounded" id="error_status_vap4"></h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body ">
      
      <div style="width:100%" class="w-100">
        <form action="po_action.php"  method="POST" id="formdatavac" enctype="multipart/form-data">
          <input type="hidden" name="unidvac" id="po_idvac" value="<?= $row1['unique_id']?>">
          

    <div style="width:100%" class="form-floating">
      <input id="po_linkvac" name="linkvac" class="form-control w-100"  contentwirteble="true"  placeholder="What's on your mind, Edulearner?"  required>
    <label for="">Add a youtube link like  ( _08Q2hq3U9Q )</label>  
    </div>
    <hr>

                                                            <br>
                                                            <div class="field button">


      <div style="width:100%" class="form-floating">
      <input id="po_textvac" name="crpostvac" class="form-control w-100"  contentwirteble="true"  placeholder="What's on your mind, Edulearner?"  required>
    <label for="">What's on your mind! for this video</label>  
    </div>
    <hr>


                                                            <input type="submit" id="" class="btn btn-info subvideo1 w-100" name="v2save" value="Save" disabled>
      </div>      
      

      </div>
    
    </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="<?= $_SESSION['unique_id']?>" name="v2save" class="btn btn-primary add_videoa_btn add_videoa_btn1">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>

  
<!-- Modal v1-->
<div class="modal fade" id="p-4" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Create a New video(1)</h5>
        <h6 style="border-radius:6px; margin-left:5px" class="modal-title text-center text-warning bg-secondary border border-rounded" id="error_status_vp4"></h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body ">
      
      <div style="width:100%" class="w-100">
        <form action="po_action.php"  method="POST" id="formdatavc" enctype="multipart/form-data">
          <input type="hidden" name="unidvc" id="po_idvc" value="<?= $row1['unique_id']?>">
          

    <div style="width:100%" class="form-floating">
      <input id="po_linkvc" name="linkvc" class="form-control w-100"  contentwirteble="true"  placeholder="What's on your mind, Edulearner?"  required>
    <label for="">Add a youtube link like  ( _08Q2hq3U9Q )</label>  
    </div>
    <hr>

                                                            <br>
                                                            <div class="field button">


      <div style="width:100%" class="form-floating">
      <input id="po_textvc" name="crpostvc" class="form-control w-100"  contentwirteble="true"  placeholder="What's on your mind, Edulearner?"  required>
    <label for="">What's on your mind! for this video</label>  
    </div>
    <hr>


                                                            <input type="submit" id="" class="btn btn-info subvideo1 w-100" name="v1save" value="Save" disabled>
      </div>      
      

      </div>
    
    </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="<?= $_SESSION['unique_id']?>" name="v1save" class="btn btn-primary add_video1_btn add_video1_btn1">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>




  
<!-- Modal -->
<div class="modal fade" id="p-3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Create a New Cover Photo</h5>
        <h6 style="border-radius:6px; margin-left:5px" class="modal-title text-center text-warning bg-secondary border border-rounded " id="error_status_p3"></h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body ">
      
      <div class="container w-100">
        <form action="po_action.php"  method="POST" id="formdatac" enctype="multipart/form-data">
          <input type="hidden" name="unidc" id="po_idc" value="<?= $row1['unique_id']?>">
          

      <div class="field image w-100 form-control">
                                                            <button type="button" style="color:green" class="btn btn-outline-warning round shadow-lg"><label style="cursor:pointer" for="imgac"><span class="bi bi-file-image"></span> Add cover Image-<span style="width:20px; height:20px" class="bi bi-cloud-plus-fill"></span></label></button>
                                                            <input style="display:none" type="file" onchange="getImgc(this.value)" name="filesc" class="form-control" id="imgac" accept="image/x-png,image/gif,image/jpeg,image/jpg" multiple>
                                                            <div style="color:red" class="btn btn-outline-info" id="displayimagec"></div>
                                                            </div>
                                                            <br>
                                                            <div class="field button">


      <div class="form-floating">
      <textarea id="po_textc" name="crpostc" class="form-control w-100"  contentwirteble="true" row="" placeholder="What's on your mind, Edulearner?"  required></textarea>
    <label for="">What's on your mind! for this photo!</label>  
    </div>
    <hr>


                                                            <input type="submit" id="" class="btn btn-info subvideo1 w-100" name="coversave" value="Save" disabled>
      </div>      
      
            <script>
                                                                function getImgc(imagenameq){
                                                                    var newimgq = imagenameq.replace(/^.*\\/,"");
                                                                    $('#displayimagec').html(newimgq);
                                                                }
            </script>
      </div>
    
    </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="<?= $_SESSION['unique_id']?>" name="coversave" class="btn btn-primary add_cover_btn add_cover_btn1">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>





  
<!-- Modal -->
<div class="modal fade" id="p-2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Create a New Qute</h5>
        <h6 style="border-radius:6px; margin-left:5px" class="modal-title text-center text-warning bg-secondary border border-rounded " id="error_status_p2"></h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      <div class="container w-100">
        <form action="po_action.php"  method="POST" id="formdataq" enctype="multipart/form-data">
          <input type="hidden" name="unidq" id="po_idq" value="<?= $row1['unique_id']?>">
          

      <div class="field image form-control">
                                                            <button type="button" style="color:green" class="btn btn-outline-warning round shadow-lg"><label style="cursor:pointer" for="imgaqute"><span class="bi bi-file-image"></span> Add Qute Image-<span style="width:20px; height:20px" class="bi bi-cloud-plus-fill"></span></label></button>
                                                            <input style="display:none" type="file" onchange="getImgq(this.value)" name="filesq" class="form-control" id="imgaqute" accept="image/x-png,image/gif,image/jpeg,image/jpg" multiple>
                                                            <div style="color:red" class="btn btn-outline-info" id="displayimagequte"></div>
                                                            </div>
                                                            <br>
                                                            <div class="field button">


      <div class="form-floating">
      <textarea id="po_textq" name="crpostq" class="form-control w-100"  contentwirteble="true" row="" placeholder="What's on your mind, Edulearner?"  required></textarea>
    <label for="">What's on your mind! for qute</label>  
    </div>
    <hr>

                                                            <div class="form-floating">
                                                            <input type="text" class="form-control w-100" id="po_nameq" name="ponameq" placeholder="<?= $row1['name']?> Type-name">
                                                            <label for="">Type a Qute name!</label>
                                                            </div>
                                                            <div class="form-floating">
                                                            <input type="text" class="form-control w-100" id="po_locationq" name="polocationq" placeholder="<?= $row1['name']?> Type-location">
                                                            <label for="">Your location</label>
                                                            </div>


                                                            <input type="submit" id="" class="btn btn-info subqute w-100" name="qutesave" value="Save" disabled>
      </div>      
      
            <script>
                                                                function getImgq(imagenameq){
                                                                    var newimgq = imagenameq.replace(/^.*\\/,"");
                                                                    $('#displayimagequte').html(newimgq);
                                                                }
            </script>
      </div>
    
    </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="<?= $_SESSION['unique_id']?>" name="qutesave" class="btn btn-primary add_qute_btn add_qute_btn1">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>





  
<!-- Modal -->
<div class="modal fade" id="p-1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Create a New Post</h5>
        <h6 style="border-radius:6px; margin-left:5px" class="modal-title text-center text-warning bg-secondary border border-rounded " id="error_status_p"></h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center m-auto">
      
      <div class="container">
        <form action="po_action.php"  method="POST" id="formdata" enctype="multipart/form-data">
          <input type="hidden" name="unid" id="po_id" value="<?= $row1['unique_id']?>">
          

                                                            <div class="form-floating">
                                                            <input type="text" class="form-control" id="po_header" name="posth" placeholder="<?= $row1['name']?> Type-Header">
                                                            <label for="">Post Header</label>
                                                            </div>


      <div class="field image form-control">
                                                            <button type="button" style="color:green" class="btn btn-outline-warning round shadow-lg"><label style="cursor:pointer" for="imga"><span class="bi bi-file-image"></span> Add Picture-<span style="width:20px; height:20px" class="bi bi-cloud-plus-fill"></span></label></button>
                                                            <input style="display:none" type="file" onchange="getImg(this.value)" name="files" class="form-control" id="imga" accept="image/x-png,image/gif,image/jpeg,image/jpg" multiple>
                                                            <div style="color:red" class="btn btn-outline-info" id="displayimage"></div>
                                                            </div>
                                                            <br>
                                                            <div class="field button">


      <div class="form-floating">
      <textarea id="po_text" name="crpost-1" class="form-control w-100"  contentwirteble="true" row="" placeholder="What's on your mind, Edulearner?"  required></textarea>
    <label for="">What's on your mind!</label>  
    </div>
    <hr>
      <div class="form-floating">
      <textarea id="createpost" name="crpost" class="ckeditor form-control w-100"  contentwirteble="true" row="" placeholder="What's on your mind, Edulearner?"  required></textarea>
      </div>
      

                                                            <input type="submit" id="" class="btn btn-info submittwo w-100" name="postsave" value="Save" disabled>
      </div>      
      

            <script>
              CKEDITOR.replace('createpost', {
                // height:300,
                extraPlugin:'filebrowser',
                filebrowserBrowsUrl:'brows.php',
                filebrowserUploadMethod:"form",
                filebrowserUploadUrl:"upload.php",
              });
            </script>
            <script>
                                                                function getImg(imagename){
                                                                    var newimg = imagename.replace(/^.*\\/,"");
                                                                    $('#displayimage').html(newimg);
                                                                }
            </script>
      </div>
    
    </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="<?= $_SESSION['unique_id']?>" name="postsave" class="btn btn-primary add_post_btn add_post_btn1">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- post action -->


<script>


// $(document).ready(function(){
//     $(document).on('click','.add_post_btn1', function(){

//       var po_msg = $('#createpost').val();
//       alert(po_msg);

//       $.ajax({
//                 url:'po_action.php',
//                 type:'post',
//                 data: {
//                   po_msg: po_msg
//                 },
//                 success: function(response){
                 
  
//                 }
//               });

//     });
//   });




  $(document).ready(function(){
    $(document).on('click','.add_post_btn', function(){

      var u_id = $(this).attr('id');

      var po_header = $('#po_header').val();

      var po_text = $('#po_text').val();
      var po_msg = $('#createpost').val();

      var po_form = new FormData($('#formdata')[0]);



      if($.trim(po_header).length == 0){
        error_msgim = " & Please add post header!";

      }else{
        error_msgim = "";
      }

      if($.trim(po_text).length == 0){
        error_msgp = "Please Type Few Words!"+ error_msgim;
        alert(error_msgp);
        $('#error_status_p').text(error_msgp);
      }else{
        error_msgp = ""+error_msgim;
        $('#error_status_p').text(error_msgp);
      }
      if(error_msgp != ''){
        return false;
      }else{
        $.ajax({
              url:'po_action.php',
              type:'post',
              // data: $('#formdata').serialize(),
              data: po_form,
              async: false,
              cache: false,
              contentType: false,
              enctype: 'multipart/form-data',
              processData: false,
              success: function(response){
                $('#error_status_p').html(response);
                alert(response); 

              }
            });
      }



    });
  });




  $(document).ready(function(){
    $(document).on('click','.add_qute_btn', function(){

      var u_id = $(this).attr('id');

      var po_name = $('#po_nameq').val();

      var po_textq = $('#po_textq').val();


      var po_formq = new FormData($('#formdataq')[0]);



      if($.trim(po_name).length == 0){
        error_msgimq = " & Please add a name!";

      }else{
        error_msgimq = "";
      }

      if($.trim(po_textq).length == 0){
        error_msgpq = "Please Type Few Words!"+ error_msgimq;
        alert(error_msgpq);
        $('#error_status_p2').text(error_msgpq);
      }else{
        error_msgpq = ""+error_msgimq;
        $('#error_status_p2').text(error_msgpq);
      }
      if(error_msgpq != ''){
        return false;
      }else{
        $.ajax({
              url:'po_action.php',
              type:'post',
              // data: $('#formdata').serialize(),
              data: po_formq,
              async: false,
              cache: false,
              contentType: false,
              enctype: 'multipart/form-data',
              processData: false,
              success: function(response){
                $('#error_status_p2').html(response);
                alert(response); 

              }
            });
      }



    });
  });


// add cover photo

$(document).ready(function(){
    $(document).on('click','.add_cover_btn', function(){

      var u_id = $(this).attr('id');

      var po_textc = $('#po_textc').val();
      var po_imgc = $('#imgac').val();


      var po_formc = new FormData($('#formdatac')[0]);



      if($.trim(po_imgc).length == 0){
        error_msgimc = " & Please add a Photo!";

      }else{
        error_msgimc = "";
      }

      if($.trim(po_textc).length == 0){
        error_msgpc = "Please Type Few Words!"+ error_msgimc;
        alert(error_msgpc);
        $('#error_status_p3').text(error_msgpc);
      }else{
        error_msgpc = ""+error_msgimc;
        $('#error_status_p3').text(error_msgpc);
      }
      if(error_msgpc != ''){
        return false;
      }else{
        $.ajax({
              url:'po_action.php',
              type:'post',
              // data: $('#formdata').serialize(),
              data: po_formc,
              async: false,
              cache: false,
              contentType: false,
              enctype: 'multipart/form-data',
              processData: false,
              success: function(response){
                $('#error_status_p3').html(response);
                alert(response); 

              }
            });
      }



    });
  });

// add video 1
$(document).ready(function(){
    $(document).on('click','.add_video1_btn', function(){

      var u_id = $(this).attr('id');

      var po_imgvc = $('#po_textvc').val();
      var po_textvc = $('#po_linkvc').val();


      var po_formvc = new FormData($('#formdatavc')[0]);



      if($.trim(po_imgvc).length == 0){
        error_msgimvc = " & Please Type Few Words! ";

      }else{
        error_msgimvc = "";
      }

      if($.trim(po_textvc).length == 0){
        error_msgpvc = "Please add a youtube video link "+ error_msgimvc;
        alert(error_msgpvc);
        $('#error_status_vp4').text(error_msgpvc);
      }else{
        error_msgpvc = ""+error_msgimvc;
        $('#error_status_vp4').text(error_msgpvc);
      }
      if(error_msgpvc != ''){
        return false;
      }else{
        $.ajax({
              url:'po_action.php',
              type:'post',
              // data: $('#formdata').serialize(),
              data: po_formvc,
              async: false,
              cache: false,
              contentType: false,
              enctype: 'multipart/form-data',
              processData: false,
              success: function(response){
                $('#error_status_vp4').html(response);
                alert(response); 

              }
            });
      }



    });
  });

// add video a
$(document).ready(function(){
    $(document).on('click','.add_videoa_btn', function(){

      var u_id = $(this).attr('id');

      var po_imgvac = $('#po_textvac').val();
      var po_textvac = $('#po_linkvac').val();


      var po_formvac = new FormData($('#formdatavac')[0]);



      if($.trim(po_imgvac).length == 0){
        error_msgimvac = " & Please Type Few Words! ";

      }else{
        error_msgimvac = "";
      }

      if($.trim(po_textvac).length == 0){
        error_msgpvac = "Please add a youtube video link "+ error_msgimvac;
        alert(error_msgpvac);
        $('#error_status_vap4').text(error_msgpvac);
      }else{
        error_msgpvac = ""+error_msgimvac;
        $('#error_status_vap4').text(error_msgpvac);
      }
      if(error_msgpvac != ''){
        return false;
      }else{
        $.ajax({
              url:'po_action.php',
              type:'post',
              // data: $('#formdata').serialize(),
              data: po_formvac,
              async: false,
              cache: false,
              contentType: false,
              enctype: 'multipart/form-data',
              processData: false,
              success: function(response){
                $('#error_status_vap4').html(response);
                alert(response); 

              }
            });
      }



    });
  });

// add video 1
$(document).ready(function(){
    $(document).on('click','.add_videob_btn', function(){

      var u_id = $(this).attr('id');

      var po_imgvbc = $('#po_textvbc').val();
      var po_textvbc = $('#po_linkvbc').val();


      var po_formvbc = new FormData($('#formdatavbc')[0]);



      if($.trim(po_imgvbc).length == 0){
        error_msgimvbc = " & Please Type Few Words! ";

      }else{
        error_msgimvbc = "";
      }

      if($.trim(po_textvbc).length == 0){
        error_msgpvbc = "Please add a youtube video link "+ error_msgimvbc;
        alert(error_msgpvbc);
        $('#error_status_vp4').text(error_msgpvbc);
      }else{
        error_msgpvbc = ""+error_msgimvbc;
        $('#error_status_vbp4').text(error_msgpvbc);
      }
      if(error_msgpvbc != ''){
        return false;
      }else{
        $.ajax({
              url:'po_action.php',
              type:'post',
              // data: $('#formdata').serialize(),
              data: po_formvbc,
              async: false,
              cache: false,
              contentType: false,
              enctype: 'multipart/form-data',
              processData: false,
              success: function(response){
                $('#error_status_vbp4').html(response);
                alert(response); 

              }
            });
      }



    });
  });

// add video 1
$(document).ready(function(){
    $(document).on('click','.add_videoc_btn', function(){

      var u_id = $(this).attr('id');

      var po_imgvcc = $('#po_textvcc').val();
      var po_textvc = $('#po_linkvcc').val();


      var po_formvcc = new FormData($('#formdatavcc')[0]);



      if($.trim(po_imgvcc).length == 0){
        error_msgimvcc = " & Please Type Few Words! ";

      }else{
        error_msgimvcc = "";
      }

      if($.trim(po_textvcc).length == 0){
        error_msgpvcc = "Please add a youtube video link "+ error_msgimvcc;
        alert(error_msgpvcc);
        $('#error_status_vcp4').text(error_msgpvc);
      }else{
        error_msgpvcc = ""+error_msgimvcc;
        $('#error_status_vcp4').text(error_msgpvcc);
      }
      if(error_msgpvcc != ''){
        return false;
      }else{
        $.ajax({
              url:'po_action.php',
              type:'post',
              // data: $('#formdata').serialize(),
              data: po_formvcc,
              async: false,
              cache: false,
              contentType: false,
              enctype: 'multipart/form-data',
              processData: false,
              success: function(response){
                $('#error_status_vcp4').html(response);
                alert(response); 

              }
            });
      }



    });
  });


  $(document).ready(function(){
    $(document).on('click','.uppicBtn1', function(){

      var u_id = $(this).attr('id');


      var po_textvcc1 = $('#imgup22').val();


      var po_formpic1 = new FormData($('#upformpic')[0]);


      if($.trim(po_textvcc1).length == 0){
        error_msgpic1 = "Please add a new image for update ";
        alert(error_msgpic1);
        $('#error_status_pic1').text(error_msgpic1);
      }else{
        error_msgpic1 = "";
        $('#error_status_pic1').text(error_msgpic1);
      }
      if(error_msgpic1 != ''){
        return false;
      }else{
        $.ajax({
              url:'po_action.php',
              type:'post',
              // data: $('#formdata').serialize(),
              data: po_formpic1,
              async: false,
              cache: false,
              contentType: false,
              enctype: 'multipart/form-data',
              processData: false,
              success: function(response){
                $('#error_status_pic1').html(response);
                alert(response); 

              }
            });
      }



    });
  });


  $(document).ready(function(){
    $(document).on('click','.uppicBtn2', function(){

      var u_id = $(this).attr('id');


      var po_textvcc12 = $('#imgup222').val();


      var po_formpic2 = new FormData($('#upformpic2')[0]);


      if($.trim(po_textvcc12).length == 0){
        error_msgpic12 = "Please add a new image for update ";
        alert(error_msgpic12);
        $('#error_status_pic2').text(error_msgpic12);
      }else{
        error_msgpic12 = "";
        $('#error_status_pic2').text(error_msgpic12);
      }
      if(error_msgpic12 != ''){
        return false;
      }else{
        $.ajax({
              url:'po_action.php',
              type:'post',
              // data: $('#formdata').serialize(),
              data: po_formpic2,
              async: false,
              cache: false,
              contentType: false,
              enctype: 'multipart/form-data',
              processData: false,
              success: function(response){
                $('#error_status_pic2').html(response);
                alert(response); 

              }
            });
      }



    });
  });



  $(document).ready(function(){
    $(document).on('click','.upbioBtn', function(){

      var u_id = $(this).attr('id');


      var po_bio = $('#biotext').val();


      var po_formbio = new FormData($('#formbio')[0]);


      if($.trim(po_bio).length == 0){
        error_msgpic12b = "Please Type a Few words for your bio";
        alert(error_msgpic12);
        $('#error_status_bio').text(error_msgpic12b);
      }else{
        error_msgpic12b = "";
        $('#error_status_bio').text(error_msgpic12b);
      }
      if(error_msgpic12b != ''){
        return false;
      }else{
        $.ajax({
              url:'po_action.php',
              type:'post',
              // data: $('#formdata').serialize(),
              data: po_formbio,
              async: false,
              cache: false,
              contentType: false,
              enctype: 'multipart/form-data',
              processData: false,
              success: function(response){
                $('#error_status_bio').html(response);
                alert(response); 

              }
            });
      }



    });
  });

</script>



    

<script>
    $date = "jan 27, 2022 00:00:00";
    const date=$date;
  let countDate = new Date(date).getTime();

function countDown(){
    let now = new Date().getTime();
    gap = countDate - now;

    let second = 1000;
    let minute =  second * 60;
    let hour = minute * 60;
    let day = hour * 24;

    let d = Math.floor(gap / (day));
    let h = Math.floor((gap % (day)) / (hour));
    let m = Math.floor((gap % (hour)) / (minute));
    let s = Math.floor((gap % (minute)) / (second));
    
    document.getElementById('day').innerText = d;
    document.getElementById('hour').innerText = h;
    document.getElementById('minute').innerText = m;
    document.getElementById('second').innerText = s;
    
}

setInterval(function(){
    countDown();
},1000)
</script>


<script type="text/javascript">
    $(document).ready(function(){
        $('.btttn-1').click(function(){
            $('.msssg-2').css('display','none');
            $('.msssg-3').css('display','none');
            $('.msssg-4').css('display','none');
            $('.msssg-5').css('display','none');
            $('.msssg-1').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.btttn-2').click(function(){
            $('.msssg-1').css('display','none');
            $('.msssg-3').css('display','none');
            $('.msssg-4').css('display','none');
            $('.msssg-5').css('display','none');
            $('.msssg-2').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.btttn-3').click(function(){
            $('.msssg-1').css('display','none');
            $('.msssg-2').css('display','none');
            $('.msssg-4').css('display','none');
            $('.msssg-5').css('display','none');
            $('.msssg-3').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.btttn-4').click(function(){
            $('.msssg-2').css('display','none');
            $('.msssg-3').css('display','none');
            $('.msssg-1').css('display','none');
            $('.msssg-5').css('display','none');
            $('.msssg-4').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.btttn-5').click(function(){
            $('.msssg-1').css('display','none');
            $('.msssg-2').css('display','none');
            $('.msssg-3').css('display','none');
            $('.msssg-4').css('display','none');
            $('.msssg-5').css('display','block'); 
        });
    });
</script>


  <script type="text/javascript">
    $(document).ready(function(){
        $('.btn-1').click(function(){
            $('.msg-2').css('display','none');
            $('.msg-3').css('display','none');
            $('.msg-4').css('display','none');
            $('.msg-5').css('display','none');
            $('.msg-1').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.btn-2').click(function(){
            $('.msg-1').css('display','none');
            $('.msg-3').css('display','none');
            $('.msg-4').css('display','none');
            $('.msg-5').css('display','none');
            $('.msg-2').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.btn-3').click(function(){
            $('.msg-1').css('display','none');
            $('.msg-2').css('display','none');
            $('.msg-4').css('display','none');
            $('.msg-5').css('display','none');
            $('.msg-3').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.btn-4').click(function(){
            $('.msg-2').css('display','none');
            $('.msg-3').css('display','none');
            $('.msg-1').css('display','none');
            $('.msg-5').css('display','none');
            $('.msg-4').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.btn-5').click(function(){
            $('.msg-1').css('display','none');
            $('.msg-2').css('display','none');
            $('.msg-3').css('display','none');
            $('.msg-4').css('display','none');
            $('.msg-5').css('display','block'); 
        });
    });
</script>




<script type="text/javascript">
    $(document).ready(function(){
        $('.bn-1').click(function(){
            $('.mssg-2').css('display','none');
            $('.mssg-3').css('display','none');
            $('.mssg-4').css('display','none');
            $('.mssg-5').css('display','none');
            $('.mssg-1').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.bn-2').click(function(){
            $('.mssg-1').css('display','none');
            $('.mssg-3').css('display','none');
            $('.mssg-4').css('display','none');
            $('.mssg-5').css('display','none');
            $('.mssg-2').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.bn-3').click(function(){
            $('.mssg-1').css('display','none');
            $('.mssg-2').css('display','none');
            $('.mssg-4').css('display','none');
            $('.mssg-5').css('display','none');
            $('.mssg-3').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.bn-4').click(function(){
            $('.mssg-2').css('display','none');
            $('.mssg-3').css('display','none');
            $('.mssg-1').css('display','none');
            $('.mssg-5').css('display','none');
            $('.mssg-4').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.bn-5').click(function(){
            $('.mssg-1').css('display','none');
            $('.mssg-2').css('display','none');
            $('.mssg-3').css('display','none');
            $('.mssg-4').css('display','none');
            $('.mssg-5').css('display','block'); 
        });
    });
</script>



<script type="text/javascript">
    $(document).ready(function(){
        $('.bttn-1').click(function(){
            $('.mg-2').css('display','none');
            $('.mg-3').css('display','none');
            $('.mg-4').css('display','none');
            $('.mg-5').css('display','none');
            $('.mg-1').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.bttn-2').click(function(){
            $('.mg-1').css('display','none');
            $('.mg-3').css('display','none');
            $('.mg-4').css('display','none');
            $('.mg-5').css('display','none');
            $('.mg-2').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.bttn-3').click(function(){
            $('.mg-1').css('display','none');
            $('.mg-2').css('display','none');
            $('.mg-4').css('display','none');
            $('.mg-5').css('display','none');
            $('.mg-3').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.bttn-4').click(function(){
            $('.mg-2').css('display','none');
            $('.mg-3').css('display','none');
            $('.mg-1').css('display','none');
            $('.mg-5').css('display','none');
            $('.mg-4').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.bttn-5').click(function(){
            $('.mg-1').css('display','none');
            $('.mg-2').css('display','none');
            $('.mg-3').css('display','none');
            $('.mg-4').css('display','none');
            $('.mg-5').css('display','block'); 
        });
    });
</script>


<script>
  let listVideo = document.querySelectorAll('.video-list .vid2');
  let mainVideo = document.querySelector('.main-video iframe');
  let title = document.querySelector('.main-video .title');
  
  listVideo.forEach(iframe =>{
    iframe.onclick = () =>{
      listVideo.forEach(vid2 => vid2.classList.remove('active'));
      iframe.classList.add('active');
      if(iframe.classList.contains('active')){
        let src = iframe.children[0].getAttribute('src');
        mainVideo.src = src;
        let text = iframe.children[1].innerHTML;
        title.innerHTML = text;
      }
    };
  });
</script>


<!-- video a -->

<script>
  let listVideo3 = document.querySelectorAll('.video-list3 .vid3');
  let mainVideo3 = document.querySelector('.main-video3 iframe');
  let title3 = document.querySelector('.main-video3 .title');
  
  listVideo3.forEach(iframe =>{
    iframe.onclick = () =>{
      listVideo3.forEach(vid3 => vid3.classList.remove('active'));
      iframe.classList.add('active');
      if(iframe.classList.contains('active')){
        let src3 = iframe.children[0].getAttribute('src');
        mainVideo3.src = src3;
        let text3 = iframe.children[1].innerHTML;
        title3.innerHTML = text3;
      }
    };
  });
</script>

<!-- video ab -->

<script>
  let listVideo33 = document.querySelectorAll('.video-list33 .vid33');
  let mainVideo33 = document.querySelector('.main-video33 iframe');
  let title33 = document.querySelector('.main-video33 .title');
  
  listVideo33.forEach(iframe =>{
    iframe.onclick = () =>{
      listVideo33.forEach(vid33 => vid33.classList.remove('active'));
      iframe.classList.add('active');
      if(iframe.classList.contains('active')){
        let src33 = iframe.children[0].getAttribute('src');
        mainVideo33.src = src33;
        let text33 = iframe.children[1].innerHTML;
        title33.innerHTML = text33;
      }
    };
  });
</script>

<!-- video ac -->

<script>
  let listVideo34 = document.querySelectorAll('.video-list34 .vid34');
  let mainVideo34 = document.querySelector('.main-video34 iframe');
  let title34 = document.querySelector('.main-video34 .title');
  
  listVideo34.forEach(iframe =>{
    iframe.onclick = () =>{
      listVideo34.forEach(vid34 => vid34.classList.remove('active'));
      iframe.classList.add('active');
      if(iframe.classList.contains('active')){
        let src34 = iframe.children[0].getAttribute('src');
        mainVideo34.src = src34;
        let text34 = iframe.children[1].innerHTML;
        title34.innerHTML = text34;
      }
    };
  });
</script>

<!-- pic gallery -->


<script>
  let listImage = document.querySelectorAll('.smallimg');
  let mainImage = document.querySelector('.feature-img img');
  let TitleImg = document.querySelector('.feature-img .titleimg');
  
  listImage.forEach(img =>{
    img.onclick = () =>{
      listImage.forEach(smallimg => smallimg.classList.remove('active'));
      img.classList.add('active');
      if(img.classList.contains('active')){
        let srcf = img.children[0].getAttribute('src');
        mainImage.src = srcf;
        let textf = img.children[1].innerHTML;
        TitleImg.innerHTML = textf;
      }
    };
  });
</script>


<!-- get data from database -->


<script>
  $(document).ready(function(){
    $('#getdisplaydata1').click(function(){

      var useridpost = $('#useridpost').val();
      // getdisplaydata1();
      // function getdisplaydata1(){
      $.ajax({
        url:'getdata1.php',
        data: 'farhad=' +$("#farhadf").val(),
        type:'POST',
        success:function(responsedata){
          $('#response1').html(responsedata);
        }
      });
    // }
    });
  });
</script>
<script>
  $(document).ready(function(){
    // $('#getdisplaydata1').click(function(){
      getdisplaydata1();
      function getdisplaydata1(){
      $.ajax({
        url:'getdata1.php',
        data: 'farhad=' +$("#farhadf").val(),
        type:'POST',
        success:function(responsedata){
          $('#response1').html(responsedata);
        }
      });
    }
    // });
  });
</script>
<script>
  $(document).ready(function(){
    $(document).on('click','.load1',function(){

      var useridpost = $('#useridpost').val();
      // getdisplaydata1();
      // function getdisplaydata1(){
      $.ajax({
        url:'getdata1.php',
        data: 'farhad=' +$("#farhadf").val(),
        type:'POST',
        success:function(responsedata){
          $('#response1').html(responsedata);
        }
      });
    // }
    });
  });
</script>

<script>
  $(document).ready(function(){
    $('#qutebtn').click(function(){

      var useridpost = $('#useridpost').val();
      // getdisplaydata1();
      // function getdisplaydata1(){
      $.ajax({
        url:'getdata2.php',
        data: 'farhad2=' +$("#farhadf").val(),
        type:'POST',
        success:function(responsedata){
          $('#gallery_data').html(responsedata);
        }
      });
    // }
    });
  });
</script>
<!-- video -->

<script>
  $(document).ready(function(){
    $('#video1btn').click(function(){

      var useridpost = $('#useridpost').val();
      // getdisplaydata1();
      // function getdisplaydata1(){
      $.ajax({
        url:'getdata3.php',
        data: 'farhad3=' +$("#farhadf").val(),
        type:'POST',
        success:function(responsedata){
          $('#video1_data').html(responsedata);
        }
      });
    // }
    });
  });
</script>

<!-- user #cv -->

<script>
  $(document).ready(function(){
    $('#u_about').click(function(){

      var useridpost = $('#useridpost').val();
      // getdisplaydata1();
      // function getdisplaydata1(){
      $.ajax({
        url:'getdata4.php',
        data: 'farhad4=' +$("#farhadf").val(),
        type:'POST',
        success:function(responsedata){
          $('#u_exp').html(responsedata);
        }
      });
    // }
    });
  });
</script>

<script>
  $(document).ready(function(){
    $('#u_about').click(function(){

      var useridpost = $('#useridpost').val();
      // getdisplaydata1();
      // function getdisplaydata1(){
      $.ajax({
        url:'getdata5.php',
        data: 'farhad5=' +$("#farhadf").val(),
        type:'POST',
        success:function(responsedata){
          $('#u_edu').html(responsedata);
        }
      });
    // }
    });
  });
</script>

<script>
  
  function love_update(id){
      
      jQuery.ajax({
        url:'update_love_upost.php',
        type:'post',
        data:'type=love&id='+id,
        success:function(result){
          var cur_count=jQuery('#love_loop_'+id).html();
          cur_count++;
          jQuery('#love_loop_'+id).html(cur_count);
        }
      })
    }

    function love_updatee(id){
      
      jQuery.ajax({
        url:'update_love_upost.php',
        type:'post',
        data:'type=love&id='+id,
        success:function(result){
          var cur_count=jQuery('#love_loope_'+id).html();
          cur_count++;
          jQuery('#love_loope_'+id).html(cur_count);
        }
      })
    }

    function like_update(id){
     
     jQuery.ajax({
       url:'update_love_upost.php',
       type:'post',
       data:'type=like&id='+id,
       success:function(result){
         var cur_count=jQuery('#like_loop_'+id).html();
         cur_count++;
         jQuery('#like_loop_'+id).html(cur_count);
       }
     })
   }


   function dislike_update(id){
     
     jQuery.ajax({
       url:'update_love_upost.php',
       type:'post',
       data:'type=dislike&id='+id,
       success:function(result){
         var cur_count=jQuery('#dislike_loop_'+id).html();
         cur_count++;
         jQuery('#dislike_loop_'+id).html(cur_count);
       }
     })
   }



   function like_updatee(id){
     
     jQuery.ajax({
       url:'update_love_upost.php',
       type:'post',
       data:'type=like&id='+id,
       success:function(result){
         var cur_count=jQuery('#like_loope_'+id).html();
         cur_count++;
         jQuery('#like_loope_'+id).html(cur_count);
       }
     })
   }


   function dislike_updatee(id){
     
     jQuery.ajax({
       url:'update_love_upost.php',
       type:'post',
       data:'type=dislike&id='+id,
       success:function(result){
         var cur_count=jQuery('#dislike_loope_'+id).html();
         cur_count++;
         jQuery('#dislike_loope_'+id).html(cur_count);
       }
     })
   }

</script>



<!-- comment love like dislike update javascrit -->


<script>
  
  function love_update_com(id){
      
      jQuery.ajax({
        url:'update_love_upost2.php',
        type:'post',
        data:'type=love&id='+id,
        success:function(result){
          var cur_count=jQuery('#love_loop_com_'+id).html();
          cur_count++;
          jQuery('#love_loop_com_'+id).html(cur_count);
        }
      })
    }

    function like_update_com(id){
     
     jQuery.ajax({
       url:'update_love_upost2.php',
       type:'post',
       data:'type=like&id='+id,
       success:function(result){
         var cur_count=jQuery('#like_loop_com_'+id).html();
         cur_count++;
         jQuery('#like_loop_com_'+id).html(cur_count);
       }
     })
   }


   function dislike_update_com(id){
     
     jQuery.ajax({
       url:'update_love_upost2.php',
       type:'post',
       data:'type=dislike&id='+id,
       success:function(result){
         var cur_count=jQuery('#dislike_loop_com_'+id).html();
         cur_count++;
         jQuery('#dislike_loop_com_'+id).html(cur_count);
       }
     })
   }

</script>


<!-- comment javascript end  -->




<script>
  $(document).ready(function(){
    $(document).on('click','.add_comment_btn', function(){

      var post_id = $(this).attr('id');

      var msg = $('#cmnt_text'+post_id).val();

      var uid = $('#farhadf').val();


      if($.trim(msg).length == 0){
        error_msg = alert("Please type comment!");
        $('#error_status').text(error_msg);
      }else{
        error_msg = "";
        $('#error_status').text(error_msg);
      }
      if(error_msg != ''){
        return false;
      }else{
        $.ajax({
              url:'getdata6.php',
              type:'post',
              data: {
                comment_msg: msg,
                post_id: post_id,
                uuid: uid,
                posta: true,
              },
              success: function(response){
                $('#error_status').html(response);
                alert(response); 

              }
            });
      }



    });
  });
</script>

<script>
  $(document).ready(function(){
    $(document).on('click', '.comment_view_main', function(){
      var post_iid = $(this).attr('id');

      $.ajax({
              url:'getdata6.php',
              type:'post',
              data: {
                post_iid: post_iid,
                postaa: true,
              },
              success:function(responsedata){
                $('#loadComment'+post_iid).html(responsedata);
              }
            });


    })
  });




  $(document).ready(function(){
    $(document).on('click','.delete_postBtn', function(){

      var post_id = $(this).attr('id');

      $.ajax({
        url:'post_update.php',
        type:'post',
        data: {
          id: post_id,
          deletepost: true,
        },
        success: function(response){
          // alert(response); 
          $('#closepost'+post_id).trigger('click');
          $('#error_status_up').html(response);
          // $('#error_status_update'+post_id).html(response);

          $('#getdisplaydata1').trigger('click');
        }
      });

    });
  });


  $(document).ready(function(){
    $(document).on('click','.delete_quteBtn', function(){

      var post_id = $(this).attr('id');

      $.ajax({
        url:'post_update.php',
        type:'post',
        data: {
          id: post_id,
          deletequte: true,
        },
        success: function(response){
          // alert(response); 
          $('#closequte'+post_id).trigger('click');
          $('#error_status_up2').html(response);
          // $('#error_status_update'+post_id).html(response);

          $('#qutebtn').trigger('click');
        }
      });

    });
  });





</script>


<script>

function like_updateq(id){
     
     jQuery.ajax({
       url:'qute_love.php',
       type:'post',
       data:'type=likeq&id='+id,
       success:function(result){
         var cur_count=jQuery('#like_loopq_'+id).html();
         cur_count++;
         jQuery('#like_loopq_'+id).html(cur_count);
       }
     })
   }


   function dislike_updateq(id){
     
     jQuery.ajax({
       url:'qute_love.php',
       type:'post',
       data:'type=dislikeq&id='+id,
       success:function(result){
         var cur_count=jQuery('#dislike_loopq_'+id).html();
         cur_count++;
         jQuery('#dislike_loopq_'+id).html(cur_count);
       }
     })
   }


</script>  



<!-- swap -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/js/swiper.min.js"></script>
<script type="text/javascript" src="script.js"></script>
<script type="text/javascript" src="user.js"></script>
<!-- swap -->


<script src="jsnav/bootstrap.bundle.js"></script>
    <script src="jquery-3.4.1.min.js"></script>
    <script src="sweetalert.min.js"></script>
  </body>
</html>
