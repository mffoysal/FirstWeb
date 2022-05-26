<?php
//   session_start();
  if(!isset($_SESSION['unique_id'])){
    header('location:../../login.php');
  }

  $s="";
  if(isset($_REQUEST['success'])){
    $s=$_REQUEST['success'];
  }

  if(isset($_SESSION['role'])){
	  $_SESSION['actype']=$_SESSION['role'];
  }
 
  include('../../db.php');
      // $search="BREAKFAT";
      if(isset($_REQUEST['search'])){
          $search = $_REQUEST['search'];
          // $search = preg_replace("#[^0-9a-z]#i","",$search);
         
      }
  ?>
  

<?php
include('../../db.php');

            
?>

  <head>
    <meta charset="utf-8">
    <title>User List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../icon/bootstrap-icons.css">
    <!-- <link rel="stylesheet" href="stylesta.css"> -->
    <script src="../ck/ckeditor.js"></script>
    <!-- <script src="f/admin/ckeditor/ckeditor.js"></script> -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../bootstrap.min.css">

    <script src="//cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
    <!-- <script src="../../jquery-3.5.1.min.js"></script> -->

    <link rel="stylesheet" href="../../bootstrap.min.css">
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
 
    
<!-- nav -->
<nav class="nav1">
      <input type="checkbox" id="check">
      <label style="margin-right:8px" for="check" class="checkbtn">
        <i class="bi bi-list"></i>
      </label>
      <label style="margin-left:-10px" class="logo">
      <span style="margin-right:-15px" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navmsg" aria-controls="navmsg" aria-expanded="false" aria-label="Toggle navigation">
                          <img style="border-radius:50%; margin-top:-15px" src="<?php 
                          if(isset($_SESSION['img'])){
                            echo "../../image/".$_SESSION['img'];
                          }else{
                            echo "../img/avatar3.png";
                          }
                          ?>" width="50px" height="50px" alt="">
                       </span>EdUFriend</label>
      <ul>
        <li><?php if(isset($_SESSION['name'])){
          echo '<a style="" class="active" href="../../login.php">'.$_SESSION['name'].'</a>';
          // echo $_SESSION['name']; 
        }else{
          echo '<a style="" class="active" href="../../index.php">Home</a>';
        } ?></li>

        <li><a href="../../login.php">Your Dashboard</a></li>
        <li><a href="#" ><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#yourpost">Your POST</button></a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="#">Feedback</a></li>
      </ul>
    </nav>




                      <!-- </nav> -->
                      <div class="collapse" id="navmsg">
                    <div class="bg-dark p-4">



      
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
                    </div>
                    </div>

<!-- nav -->







<!-- responsive -->



			<!-- <nav class = "navbar navbar-header navbar-light bg-primary">
			<div class = "container-fluid">
				<div class = "navbar-header">
					<p class = "navbar-text pull-right text-white"><h3>Simple Online Quiz System</h3></p>
				</div>
				<div class = "nav navbar-nav navbar-right">
					<a href="logout.php" class="text-dark"><?php echo $name ?> <i class="fa fa-power-off"></i></a>
				</div>
			</div>
		</nav> -->
							<!-- <div id="sidebar" class="bg-light">
								<div id="">
									<a href="home.php" class=" text-dark">
											<div class="sidebar-icon"><i class="fa fa-home"> </i></div>  Home
									</a>
								</div>
								<?php if($_SESSION['actype'] != 'student'): ?>
								<?php if($_SESSION['actype'] == "admin"): ?>
								<div id="">
									<a href="faculty.php" class=" text-dark">
											<div class="sidebar-icon"><i class="fa fa-users"> </i></div>  Faculty List
									</a>
								</div>
							<?php endif; ?>
								<div id="">
									<a href="student.php" class="text-dark">
											<div class="sidebar-icon"><i class="fa fa-users"> </i></div>  Student List
									</a>
								</div>
								<div id="">
									<a href="quiz.php" class="text-dark">
											<div class="sidebar-icon"><i class="fa fa-list"> </i></div>  Quiz List
									</a>
								</div>
								<div id="">
									<a href="history.php" class="text-dark">
											<div class="sidebar-icon"><i class="fa fa-history"> </i></div>  Quiz Records
									</a>
								</div>
								<?php else: ?>
								<div id="">
									<a href="student_quiz_list.php" class="text-dark">
											<div class="sidebar-icon"><i class="fa fa-list"> </i></div>  Quiz List
									</a>
								</div>
							<?php endif; ?>

							</div>
							<script>
								$(document).ready(function(){
									var loc = window.location.href;
									loc.split('{/}')
									$('#sidebar a').each(function(){
									// console.log(loc.substr(loc.lastIndexOf("/") + 1),$(this).attr('href'))
										if($(this).attr('href') == loc.substr(loc.lastIndexOf("/") + 1)){
											$(this).addClass('active')
										}
									})
								})
								
							</script>

 -->

