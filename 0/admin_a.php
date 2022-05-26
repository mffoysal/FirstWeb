

<?php
session_start();
include('db.php');
    if(!isset($_SESSION['phone']) || $_SESSION['role']!="admin"){
       header("location:login.php");
      }

      if(isset($_REQUEST['successmsg'])){
        $msgsuccess= $_REQUEST['successmsg'];
      }else{
        $msgsuccess="";
      }

?>



<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    

    <title>EdULearn Admin Dashboard</title>
    <link rel="shortcut icon" href="Image/logo.png" type="image/x-icon" />

    <!-- css -->
    <link rel="stylesheet" href="css/stylee.css" />

    <!-- font awsome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
      integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <!-- aos -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    <!-- jquery -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
      integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>

    <!-- type js -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.12/typed.min.js"
      integrity="sha512-3J8teBiHrSyaaRBajZyIEtpDsXdPq1gsznKWIVb5CnorQuFhjWGhWe54z8YNnHHr7MZuExb9m5kvf964HiT1Sw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>

    <!-- circle -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery-circle-progress/1.2.2/circle-progress.min.js"
      integrity="sha512-6kvhZ/39gRVLmoM/6JxbbJVTYzL/gnbDVsHACLx/31IREU4l3sI7yeO0d4gw8xU5Mpmm/17LMaDHOCf+TvuC2Q=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>

    <!-- lottie -->
    <!-- <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script> -->
    <link rel="stylesheet" href="icon/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="stylesta.css">
    <script src="ck/ckeditor.js"></script>

    <!-- <script src="//cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script> -->
    <style>
    
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
  <body style="background-color: ghostwhite" onload="loaded()">
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

  <?php
  // include('navbar.php');

  ?>
    <div class="notice"></div>
    <div class="up"><i class="fas fa-arrow-up"></i></div>

    <!-- loading -->
    <div class="loading">
      <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
      <lottie-player
        src="https://assets2.lottiefiles.com/packages/lf20_gcpemjmh.json"
        background="transparent"
        speed="1"
        style="width: 400px; height: 400px"
        loop
        autoplay
      ></lottie-player>
    </div>
    <?php 
    if(isset($row1['img'])){
      if($row1['img']==''){
        $image = "logo.png";
        $imgmsg="অনুগ্রহ করে আপনার প্রোফাইল ছবি যোগ করুন(max:300x400 & 512kb)";
      }else{
        $image = $row1['img'];
        $imgmsg="";
      }  
      }?>
    <!-- side bar -->
    <section class="sideBar">
    
      <!-- <img src="Image/<?=$image?>" alt="" /> -->
      <img src="image/<?=$image;?>" alt="" class="logo" />
      <h1><?= $row1['name'] ?> <?= $_SESSION['role'] ?></h1>
      <p class="text-center bg-dark text-warning shadow-lg rounded m-2"><?= $imgmsg?></p>
      <div style="margin-top:-10px" class="links">
        <a href="#"><span class="bi bi-house"></span> Home</a>
        <a href="#about"><span class="bi bi-person"></span> About me</a>
        <a href="index.php"><span class="bi bi-house-fill"></span> Front Page</a>
        <a href="f/index.php"><span class="bi bi-app-indicator"></span> Tutorial Menu</a>
        <a href="#skills"><span class="bi bi-battery-full"></span> Skills</a>
        <a href="#works"><span class="bi bi-bar-chart-line"></span> Works</a>
        <a href="#" class="contactLink"><span class="bi bi-telephone" data-bs-toggle="modal" data-bs-target="#contact"></span> Contact</a>
        <a href="logout.php"><span class="bi bi-box-arrow-left"></span> LogOut</a>
        <a href="#"><button type="button" class="btn btn-outline-warning rounded" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><span class="bi bi-gear"></span> All Settings</button></a>
        <a href="farhad/users.php"><span class="bi bi-chat-dots-fill"></span> Chat with Active Users</a>
        
      </div>
    </section>
    <!-- main body -->
    <section class="mainBody" id="particles-js">
      <!-- header -->
      <section class="headerNav">
        <nav>
          <div class="links">
          <p class="text-warning bg-dark shadow-lg rounded m-2"><?= $imgmsg?></p>
          <img src="image/<?=$image;?>" alt="" class="logo" />
          <h1><?= $row1['name'] ?> <?= $_SESSION['role'] ?></h1>
          <a href="#"><button type="button" class="btn btn-outline-warning rounded" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><span class="bi bi-gear-fill"></span> All Settings</button></a>
            <a href="#"><span class="bi bi-house"></span> Home</a>
            <a href="#about"><span class="bi bi-person-circle"></span> About me</a>
            <a href="index.php"><span class="bi bi-app-indicator"></span> FRONT PAGE</a>
            <a href="f/index.php"><span class="bi bi-house-fill"></span> TUTORIAL Menu</a>
            <a href="farhad/users.php"><span class="bi bi-chat-dots-fill"></span> Chat with Active Users</a>
            <a href="#skills"><span class="bi bi-battery-full"></span> Skills</a>
            <a href="#"><span class="bi bi-bar-chart-line"></span> Works</a>
            <a href="#" class="contactLink"><span class="bi bi-telephone" data-bs-toggle="modal" data-bs-target="#contact"></span> Contact</a>
            <a href="logout.php"><span class="bi bi-box-arrow-left"></span> LogOut</a>
            <p><span class="bi bi-scroll"></span> scroll down to hide <br> স্ক্রুল করুন মেইন ব্যাকগ্রাউন্ড ফিরে পেতে...</p>
          </div>
          <i class="fas fa-bars"></i>
        </nav>

        <div class="container mt-3">

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








        <p class="text-center bg-dark text-warning shadow-lg rounded m-2"><?= $imgmsg?></p>
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
                    <h5 class="m-auto"><span class="bi bi-cloud-upload"></span> UPDATE YOUR: <span class="text-warning m-auto"> <button type="button" class="btn btn-dark rounded" data-bs-toggle="modal" data-bs-target="#drop2"><span class="bi bi-file-image"></span> Picture</button> | <button type="button" class="btn btn-outline-warning rounded" data-bs-toggle="modal" data-bs-target="#drop3"><span class="bi bi-person-badge-fill"></span> Details</button>|<?= $imgmsg ?></span> </h5>
                </div>
              </div>              
            </div>
    
            
<div class="dropdown d-inline">
<button type="button" class="btn btn-dark dropdown-toggle" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false"><span class="bi bi-gear-fill"></span> All Settings</button>
  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdown">

        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#post"><span class="bi bi-file-post"></span> Create Post</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#addpicture"><span class="bi bi-cloud-upload-fill"></span> Add picture</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#youtubelink"><span class="bi bi-youtube"></span> Youtube Link</button></a></li>
        <li ><a class="dropdown-item" href="farhad/users.php"><button type="button" class="btn btn-success"><span class="bi bi-chat-dots-fill"></span> Chat Live</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#setting"><span class="bi bi-gear-fill"></span> Setting</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#users"><span class="bi bi-person"></span> Your Friends</button></a></li>
        <li ><a class="dropdown-item" href="index1.php?name=<?=$row1['name']?>"><button type="button" class="btn btn-info"><span class="bi bi-chat"></span> Group</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#teacher"><span class="bi bi-pen"></span> Teacher</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#admin"><span class="bi bi-laptop"></span> Admin</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#contact"><span class="bi bi-telephone"></span> Contact</button></a></li>
        <li ><a class="dropdown-item" href="logout.php"><button type="button" class="btn btn-info"><span class="bi bi-box-arrow-left"></span> Logout</button></a></li>
        <!-- <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-info"><span class="bi bi-"></span> </button></a></li> -->
        
  </ul>
</div>
<div class="dropdown d-inline">
<button type="button" class="btn btn-outline-dark dropdown-toggle" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false"><span class="bi bi-list-stars"></span> CATEGORY</button>
  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdown">

        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#profile"><span class="bi bi-file-post"></span> <?= $row1['name']?></button></a></li>
        <li ><a class="dropdown-item" href="createpost.php"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#yourpost"><span class="bi bi-file-post"></span> Create A new Post</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#yourpost"><span class="bi bi-file-post"></span> Your Post</button></a></li>
        <li ><a class="dropdown-item" href="#works"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#coverphoto"><span class="bi bi-file-image"></span> Your Cover Photo</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#yourvideo"><span class="bi bi-youtube"></span> Your Video</button></a></li>
        <li ><a class="dropdown-item" href="login.php"><button type="button" class="btn btn-dark"><span class="bi bi-house"></span> Home</button></a></li>
        <li ><a class="dropdown-item" href="index.php"><button type="button" class="btn btn-dark"><span class="bi bi-app-indicator"></span> Front Page</button></a></li>
        <li ><a class="dropdown-item" href="farhad/users.php"><button type="button" class="btn btn-success"><span class="bi bi-chat-dots-fill"></span> Chat Live</button></a></li>
        <li ><a class="dropdown-item" href="f/index.php"><button type="button" class="btn btn-dark"><span class="bi bi-house-fill"></span> Tutorial Menu</button></a></li>
        
        <li ><a class="dropdown-item" href="logout.php"><button type="button" class="btn btn-warning"><span class="bi bi-box-arrow-left"></span> LogOut</button></a></li>
        <!-- <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-info"><span class="bi bi-telephone"></span> Contact</button></a></li> -->
        <!-- <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-info"><span class="bi bi-"></span> </button></a></li> -->
        <!-- <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-info"><span class="bi bi-"></span> </button></a></li> -->
        
  </ul>
</div>

<!-- tutor student -->

            
<div class="dropdown d-inline">
<button type="button" class="btn btn-warning dropdown-toggle" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false"><span class="bi bi-book-fill"></span> TEACHER PART</button>
  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdown">

        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#post"><span class="bi bi-file-post"></span> Add Tutor Post</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#addpicture"><span class="bi bi-book-fill"></span> Your Post List</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#youtubelink"><span class="bi bi-chat-dots-fill"></span> Student_Request</button></a></li>
        <li ><a class="dropdown-item" href="farhad/users.php"><button type="button" class="btn btn-info"><span class="bi bi-book"></span> Student Post</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#setting"><span class="bi bi-gear-fill"></span> All Tutor Post</button></a></li>
        <!-- <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#users"><span class="bi bi-person"></span> All Users</button></a></li>
        <li ><a class="dropdown-item" href="index1.php?name=<?=$row1['name']?>"><button type="button" class="btn btn-info"><span class="bi bi-chat"></span> Group</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#teacher"><span class="bi bi-pen"></span> Teacher</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#admin"><span class="bi bi-laptop"></span> Admin</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#contact"><span class="bi bi-telephone"></span> Contact</button></a></li>
        <li ><a class="dropdown-item" href="logout.php"><button type="button" class="btn btn-info"><span class="bi bi-box-arrow-left"></span> Logout</button></a></li> -->
        <!-- <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-info"><span class="bi bi-"></span> </button></a></li> -->
        
  </ul>
</div>
<div class="dropdown d-inline">
<button type="button" class="btn btn-outline-danger dropdown-toggle" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false"><span class="bi bi-book"></span> STUDENT PART</button>
  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdown">

        <!-- <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#profile"><span class="bi bi-file-post"></span> <?= $row1['name']?></button></a></li> -->
        <li ><a class="dropdown-item" href="login.php"><button type="button" class="btn btn-primary"><span class="bi bi-book-half"></span> Add tutor_request</button></a></li>
        <li ><a class="dropdown-item" href="index.php"><button type="button" class="btn btn-warning"><span class="bi bi-app-indicator"></span> Your Request List</button></a></li>
        <li ><a class="dropdown-item" href="farhad/users.php"><button type="button" class="btn btn-success"><span class="bi bi-chat-dots-fill"></span> Tutor_Accept_List</button></a></li>
        <li ><a class="dropdown-item" href="f/index.php"><button type="button" class="btn btn-dark"><span class="bi bi-bell-fill"></span> Tutor</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#yourpost"><span class="bi bi-file-post"></span> Student</button></a></li>
        <!-- <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#coverphoto"><span class="bi bi-file-image"></span> Your Cover Photo</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#yourvideo"><span class="bi bi-youtube"></span> Your Video</button></a></li>
        <li ><a class="dropdown-item" href="logout.php"><button type="button" class="btn btn-warning"><span class="bi bi-box-arrow-left"></span> LogOut</button></a></li> -->
        <!-- <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-info"><span class="bi bi-telephone"></span> Contact</button></a></li> -->
        <!-- <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-info"><span class="bi bi-"></span> </button></a></li> -->
        <!-- <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-info"><span class="bi bi-"></span> </button></a></li> -->
        
  </ul>
</div>


<!-- tutor student -->










            
            <div class="container mt-5">
            
      



<!-- Modal -->
<div class="modal fade" id="profile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

        <h5 class="modal-title text-center" id="staticBackdropLabel"> Veiw Profile</h5>
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="container">
            <div class="row">
            <div class="col-md-3 text-center">
            <img class="rounded" src="Image/<?=$image;?>" width="200" height="200" alt="" class="logo" />
            </div>
            <div class="col-md-9">
            
              <!-- dropdown -->

                                    
<div class="dropdown d-inline">
<button type="button" class="btn btn-dark dropdown-toggle" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false"><span class="bi bi-gear-fill"></span> All Settings</button>
  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdown">

        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createpost"><span class="bi bi-file-post"></span> Create Post</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#addpicture"><span class="bi bi-cloud-upload-fill"></span> Add picture</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#youtubelink"><span class="bi bi-youtube"></span> Youtube Link</button></a></li>
        <li ><a class="dropdown-item" href="farhad/users.php"><button type="button" class="btn btn-success"><span class="bi bi-chat-dots-fill"></span> Chat Live</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#setting"><span class="bi bi-gear-fill"></span> Setting</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#users"><span class="bi bi-person"></span> YOUR FRIENDS</button></a></li>
        <li ><a class="dropdown-item" href="index1.php?name=<?=$row1['name']?>"><button type="button" class="btn btn-info"><span class="bi bi-chat"></span> Group</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#teacher"><span class="bi bi-pen"></span> Teacher</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#admin"><span class="bi bi-laptop"></span> Admin</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#contact"><span class="bi bi-telephone"></span> Contact</button></a></li>
        <li ><a class="dropdown-item" href="logout.php"><button type="button" class="btn btn-info"><span class="bi bi-box-arrow-left"></span> Logout</button></a></li>
        <!-- <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-info"><span class="bi bi-"></span> </button></a></li> -->
        
  </ul>
</div>
<div class="dropdown d-inline">
<button type="button" class="btn btn-outline-dark dropdown-toggle" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false"><span class="bi bi-list-stars"></span> CATEGORY</button>
  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdown">

        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#profile"><span class="bi bi-file-post"></span> <?= $row1['name']?></button></a></li>
        <li ><a class="dropdown-item" href="login.php"><button type="button" class="btn btn-dark"><span class="bi bi-house"></span> Home</button></a></li>
        <li ><a class="dropdown-item" href="index.php"><button type="button" class="btn btn-dark"><span class="bi bi-app-indicator"></span> Front Page</button></a></li>
        <li ><a class="dropdown-item" href="farhad/users.php"><button type="button" class="btn btn-success"><span class="bi bi-chat-dots-fill"></span> Chat Live</button></a></li>
        <li ><a class="dropdown-item" href="f/index.php"><button type="button" class="btn btn-dark"><span class="bi bi-house-fill"></span> Tutorial Menu</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#yourpost"><span class="bi bi-file-post"></span> Your Post</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#coverphoto"><span class="bi bi-file-image"></span> Your Cover Photo</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#yourvideo"><span class="bi bi-youtube"></span> Your Video</button></a></li>
        <li ><a class="dropdown-item" href="logout.php"><button type="button" class="btn btn-warning"><span class="bi bi-box-arrow-left"></span> LogOut</button></a></li>
        <!-- <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-info"><span class="bi bi-telephone"></span> Contact</button></a></li> -->
        <!-- <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-info"><span class="bi bi-"></span> </button></a></li> -->
        <!-- <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-info"><span class="bi bi-"></span> </button></a></li> -->
        
  </ul>
</div>


              <!-- dropdown -->
            <div class="row form-floating">
                    <input type="text" class="form-control bg-secondary text-warning" value="<?php echo $row1['education'];?>" readonly>
                      <label class="text-light" for=""><span class="bi bi-share-fill"></span> Your Educational Achievement & Experience</label>
              </div>
              <div class="row form-floating">
                    <input type="text" class="form-control bg-warning text-lowercase text-light" value="http://mffoysal.xyz/refer.php?refer=<?php echo $row1['referral_code'];?>" readonly>
                      <label class="text-danger" for=""><span class="bi bi-share-fill"></span> Your Referral Link</label>
              </div>

            
              <div style="border:2px solid white;" class="row rounded">
                <div class="col-md-6 text bg-warning m-auto text-light">
                    <h5 style="color:color;" class="m-auto" ><span class="bi bi-share"></span> YOUR REFERRAL CODE: <span style="color:black"><?= $row1['referral_code'] ?></span> </h5>
                </div>
                <div class="col-md-6 text bg-success m-auto text-light">
                    <h5 class="m-auto"><span class="bi bi-trophy-fill"></span> REWARD POINT: <span class="text-warning m-auto"><?= $row1['referral_point'] ?></span> </h5>
                </div>
              </div>
              <div style="border:2px solid white;" class="row rounded">
                <div class="col-md-6 text bg-info m-auto text-light">
                    <h5 style="color:color;" class="m-auto" ><span class="bi bi-app"></span> YOUR ID: <span style="color:black"><?= $row1['user'] ?></span> </h5>
                </div>
                <div class="col-md-6 text bg-secondary m-auto text-light">
                    <h5 class="m-auto"><span class="bi bi-person-check"></span> A/C TYPE: <span class="text-warning m-auto"><?= $row1['actype'] ?></span> </h5>
                </div>
              </div>
              <div style="border:2px solid white;" class="row rounded">
                <div class="col-md-6 text bg-primary m-auto text-light">
                    <h5 style="color:color;" class="m-auto" ><span class="bi bi-person-circle"></span> YOUR NAME: <span style="color:black"><?= $row1['name'] ?></span> </h5>
                </div>
                <div class="col-md-6 text bg-info m-auto text-light">
                    <h5 class="m-auto"><span class="bi bi-telephone"></span> YOUR PHONE: <span class="text-warning m-auto"><?= $row1['phone'] ?></span> </h5>
                </div>
              </div>
              


            </div>
            </div>
            
              
              <div style="border:2px solid white;" class="row rounded">
                <div class="col-md-6 text bg-success m-auto text-light">
                    <h5 style="color:color;" class="m-auto" ><span class="bi bi-envelope"></span> YOUR EMAIL: <span style="color:black"><?= $row1['email'] ?></span> </h5>
                </div>
                <div class="col-md-6 text bg-secondary m-auto text-light">
                    <h5 class="m-auto"><span class="bi bi-house-fill"></span> YOUR ADDRESS: <span class="text-warning m-auto"><?= $row1['division'].', '.$row1['district'].', '.$row1['upazila'].', '.$row1['unions'].', '.$row1['word'].', '.$row1['village']; ?></span> </h5>
                </div>
              </div>
              <div style="border:2px solid white;" class="row rounded">
                <div class="col-md-6 text bg-primary m-auto text-light">
                    <h5 style="color:color;" class="m-auto" ><span class="bi bi-file-play"></span> ACTIVE STATUS: <span style="color:black"><?= $row1['status'] ?></span> </h5>
                </div>
                <div class="col-md-6 text bg-dark m-auto text-light">
                    <h5 class="m-auto"><span class="bi bi-cloud-upload"></span> UPDATE YOUR: <span class="text-warning m-auto"> <button type="button" class="btn btn-outline-danger rounded" data-bs-toggle="modal" data-bs-target="#drop2"><span class="bi bi-file-image"></span> Picture</button> | <button type="button" class="btn btn-outline-warning rounded" data-bs-toggle="modal" data-bs-target="#drop3"><span class="bi bi-person-badge-fill"></span> Details</button>|<?= $imgmsg ?></span> </h5>
                </div>
              </div>              
            </div>
    

            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Thanks..</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <h5 style="" class="modal-title text-center" id="staticBackdropLabel"> SETTINGS TREE ROOT</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php
            
        ?>
<div class="container text-center m-auto">
           
<div class="dropdown d-inline">
<button type="button" class="btn btn-dark dropdown-toggle" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false"><span class="bi bi-gear-fill"></span> All Settings</button>
  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdown">

        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#post"><span class="bi bi-file-post"></span> Create Post</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#addpicture"><span class="bi bi-cloud-upload-fill"></span> Add picture</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#youtubelink"><span class="bi bi-youtube"></span> Youtube Link</button></a></li>
        <li ><a class="dropdown-item" href="farhad/users.php"><button type="button" class="btn btn-success"><span class="bi bi-chat-dots-fill"></span> Chat Live</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#setting"><span class="bi bi-gear-fill"></span> Setting</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#users"><span class="bi bi-person"></span> Your Friends</button></a></li>
        <li ><a class="dropdown-item" href="index1.php?name=<?=$row1['name']?>"><button type="button" class="btn btn-info"><span class="bi bi-chat"></span> Group</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#teacher"><span class="bi bi-pen"></span> Teacher</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#admin"><span class="bi bi-laptop"></span> Admin</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#contact"><span class="bi bi-telephone"></span> Contact</button></a></li>
        <li ><a class="dropdown-item" href="logout.php"><button type="button" class="btn btn-info"><span class="bi bi-box-arrow-left"></span> Logout</button></a></li>
        <!-- <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-info"><span class="bi bi-"></span> </button></a></li> -->
        
  </ul>
</div>
<span> | </span>
<div class="dropdown d-inline">
<button type="button" class="btn btn-outline-dark dropdown-toggle" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false"><span class="bi bi-list-stars"></span> CATEGORY</button>
  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdown">

        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#profile"><span class="bi bi-file-post"></span> <?= $row1['name']?></button></a></li>
        <li ><a class="dropdown-item" href="createpost.php"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#yourpost"><span class="bi bi-file-post"></span> Create A new Post</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#yourpost"><span class="bi bi-file-post"></span> Your Post</button></a></li>
        <li ><a class="dropdown-item" href="#works"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#coverphoto"><span class="bi bi-file-image"></span> Your Cover Photo</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#yourvideo"><span class="bi bi-youtube"></span> Your Video</button></a></li>
        <li ><a class="dropdown-item" href="login.php"><button type="button" class="btn btn-dark"><span class="bi bi-house"></span> Home</button></a></li>
        <li ><a class="dropdown-item" href="index.php"><button type="button" class="btn btn-dark"><span class="bi bi-app-indicator"></span> Front Page</button></a></li>
        <li ><a class="dropdown-item" href="farhad/users.php"><button type="button" class="btn btn-success"><span class="bi bi-chat-dots-fill"></span> Chat Live</button></a></li>
        <li ><a class="dropdown-item" href="f/index.php"><button type="button" class="btn btn-dark"><span class="bi bi-house-fill"></span> Tutorial Menu</button></a></li>
        
        <li ><a class="dropdown-item" href="logout.php"><button type="button" class="btn btn-warning"><span class="bi bi-box-arrow-left"></span> LogOut</button></a></li>
        <!-- <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-info"><span class="bi bi-telephone"></span> Contact</button></a></li> -->
        <!-- <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-info"><span class="bi bi-"></span> </button></a></li> -->
        <!-- <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-info"><span class="bi bi-"></span> </button></a></li> -->
        
  </ul>
</div>

<!-- tutor student -->

<span> | </span>          
<div class="dropdown d-inline">
<button type="button" class="btn btn-warning dropdown-toggle" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false"><span class="bi bi-book-fill"></span> TEACHER PART</button>
  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdown">

        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#post"><span class="bi bi-file-post"></span> Add Tutor Post</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#addpicture"><span class="bi bi-book-fill"></span> Your Post List</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#youtubelink"><span class="bi bi-chat-dots-fill"></span> Student_Request</button></a></li>
        <li ><a class="dropdown-item" href="farhad/users.php"><button type="button" class="btn btn-info"><span class="bi bi-book"></span> Student Post</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#setting"><span class="bi bi-gear-fill"></span> All Tutor Post</button></a></li>
        <!-- <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#users"><span class="bi bi-person"></span> All Users</button></a></li>
        <li ><a class="dropdown-item" href="index1.php?name=<?=$row1['name']?>"><button type="button" class="btn btn-info"><span class="bi bi-chat"></span> Group</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#teacher"><span class="bi bi-pen"></span> Teacher</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#admin"><span class="bi bi-laptop"></span> Admin</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#contact"><span class="bi bi-telephone"></span> Contact</button></a></li>
        <li ><a class="dropdown-item" href="logout.php"><button type="button" class="btn btn-info"><span class="bi bi-box-arrow-left"></span> Logout</button></a></li> -->
        <!-- <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-info"><span class="bi bi-"></span> </button></a></li> -->
        
  </ul>
</div>
<span> | </span>
<div class="dropdown d-inline">
<button type="button" class="btn btn-outline-danger dropdown-toggle" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false"><span class="bi bi-book"></span> STUDENT PART</button>
  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdown">

        <!-- <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#profile"><span class="bi bi-file-post"></span> <?= $row1['name']?></button></a></li> -->
        <li ><a class="dropdown-item" href="login.php"><button type="button" class="btn btn-primary"><span class="bi bi-book-half"></span> Add tutor_request</button></a></li>
        <li ><a class="dropdown-item" href="index.php"><button type="button" class="btn btn-warning"><span class="bi bi-app-indicator"></span> Your Request List</button></a></li>
        <li ><a class="dropdown-item" href="farhad/users.php"><button type="button" class="btn btn-success"><span class="bi bi-chat-dots-fill"></span> Tutor_Accept_List</button></a></li>
        <li ><a class="dropdown-item" href="f/index.php"><button type="button" class="btn btn-dark"><span class="bi bi-bell-fill"></span> Tutor</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#yourpost"><span class="bi bi-file-post"></span> Student</button></a></li>
        <!-- <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#coverphoto"><span class="bi bi-file-image"></span> Your Cover Photo</button></a></li>
        <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#yourvideo"><span class="bi bi-youtube"></span> Your Video</button></a></li>
        <li ><a class="dropdown-item" href="logout.php"><button type="button" class="btn btn-warning"><span class="bi bi-box-arrow-left"></span> LogOut</button></a></li> -->
        <!-- <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-info"><span class="bi bi-telephone"></span> Contact</button></a></li> -->
        <!-- <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-info"><span class="bi bi-"></span> </button></a></li> -->
        <!-- <li ><a class="dropdown-item" href="#"><button type="button" class="btn btn-info"><span class="bi bi-"></span> </button></a></li> -->
        
  </ul>
</div>
</div>

<div class="container mt-3 text-center m-auto">
  <div class="row mt-2">
    <div class="col-md-3 mt-2 from-floating from-control">
      <!-- <input class="btn btn-primary" type="button" value="Your Friends" data-bs-toggle="modal" data-bs-target="#users"> -->
      <a href="user/friend.php"><button type="button" class="btn btn-info w-100">FRIENDS</button></a>
    </div>
    <div class="col-md-3 mt-2  from-floating from-control">
      <a href="user/request.php"><input class="btn btn-primary w-100" type="button" value="REQUEST"></a>
    </div>
    <div class="col-md-3 mt-2  from-floating from-control">
      <a href="user/exam/index.php"><input class="btn btn-primary w-100" type="button" value="Quiz"></a>
    </div>
    <div class="col-md-3 mt-2  from-floating from-control">
      <a href="user/index.php"><input class="btn btn-primary w-100" type="button" value="All Users"></a>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-3 mt-2 from-floating from-control">
    <?
    // if(isset($_SESSION['role']));
    ?>
    <a href="user/test/adminpanel/admin"><button type="button" class="btn btn-info w-100">Exam System 2</button></a>
    </div>
    <div class="col-md-3 mt-2 from-floating from-control">
      <a href="user/mess.php"><input class="btn btn-primary w-100" type="button" value="Mess"></a>
    </div>
    <div class="col-md-3 mt-2  from-floating from-control">
      <a href="user/mess.php"><input class="btn btn-primary w-100" type="button" value="Mess"></a>
    </div>
    <div class="col-md-3 mt-2  from-floating from-control">
      <a href="user/mess.php"><input class="btn btn-primary w-100" type="button" value="Mess"></a>
    </div>
  </div>
  <div class="row">
    <div class="col"></div>
    <div class="col"></div>
  </div>
</div>

<!-- drop -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Understood</button> -->
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
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="update.php" method="POST" enctype="multipart/form-data">
        <div class="field image form-control">
                        <button type="button" style="color:green" class="btn btn-outline-warning round shadow-lg"><label style="cursor:pointer" for="img"><span class="bi bi-file-image"></span> Upload Picture-<span style="width:20px; height:20px" class="bi bi-cloud-plus-fill"></span></label></button>
                        <input style="display:none" type="file" onchange="getImage(this.value)" name="updateimage" class="form-control" id="img" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
                        <div style="color:red" class="btn btn-outline-info" id="display-image"></div>
                        </div>
                        <br>
                        <div class="field button">
                        <!-- <input type="submit" class="btn btn-info submittwo" name="updatepic" value="Update"> -->
                        </div>
                                                       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="updatepic" class="btn btn-primary">Update</button>
        </form>
        <script>
                                                                function getImage(imagename){
                                                                    var newimg = imagename.replace(/^.*\\/,"");
                                                                    $('#display-image').html(newimg);
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
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">

        <form action="updatepro.php" method="POST" enctype="multipart/form-data">
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
                        <input type="submit" name="upprosave" class="btn btn-outline-warning m-auto text-center" value="Update">
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




</div> 

<!-- Modal -->
<div class="modal fade" id="post" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Create a New Post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center m-auto">
      
      <div class="container">
        <form action="postaction.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="unid" value="<?= $row1['unique_id']?>">
          
        <div class="form-floating">
      <textarea id="createpost" name="crpost" class="ckeditor form-control" contentwirteble="true" row="" placeholder="What's on your mind, Edulearner?"  required></textarea>
      </div>
      <div class="field image form-control">
                                                            <button type="button" style="color:green" class="btn btn-outline-warning round shadow-lg"><label style="cursor:pointer" for="imga"><span class="bi bi-file-image"></span> Upload Picture-<span style="width:20px; height:20px" class="bi bi-cloud-plus-fill"></span></label></button>
                                                            <input style="display:none" type="file" onchange="getImg(this.value)" name="postimage" class="form-control" id="imga" accept="image/x-png,image/gif,image/jpeg,image/jpg">
                                                            <div style="color:red" class="btn btn-outline-info" id="displayimage"></div>
                                                            </div>
                                                            <br>
                                                            <div class="field button">
                                                            <div class="form-floating">
                                                            <input type="text" class="form-control"  name="posth" value="<?= $row1['name']?> Type-Header">
                                                            <label for="">POst Subject</label>
                                                            </div>
                                                            <input type="submit" class="btn btn-info submittwo" name="postsave" value="Save">
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
        <button type="submit" name="postsave" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addpicture" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add YOUR COVER PHOTO</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center m-auto">
      
      <div class="container">
        <form action="coverphoto.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="unid" value="<?= $row1['unique_id']?>">
          
        <div class="form-floating">
      <!-- <textarea id="createpost2" name="crpost" class="ckeditor form-control" row="" placeholder="What's on your mind, Edulearner?"  required></textarea> -->
      </div>
      <div class="field image form-control">
                                                            <button type="button" style="color:green" class="btn btn-outline-warning round shadow-lg"><label style="cursor:pointer" for="imga2"><span class="bi bi-file-image"></span> Upload Picture-<span style="width:20px; height:20px" class="bi bi-cloud-plus-fill"></span></label></button>
                                                            <input style="display:none" type="file" onchange="getImg2(this.value)" name="coverimage" class="form-control" id="imga2" accept="image/x-png,image/gif,image/jpeg,image/jpg">
                                                            <div style="color:red" class="btn btn-outline-info" id="displayimage2"></div>
                                                            </div>
                                                            <br>
                                                            <div class="field button">
                                                            <input type="text" class="form-control"  name="coverheader" value="<?= $row1['name']?> Type-Header">
                                                            <input type="submit" class="btn btn-info submittwo" name="photosave" value="Save">
      </div>      
      

            <!-- <script>
              CKEDITOR.replace('createpost2', {
                height:300,
                filebrowserUploadUrl:"upload.php",
              });
            </script> -->
            <script>
                                                                function getImg2(imagename){
                                                                    var newimg = imagename.replace(/^.*\\/,"");
                                                                    $('#displayimage2').html(newimg);
                                                                }
            </script>
      </div>
    
    </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="photosave" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="youtubelink" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add a video lik</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Understood</button> -->
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="contact" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Contact Page</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->



<div class="modal fade" id="yourpost" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Your Post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container m-auto">
              <div class="text-center m-auto">
          <?php 
            while($rowpost=mysqli_fetch_array($resultp)):
              ?>

                <div class="col-md">
                    <div class="bg-transparent mt-2 shadow-lg text-center p-3 mb-5 bg-body rounded h-100">
                      <div class="card bg-transparent border-danger text-white h-100">
                        <div class="card-header bg-info"><p><?=$rowpost['header']?></p></div>
                        <?php
                          if($rowpost['img']!=''){
                            echo '<img style="height: 225px" class="card-img text-dark" src="image/'.$rowpost["img"].'" alt="">';
                          }
                        ?>
                        <div class="card-body bg-light">
                            <h5><?= $rowpost['text']?></h5>
                        </div>
                        <div class="card-footer bg-success">
                          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#postup<?=$rowpost['id']?>"><span class="muted"><?= $rowpost['time']?> | Update | Delete</span></button>
                        </div>
                      </div>
                    </div>
                </div>

                <!-- Modal -->
<div class="modal fade" id="postup<?=$rowpost['id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">UPADETE YOUR POST</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="updatepost.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="did" class="form-control" value="<?=$rowpost['id']?>">   
        <input type="hidden" name="imgold" class="form-control" value="<?=$rowpost['img']?>">   
        <input type="submit" class="btn btn-danger" name="deletepost" value="Delete This Post">   

      </form>
      <form action="updatepost.php" method="POST" enctype="multipart/form-data">
      <div class="field image form-control">
                        <button type="button" style="color:green" class="btn btn-outline-warning round shadow-lg"><label style="cursor:pointer" for="img3"><span class="bi bi-file-image"></span> Upload Picture-<span style="width:20px; height:20px" class="bi bi-cloud-plus-fill"></span></label></button>
                        <input style="display:none" type="file" onchange="getImageup(this.value)" name="upimg" class="form-control" id="img3" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
                        <div style="color:red" class="btn btn-outline-info" id="display-image3"></div>
                        </div>
        
        <script>
                                                                function getImageup(imagename){
                                                                    var newimg = imagename.replace(/^.*\\/,"");
                                                                    $('#display-image3').html(newimg);
                                                                }
                                                        </script>
              <input type="hidden" name="unid" value="<?=$rowpost['id']?>">
              <input type="hidden" name="unidimg" value="<?=$rowpost['img']?>">
              <div class="form-floating">
              <input type="text" class="form-control" name="uph" value="<?=$rowpost['header']?>">  
              <label for="">Update Header</label>
              </div>
              <br>
              <textarea id="uppost" type="text" name="updata" class="ckeditor form-control" value="<?=$rowpost['text']?>"> </textarea>
              <input name="updatepost" class="btn btn-warning" type="submit" value="Update">

              <script>
              CKEDITOR.replace('uppost', {
                height:300,
                filebrowserUploadUrl:"upload.php",
              });
            </script>
              
     
              
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="updatepost" class="btn btn-primary">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->


           <?php endwhile ?>
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




<div class="modal fade" id="yourvideo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Your Video</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Understood</button> -->
      </div>
    </div>
  </div>
</div>
        <!-- left header section -->
        <!-- <div style="margin-bottom:px" class="header"> -->
          <!-- <div class="leftSide">
            <h4>
              <span class="welcome underline"></span> <br />
              <span class="arifText"></span><?= $_SESSION['phone'] ?>~<?= $_SESSION['role'] ?><br />
              <span class="arifText"></span><br />
              <span class="webDesign"></span>
            </h4>
            <p><span class="headText"></span></p>
             <div class="headBtnBlock">
              <a href="#about" class="headBtn"></a>
            </div> -->
          <!-- </div> -->

          <!-- right header section -->
          <div class="righSide">
            <img data-aos="flip-up" src="Image/hand_two_fingers.png" alt="" />
          </div>
        </div>
      </section>

      <!-- about -->
      <section class="mt-5" style="margin-top:px" id="about">
        <div class="topContent">
          <h1><span class="underline">about me</span>, ok</h1>
          <p>my introduction</p>
        </div>
        <div class="content">
          <div class="aboutLeft">
            <img src="Image/<?=$image?>" alt="" />
          </div>
          <div class="aboutRight">
            <h3>I am a <span class="aboutType"></span></h3>
            <p>
              i am an intermediate developer. i'm still learning, i'll continiue
              <br />
              my studies on <span>react.js </span>. my plan is to be a mern
              stack developer <br />
              with
              <span>wix</span>
            </p>
            <a href="#">My skills</a>
          </div>
        </div>
      </section>

      <!-- skills -->
      <section>
        <div id="skills">
          <h1><span class="underline">my</span> skills</h1>
          <p>there's no limit of learning.</p>
          <div class="skillGrp language">
            <div class="skillCont">
              <h2>85%</h2>
              <p>html</p>
              <div class="html"></div>
            </div>

            <div class="skillCont">
              <h2>70%</h2>
              <p>css</p>
              <div class="css"></div>
            </div>

            <div class="skillCont">
              <h2>65%</h2>
              <p>javascript</p>
              <div class="js"></div>
            </div>

            <div class="skillCont">
              <h2>70%</h2>
              <p>scss</p>
              <div class="scss"></div>
            </div>
          </div>

          <p class="highlight">libraries</p>

          <div class="skillGrp libraries">
            <div class="skillCont">
              <h2>75%</h2>
              <p>jquey</p>
              <div class="jquery"></div>
            </div>

            <div class="skillCont">
              <h2>60%</h2>
              <p class="nodeJS">
                node js <br />
                express js
              </p>
              <div class="node"></div>
            </div>

            <div class="skillCont">
              <h2>65%</h2>
              <p>react js</p>
              <div class="react"></div>
            </div>
          </div>
        </div>
      </section>
      <!-- works -->
      <section id="works">
        <h1><span class="underline">My</span> Works</h1>
        <p>
          i can't submit my all projects, due to my personal problems. but
          here's what i've got.
        </p>
        <div class="gallary">
          <?php
          
          while($photo = mysqli_fetch_assoc($resultph)):
            ?>

          <span>
            
            <form action="updatepost.php" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="dpicid" value="<?= $photo['id']?>">
              <input type="hidden" name="dpicimg" value="<?= $photo['image']?>">
              <button type="submit" name="dpic" class="btn btn-warning d-inline">Delete</button>  
            </form>
            <h6 class="text-center d-inline"><?=$photo['img_title']?></h6>
            <img src="image/<?=$photo['image']?>" alt="mf" />
          </span>
            

          <?php
              endwhile;
          ?>
          <!-- <span>
            <img src="./works/work2.jpg" alt="" />
          </span>
          <span>
            <img src="./works/work3.png" alt="" />
          </span>
          <span>
            <img src="./works/work4.png" alt="" />
          </span>
          <span>
            <img src="./works/work5.jpg" alt="" />
          </span>
          <span>
            <img src="./works/work6.png" alt="" />
          </span>
          <span>
            <img src="./works/work7.jpg" alt="" />
          </span>
          <span>
            <img src="./works/work8.jpg" alt="" />
          </span> -->
        </div>

        <div class="preview">
          <img src="works/work8.jpg" alt="" />
          <i class="fas fa-times-circle"></i>
        </div>
      </section>

      <!-- contact -->
      <section class="contact">
        <div class="content">
          <i class="fas fa-times"></i>
          <div class="form">
            <h2>contact me via:</h2>

            <div class="fiverr">
              <img src="Image/logo.png" alt="" />
              <h2><?=$row1['name'].' - '.$row1['actype'];?></h2>
              <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <span>(2)</span>
              </div>
              <p>Programming and Tech</p>
              <a href="https://www.fiverr.com/....." target="_blank"
                >See my gigs</a
              >
            </div>
            <p>note: this page is still upgrading day by day</p>
          </div>
        </div>
      </section>
    </section>



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
    <span class="position-relative" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#allsetting" aria-controls="allsetting" aria-expanded="false" aria-label="Toggle navigation"><img style="width:50px; height:50px; border-radius:50%" src="image/<?=$image;?>" alt=""></span>
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


<!--  -->


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

<!-- Modal -->



    <!-- scripts -->

    <!-- animaate -->
    <script>
      AOS.init();
    </script>

    <!-- custom -->
    <script src="main.js"></script>
    <script>
      function loaded() {
        setTimeout(() => {
          $(".loading").slideUp(200);
        }, 500);
      }
    </script>
    <script src="lf30_editor_p2oduafj.json"></script>
    <script>
      
    </script>
  </body>
</html>
